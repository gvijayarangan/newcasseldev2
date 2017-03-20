@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="width: 105%" >
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
                                    <th>Requestor</th>
                                    <th>Created Time</th>
                                    <th>Center Name</th>
                                    <th>Apartment Number</th>
                                    <th>Common Area</th>
                                    <th>Resident Name</th>
                                    <th>Issue Type</th>
                                    <th>Status</th>
                                    <th colspan="1">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($woDetails as $order)
                                    <tr>
                                        <td>{{ $order->wo_id}}</td>
                                        <td>{{ $order->requestor_name}}</td>
                                        <td>{{ $order->created_date_time}}</td>
                                        <td>{{ $order->center_name}}</td>
                                        <td>{{ $order->apartment_number}}</td>
                                        <td>{{ $order->common_area_name}}</td>
                                        <td>{{ $order->resident_name}}</td>
                                        <td>{{ $order->issue_type}}</td>
                                        <td>{{ $order->status}}</td>
                                        <td><a href="{{url('readworkorder',$order->wo_id)}}" class="btn btn-primary">View</a></td>

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