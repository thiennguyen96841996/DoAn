<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BillTable;
use Carbon;

class ReportController extends Controller
{
    public function sell() {
    	return view('admin.report.sell');
    }

    public function getSell(Request $request) {
    	$date = $request->date;
		$data = BillTable::select('paymented', 'date')->where('date', 'like', '%'.$date.'%')->get();
    	return response()->json($data);
    }
}
