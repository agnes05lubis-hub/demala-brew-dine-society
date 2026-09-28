<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'message' => 'required|string|max:1000',
            'rating'  => 'nullable|integer|between:1,5',
        ]);

        Review::create([
            'user_id'     => auth()->id(),
            'name'        => $data['name'],
            'message'     => $data['message'],
            'rating'      => $data['rating'] ?? 5,
            'is_approved' => false,
            'status'      => 'pending',
        ]);

        return back()->with('success', 'Terima kasih! Ulasan kamu sudah kami terima dan akan segera ditinjau.');
    }
}