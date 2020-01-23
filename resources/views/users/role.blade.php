@extends('layouts.master')
@extends('users.box.role')
@section('title')
    @lang('site.content.user_role_title')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> @lang('site.content.user_role_add')</button></p>
        </div>
        <div class="col-md-6">
            @if ($errors->any())
                <div class="">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('site.content.user_role_page')</h6>
                </div>

                <div class="panel-body">

                    <div class="panel-body">

                        <table class="table table-bordered table-condensed table-hover datatable">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Role Name</th>
                                <th>Access</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($table as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    @php
                                        $accessList = $row->access()->get();
                                    @endphp
                                    <td>
                                        <ul>
                                            @foreach($accessList as $rows)
                                                <li>{{$rows->name}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-right white_sp">
                                        <a class="btn btn-xs btn-info mr-5 no-padding" href="{{route('user-permission-show', ['id' => $row->id])}}" title="{{__('site.content.user_permission_title')}}"><i class="icon-cog"></i></a>
                                        <button class="btn btn-xs btn-success no-padding mr-5 ediBtn"
                                                data-url="{{route('user-role-edit', ['id' => $row->id])}}"
                                                data-name="{{$row->name}}"
                                                data-toggle="modal" data-target="#ediModal" title="{{__('site.common.edi_title')}}"><i class="icon-pencil5"></i></button>
                                        <a class="btn btn-xs btn-danger no-padding" href="{{route('user-role-del', ['id' => $row->id])}}" onclick='return confirm("{{__('site.common.delete')}}")' title="{{__('site.common.del_title')}}"><i class="icon-bin"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


    <script type="text/javascript">


        $(function () {

            $('.ediBtn').click(function () {
                var url = $(this).data('url');
                var name = $(this).data('name');

                $('#ediModal form').attr('action', url);
                $('#ediModal [name=name]').val(name);

            });

        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [3] }//For Column Order
                ]
            });
        });

    </script>

@endsection