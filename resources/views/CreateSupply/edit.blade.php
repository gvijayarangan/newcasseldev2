@include('layouts.app')
@extends('CreateSupply')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Update Supply Information</div>
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
            {!! Form::textarea('sup_comment',null,['class'=>'form-control']) !!}
        </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop