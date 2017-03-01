@include('layouts.app')
@extends('CreateRes')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Create New Resident</div>
                    <div class="panel-body">
    <h1>Create New Resident</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors-> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

                        {!! Form::open(['url' => 'resident']) !!}
                        <div class="form-group">
                            {!! Form::label('res_pccid', '*PCCID:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_pccid',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!! Form::label('res_fname', '*First Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_fname',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!! Form::label('res_mname', 'Middle Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_mname',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('res_lname', '*Last Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_lname',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('res_gender', '*Gender:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {{ Form::select('res_gender', [
                                    'Female' => 'Female',
                                    'Male' => 'Male'], old('res_gender'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('res_phone', 'Phone:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_phone',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>

                        <div class="form-group">
                            {!!Form::label('res_cellphone', 'Cellphone:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_cellphone',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('res_email', 'Email:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                            {!! Form::text('res_email',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                            </br> </br>
                        <div class="form-group">
                                {!!Form::label('res_comment', 'Comment:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('res_comment',null,['class'=>'col-md-4 form-control']) !!}
                                </div>
                        </div>
                        </br> </br>

                        <div class="form-group">
                             {!!Form::label('res_status', '*Status:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::select('res_status', [
                                            'Inactive' => 'Inactive',
                                            'Active' => 'Active'], old('res_status'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                        {!!Form::label('apt_number', 'Apartment Number:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                        {{ Form::select('apt_number', $apartments) }}
                        </div>
                        </div>
                        </br> </br>
                        {{--<div class="form-group">--}}
                                    {{--{!!Form::label('apt_number', 'Apartment Number:',['class' => 'col-md-4 control-label']) !!}--}}
                                    {{--{{ Form::select('apt_number', $apartments) }}--}}
                                {{--</div>--}}
                        {{--</div>--}}
                        {{--</br> </br>--}}
                            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop