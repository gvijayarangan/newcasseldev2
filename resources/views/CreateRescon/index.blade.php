@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/rescontact/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-Rescontact" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                            </form>
                        </div>
                        <div><h4>Residents Contact Information</h4></div>
                    </div>
                    <div class="panel-body">
                        {{--<div class="pull-left">--}}
                        @if (count($createrescons) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead>
                                    {{--<tr>--}}
                                    <th>Contact First Name</th>
                                    <th>Contact Middle Name</th>
                                    <th>Contact Last Name</th>
                                    <th>Relationship</th>
                                    <th>Cellphone</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Resident Name</th>
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

                                    @foreach ($createrescons as $createrescon)
                                        {{--@foreach ($createapts as $createapt)--}}
                                        <tr>
                                            {{--<td class="table-text"><div><a href="{{ url('/users/'.$user->id.'/edit') }}">{{ $user->f_name }} {{  $user->m_name }} {{  $user->l_name }}</a></div></td>--}}
                                            {{--<td class="table-text"><div>{{ $user->email }}</div></td>--}}
                                            {{--@if ($user->active)<td class="table-text"><div>Active</div></td>@else<td class="table-text"><div>Inactive</div></td>@endif--}}

                                            <td class="table-text"><div>{{ $createrescon->con_fname}}</div></td>
                                            <td class="table-text"><div>{{ $createrescon->con_mname}}</div></td>
                                            <td class="table-text"><div>{{ $createrescon->con_lname}}</div></td>
                                            <td class="table-text"><div>{{ $createrescon->con_relationship}}</div></td>
                                            <td class="table-text"><div>{{ $createrescon->con_cellphone}}</div></td>
                                            <td class="table-text"><div>{{ $createrescon->con_email}}</div></td>
                                            <td class="table-text"><div>{{ $createrescon->con_gender}}</div></td>
                                            <td class="table-text"><div>{{ $createrescon->con_res_id}}</div></td>

                                            <td class="table-text"><div><a href="{{url('rescontact',$createrescon->id)}}" class="btn btn-primary ">View</a>
                                                    <a href="{{url('rescontact/update', $createrescon->id)}}"class="btn btn-warning">Modify</a>
                                                    <a href="{{url('rescontact/destroy',$createrescon->id)}}" onclick='return confirm("Are you sure?")' class="btn btn-danger">Delete</a>
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

