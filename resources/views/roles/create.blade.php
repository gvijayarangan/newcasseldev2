@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> {{ $heading }}</div>
                    <div class="panel-body">
                        {!! Form::open(['class' => 'form-horizontal', 'route' => 'roles.store', 'onsubmit' => 'return validateOnSave();']) !!}
                        @include('common.errors')
                        @include('common.flash')
                        <!-- to limit creation of new roles  -->
                            {{--@include ('roles.partial', ['CRUD_Action' => 'Create'])--}}
                            <h3 style="text-align: center; color: red">Action not permitted</h3>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function($) {
            $('select').select2();
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

    </script>
@endsection
