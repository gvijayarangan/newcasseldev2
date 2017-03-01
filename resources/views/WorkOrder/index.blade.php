@include('layouts.app')
@extends('WorkOrder')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/workorder') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Work Order</button>
                            </form>
                        </div>
                        <div><h4>&nbsp &nbsp &nbsp &nbsp &nbsp Work Order Information</h4></div>
                    </div>
                    <div class="panel-body" style="width: 100%">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr class="bg-info">
                                    <th>Work Order ID</th>
                                    <th>Created By</th>
                                    <th>Created Time</th>
                                    <th>Center Name</th>
                                    <th>Apartment Number</th>
                                    {{--<th>Common Area</th>--}}
                                    <th>Resident Name</th>
                                    <th>Issue Type</th>
                                    <th>Status</th>
                                    <th>Changed By</th>
                                    <th>Changed Time</th>
                                    <th>Priority</th>
                                    <th>Total Cost</th>
                                    <th>Assigned To</th>
                                 </tr>
                                </thead>
                                <tbody>

                                @foreach ($woDetails as $order)
                                    <tr>
                                        <td>{{ $order->id}}</td>
                                        <td>{{ $order->user_id}}</td>
                                        <td>{{ $order->order_date_created}}</td>
                                        <td>{{ $order->apt_id}}</td>
                                        <td>{{ $order->apt_id}}</td>
{{--
                                        <td>{{ $order->ca_id}}</td>
--}}
                                        <td>{{ $order->resident_id}}</td>
                                        <td>{{ $order->issue_type}}</td>
                                        <td>{{ $order->order_status}}</td>
                                        <td>{{ $order->last_status_modified}}</td>
                                        <td>{{ $order->last_status_modified_time}}</td>
                                        <td>{{ $order->order_priority}}</td>
                                        <td>{{ $order->order_total_cost}}</td>
                                        <td>{{ $order->user_id}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                             </table>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection