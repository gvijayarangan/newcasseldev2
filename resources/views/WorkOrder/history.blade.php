@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/workorder/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-workorder" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                            </form>
                        </div>
                        <div><h4>Work Order History</h4></div>
                    </div>
                    <div class="panel-body">
                        @if (count($woDetails) > 0)
                            <div class="table-responsive col-lg-pull"  >
                                <table class="table table-bordered table-striped cds-datatable">


                                    <thead>
                                    <tr>
                                        <th>Work Order ID</th>
                                        <th>Requestor</th>
                                        <th>Created By</th>
                                        <th>Closed By</th>
                                        <th>Apartment Number</th>
                                        <th>Common Area</th>
                                        <th>Center Name</th>
                                        <th>Status</th>
                                        <th>Closed Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($woDetails as $order)
                                        <tr>
                                            <td>{{ $order->wo_id }}</td>
                                            <td>{{ $order->requestor }}</td>
                                            <td>{{ $order->created_by}}</td>
                                            <td>{{ $order->center_name}}</td>
                                            <td>{{ $order->apt_num}}</td>
                                            <td>{{ $order->common_area}}</td>
                                            <td>{{ $order->center_name}}</td>
                                            <td>{{ $order->status}}</td>
                                            <td>{{ $order->created_timestamp}}</td>
                                        </tr>

                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        @else
                            <div class="panel-body"><h4>No User Records found</h4></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

