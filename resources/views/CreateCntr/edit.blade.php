@include('layouts.app')
@extends('CreateCntr')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Update Center Information</h1>
    {!! Form::model($createcntrs, ['method' => 'PATCH','route'=>['center.update', $createcntrs->id]]) !!}
    <div class="form-group">
        {!! Form::label('cntr_name', '*Center Name:') !!}
        {!! Form::text('cntr_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cntr_add1', '*Center Address1:') !!}
        {!! Form::text('cntr_add1',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cntr_add2', '*Center Address2:') !!}
        {!! Form::text('apt_comments',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!!Form::label('cntr_city', '*Center City:') !!}
        {!! Form::text('cntr_city',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('cntr_state', '*Center State:') !!}
        {!! Form::text('cntr_state',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('cntr_zip', '*Center Zip:') !!}
        {!! Form::text('cntr_zip',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('cntr_phone', 'Center Phone:') !!}
        {!! Form::text('cntr_phone',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('cntr_fax', 'Center Fax:') !!}
        {!! Form::text('cntr_fax',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('cntr_comments', 'Center Comments:') !!}
        {!! Form::text('cntr_comments',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Information', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop