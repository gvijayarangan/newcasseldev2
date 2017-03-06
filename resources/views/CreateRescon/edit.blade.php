@extends('layouts.app')

@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Update Resident Contact Information</div>
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
    {!! Form::model($createrescontacts, ['method' => 'PATCH','route'=>['rescontact.update', $createrescontacts->id]]) !!}
    <div class="form-group">
        {!! Form::label('con_fname', 'First Name:') !!}
        {!! Form::text('con_fname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('con_mname', 'Middle Name:') !!}
        {!! Form::text('con_mname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('con_lname', 'Last Name:') !!}
        {!! Form::text('con_lname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('con_relationship', 'Relationship:') !!}
        {!! Form::text('con_relationship',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('con_cellphone', 'Cellphone:') !!}
        {!! Form::text('con_cellphone',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('con_email', 'Email:') !!}
        {!! Form::text('con_email',null,['class'=>'form-control']) !!}
    </div>
        <div class="form-group">
            {!! Form::label('con_comment', 'Comments:') !!}
            {!! Form::textarea('con_comment',null,['class'=>'form-control']) !!}
        </div>
    <div class="form-group">
        {!! Form::Label('con_gender', '*Gender') !!}
        {{ Form::select('con_gender', [
            'Female' => 'Female',
            'Male' => 'Male'], old('con_gender'), ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {!!Form::label('con_res_id', 'Resident Name:') !!}
        {{ Form::select('con_res_id', $residentscon) }}
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