@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/resident/create') }}" method="GET">{{ csrf_field() }}

                                <button type="submit" id="index-resident" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                            </form>
                        </div>
                        <div class="pull-left">
                            <form action="{{ URL::previous() }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-resident" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Back</button>
                            </form>
                        </div>
                        <div><h4>Residents Information</h4></div>
                    </div>

                    <div class="panel-body">
                        {{--<div class="pull-left">--}}
                        @if (count($createres) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead>
                                    {{--<tr>--}}

                                    <th>PCCID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Home Phone</th>
                                    <th>Cellphone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Apartment Number</th>
                                    <th>Center Name</th>
                                    <th style="width: 300px;">Actions</th>
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

                                    @foreach ($createres as $createresi)
                                        {{--@foreach ($createapts as $createapt)--}}
                                        <tr>
                                            {{--<td class="table-text"><div><a href="{{ url('/users/'.$user->id.'/edit') }}">{{ $user->f_name }} {{  $user->m_name }} {{  $user->l_name }}</a></div></td>--}}
                                            {{--<td class="table-text"><div>{{ $user->email }}</div></td>--}}
                                            {{--@if ($user->active)<td class="table-text"><div>Active</div></td>@else<td class="table-text"><div>Inactive</div></td>@endif--}}

                                            <td class="table-text"><div>{{ $createresi-> res_pccid }}</div></td>
                                            <td class="table-text"><div>{{ $createresi-> res_fname }}</div></td>
                                            <td class="table-text"><div>{{ $createresi-> res_lname }}</div></td>
                                            <td class="table-text"><div>{{ $createresi-> res_homephone }}</div></td>
                                            <td class="table-text"><div>{{ $createresi-> res_cellphone }}</div></td>
                                            <td class="table-text"><div>{{ $createresi-> res_email }}</div></td>
                                            <td class="table-text"><div>{{ $createresi-> res_status }}</div></td>
                                            <td class="table-text"><div>{{ $createresi-> res_apt_id }}</div></td>
                                            <td class="table-text"><div>{{ $createresi-> res_cntr_id }}</div></td>
                                            <td class="table-text"><div><a href="{{url('resident',$createresi->id)}}" class="btn btn-primary ">View</a>
                                                    <a href="{{url('resident/update',$createresi->id)}}"class="btn btn-warning">Modify</a>
                                                    <a href="{{url('resident/destroy',$createresi->id)}}" onclick='return confirm("Are you sure?")' class="btn btn-danger">Delete</a>
                                                </div></td>

                                        </tr>                                                {{--{!! Form::open(['method' => 'DELETE', 'route'=>['apartment.destroy', $createapt->id],'onsubmit' => 'return ConfirmDelete()']) !!}--}}
                                        {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                                        {{--{!! Form::close() !!}--}}


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

