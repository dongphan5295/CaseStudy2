<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{

    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
        $first = 'Alex';
        $last = 'Curtis';

        $fullname = $first . " " . $last;
        $email = 'alex@jacurtis.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withData($data);
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]);

        $contact = $request->all();
        $contact = Contact::create($contact);
        $contact->save();

        Mail::send(
            'pages.contact_email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'user_message' => $request->get('message'),
            ),
            function ($message) use ($request) {
                $message->subject('New Contact Mail Travel Blogger');
                $message->from($request->email);
                $message->to('dongdt22k13@gmail.com');
            }
        );

        return back()->with('success', 'Thank you for contact us!');
    }
}
