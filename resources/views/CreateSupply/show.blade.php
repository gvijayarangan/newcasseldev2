@include('layouts.app')
@extends('CreateApt')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <h3>New Cassel Supply Information </h3>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Supply ID:</td>
                <td><?php echo ($supply_post['id']); ?></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?php echo ($supply_post['sup_name']); ?></td>
            </tr>
            <tr>
                <td>Unit_Price:</td>
                <td><?php echo ($supply_post['sup_unitprice']); ?></td>
            </tr>
            <tr>
                <td>Comments:</td>
                <td><?php echo ($supply_post['sup_comment']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>

@stop