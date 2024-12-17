<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() 
    {
        $title = "Sells Report";
        return view('report.index', compact('title'));
    }
    public function process(Request $request) 
    {
        $title = "Sells Report";
        $month = $request->month;
        $year = $request->year;
        $month_transaction = date('Y-m', strtotime($request->year.'-'.$request->month));
        $itemtransaction = Order::whereHas('cart', function($q) use ($month_transaction) {
            $q->where('payment_status', 'paid');
            $q->where('created_at', 'LIKE', $month_transaction.'%');
        })->get();
        return view('report.process', compact('title', 'itemtransaction', 'month', 'year'))->with('no', 1);
    }
}
