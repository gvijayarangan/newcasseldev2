@extends('layouts.app')
<head xmlns="http://www.w3.org/1999/html">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>

@section('content')
    {!! Form::open(['url' => '/workorder/storeData']) !!}

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <br> <br>
                <div class="panel panel-default">
                    <div class="panel-heading"> Work Order Form</div>

                    <div class="panel-body" style="padding-left: 15%">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input type="hidden" name="supplyData" id="supplyData" value="">
                        {!! Form::label('requester', 'Requestor:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-sm-4">
                            {!! Form::text('requestor_name',null,['class'=>'form-control input-sm'], array('id' => 'requestername')) !!}
                        </div.panel-heading>

                        </br> </br>

                        {!! Form::label('centername', 'Center Name:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            @if($user->hasRole('contact'))
                                {{ Form::select('cntr_name', $centers, 'default',
                                 array('id' => 'center_dropdown', 'class' => 'col-md-4')) }}
                             @else
                                {{ Form::select('cntr_name', array_merge([0 => 'Please Select']) + $centers, 'default',
                                 array('id' => 'center_dropdown', 'class' => 'col-md-4')) }}
                             @endif
                         </div.panel-heading>

                        </br> </br>

                        {!! Form::label('apartment no', 'Apartment No:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            @if($user->hasRole('contact'))
                                {{ Form::select('apt_id', $apartment_data, 'default',
                                 array('id' => 'apartment_dropdown', 'class' => 'col-md-4')) }}
                            @else
                                {{ Form::select('apt_id', array_merge([0 => 'Please Select']), 'default',
                                 array('id' => 'apartment_dropdown', 'class' => 'col-md-4')) }}
                            @endif
                        </div.panel-heading>

                        </br> </br>

                        {!! Form::label('residentname', 'Resident Name:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            @if($user->hasRole('contact'))
                                {{ Form::select('residentname', $residents,
                                'default', array('id' => 'residentname_dropdown', 'class' => 'col-md-4')) }}
                            @else
                                {{ Form::select('residentname', array_merge([0 => 'Please Select']),
                                'default', array('id' => 'residentname_dropdown', 'class' => 'col-md-4')) }}
                            @endif
                        </div.panel-heading>

                        </br> </br>
                        {!! Form::label('commonarea', 'Common Area/System:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{ Form::select('ca_id', array_merge([0 => 'Please Select']), 'default',
                            array('id' => 'commonarea_dropdown', 'class' => 'col-md-4')) }}
                        </div.panel-heading>


                      {{--  </br> </br>
                        {!! Form::label('resident_comments', 'Resident Comments:' ,['class' => 'col-md-3 control-label']) !!}--}}
                        <div.panel-heading class="col-md-6">
                            {!! Form::text('resident_comments',null,
                            array('class' => 'form-control hidden','id' => 'resident_comments','readonly' => true,'size'=>70)) !!}
                        </div.panel-heading>
                        </br> </br>
                        {!! Form::label('issuetype', 'Issue Type:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-4">
                            {{ Form::select('issuetype', array_merge([0 => 'Please Select']) + $issuetypes, 'default', array('id' => 'issuetype_dropdown')) }}
                        </div.panel-heading>

                        </br> </br>

                        {!! Form::label('issuedescription', 'Issue Description:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-2">
                            {!! Form::text('issuedescription',null, array('id' => 'issuedescription', 'readonly' => true,'size'=>70)) !!}
                        </div.panel-heading>

                        </br> </br>

                        {!! Form::label('wodescription', 'Work Order Description:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {!! Form::text('order_description',null,['class'=>'form-control']) !!}
                        </div.panel-heading>

                        </br> </br>
                     </div>


                    </div>
                    <div class="form-group" style="text-align: center">
                        {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
                        {!! Form::button('Reset', ['type' => 'reset', 'class' => 'btn btn-default']) !!}
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

        function validateOnSave() {
            var rc = true;
            if ($("select#sb_id").val() === "") {
                alert("Please select a Type");
                rc = false;
            } else if ($("input#x_number").val() === "") {
                alert("Please input a X-number");
                rc = false;
            }
            return rc;
        }

        $('#center_dropdown').change(function () {
            // var selectedCenterIndex;
            data = {option: $(this).val()};
            selectedCenterIndex = data;
            //Apartment fetch
            $.get("/getAptDetails", data, function (data) {
                console.log(data);

                var apartment_data = $('#apartment_dropdown');
                $("#apartment_dropdown").empty();

                apartment_data.append($("<option></option>")
                        .attr("value", 0)
                        .text("Please Select"));

                $.each(data, function (key, value) {
                    apartment_data.append($("<option></option>")
                            .attr("value", key)
                            .text(value));
                });
                $('#apartment_dropdown').val(0).change();

            });
            // data = null;
            // data = selectedCenterIndex;
            //Common area fetch
            $.get("/getComAreaDetails", data, function (data) {
                var commonarea_data = $('#commonarea_dropdown');
                $("#commonarea_dropdown").empty();

                commonarea_data.append($("<option></option>")
                        .attr("value", 0)
                        .text("Please Select"));

                $.each(data, function (key, value) {
                    commonarea_data.append($("<option></option>")
                            .attr("value", key)
                            .text(value));
                });
                $('#commonarea_dropdown').val(0).change();

            });


        });

        $('#apartment_dropdown').change(function () {
            if ($("#apartment_dropdown").val() != 0) {
                //Disable commonarea dropdown
                $("#commonarea_dropdown").attr('disabled', true);

                data = {option: $(this).val()};
                $.get("/getResidentName", data, function (data) {
                    //Check if data is empty, then no need to store/display users, also clear any old values
                    var resident_data = $('#residentname_dropdown');
                    $("#residentname_dropdown").empty();
                    if (data.length != 0) {
                        $.each(data, function (key, value) {
                            resident_data.append($("<option></option>")
                                    .attr("value", key)
                                    .text(value));
                        });
                        //Show the first index upon change
                        $('#residentname_dropdown').val(Object.entries(data)[0][0]).change();
                    } else {
                        resident_data.append($("<option></option>")
                                .attr("value", 0)
                                .text("Resident not occupied"));
                        $('#residentname_dropdown').val(0).change();
                      }
                });
            } else {
                //Empty resident information
                $("#residentname_dropdown").empty();
                $("#residentname_dropdown").append($("<option></option>")
                        .attr("value", 0)
                        .text("Please Select"));
                $('#residentname_dropdown').val(0).change();

                //Disable commonarea dropdown
                $("#commonarea_dropdown").attr('disabled', false);
            }
        });

        $('#residentname_dropdown').change(function () {
            data = {option: $(this).val()};

            $.get("/getresidentComments", data, function (data) {
                $("#resident_comments").val(data);
                $('.form-control.hidden').removeclass('hidden');
            });
        });

        $('#issuetype_dropdown').change(function () {
            data = {option: $(this).val()};

            $.get("/getIssueDesc", data, function (data) {
                $("#issuedescription").val(data);
            });
        });



        //Commonarea condition
        $('#commonarea_dropdown').change(function () {
            var selectedIndex = $("#commonarea_dropdown option:selected").val();
            if (selectedIndex != 0) {
                $("#apartment_dropdown").attr("disabled", true);
                $('#residentname_dropdown').attr("disabled", true);
                $('#res_comments').attr("disabled", true);
                $('#res_comments').val("");
                $("#apartment_dropdown option:eq(0)").prop("selected", true).change();
                $("#residentname_dropdown option:eq(0)").prop("selected", true).change();

            } else {
                $("#apartment_dropdown").attr("disabled", false);
                $('#residentname_dropdown').attr("disabled", false);
                $('#res_comments').attr("disabled", false);
            }
        });


    </script>
@endsection