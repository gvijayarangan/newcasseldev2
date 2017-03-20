@extends('layouts.app')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Update Issue Type Information</div>
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
    {!! Form::model($issue, ['method' => 'PATCH','route'=>['issuetype.update', $issue->id]]) !!}
    <div class="form-group">
        <span style="color: red; display:block; float:left">*</span>
        {!! Form::label('issue_typename', 'Issue Type Name:') !!}
        {!! Form::text('issue_typename',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('issue_description', 'Issue Description:') !!}
        {!! Form::text('issue_description',null,['class'=>'form-control']) !!}
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