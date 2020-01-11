@extends('layouts.master')
@extends('settings.box.time-slot')
@section('title')
    @lang('site.content.time_slot_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> @lang('site.content.time_slot_add')</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('site.content.time_slot_page')</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Time Slot Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{date('h:i A',strtotime($row->fromTime))}}</td>
                                <td>{{date('h:i A',strtotime($row->toTime))}}</td>
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn"
                                            data-url="{{route('time-slot-edit', ['id' => $row->id])}}"
                                            data-name="{{$row->name}}"
                                            data-from="{{$row->fromTime}}"
                                            data-to="{{$row->toTime}}"
                                            data-toggle="modal" data-target="#ediModal" title="{{__('site.common.edi_title')}}"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{route('time-slot-del', ['id' => $row->id])}}" onclick='return confirm("{{__('site.common.delete')}}")' title="{{__('site.common.del_title')}}"><i class="icon-bin"></i></a>
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
                var fromTime = $(this).data('from');
                var toTime = $(this).data('to');

                $('#ediModal form').attr('action', url);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=fromTime]').val(fromTime);
                $('#ediModal [name=toTime]').val(toTime);

            });

        });


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