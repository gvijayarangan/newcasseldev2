@include('layouts.app')
@extends('CreateApt')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Apartment Information</div>
                    <div class="panel-body">



        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">

            <tr>
                <td>Center Name:</td>
                <td><?php echo ($post['cntr_id']); ?></td>
            </tr>
            <tr>
                <td>Apartment Floor Number:</td>
                <td><?php echo ($post['apt_floornumber']); ?></td>
            </tr>
            <tr>
                <td>Apartment Number:</td>
                <td><?php echo ($post['apt_number']); ?></td>
            </tr>
            <tr>
                <td>Apartment Comments:</td>
                <td><?php echo ($post['apt_comments']); ?></td>
            </tr>
            </tbody>
        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop