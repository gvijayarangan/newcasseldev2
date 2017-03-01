@include('layouts.app')
@extends('CreateComarea')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Create New Common Area/System</div>
                    <div class="panel-body">
                        <h1>Create New Common Area/System</h1>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors-> all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['url' => 'commonarea']) !!}
                        <div class="form-group">
                            {!! Form::label('ca_name', '*Common Area/System name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('ca_name',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>

                        <div class="form-group">
                            {!! Form::label('ca_comments', '*Comments:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('ca_comments',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                            </br> </br>

                            <div class="form-group">
                                {!! Form::label('cntr_id', 'Center ID:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {{ Form::select('cntr_id', array_merge([0 => 'Please Select']) + $centers, 'default', array('id' => 'center_dropdown')) }}
                                </div>
                                </br> </br>

                                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
    {!! Form::close() !!}
@stop