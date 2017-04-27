@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('notifications.index') }}"> Back</a>
                        </div>
                        <div><h4>Update Email Notification</h4></div>
                    </div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::model($notification,['method' => 'PATCH','route'=>['notifications.update',$notification->id]]) !!}
                        <div class="form-group">
                            {!! Html::decode(Form::label('noti_type', '<span style="color: red;">*</span>Email Notification Type:')) !!}
                            {!! Form::text('noti_type',null,['class'=>'form-control','required' => 'required', 'readonly']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::label('noti_email_title', '<span style="color: red;">*</span>Email Notificationl Title:')) !!}
                            {!! Form::text('noti_email_title',null,['class'=>'form-control','required' => 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::label('noti_alert_content', '<span style="color: red;">*</span>Email Notification Content:')) !!}
                            {!! Form::textarea('noti_alert_content',null,['class'=>'form-control','required' => 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::label('noti_status', '<span style="color: red;">*</span>Email Notification Status:')) !!}
                            {!! Form::select('noti_status', [
                                            'Active' => 'Active',
                                            'Inactive' => 'Inactive'], old('noti_status'), ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                        <div style="text-align: center; padding-top: 20px">
                            {{-- {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}--}}
                            {!! Form::button('<i class="fa fa-btn fa-save"></i>Update', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection