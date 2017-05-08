<?php
namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use Session;

class PagesController extends Controller
{
  public function getIndex()
  {
    # process variable data or params
    $posts = POST::orderBy('created_at', 'desc')->limit(4)->get();
    # talk to the model
    #recieve from the model
    #compile or process data if needed
    #pass the data to the correct view

    return view('pages.welcome')->withPosts($posts);
  }
  public function getAbout()
  {
    $first = "Samuel";
    $last = "Wadhwa";
    $full = $first . " " . $last;
    $email = "wadhwa.sumit007@yahoo.com";

    $data = [];
    $data['firstname'] = $full;
    $data['email'] = $email;

    return view('pages.about') -> withData($data);
  }
  public function getContact()
  {
    return view('pages.contact');
  }
  public function postContact(Request $request)
  {
    $this->validate($request, ['name'=>'required|min:2'  ,'email'=>'required|email', 'subject'=>'min:5','message'=>'min:10']);
    $data = array(
      'email' => $request->email,
      'subject' => $request->subject,
      'bodyMessage' => $request->message,
      'FName' => $request->name
      );

    Mail::send('emails.contact', $data, function($message) use ($data){
        $message->from($data['email']);
        $message->to('wadhwa.sumit007@yahoo.com');
        $message->subject($data['subject']);
    });
    Session::flash('success', 'Your message has been sent');
    return redirect()->url('/');
  }

}
?>
