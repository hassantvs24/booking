@extends('layouts.master')
@extends('users.box.user')
@section('title')
    @lang('site.content.all_user_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled {{Auth::user()->access_view('users-save')}}" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> @lang('site.content.all_user_add')</button></p>
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
                    <h6 class="panel-title">@lang('site.content.all_user_page')</h6>
                </div>

                <div class="panel-body">

                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>User Type</th>
                            <th>User Role</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->contact}}</td>
                                <td>{{$row->userType}}</td>
                                <td>{{$row->role['name'] ?? ''}}</td>
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn {{Auth::user()->access_view('users-edit')}}"
                                            data-url="{{route('users-edit', ['id' => $row->id])}}"
                                            data-name="{{$row->name}}"
                                            data-email="{{$row->email}}"
                                            data-contact="{{$row->contact}}"
                                            data-utype="{{$row->userType}}"
                                            data-role="{{$row->userRuleID}}"
                                            data-toggle="modal" data-target="#ediModal" title="{{__('site.common.edi_title')}}"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding {{Auth::user()->access_view('users-del')}}" href="{{route('users-del', ['id' => $row->id])}}" onclick='return confirm("{{__('site.common.delete')}}")' title="{{__('site.common.del_title')}}"><i class="icon-bin"></i></a>
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
                var email = $(this).data('email');
                var contact = $(this).data('contact');
                var userType = $(this).data('utype');
                var userRuleID = $(this).data('role');


                $('#ediModal form').attr('action', url);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=email]').val(email);
                $('#ediModal [name=contact]').val(contact);
                $('#ediModal [name=userType]').val(userType);
                $('#ediModal [name=userRuleID]').val(userRuleID);

            });

        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [6] }//For Column Order
                ]
            });
        });


    </script>

@endsection