@extends('layouts.app')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Update Common Area Information</div>
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
    {!! Form::model($comareas,['method' => 'PATCH','route'=>['commonarea.update',$comareas->id]]) !!}

        <div class="form-group">
            <span style="color: red; display:block; float:left">*</span>
            {!! Form::label('cntr_id', 'Center Name:') !!}
            {{ Form::select('cntr_id',  $centers) }}
        </div>
    <div class="form-group">
        <span style="color: red; display:block; float:left">*</span>
        {!! Form::label('ca_name', 'Common Area/System name:') !!}
        {!! Form::text('ca_name',null,['class'=>'form-control']) !!}
    </div>
        <div class="form-group">
            {!! Form::label('ca_comments', 'Comments:') !!}
            {!! Form::textarea('ca_comments',null,['class'=>'form-control']) !!}
        </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    </div>
    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    </div>

@stop