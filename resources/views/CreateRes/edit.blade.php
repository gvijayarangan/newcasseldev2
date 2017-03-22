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
                    <div class="panel-heading text-center" > Update Resident Information</div>
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
                            <span style="color: red; display:block; float:left">*</span>
                            {!! Form::label('res_pccid', 'PCCID:') !!}
                            {!! Form::text('res_pccid',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <span style="color: red; display:block; float:left">*</span>
                            {!! Form::label('res_fname', 'First Name:') !!}
                            {!! Form::text('res_fname',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('res_mname', 'Middle Name:') !!}
                            {!! Form::text('res_mname',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <span style="color: red; display:block; float:left">*</span>
                            {!! Form::label('res_lname', 'Last Name:') !!}
                            {!! Form::text('res_lname',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <span style="color: red; display:block; float:left">*</span>
                            {!! Form::Label('res_gender', 'Gender:') !!}
                            {{ Form::select('res_gender', [
                                'Female' => 'Female',
                                'Male' => 'Male'], old('res_gender'), ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {!! Form::label('res_homephone', 'Home Phone:') !!}
                            {!! Form::text('res_homephone',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('res_cellphone', 'Cellphone:') !!}
                            {!! Form::text('res_cellphone',null,['class'=>'form-control']) !!}
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
                            <span style="color: red; display:block; float:left">*</span>
                            {!! Form::Label('res_status', 'Status:') !!}
                            {!! Form::select('res_status', [
                                        'Inactive' => 'Inactive',
                                        'Active' => 'Active'], old('res_status'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <span style="color: red; display:block; float:left">*</span>
                            {!! Form::label('cntr_name', 'Center Name:', ['class' => 'col-md-3 control-label']) !!}



                            {{ Form::select('cntr_name', array_merge([0 => 'Please Select']) + $centers,$centers_id ,
                               array('id' => 'center_drop', 'class' => 'col-md-4')) }}
                        </div>

                                            </br> </br>
                        <div class="form-group">
                            <span style="color: red; display:block; float:left">*</span>
                             {!! Form::label('apt_number', 'Apartment Number:', ['class' => 'col-md-3 control-label']) !!}

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


