@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('notifications.index') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4>Create New Email Notification</h4></div>

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

                        {!! Form::open(array('route' => 'notifications.store','method'=>'POST')) !!}
                        <div class="form-group">
                            {!! Form::Label('noti_type', '*Email Notification Type:', ['class' => 'col-md-4 control-label input-label']) !!}
                            <div class="col-md-6 input-field">
                                {!! Form::select('noti_type', [
                                                'New Account Setup' => 'New Account Setup',
                                                'Work Order Create' => 'Work Order Create',
                                                'Work Order Update' => 'Work Order Update',
                                                'Password Reset' => 'Password Reset'], old('noti_type'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        </br> </br>
                        <div class="form-group">
                            {!! Form::Label('noti_email_title', '*Email Notification Title:',['class' => 'col-md-4 control-label input-label']) !!}
                            <div class="col-md-6 input-field">
                                {!! Form::text('noti_email_title',null,['class' => 'col-md-6 form-control','required' => 'required']) !!}
                            </div>
                        </div>

                        </br> </br>
                        <div class="form-group">
                            {!! Form::label('noti_alert_content', '*Email Notification Content:',['class' => 'col-md-4 control-label input-label']) !!}
                            <div class="col-md-6 input-field">
                                {!! Form::textarea('noti_alert_content',null,['class'=>'col-md-6 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('noti_status', '*Email Notification Status:',['class' => 'col-md-4 control-label input-label']) !!}
                            <div class="col-md-2 input-field">
                                {!! Form::select('noti_status', [
                                                'Active' => 'Active',
                                                'Inactive' => 'Inactive'], old('noti_status'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        </br> </br>


                        <div style="text-align: center;">
                            {{--{!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}--}}
                            {!! Form::button('<i class="fa fa-btn fa-save"></i>Save', ['type' => 'submit', 'class' => 'btn btn-success form-control']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection