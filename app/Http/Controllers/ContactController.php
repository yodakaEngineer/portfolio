<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactSent;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }
    
    public function confirm(Request $request)
    {
        $this->validate($request, [
        'name'  => 'required',
        'email' => 'required|email',
        'message' => 'present',
        ]);
        
        $contact = new Contact($request->all());
        
        return view('contacts.confirm', compact('contact'));
    }
    
    public function complete(Request $request)
    {
        $this->validate($request, [
        'name'  => 'required',
        'email' => 'required|email',
        'message' => 'present',
        ]);
        
        $input = $request->except('action');
        
        if ($request->action === 'return') {
            return redirect()->action('ContactController@index')->withInput($input);
        }
        
        // 送信メール
        \Mail::send(new ContactSent([
            'to' => $request->email,
            'to_name' => $request->name,
            'from' => 'engineeryodaka@gmail.com',
            'from_name' => "Yodaka Services",
            'subject' => 'お問い合わせありがとうございました。',
            'body' => $request->message
        ]));
 
        // 受信メール
        \Mail::send(new ContactSent([
            'to' => 'engineeryodaka@gmail.com',
            'to_name' => "Yodaka Services",
            'from' => $request->email,
            'from_name' => $request->name,
            'subject' => 'サイトからのお問い合わせ',
            'body' => $request->message
        ], 'from'));
        
        // 二重送信防止
        $request->session()->regenerateToken();
        
        return view('contacts.complete');
    }
}
