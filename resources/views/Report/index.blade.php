@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
    </head>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Report
                        <div class="pull-right">

                            {{--<td><a href="{{ URL('downloadExcel/csv/'.urlencode(serialize($reportDatas)))}}"><button class="btn btn-success">Download CSV</button></a></td>--}}

                           <td><a href="{{ URL('/excel/download')}}">
                                    <button class="btn btn-success">Download CSV</button>
                                </a></td>


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
                            {{ Form::select('apartment_number', array_merge([0 => 'Please Select']), 'default',
                                 array('id' => 'apartment_dropdown', 'class' => 'col-md-4')) }}
                        </div.panel-heading>
                        </br> </br>

                        <td>
                        {!! Form::label('commonarea', 'Common Area/System:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {{ Form::select('common_area_name', array_merge([0 => 'Please Select']) ,'default',
                            array('id' => 'commonarea_dropdown', 'class' => 'col-md-4' )) }}
                        </div.panel-heading>
                        </br> </br>
                        </td>


                        {!! Form::label('created_date_time', 'Created Date From:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            <input type="date" class="col-md-4" style="height: 22px" name="createdDateTimeFrom" id ="createdDateTime">
                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('created_date_time_to', 'Created Date To:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8" >
                             <input type="date" class="col-md-4" style="height: 22px" name="createdDateTimeTo" id ="createdDateTime" >
                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('assigntype', 'Assign To:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-6">
                            {{ Form::select('assign_user_id', array_merge([0 => 'Please Select']) + $workers, 'default',
                             array('id' => 'assigntype_dropdown','class' => 'col-md-6')) }}
                        </div.panel-heading>
                        </br> </br>

                        {!! Form::label('status', 'Status:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-6">
                            {!! Form::select('order_status', ['Please Select' => 'Please Select','Open' => 'Open','In Progress' => 'In Progress',
                               'Wait for third party vendor' => 'Wait for third party vendor','Complete' => 'Complete', 'Close' => 'Close'],
                              'default', array('class' => 'col-md-6')) !!}
                        </div.panel-heading>

                        </br> </br>

                        {!! Form::label('priority', 'Priority:', ['class' => 'col-md-3 control-label']) !!}
                        <div.panel-heading class="col-md-8">
                            {!! Form::select('order_priority', ['Please Select' => 'Please Select', 'Low' => 'Low', 'Moderate' => 'Moderate', 'High' => 'High'],
                            'default', array('class' => 'col-md-4')) !!}
                        </div.panel-heading>


                        <div class="form-group" style="text-align: center">
                            {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                           {!! Form::button('Reset', ['type' => 'reset', 'class' => 'btn btn-default']) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}


        <table class="table table-bordered table-striped cds-datatable">
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
            $.get("/getAptDetailsRes", data, function (data) {

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

            $('#apartment_dropdown').change(function () {
                if ($("#apartment_dropdown").val() != 0) {
                    //Disable commonarea dropdown
                    $("#commonarea_dropdown").attr('disabled', true);
                } else {
                    //Disable commonarea dropdown
                    $("#commonarea_dropdown").attr('disabled', false);
                }
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
