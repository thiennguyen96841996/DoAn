<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BillTable;
use App\Models\BillTableDetail;
use App\Models\BillProduct;

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
            ->selectRaw('sum(bill_table_details.total) as sum, products.name')->orderBy('sum','DESC')->limit(10)->get();
        } else {
            $data = BillTableDetail::groupBy('bill_table_details.product_id', 'products.name')
            ->join('products', 'products.id', '=', 'bill_table_details.product_id')
            ->selectRaw('sum(bill_table_details.real_quantity) as sum, products.name')->orderBy('sum','DESC')->limit(10)->get();
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
        ->limit(10)
        ->get();
        return response()->json($data);
    }

    public function getCustomersByMonth(Request $request) {
        $data = BillTable::groupBy('bill_tables.customer_id', 'customers.name')
        ->selectRaw('customers.name as namecustomer, bill_tables.customer_id, sum(bill_table_details.total) as sum')
        ->join('customers', 'customers.id', '=', 'bill_tables.customer_id')
        ->join('bill_table_details', 'bill_table_details.bill_table_id', '=', 'bill_tables.id')
        ->where('date', 'like', '%'.$request->date.'%')
        ->limit(10)
        ->get();
        return response()->json($data);
    }

    public function producer() {
        return view('admin.report.producer');
    }

    public function getProducers() {
        $data = BillProduct::groupBy('bill_products.supplier_id', 'suppliers.name')
        ->selectRaw('suppliers.name as namesupplier, bill_products.supplier_id, sum(bill_product_details.total) as sum')
        ->join('suppliers', 'suppliers.id', '=', 'bill_products.supplier_id')
        ->join('bill_product_details', 'bill_product_details.bill_product_id', '=', 'bill_products.id')
        ->limit(10)
        ->get();
        return response()->json($data);
    }

    public function getProducersByMonth(Request $request) {
        $data = BillProduct::groupBy('bill_products.supplier_id', 'suppliers.name')
        ->selectRaw('suppliers.name as namesupplier, bill_products.supplier_id, sum(bill_product_details.total) as sum')
        ->join('suppliers', 'suppliers.id', '=', 'bill_products.supplier_id')
        ->join('bill_product_details', 'bill_product_details.bill_product_id', '=', 'bill_products.id')
        ->where('date', 'like', '%'.$request->date.'%')
        ->limit(10)
        ->get();
        return response()->json($data);
    }
}
