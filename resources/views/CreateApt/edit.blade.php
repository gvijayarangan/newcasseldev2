@include('layouts.app')
@extends('CreateApt')
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
    <h1>Update Apartment Information</h1>
    {!! Form::model($createapts, ['method' => 'PATCH','route'=>['apartment.update', $createapts->id]]) !!}
    <div class="form-group">
        {!! Form::label('apt_floornumber', 'Apartment FloorNumber:') !!}
        {!! Form::text('apt_floornumber',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('apt_number', 'Apartment Number:') !!}
        {!! Form::text('apt_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('apt_comments', 'Apartment Comments:') !!}
        {!! Form::text('apt_comments',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!!Form::label('cntr_id', 'Center ID:') !!}
        {{ Form::select('cntr_id', $centers) }}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Information', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop