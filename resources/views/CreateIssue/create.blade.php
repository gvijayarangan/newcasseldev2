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
                    <div class="panel-heading text-center"> Create New Issue Type</div>
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

                        {!! Form::open(['url' => 'issuetype']) !!}
                        <div class="form-group">
                            {!! Html::decode(Form::label('issue_typename', '<span style="color: red;">*</span>Issue Type Name:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('issue_typename',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>

                        <div class="form-group">
                            {!! Form::label('issue_description', 'Issue Description:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('issue_description',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@stop