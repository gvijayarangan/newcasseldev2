@extends('layouts.app')

@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"> Create Resident Contact Information</div>
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
                        {!! Form::open(['url' => 'rescontact']) !!}
                        <div class="form-group">
                            {!! Form::label('con_fname', '*Contact First Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_fname',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!! Form::label('con_mname', 'Contact Middle Name',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_mname',null,['class' => 'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!! Form::label('con_lname', '*Contact Last Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_lname',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('con_relationship', '*Relationship:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_relationship',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('con_cellphone', 'Cellphone:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_cellphone',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('con_email', 'Email:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_email',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>


                        <div class="form-group">
                            {!!Form::label('con_comment', 'Comment:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::textarea('con_comment',null,['class'=>'col-md-4 form-control', 'rows'=>'1']) !!}
                            </div>
                        </div>
                        </br> </br>


                            <div class="form-group">
                                {!!Form::label('con_gender', '*Gender:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {{ Form::select('con_gender', [
                                    'Female' => 'Female',
                                    'Male' => 'Male'], old('con_gender'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            </br> </br>

                            <div class="form-group">
                                {!!Form::label('res_fullname', 'Resident Name:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {{ Form::select('res_fullname', $residents) }}
                                </div>
                            </div>

                            </br> </br>
                            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop