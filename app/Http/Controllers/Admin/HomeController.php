<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BillTable;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill_count = BillTable::where('status', 0)
        ->whereDay('updated_at', Carbon::now()->format('d'))
        ->whereMonth('updated_at', Carbon::now()->format('m'))
        ->whereYear('updated_at', Carbon::now()->format('Y'))
        ->selectRaw('sum(paymented) as sum, count(id) as count')
        ->get();
        $bill_detail_count = BillTable::where('status', 1)
        ->whereDay('updated_at', Carbon::now()->format('d'))
        ->whereMonth('updated_at', Carbon::now()->format('m'))
        ->whereYear('updated_at', Carbon::now()->format('Y'))
        ->selectRaw('sum(paymented) as sum, count(id) as count')
        ->get();
        $customer_count = BillTable::groupBy('customer_id')
        ->selectRaw('customer_id')
        ->whereDay('updated_at', Carbon::now()->format('d'))
        ->whereMonth('updated_at', Carbon::now()->format('m'))
        ->whereYear('updated_at', Carbon::now()->format('Y'))
        ->get()
        ->count('customer_id');
        return view('admin.home', compact('bill_count', 'bill_detail_count', 'customer_count'));
    }
}
