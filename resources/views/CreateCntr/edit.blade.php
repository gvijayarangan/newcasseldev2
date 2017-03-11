@extends('layouts.app')

@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Update Create Information</div>
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
        {!! Form::label('cntr_add2', 'Center Address2:') !!}
        {!! Form::text('cntr_add2',null,['class'=>'form-control']) !!}
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
            {!! Form::textarea('cntr_comments',null,['class'=>'form-control']) !!}
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