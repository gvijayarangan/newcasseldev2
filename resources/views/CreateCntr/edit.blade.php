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
                    <div class="panel-heading text-center"> Update Create Information</div>
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
                            {!! Html::decode(Form::label('cntr_name', '<span style="color: red;">*</span>Center Name:')) !!}
                            {!! Form::text('cntr_name',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_add1', '<span style="color: red;">*</span>Center Address1:')) !!}
                            {!! Form::text('cntr_add1',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('cntr_add2', 'Center Address2:') !!}
                            {!! Form::text('cntr_add2',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_city', '<span style="color: red;">*</span>Center City:')) !!}
                            {!! Form::text('cntr_city',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_state', '<span style="color: red;">*</span>Center State:')) !!}
                            {!! Form::text('cntr_state',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_zip', '<span style="color: red;">*</span>Center Zip:')) !!}
                            {!! Form::number('cntr_zip',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('cntr_phone', 'Center Phone:') !!}
                            {!! Form::number('cntr_phone',null,['id' => 'mobile','class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('cntr_fax', 'Center Fax:') !!}
                            {!! Form::number('cntr_fax',null,['id' => 'fax','class'=>'form-control']) !!}
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