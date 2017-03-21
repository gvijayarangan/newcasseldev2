@include('layouts.app')
@extends('Report')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <head xmlns="http://www.w3.org/1999/html">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
    </head>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <br> <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Report
                        <div class="pull-right">

                              <td><a href="{{ URL('downloadExcel/csv/'.urlencode(serialize($paymentsArray)))}}"><button class="btn btn-success">Download CSV</button></a></td>
                            {{--{{<td><a href="{{ URL('downloadExcel/csv/'.$reportDatas)}}"><button class="btn btn-success">Download CSV</button></a></td>}}--}}
                        </div>
                    </div>

                    <div class="panel-body" style="padding-left: 15%">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">

                        {!! Form::open(['url' => '/report/store']) !!}


                        {!! Form::label('center name', 'Center Name:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{ Form::select('center_name', array_merge([0 => 'Please Select'])+  $center, 'default',
                                 array('id' => 'center_dropdown', 'class' => 'col-md-4')) }}

                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('apartment no', 'Apartment No:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{ Form::select('apartment_number', array_merge([0 => 'Please Select'])+  $apartmentNumber, 'default',
                                 array('id' => 'apartment_dropdown', 'class' => 'col-md-4')) }}
                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('commonarea', 'Common Area/System:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{ Form::select('common_area_name', array_merge([0 => 'Please Select']) +  $commonArea,'default',
                            array('id' => 'commonarea_dropdown', 'class' => 'col-md-4' )) }}
                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('created_date_time', 'Created Date From:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{--{!! Form::text('created_date_time', old('accidentdate'), array('id'=>'myDateField','class' => 'col-md-4' , 'placeholder' => 'MM-DD-YYYY','required' => 'required'))!!}--}}
                            <input type="date" class="col-md-4" name="createdDateTime" id ="createdDateTime">
                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('created_date_time_to', 'Created Date To:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{--{!! Form::text('created_date_time', old('accidentdate'), array('id'=>'myDateField','class' => 'col-md-4' , 'placeholder' => 'MM-DD-YYYY','required' => 'required'))!!}--}}
                            <input type="date" class="col-md-4" name="createdDateTimeTo" id ="createdDateTime" >
                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('assign_to', 'Assign To:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{ Form::select('assign_to', array_merge([0 => 'Please Select']) + $assign, 'default',
                             array('id' => 'assign_to_dropdown','class' => 'col-md-4')) }}
                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('status', 'Status:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{ Form::select('status', array_merge([0 => 'Please Select'])+ $status, 'default',
                          array('id' => 'status_dropdown', 'class' => 'col-md-4')) }}
                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('priority', 'Priority:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{ Form::select('priority', array_merge([0 => 'Please Select'])+$priority , 'default',
                           array('id' => 'priority_dropdown', 'class' => 'col-md-4')) }}
                        </div.panel-heading>
                        </br> </br>


                        <div class="form-group" style="text-align: center">
                            {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                           {!! Form::button('Reset', ['type' => 'reset', 'class' => 'btn btn-default']) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}


        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Created Date</th>
                <th>Center Name</th>
                <th>Comman Area / Apartment</th>
                <th>Assign To</th>
                <th>Status</th>
                <th>Priority</th>


            </tr>
            </thead>
            <tbody>

            @foreach($reportDatas as $reportData)
                <tr>
                    <td>
                        {{$reportData->created_date_time}}
                    </td>
                    <td>
                        {{$reportData->center_name}}
                    </td>
                    <td>
                        {{$reportData->common_area_name}}
                        {{$reportData->apartment_number}}
                    </td>
                    <td>
                        {{$reportData->assign_to}}
                    </td>
                    <td>
                        {{$reportData->status}}
                    </td>
                    <td>
                        {{$reportData->priority}}
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('footer')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
//Datepicker Popups calender to Choose date
            $(function(){
                $( "#MyDatepicker" ).datepicker();
                //Pass the user selected date format
                $( "#format" ).change(function() {
                    $( "#datepicker" ).datepicker( "option", "dateFormat", $(this).val() );
                });
            });
        });
        $( "#datepicker" ).datepicker({
            inline: true
        });



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


            $('#commonarea_dropdown').change(function () {
                var selectedIndex = $("#commonarea_dropdown option:selected").val();
                if (selectedIndex != 0) {
                    $("#apartment_dropdown").attr("disabled", true);
                    $("#apartment_dropdown option:eq(0)").prop("selected", true).change();

                } else {
                    $("#apartment_dropdown").attr("disabled", false);
                }
            });


        });

    </script>

@endsection
