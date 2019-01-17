<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ControllerMail extends Controller 
{
    public function send(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3|max:50|string',
            'email' => 'required|email|min:5|max:50',
            'subject' => 'required|min:3|max:50|string',
            'body' => 'required|min:10|max:255|string',
        ]);

        $to = 'Saridania';
        $toEmail = 'daniasariwiji@gmail.com';

        $data = [
            'name' => $to,
            'body' => $request->body
        ];

        Mail::send('mail.index', $data, function($messages) use ($to, $toEmail, $request) {
            $messages->to($toEmail, $to)
                     ->subject($request->subject);
            $messages->from($request->email, $request->nama);
        });

        return back()->with('success', 'berhasil mengirim email');
    }
}