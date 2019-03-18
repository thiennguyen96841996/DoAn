@extends('admin.layouts.master')
@section('title')
user
@endsection
@section('CssPage')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}" />
@endsection
@section('content')
<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<h2 class="header-title">Phòng ban</h2>
			<div class="header-sub-title">
				<nav class="breadcrumb breadcrumb-dash">
					<a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
					<a class="breadcrumb-item" href="{{ route('department.index') }}">Phòng ban</a>
					<span class="breadcrumb-item active">Mục lục</span>
				</nav>
			</div>
		</div>
		<div class="text-right">
			<a href="{{ route('department.create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Phòng ban</a>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-overflow">
					<table id="dt-opt" class="table table-hover table-xl">
						<thead>
							<tr>
								<th>
									STT
								</th>
								<th>Tên</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@php
								$stt = 1;
							@endphp
							@foreach($deparments as $value)
							<tr>
								<td>
									{{ $stt++ }}
								</td>
								<td>
									{{ $value->name }}
								</td>
								<td class="text-center font-size-18">
									<a href="{{ route('department.edit', $value->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div> 
			</div>       
		</div>
	</div>
</div>
@endsection
@section('JsPage')
<script src="{{ asset('assets/vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/tables/data-table.js') }}"></script>
@endsection
