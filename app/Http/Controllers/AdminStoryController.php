<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminStoryController extends Controller
{
   public function index()
   {
    return view('admin/stories/index',[
        'stories'=>Story::latest()->paginate(3)
    ]);
   }

   public function create()
        {
           
            return view('admin.stories.create',[
                'categories'=>Category::all()
            ]);
        }

        public function store()
        {
        
           $formData=request()->validate([
            "title" => ["required"],
            "slug" => ["required",Rule::unique('stories','slug')],
            "intro" => ["required"],
            "body" => ["required"],
            "category_id" => ["required",Rule::exists('categories','id')],
           ]);
           $formData['user_id']=auth()->id();
           $formData['thumbnail']=request()->file('thumbnail')->store('thumbnails');
           Story::create($formData);

           return redirect('/');
        }

        public function destroy(Story $story)
        {
            $story->delete();

            return redirect('/admin/stories')->with('success', 'Successfully Deleted Story ID -' .$story->id);
        }

        public function edit(Story $story)
        {
            return view('admin.stories.edit',[
                'story'=>$story,
                'categories'=>Category::all()
            ]);
        }

        public function update(Story $story)
        {
            $formData=request()->validate([
                'title'=>['required'],
                'slug'=>['required',Rule::unique('stories','slug')->ignore($story->id)],
                'intro'=>['required'],
                'body'=>['required'],
                'category_id'=>['required',Rule::exists('categories','id')]
            ]);
            $formData['user_id']=auth()->id();
            $formData['thumbnail']=request()->file('thumbnail')? request()->file('thumbnail')->store('thumbnails'): $story->thumbnail;
            $story->update($formData);
            return redirect('/')->with('success','Successfully Update Story ID -'.$story->id);
        }
}
