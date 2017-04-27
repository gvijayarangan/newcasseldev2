@extends('layouts.app')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="pull-left">
                        <form action="{{ URL::previous() }}" method="GET">{{ csrf_field() }}
                            <button type="submit" id="edit-resident" class="btn btn-primary"><i
                                        class="fa fa-btn fa-file-o"></i>Back
                            </button>
                        </form>
                    </div>
                    <div class="panel-heading text-center"> Update Apartment Information</div>
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

                        {!! Form::model($createapts, ['method' => 'PATCH','route'=>['apartment.update', $createapts->id]]) !!}

                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_id', '<span style="color: red;">*</span>Center Name:')) !!}
                            {{ Form::select('cntr_id', $centers) }}
                        </div>

                        <div class="form-group">
                            {!! Html::decode(Form::label('apt_floornumber', '<span style="color: red;">*</span>Apartment FloorNumber:')) !!}
                            {!! Form::number('apt_floornumber',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Html::decode(Form::label('apt_number', '<span style="color: red;">*</span>Apartment Number:')) !!}
                            {!! Form::number('apt_number',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('apt_comments', 'Apartment Comments:') !!}
                            {!! Form::textarea('apt_comments',null,['class'=>'form-control']) !!}
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