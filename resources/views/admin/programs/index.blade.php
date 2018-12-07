@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Programs</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width:30%;">#</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Locations</th>
                            <th>Transactions</th>
                            <th style="width: 40px">Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td><span>{{ $program->id }}</span></td>
                                <td><span>{{ $program->name }}</span></td>
                                <td><span>{{ $program->created }}</span></td>
                                @if(isset($program->locations))
                                    <td>
                                        <ul>
                                            @foreach($program->locations as $location)
                                                <li>
                                                    <a href="{{ route('locations.show', ['id' => $location->id]) }}">
                                                        {{$location->address}}
                                                        , {{$location->city}}
                                                        . {{$location->postcode}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ route('transactions.show', ['id' => $program->id]) }}">
                                        <i class="btn btn-sm btn-success">£</i></a>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $program->active ? "green" : "red" }}">&nbsp;</span>
                                </td>
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