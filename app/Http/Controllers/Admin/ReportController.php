<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BillTable;
use App\Models\BillTableDetail;

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

    public function product() {
        return view('admin.report.product');
    }

    public function getProduct(Request $request) {
        if($request->id == 0){
            $data = BillTableDetail::groupBy('bill_table_details.product_id', 'products.name')
            ->join('products', 'products.id', '=', 'bill_table_details.product_id')
            ->selectRaw('sum(bill_table_details.total) as sum, products.name')->orderBy('sum','DESC')->limit(3)->get();
        } else {
            $data = BillTableDetail::groupBy('bill_table_details.product_id', 'products.name')
            ->join('products', 'products.id', '=', 'bill_table_details.product_id')
            ->selectRaw('sum(bill_table_details.real_quantity) as sum, products.name')->orderBy('sum','DESC')->limit(3)->get();
        }
        return response()->json($data);
    }

    public function customer() {
        return view('admin.report.customer');
    }

    public function getCustomers() {
        $data = BillTable::groupBy('bill_tables.customer_id', 'customers.name')
        ->selectRaw('customers.name as namecustomer, bill_tables.customer_id, sum(bill_table_details.total) as sum')
        ->join('customers', 'customers.id', '=', 'bill_tables.customer_id')
        ->join('bill_table_details', 'bill_table_details.bill_table_id', '=', 'bill_tables.id')
        ->limit(4)
        ->get();
        return response()->json($data);
    }

    public function getCustomersByMonth(Request $request) {
        $data = BillTable::groupBy('bill_tables.customer_id', 'customers.name')
        ->selectRaw('customers.name as namecustomer, bill_tables.customer_id, sum(bill_table_details.total) as sum')
        ->join('customers', 'customers.id', '=', 'bill_tables.customer_id')
        ->join('bill_table_details', 'bill_table_details.bill_table_id', '=', 'bill_tables.id')
        ->where('date', 'like', '%'.$request->date.'%')
        ->limit(4)
        ->get();
        return response()->json($data);
    }
}
