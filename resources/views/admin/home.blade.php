@extends('admin.layouts.master')
@section('title')
home
@endsection
@section('CssPage')
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist-js/dist/chartist.min.css') }}" />
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">KẾT QUẢ BÁN HÀNG HÔM NAY</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-body ">
                                        <div class="media">
                                            <div class="align-self-center">
                                                <i class="ti-money font-size-40 text-success"></i>
                                            </div>
                                            <div class="m-l-20">
                                                <p class="m-b-0">{{ $bill_detail_count[0]->count }} đơn đã xong</p>
                                                <h2 class="m-b-0">{{ $bill_detail_count[0]->sum }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <div class="col-md-4 border left">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="align-self-center">
                                                <i class="ti-write font-size-40 text-info"></i>
                                            </div>
                                            <div class="m-l-20">
                                                <p class="m-b-0">{{ $bill_count[0]->count }} đơn đang phục vụ</p>
                                                <h2 class="m-b-0">{{ $bill_count[0]->sum }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-md-4 border left">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="align-self-center">
                                                <i class="ti-user font-size-40 text-primary"></i>
                                            </div>
                                            <div class="m-l-20">
                                                <p class="m-b-0">Khách hàng</p>
                                                <h2 class="m-b-0">
                                                    <span>{{ $customer_count }}</span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Doanh số hôm nay</h4>
                        <div class="card-toolbar">
                            <ul>
                                <li>
                                    <a class="text-gray" href="javascript:void(0)">
                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-inline">
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">Today</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">7 days</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">14 days</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray active">1 Month</a>
                                    </li>
                                </ul>
                                <div class="m-t-20">
                                    <div class="ct-chart" id="stacked-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">TOP 10 HÀNG HÓA BÁN CHẠY 7 NGÀY QUA</h4>
                        <div class="card-toolbar">
                            <ul>
                                <li>
                                    <a class="text-gray" href="javascript:void(0)">
                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-inline">
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">Today</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">7 days</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">14 days</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray active">1 Month</a>
                                    </li>
                                </ul>
                                <div class="m-t-20">
                                    <div class="ct-chart" id="horizontal-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Các hoạt động gần đây</h5>
                    </div>
                    <ul class="list-media">
                        <li class="list-item border bottom">
                            <a href="javascript:void(0);" class="media-hover p-20">
                                <div class="media-img">
                                    <div class="icon-avatar bg-gradient-success">
                                        <i class="mdi mdi-file-outline"></i>
                                    </div>
                                </div>
                                <div class="info">
                                    <span class="title">New Attachment</span>
                                    <span class="sub-title">3 files has updated</span>
                                    <span class="font-size-11 p-t-5">5 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-item border bottom">
                            <a href="javascript:void(0);" class="media-hover p-20">
                                <div class="media-img">
                                    <div class="icon-avatar bg-gradient-success">
                                        <i class="mdi mdi-file-outline"></i>
                                    </div>
                                </div>
                                <div class="info">
                                    <span class="title">New Attachment</span>
                                    <span class="sub-title">3 files has updated</span>
                                    <span class="font-size-11 p-t-5">5 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-item border bottom">
                            <a href="javascript:void(0);" class="media-hover p-20">
                                <div class="media-img">
                                    <div class="icon-avatar bg-gradient-success">
                                        <i class="mdi mdi-file-outline"></i>
                                    </div>
                                </div>
                                <div class="info">
                                    <span class="title">New Attachment</span>
                                    <span class="sub-title">3 files has updated</span>
                                    <span class="font-size-11 p-t-5">5 days ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('JsPage')
<script src="{{ asset('assets/vendor/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/js/charts/chartist.js') }}"></script>
@endsection
