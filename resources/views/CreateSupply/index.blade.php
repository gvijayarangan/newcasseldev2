@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/Supply/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-supply" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                            </form>
                        </div>
                        <div><h4>Supplies Information</h4></div>
                    </div>
                    <div class="panel-body">
                        {{--<div class="pull-left">--}}
                        @if (count($createsupply) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead>
                                    {{--<tr>--}}
                                    <th>Supply Name</th>
                                    <th>Unit_Price</th>
                                    <th style="width: 200px;">Actions</th>
                                    {{--</tr>--}}
                                    </thead>
                                    <tbody>
                                    {{--<script>--}}
                                    {{--function ConfirmDelete() {--}}
                                    {{--var x = confirm("Are you sure you want to delete? Click OK to continue");--}}
                                    {{--if (x)--}}
                                    {{--return true;--}}
                                    {{--else--}}
                                    {{--return false;--}}
                                    {{--}--}}
                                    {{--</script>--}}

                                    @foreach ($createsupply as $createsupp)
                                        {{--@foreach ($createapts as $createapt)--}}
                                        <tr>
					 <td>{{ $createsupp->sup_name}}</td>
                <td>$ {{ $createsupp->sup_unitprice}}</td>
                                           
                                     

                                            <td class="table-text"><div><a href="{{url('Supply',$createsupp->id)}}" class="btn btn-primary ">View</a>
                                                    <a href="{{url('Supply/update', $createsupp->id)}}"class="btn btn-warning">Modify</a>
                                                    <a href="{{url('Supply/destroy',$createsupp->id)}}"class="btn btn-danger">Delete</a>
                                                </div></td>



                                      



            

                                        </tr>                                                
                                     



                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        @else
                            <div class="panel-body"><h4>No User Records found</h4></div>
                        @endif
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

