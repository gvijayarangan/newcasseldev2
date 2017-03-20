@extends('layouts.app')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Update Apartment Information</div>
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

    {!! Form::model($createapts, ['method' => 'PATCH','route'=>['apartment.update', $createapts->id]]) !!}
        <span style="color: red; display:block; float:left">*</span>
        <div class="form-group">
            {!!Form::label('cntr_id', 'Center Name:') !!}
            {{ Form::select('cntr_id', $centers) }}
        </div>
        <span style="color: red; display:block; float:left">*</span>
    <div class="form-group">
        {!! Form::label('apt_floornumber', 'Apartment FloorNumber:') !!}
        {!! Form::text('apt_floornumber',null,['class'=>'form-control']) !!}
    </div>
        <span style="color: red; display:block; float:left">*</span>
    <div class="form-group">
        {!! Form::label('apt_number', 'Apartment Number:') !!}
        {!! Form::text('apt_number',null,['class'=>'form-control']) !!}
    </div>
        <div class="form-group">
            {!! Form::label('apt_comments', 'Apartment Comments:') !!}
            {!! Form::textarea('apt_comments',null,['class'=>'form-control']) !!}
        </div>
    <div class="form-group">
        {!! Form::submit('Update Information', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop