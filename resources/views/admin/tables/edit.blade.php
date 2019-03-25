@extends('admin.layouts.master')
@section('title')
bàn
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <h2 class="header-title">Bàn</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('table.index') }}">Bàn</a>
                    <span class="breadcrumb-item active">Chỉnh sửa</span>
                </nav>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">Chỉnh sửa bàn <b>"{{ $table->name }}"</b></h4>
            </div>
            <form method="POST" action="{{ route('table.update', $table->id) }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Tên bàn</label>
                                    <input type="text" class="form-control" value="{{ $table->name }}" name="name">
                                </div>
                            </div>
                            @if ($errors->has('name'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('name') as $name)
                                        <li>{{ $name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Số ghế</label>
                                    <input type="address" name="number_slot" value="{{ $table->number_slot }}" class="form-control">
                                </div>
                            </div>
                            @if ($errors->has('number_slot'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('number_slot') as $number_slot)
                                        <li>{{ $number_slot }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Nhóm</label>
                                    <select class="form-control" name="group">
                                        @foreach($groups as $value)
                                        <option value="{{ $value->id }}" @if ($value->id == old('group', $table->table_group_id)) selected="selected" @endif>{{ $value->name }}</option>
                                        @endforeach
                                    </select>    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    <textarea class="form-control" name="info">{{ $table->info }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="status" value="{{ $table->status }}" hidden="">
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <button type="reset" class="btn btn-default">Bỏ qua</button>
                                <button type="submit" name="submit" class="btn btn-primary">Lưu</button> 
                            </div>
                        </div>
                    </div> 
                </div> 
            </form>  
        </div>   
    </div>
</div>
@endsection
@section('JsPage')
@endsection
