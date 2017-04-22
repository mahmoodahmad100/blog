<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use Mail;

class PagesController extends Controller
{
    public function getWelcome()
    {
      $posts = Post::orderBy('id','desc')->limit(4)->get();
      return view('pages.welcome',compact('posts'));
    }
    public function getAbout()
    {
    	return view('pages.about');
    }

    public function getContact()
    {
    	return view('pages.contact');
    }

    public function postContact(Request $request)
    {
      $this->validate($request,[
        'email' => 'required|email',
        'subject' => 'required|max:50',
        'message' => 'required|max:255'
      ]);

      $data = [
        'email' => $request->email,
        'subject' => $request->subject,
        'bodyMessage' => $request->message
      ];

      Mail::send('emails.contact',$data,function($message) use($data){
        $message->from($data['email']);
        $message->to('hi@hi.com');
        $message->subject($data['subject']);
      });

      return redirect()->back();

    }
}
