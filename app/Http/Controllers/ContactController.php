<?php

namespace App\Http\Controllers;

use App\Mail\NewContactMessage;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'pesan' => 'nullable|string|max:1000',
        ]);

        $contact = ContactMessage::create($request->only('nama', 'email', 'pesan'));

        Mail::to('demalasisingamangarajapku@gmail.com')
            ->send(new NewContactMessage($contact));

        return back()->with('success', 'Terima kasih! Pesan Anda sudah kami terima.');
    }
}