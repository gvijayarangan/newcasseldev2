@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"> Create New Resident</div>
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

                    {!! Form::open(['url' => 'resident']) !!}
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    
                    <div class="form-group">
                        {!! Form::label('res_pccid', '*PCCID:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::text('res_pccid',null,['class'=>'form-control','required' => 'required']) !!}
                        </div>
                    </div>

                    </br> </br>

                    <div class="form-group">
                        {!! Form::label('res_fname', '*First Name:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::text('res_fname',null,['class'=>'form-control','required' => 'required']) !!}
                        </div>
                    </div>

                    </br> </br>

                    <div class="form-group">
                        {!! Form::label('res_mname', 'Middle Name:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::text('res_mname',null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    </br> </br>

                    <div class="form-group">
                        {!! Form::label('res_lname', '*Last Name:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::text('res_lname',null,['class'=>'form-control','required' => 'required']) !!}
                        </div>
                    </div>

                    </br> </br>

                    <div class="form-group">
                        {!! Form::Label('res_gender', '*Gender:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {{ Form::select('res_gender', [
                                'Female' => 'Female',
                                'Male' => 'Male'], old('res_gender'), ['class' => 'form-control']) }}
                        </div>
                    </div>

                    </br> </br>
                    <div class="form-group">
                        {!! Form::label('res_homephone', 'Home Phone:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::text('res_homephone',null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    </br> </br>

                    <div class="form-group">
                        {!! Form::label('res_cellphone', 'Cellphone:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::text('res_cellphone',null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    </br> </br>

                    <div class="form-group">
                        {!! Form::label('res_email', 'Email:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::text('res_email',null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    </br> </br>

                    <div class="form-group">
                        {!! Form::label('res_comment', 'Comment:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::textarea('res_comment',null,['class'=>'col-md-4 form-control', 'rows'=>'1']) !!}
                        </div>
                    </div>

                    </br> </br>

                    <div class="form-group">
                        {!! Form::Label('res_status', '*Status:',['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::select('res_status', [
                                        'Inactive' => 'Inactive',
                                        'Active' => 'Active'], old('res_status'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <br><br>

                    <div class="form-group">
                        {!! Form::label('cntr_name', 'Center Name:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-8">
                            {{ Form::select('cntr_name', array_merge([0 => 'Please Select']) + $centers, 'default',
                               array('id' => 'center_drop', 'class' => 'col-md-4')) }}
                        </div>
                    </div>

                    <br><br>

                    <div class="form-group">
                         {!! Form::label('apt_number', 'Apartment Number:', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-8">
                            {{ Form::select('apt_number', array_merge([0 => 'Please Select']),'default',
                                array('id' => 'apartment_drop', 'class' => 'col-md-4')) }}
                        </div>
                    </div>

                    <div class="form-group" style="text-align: center">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function ($) {

    });

    $('#center_drop').change(function () {

        // var selectedCenterIndex;
        data = {option: $(this).val()};

//        console.log("Data drop down is !!" + data);

        selectedCenterIndex = data;
        //Apartment fetch
        $.get("/getAptDetailRes", data, function (data) {

      //      console.log(data);
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


