<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:100',
            'phone'            => 'required|string|max:20',
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required',
            'guests'           => 'required|integer|min:1|max:50',
            'notes'            => 'nullable|string|max:500',
        ]);

        Reservation::create($data + [
            'user_id' => auth()->id(),
            'status'  => 'pending',
        ]);

        return redirect(route('kontak') . '#reservasi')
            ->with('reservation_success', 'Reservasi kamu sudah kami terima. Tim Demala akan segera mengonfirmasi.');
    }
}