<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoryController extends Controller
{
    public function index() {
        
        return view('stories.index',[
            'stories'=>Story::latest()
                            ->filter(request(['search','category','author']))
                            ->paginate(6)
                            ->withQueryString()     
        ]);
    }

   
       public function show(Story $story)
       {
            return view('stories.show',[
              'story'=>$story,
              'randomStories'=>Story::inRandomOrder()->take(3)->get()
            ]);
        }

        public function subscriptionHandler(Story $story)
        {
            if(User::find(auth()->id())->isSubscribed($story))
            {
                $story->unSubscribe();
            }else{
                $story->subscribe();
            }
            return redirect('/stories/'.$story->slug);
        }

        
}
