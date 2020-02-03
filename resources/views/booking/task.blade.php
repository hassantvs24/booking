@extends('layouts.master')
@extends('booking.box.booking')
@section('title')
    @lang('site.content.booking_task_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('site.content.booking_task_page')</h6>
                </div>

                <div class="panel-body" style="overflow-x: auto;">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th title="Booking ID">BookingID</th>
                            <th>Date</th>
                            <th>Time Slot</th>
                            <th>Service</th>
                            <th>Company</th>
                            <th>Price x Qty</th>
                            <th>Amount</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td><button class="btn-link no-padding show_book_info" data-url="{{route('booking-show', ['id' => $row->bookingID])}}" data-toggle="modal" data-target="#bookingModal" title="{{__('site.common.view_title')}}"><u>{{$row->bookingID}}</u></button></td>
                                <td>{{pub_date($row->serviceDate)}}</td>
                                <td>{{$row->time_slot['name'] ?? ''}} ({{date('ha', strtotime($row->time_slot['fromTime'])) ?? ''}}-{{date('ha', strtotime($row->time_slot['toTime'])) ?? ''}})</td>
                                <td>{{$row->service['serviceType'] ?? ''}}</td>
                                <td>{{$row->service['name'] ?? ''}}</td>
                                <td>{{money_c($row->pricing)}} x {{ $row->qty}}</td>
                                <td>{{money_c($row->pricing * $row->qty)}}</td>
                                <td class="text-right">
                                    @if($row->isComplete == null)
                                        <a class="btn btn-xs btn-success no-padding {{Auth::user()->access_view('task-complete')}}" href="{{route('task-complete', ['id' => $row->id])}}" onclick='return confirm("Are you sure this task is complete?")' title="{{__('site.content.booking_task_complete')}}"><i class="icon-checkmark2"></i></a>
                                        @else
                                        <a class="btn btn-xs btn-warning no-padding {{Auth::user()->access_view('task-complete')}}" href="{{route('task-complete', ['id' => $row->id])}}" onclick='return confirm("Are you sure this is incomplete task?")' title="{{__('site.content.booking_task_reback')}}"><i class="icon-undo2"></i></a>
                                    @endif
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
            $('.show_book_info').click(function () {
                $('#show_book_info').html('Loading ...');
                var url = $(this).data('url');
                $.get(url, function( result ) {
                    $('#show_book_info').html(result);
                });
            });

        });


        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [8] }//For Column Order
                ]
            });
        });

    </script>

@endsection