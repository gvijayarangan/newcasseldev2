@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('notifications.index') }}"> Back</a>
                        </div>
                        <div><h4>Email Notification Details</h4></div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                            <tr class="bg-info">
                            <tr>
                                <td>Email Notification Type</td>
                                <td>{{ $notification->noti_type }}</td>
                            </tr>
                            <tr>
                                <td>Email Notification Title</td>
                                <td>{{ $notification->noti_email_title }}</td>
                            </tr>
                            <tr>
                                <td>Email Notification Content</td>
                                <td>{{ $notification->noti_alert_content }}</td>
                            </tr>
                            <tr>
                                <td>Email Notification Status</td>
                                <td>{{ $notification->noti_status }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop