@include('layouts.app')
@extends('CreateTool')
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

    {!! Form::model($tool, ['method' => 'PATCH','route'=>['tool.update', $tool->id]]) !!}
    <div class="form-group">
        {!! Form::label('tool_name', 'Tool Name:') !!}
        {!! Form::text('tool_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tool_comment', 'Tool Description:') !!}
        {!! Form::textarea('tool_comment',null,['class'=>'form-control']) !!}
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