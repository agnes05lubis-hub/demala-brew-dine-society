<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index(Request $request)
    {
        $status       = $request->get('status', 'pending');
        $reservations = Reservation::where('status', $status)
            ->orderBy('reservation_date')
            ->orderBy('reservation_time')
            ->paginate(10)
            ->withQueryString();

        $counts = Reservation::selectRaw('status, count(*) as c')->groupBy('status')->pluck('c', 'status');

        return view('admin.reservations.index', compact('reservations', 'status', 'counts'));
    }

    public function confirm(Reservation $reservation)
    {
        $reservation->update(['status' => 'confirmed']);
        return back()->with('success', 'Reservasi dikonfirmasi.');
    }

    public function cancel(Reservation $reservation)
    {
        $reservation->update(['status' => 'cancelled']);
        return back()->with('success', 'Reservasi dibatalkan.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back()->with('success', 'Reservasi dihapus.');
    }
}