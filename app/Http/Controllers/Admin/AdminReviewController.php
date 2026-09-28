<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index(Request $request)
    {
        $status  = $request->get('status', 'pending');
        $reviews = Review::where('status', $status)->latest()->paginate(10)->withQueryString();
        $counts  = Review::selectRaw('status, count(*) as c')->groupBy('status')->pluck('c', 'status');

        return view('admin.reviews.index', compact('reviews', 'status', 'counts'));
    }

    public function approve(Review $review)
    {
        $review->update(['status' => 'approved', 'is_approved' => true]);
        return back()->with('success', 'Ulasan diterima.');
    }

    public function reject(Review $review)
    {
        $review->update(['status' => 'rejected', 'is_approved' => false]);
        return back()->with('success', 'Ulasan ditolak.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('success', 'Ulasan dihapus.');
    }
}