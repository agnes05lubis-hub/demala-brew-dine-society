<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'pending');

        $orders = Order::with('items.menu')
            ->where('status', $status)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $counts = Order::selectRaw('status, count(*) as c')
            ->groupBy('status')
            ->pluck('c', 'status');

        return view('admin.orders.index', compact(
            'orders',
            'status',
            'counts'
        ));
    }

    public function show(Order $order)
    {
        $order->load('items.menu');

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => [
                'required',
                'in:pending,confirmed,preparing,ready,completed,cancelled',
            ],
        ]);

        $order->update([
            'status' => $data['status'],
        ]);

        return back()->with(
            'success',
            'Status pesanan berhasil diperbarui.'
        );
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return back()->with(
            'success',
            'Pesanan berhasil dihapus.'
        );
    }
}