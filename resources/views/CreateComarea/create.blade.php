@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Create New Common Area</div>
                    <div class="panel-body">
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
                            {!! Form::label('cntr_id', '*Center Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {{ Form::select('cntr_id', array_merge([0 => 'Please Select']) + $centers, 'default', array('id' => 'center_dropdown')) }}
                            </div>
                            </br> </br>

                            {!! Form::label('ca_name', '*Common Area/System name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('ca_name',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>



                            <div class="form-group">

                                <div class="form-group">
                                    {!! Form::label('ca_comments', 'Comments:',['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-4">
                                        {!! Form::textarea('ca_comments',null,['class' => 'col-md-4 form-control','rows' => 4, 'cols' => 60]) !!}
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
    </div>
@stop