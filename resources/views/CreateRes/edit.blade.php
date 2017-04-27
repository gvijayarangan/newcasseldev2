@extends('layouts.app')

<head xmlns="http://www.w3.org/1999/html">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>
@section('content')
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
                    <div class="panel-heading text-center"> Update Resident Information</div>
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
                        {!! Form::model($resident,['method' => 'PATCH','route'=>['resident.update',$resident->id]]) !!}
                        <div class="form-group">
                            {!! Html::decode(Form::label('res_pccid', '<span style="color: red;">*</span>PCCID:')) !!}
                            {!! Form::text('res_pccid',null,['class'=>'form-control','readonly']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::label('res_fname', '<span style="color: red;">*</span>First Name:')) !!}
                            {!! Form::text('res_fname',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('res_mname', 'Middle Name:') !!}
                            {!! Form::text('res_mname',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::label('res_lname', '<span style="color: red;">*</span>Last Name:')) !!}
                            {!! Form::text('res_lname',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::Label('res_gender', '<span style="color: red;">*</span>Gender:')) !!}
                            {{ Form::select('res_gender', [
                                'Female' => 'Female',
                                'Male' => 'Male'], old('res_gender'), ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {!! Form::label('res_homephone', 'Home Phone:') !!}
                            {!! Form::text('res_homephone',null,['id' => 'home','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('res_cellphone', 'Cellphone:') !!}
                            {!! Form::text('res_cellphone',null,['id' => 'mobile','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('res_email', 'Email:') !!}
                            {!! Form::text('res_email',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('res_comment', 'Comment:') !!}
                            {!! Form::textarea('res_comment',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::Label('res_status', '<span style="color: red;">*</span>Status:')) !!}
                            {!! Form::select('res_status', [
                                        'Inactive' => 'Inactive',
                                        'Active' => 'Active'], old('res_status'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_name', '<span style="color: red;">*</span>Center Name:', ['class' => 'col-md-3 control-label'])) !!}

                            {{ Form::select('cntr_name', array_merge([0 => 'Please Select']) + $centers,$centers_id ,
                               array('id' => 'center_drop', 'class' => 'col-md-4')) }}
                        </div>

                        </br> </br>
                        <div class="form-group">
                            {!! Html::decode(Form::label('apt_number', '<span style="color: red;">*</span>Apartment Number:', ['class' => 'col-md-3 control-label'])) !!}

                            {{ Form::select('apt_number', array_merge([0 => 'Please Select']) + $apartments,
                            $apartments_id,
                                array('id' => 'apartment_drop', 'class' => 'col-md-4')) }}

                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('footer')

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function ($) {
            //$("#center_drop").val().change();
        });

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
            $('#home').mask('(000) 000-0000', {placeholder: "(___) ___-____"});
        });

        $('#home').blur(function () {
            var input = $(this);
            if (input.val().length > 0 && input.val().length < 14) {
                alert('Please enter correct phone number, else leave blank');
                setTimeout(function () {
                    $(input).focus();
                }, 1);
            }
        });

        $('#center_drop').change(function () {

            // var selectedCenterIndex;
            data = {option: $(this).val()};

            console.log("Data drop down is !!" + data);

            selectedCenterIndex = data;
            //Apartment fetch
            $.get("/getAptDetailRes", data, function (data) {

                console.log(data);
                var apartment_data = $('#apartment_drop');
                $("#apartment_drop").empty();

                apartment_data.append($("<option></option>")
                    .attr("value", 0)
                    .text("Please Select"));

                $.each(data, function (key, value) {
                    apartment_data.append($("<option></option>")
                        .attr("value", key)
                        .text(value));
                });
                $('#apartment_drop').val(0).change();
            });
        });
    </script>

@endsection


