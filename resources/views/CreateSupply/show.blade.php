@extends('layouts.app')

@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" > Supply Information</div>
                    <div class="panel-body">


        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">

            <tr>
                <td>Name:</td>
                <td><?php echo ($supply_post['sup_name']); ?></td>
            </tr>
            <tr>
                <td>Unit_Price:</td>
                <td><?php echo ('$' .' '. $supply_post['sup_unitprice']); ?></td>
            </tr>
            <tr>
                <td>Comments:</td>
                <td><?php echo ($supply_post['sup_comment']); ?></td>
            </tr>
            </tbody>
        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop