@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Program Transactions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width:30%;">#</th>
                            <th>Currency</th>
                            <th>Created</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Card</th>
                            <th>Amount</th>
                            <th>Cleared</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td><span>{{ $transaction->id }}</span></td>
                                <td><span>{{ $transaction->currency }}</span></td>
                                <td><span>{{ $transaction->created }}</span></td>
                                <td><a href="{{route('locations.show', ['id' => $transaction->locationId])}}">
                                        {{$transaction->address}}
                                        , {{ $transaction->city }}
                                        . {{ $transaction->postcode }}
                                    </a>
                                </td>
                                <td><span>{{ $transaction->type }}</span></td>
                                <td><span>**** **** **** {{ $transaction->lastNumbers }}</span></td>
                                <td><span>{{ $transaction->amount }}</span></td>
                                <td><span class="badge bg-{{ $transaction->cleared ? "green" : "red" }}">&nbsp;</span></td>
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