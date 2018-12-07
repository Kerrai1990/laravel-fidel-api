@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Brands</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width:30%;">#</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Performance Fee</th>
                            <th style="width: 40px">Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td><span>{{ $brand->id }}</span></td>
                                <td><span>{{ $brand->name }}</span></td>
                                <td><span>{{ $brand->created }}</span></td>
                                <td><span>{{ $brand->performanceFee }}</span></td>
                                <td><span class="badge bg-{{ $brand->live ? "green" : "red" }}">&nbsp;</span></td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop