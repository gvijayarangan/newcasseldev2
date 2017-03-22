@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/center/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create</button>
                            </form>
                        </div>
                        <div><h4>Center Information</h4></div>
                    </div>
                    <div class="panel-body">
                        {{--<div class="pull-left">--}}
                        @if (count($createcntrs) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped cds-datatable">
                                    <thead>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    {{--<tr>--}}
                                        <th>Center Name</th>
                                        <th>Center Address1</th>
                                        <th>Center Address2</th>
                                        <th>Center City</th>
                                        <th>Center State</th>
                                        <th>Center Zip</th>
                                        <th>Center Phone</th>
                                        <th>Center Fax</th>
                                        <th style="width: 300px;">Actions</th>
                                    {{--</tr>--}}
                                    </thead>
                                    <tbody>
                                    <script>
                                        function ConfirmDelete() {
                                            var x = confirm("Are you sure you want to delete? Click OK to continue");
                                            if (x)
                                                return true;
                                            else
                                                return false;
                                        }
                                    </script>

                                    @foreach ($createcntrs as $createcntr)
                                        {{--@foreach ($createapts as $createapt)--}}
                                        <tr>
                                            {{--<td class="table-text"><div><a href="{{ url('/users/'.$user->id.'/edit') }}">{{ $user->f_name }} {{  $user->m_name }} {{  $user->l_name }}</a></div></td>--}}
                                            {{--<td class="table-text"><div>{{ $user->email }}</div></td>--}}
                                            {{--@if ($user->active)<td class="table-text"><div>Active</div></td>@else<td class="table-text"><div>Inactive</div></td>@endif--}}

                                            <td class="table-text"><div>{{ $createcntr->cntr_name}}</div></td>
                                            <td class="table-text"><div>{{ $createcntr->cntr_add1}}</div></td>
                                            <td class="table-text"><div>{{ $createcntr->cntr_add2}}</div></td>
                                            <td class="table-text"><div>{{ $createcntr->cntr_city}}</div></td>
                                            <td class="table-text"><div>{{ $createcntr->cntr_state}}</div></td>
                                            <td class="table-text"><div>{{ $createcntr->cntr_zip}}</div></td>
                                            <td class="table-text"><div>{{ $createcntr->cntr_phone}}</div></td>
                                            <td class="table-text"><div>{{ $createcntr->cntr_fax}}</div></td>

                                            <td class="table-text"><div><a href="{{url('center',$createcntr->id)}}" class="btn btn-primary ">View</a>
                                            <a href="{{url('center/update', $createcntr->id)}}"class="btn btn-warning">Modify</a>
                                            <a href="{{url('center/destroy',$createcntr->id)}}" onclick='return confirm("Are you sure?") 'class="btn btn-danger">Delete</a>
                                            </div></td>

                                        </tr>   {{--{!! Form::open(['method' => 'DELETE', 'route'=>['apartment.destroy', $createapt->id],'onsubmit' => 'return ConfirmDelete()']) !!}--}}
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

