<?php

namespace App\Http\Controllers;

use App\Mail\NewReviewNotification;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
        ]);

        $review = Review::create([
            'name' => $request->name,
            'message' => $request->message,
            'is_approved' => false,
        ]);

        Mail::to('demalasisingamangarajapku@gmail.com')
            ->send(new NewReviewNotification($review));

        return back()->with('success', 'Terima kasih! Ulasan kamu sudah kami terima dan akan segera ditinjau.');
    }
}