@extends('layouts.app')
@section('content')

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
                <div class="panel-heading text-center"> Create Tool Information</div>
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

                    {!! Form::open(['url' => 'tool']) !!}
                    <div class="form-group">
                            {!! Html::decode(Form::label('tool_name', '<span style="color: red;">*</span>Tool Name:',['class' => 'col-md-4 control-label'])) !!}
                        <div class="col-md-4">
                            {!! Form::text('tool_name',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                        </div>
                    </div>
                    </br> </br>

                    <div class="form-group">
                        {!! Form::label('tool_comment', 'Tool Description:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::textarea('tool_comment',null,['class'=>'col-md-4 form-control','rows' => 4, 'cols' => 60]) !!}
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
@stop