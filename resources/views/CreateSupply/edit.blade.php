@include('layouts.app')
@extends('CreateSupply')
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
    <h1>Update Supply Information</h1>
    {!! Form::model($createsupply, ['method' => 'PATCH','route'=>['Supply.update', $createsupply->id]]) !!}
    <div class="form-group">
        {!! Form::label('sup_name', '*Enter Name:') !!}
        {!! Form::text('sup_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sup_unitprice', '*Enter Unit Price:') !!}
        {!! Form::text('sup_unitprice',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!!Form::label('sup_comment', 'Enter Comments:') !!}
        {!! Form::text('sup_comment',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop