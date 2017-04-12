@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!--To limit creation of notification-->
                        {{--<div class="pull-right">
                            <a class="btn btn-success" href="{{ route('notifications.create') }}"> Create New Email
                                Notification</a>--}}{{--
                        </div>--}}
                        <div><h4>Email Notifications Information</h4></div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="panel-body">
                        @if (count($notifications) > 0)
                            <div class="table-responsive dataTables_wrapper form-inline dt-bootstrap no-footer"
                                 id="DataTables_Table_0_wrapper">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead> <!-- Table Headings -->
                                    <tr class="bg-info">
                                        <!--<th>Email Notification ID</th>-->
                                        <th>Email Notification Type</th>
                                        <th>Email Notification Title</th>
                                        <th>Email Notification Content</th>
                                        <th>Email Notification Status</th>
                                        <th colspan="3">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody> <!-- Table Body -->
                                    @foreach ($notifications as $notification)
                                        <tr>
                                            <td>{{ $notification->noti_type }}</td>
                                            <td>{{ $notification->noti_email_title }}</td>
                                            <td>{{ $notification->noti_alert_content }}</td>
                                            <td>{{ $notification->noti_status }}</td>
                                            <td><a class="btn btn-info"
                                                   href="{{ route('notifications.show',$notification->id) }}">View</a>
                                            </td>
                                            <td><a class="btn btn-warning"
                                                   href="{{ route('notifications.edit',$notification->id) }}">Modify</a>
                                            </td>
                                        <!--<td>
                                               {{-- {!! Form::open(['method' => 'DELETE','route' => ['notifications.destroy', $notification->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}--}}
                                                </td>-->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="panel-body"><h4>No Email Notification Records found</h4></div>
                        @endif
                        <div align="right">
                            {!! $notifications->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

