@extends('layouts.app')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="pull-left">
                        <form action="{{ URL::previous() }}" method="GET">{{ csrf_field() }}
                            <button type="submit" id="create-resident" class="btn btn-primary"><i
                                        class="fa fa-btn fa-file-o"></i>Back
                            </button>
                        </form>
                    </div>
                    <div class="panel-heading text-center"> Create Supply Information</div>
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

                        {!! Form::open(['url' => 'Supply']) !!}
                        <div class="form-group">
                            {!! Html::decode(Form::label('sup_name', '<span style="color: red;">*</span>Supply Name:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('sup_name',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>

                        <div class="form-group">

                            <div class="form-group">
                                {!! Html::decode(Form::label('sup_unitprice', '<span style="color: red;">*</span>Enter Unit Price:',['class' => 'col-md-4 control-label'])) !!}
                                <div class="col-md-4">

                                    <div class="input-group" style="width: 150px">
                                        <span class="input-group-addon">$</span>
                                        {!! Form::text('sup_unitprice',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            </br> </br>
                            <div class="form-group">
                                {!! Form::label('sup_comment', 'Enter Comments:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::textarea('sup_comment',null,['class'=>'col-md-4 form-control']) !!}
                                </div>
                            </div>
                            </br> </br>

                        </div>
                        </br> </br>

                        <div class="form-group">
                            {!! Form::submit('Save', ['style'=> 'margin-top: 20px','class' => 'btn btn-primary form-control']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop