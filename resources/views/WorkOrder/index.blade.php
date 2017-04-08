@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        <div>
                <div class="panel panel-default" style="width: 110%">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/workorder') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Work Order</button>
                            </form>
                        </div>
                       {{-- <div class="pull-left">
                            <form action="{{ URL::previous() }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-resident" class="btn btn-primary"><i
                                            class="fa fa-btn fa-file-o"></i>Back
                                </button>
                            </form>
                        </div>--}}
                        <div><h4>&nbsp &nbsp &nbsp &nbsp &nbsp Work Order Information</h4></div>
                    </div>
                    <div class="panel-body">
                        @if (count($woDetails) > 0)
                            <div class="table-responsive">
                                {{--<table class="table table-bordered table-striped cds-datatable">--}}
                                    <table class="table table-striped table-bordered table-hover">
                                <thead>
                                {{--<tr class="bg-info">--}}
                                    <th>Work Order ID</th>
                                    <th>Requestor</th>
                                    <th>Created By</th>
                                    <th>Created Time</th>
                                    <th>Center Name</th>
                                    <th>Apartment Number</th>
                                    <th>Common Area</th>
                                    <th>Resident Name</th>
                                    <th>Issue Type</th>
                                    <th>Status</th>
                                    <th>Changed By</th>
                                    <th>Changed Time</th>
                                    <th>Priority</th>
                                    <th >Total Cost</th>
                                    <th>Assigned To</th>
                                    <th colspan="1">Actions</th>
                                 {{--</tr>--}}
                                </thead>
                                <tbody>

                                @foreach ($woDetails as $order)
                                    <tr>
                                        {{--<td>{{ $order->wo_id }}</td>--}}
                                        <td class="table-text">
                                            <div>{{ $order->wo_id }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $order->requestor_name  }}</div>
                                        </td>
                                        {{--<td>{{ $order->requestor_name }}</td>--}}
                                        <td class="table-text">
                                            <div>{{ $order->created_by  }}</div>
                                        </td>
                                        {{--<td>{{ $order->created_by}}</td>--}}
                                        <td class="table-text">
                                            <div>{{ $order->created_date_time  }}</div>
                                        </td>
                                        {{--<td>{{ $order->created_date_time}}</td>--}}
                                        <td class="table-text">
                                            <div>{{ $order->center_name  }}</div>
                                        </td>
                                        {{--<td>{{ $order->center_name}}</td>--}}
                                        <td class="table-text">
                                            <div>{{$order->apartment_number  }}</div>
                                        </td>
                                        {{--<td>{{ $order->apartment_number}}</td>--}}
                                        <td class="table-text">
                                            <div>{{$order->common_area_name }}</div>
                                        </td>
                                        {{--<td>{{ $order->common_area_name}}</td>--}}
                                        <td class="table-text">
                                            <div>{{$order->resident_name}}</div>
                                        </td>
                                        {{--<td>{{ $order->resident_name}}</td>--}}
                                        <td class="table-text">
                                            <div>{{$order->issue_type}}</div>
                                        </td>
                                        {{--<td>{{ $order->issue_type}}</td>--}}
                                        <td class="table-text">
                                            <div>{{$order->status}}</div>
                                        </td>
                                        {{--<td>{{ $order->status}}</td>--}}
                                        <td class="table-text">
                                            <div>{{$order->changed_by}}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{$order->changed_time}}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{$order->priority}}</div>
                                        </td>
                                        <td style="width: 6%">$
                                             {{$order->total_cost}}
                                        </td>
                                        <td class="table-text">
                                            <div>{{$order->assign_to}}</div>
                                        </td>
                                      {{--  <td>{{ $order->changed_by}}</td>
                                        <td>{{ $order->changed_time}}</td>
                                        <td>{{ $order->priority}}</td>
                                        <td>{{ $order->total_cost}}</td>
                                        <td>{{ $order->assign_to}}</td>--}}
                                        <td><a href="{{url('/workorder/edit',$order->wo_id)}}" class="btn btn-warning">Edit</a></td>
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