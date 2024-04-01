<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs as MailContactUs;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    

    public function index()
    {
        return view('admin.contactUs.create');
    }


    
    // public function send(Request $request) {

   

    // $data = $request->only('name','email','phone','address','message');
    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         // $file->move(\public_path("/file"), $filename);
    //         $path = $file->storeAs('public/file', $filename);
    //         $data['file'] = $filename;
    //     }
    

    // // dd($data);
    // ContactUs::create($data);
    
    // Mail::to('vanshita.v2web@gmail.com')->send(new MailContactUs($data),function($message){
    //     $message->attach('C:\xampp\htdocs\vanshita\demo_filamentphp\public\images');
    // });

    // Mail::send('emails.contact', $data, function($message) {
    //     $message->to('recipient@example.com', 'Recipient Name')->subject('Subject of the Email');
    //     $message->from('vanshita.v2web@gmail.com', 'CONTACTUS');
    //     $message->attach('C:\xampp\htdocs\vanshita\demo_filamentphp\public\images\1711016982.jpg', [
    //         'as' => '1711016982.jpg',
    //         'mime' => 'image/jpeg',
    //     ]);
    //     $message->embed('C:\xampp\htdocs\vanshita\demo_filamentphp\public\images\1711016982.jpg', '1711016982.jpg');
    // });
    
    

    // return redirect()->back()->with('message', "Your Mail Send Successfully");


    // $imageUrl = asset('storage/file/'.$data['file']); // Replace 'images/1711016982.jpg' with the actual path to your image

    // Mail::send('emails.contact', ['data' => $data, 'image_url' => $imageUrl], function ($message) use ($data) {
    //     $message->to('recipient@example.com', 'Recipient Name')->subject('Subject of the Email');
    //     $message->from('vanshita.v2web@gmail.com', 'CONTACTUS');
    // });

    // return redirect()->back()->with('message', "Your Mail Send Successfully");
    //  }


    public function send(Request $request) {
        $data = $request->only('name', 'email', 'phone', 'address', 'message');
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = $file->storeAs('public/file', $filename);
            $data['file'] = $filename;
        }
    
        ContactUs::create($data);
    
        
        $imageUrl = asset('storage/file/'.$data['file']); 
    
        Mail::send('emails.contact', ['data' => $data, 'image_url' => $imageUrl], function ($message) use ($data, $imageUrl) {
            $message->to($data['email'], 'name')->subject('Subject of the Email');
            $message->from($data['email'], 'CONTACT US');
    
            // Attach the image file
            // $message->attach(storage_path('app/public/file/'.$data['file']), [
            //     'as' => $data['file'],
            //     'mime' => 'image/jpeg', // Adjust MIME type if your image is different
            // ]);
    
            // Embed the image in the email
            $message->embed(storage_path('app/public/file/'.$data['file']), $data['file']);
        });
    
        return redirect()->back()->with('message', "Your Mail Send Successfully");
    }
    
  }


