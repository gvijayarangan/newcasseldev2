@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"> Create Apartment Information</div>
                    <div class="panel-body">

                        {{--<h1></h1>--}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['url' => 'apartment']) !!}
                        <div class="form-group">
                            {!! Form::label('cntr_name', '*Center Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::select('cntr_name', $centers ,null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                            </br> </br>
                            {!! Form::label('apt_floornumber', '*Apartment Floor Number:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('apt_floornumber',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                            </br> </br>

                            <div class="form-group">
                                {!! Form::label('apt_number', '*Apartment Number:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('apt_number',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                                </div>
                                </br> </br>


                                <div class="form-group">
                                    <div class="form-group">
                                        {!! Form::label('apt_comments', 'Apartment Comments:',['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::textarea('apt_comments',null,['class' => 'col-md-4 form-control','rows' => 4, 'cols' => 60]) !!}
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