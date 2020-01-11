@extends('layouts.master')
@section('title')
    @lang('site.content.service_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><a href="{{route('service-go-save')}}" class="btn btn-primary btn-labeled"><b><i class="icon-file-plus"></i></b> @lang('site.content.service_add')</a></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('site.content.service_page')</h6>
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Service Type</th>
                            <th>Service</th>
                            <th>Address</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->serviceType}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->address}}</td>
                                <td class="text-right white_sp">
                                    <a class="btn btn-xs btn-success no-padding mr-5" href="{{route('service-go-edit', ['id' => $row->id])}}" title="{{__('site.common.edi_title')}}"><i class="icon-pencil5"></i></a>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{route('service-del', ['id' => $row->id])}}" onclick='return confirm("{{__('site.common.delete')}}")' title="{{__('site.common.del_title')}}"><i class="icon-bin"></i></a>
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

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [4] }//For Column Order
                ]
            });
        });

    </script>

@endsection