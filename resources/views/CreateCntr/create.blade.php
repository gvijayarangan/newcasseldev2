@extends('layouts.app')

@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Create New Center</div>
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

                        {!! Form::open(['url' => 'center']) !!}
                        <div class="form-group">
                            {!! Form::label('cntr_name', '*Center Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('cntr_name',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!! Form::label('cntr_add1', '*Center Address1:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('cntr_add1',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!! Form::label('cntr_add2', 'Center Address2:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('cntr_add2',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('cntr_city', '*Center City:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('cntr_city',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                            <div class="form-group">
                                {!!Form::label('cntr_state', '*Center State:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('cntr_state',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                                </div>
                            </div>
                            </br> </br>
                            <div class="form-group">
                                {!!Form::label('cntr_zip', '*Center Zip:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('cntr_zip',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                                </div>
                            </div>
                            </br> </br>

                            <div class="form-group">
                                {!!Form::label('cntr_phone', 'Center Phone:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('cntr_phone',null,['class'=>'col-md-4 form-control']) !!}
                                </div>
                            </div>
                            </br> </br>
                        <div class="form-group">
                            <div class="form-group">
                                {!!Form::label('cntr_fax', 'Center Fax:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('cntr_fax',null,['class'=>'col-md-4 form-control']) !!}
                                </div>
                            </div>

                        </div>
                            </br> </br>
                            <div class="form-group">
                                <div class="form-group">
                                {!!Form::label('cntr_comments', 'Center Comments:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::textarea('cntr_comments',null,['class'=>'col-md-4 form-control','rows' => 4, 'cols' => 60]) !!}
                                </div>
                            </div>
                            </div>

                            </br> </br>

                            <div class="form-group" style="text-align: center; padding-top: 100px">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}

                            </div>

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop