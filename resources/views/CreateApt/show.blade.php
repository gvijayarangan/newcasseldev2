@include('layouts.app')
@extends('CreateApt')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h3>New Cassel Retirement Center Apartment Information </h3>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Apartment ID:</td>
                <td><?php echo ($post['id']); ?></td>
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
            <tr>
                <td>Center ID:</td>
                <td><?php echo ($post['cntr_id']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>

@stop