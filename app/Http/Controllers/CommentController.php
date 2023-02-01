<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Story $story)
    {
       request()->validate([
         'body'=>['required','min:10']
       ]);
       //comment store
       $story->comments()->create([
           'body'=>request('body'),
           'user_id'=>auth()->id()//auth()->user()->id()
       ]);
       //mail
       $subscribers=$story->subscribers->filter(fn($subscriber)=> $subscriber->id != auth()->id());

       $subscribers->each(function($subscriber) use($story)
       {
           Mail::to($subscriber->email)->queue(new SubscriberMail($story,$subscriber));
       });
       return redirect('/stories/'.$story->slug);
    }
}
