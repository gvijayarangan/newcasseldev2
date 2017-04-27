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
                    <div class="panel-heading text-center"> Create New Center</div>
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
                            {!! Html::decode(Form::label('cntr_name', '<span style="color: red;">*</span>Center Name:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('cntr_name',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>

                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_add1', '<span style="color: red;">*</span>Center Address1:',['class' => 'col-md-4 control-label'])) !!}
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
                            {!! Html::decode(Form::label('cntr_city', '<span style="color: red;">*</span>Center City:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('cntr_city',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>

                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_state', '<span style="color: red;">*</span>Center State:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('cntr_state',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>

                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_zip', '<span style="color: red;">*</span>Center Zip:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::number('cntr_zip',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>

                        <div class="form-group">
                            {!!Form::label('cntr_phone', 'Center Phone:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('cntr_phone',null,['id' => 'mobile','class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            <div class="form-group">
                                {!!Form::label('cntr_fax', 'Center Fax:',['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('cntr_fax',null,['id' => 'fax','class'=>'col-md-4 form-control']) !!}
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

@section('footer')
    <script>
        $(document).ready(function () {
            $('#mobile').mask('(000) 000-0000', {placeholder: "(___) ___-____"});
        });

        $('#mobile').blur(function () {
            var input = $(this);
            if (input.val().length > 0 && input.val().length < 14) {
                alert('Please enter correct phone number, else leave blank');
                setTimeout(function () {
                    $(input).focus();
                }, 1);
            }
        });

        $(document).ready(function () {
            $('#fax').mask('(000) 000-0000', {placeholder: "(___) ___-____"});
        });

        $('#fax').blur(function () {
            var input = $(this);
            if (input.val().length > 0 && input.val().length < 14) {
                alert('Please enter correct fax number, else leave blank');
                setTimeout(function () {
                    $(input).focus();
                }, 1);
            }
        });
    </script>
@endsection