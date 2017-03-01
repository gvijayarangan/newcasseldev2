@include('layouts.app')
@extends('CreateComarea')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h1>NCRC Edit Common Area/System</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($comareas,['method' => 'PATCH','route'=>['commonarea.update',$comareas->id]]) !!}

    <div class="form-group">
        {!! Form::label('ca_name', '*Common Area/System name:') !!}
        {!! Form::text('ca_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('ca_comments', '*Comments:') !!}
        {!! Form::text('ca_comments',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cntr_id', 'Center ID:') !!}
        {!! Form::text('cntr_id',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    </div>
    {!! Form::close() !!}
@stop