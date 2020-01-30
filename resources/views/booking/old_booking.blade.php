@extends('layouts.master')
@extends('booking.box.booking')
@section('title')
    @lang('site.content.old_booking_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('site.content.old_booking_page')</h6>
                </div>

                <div class="panel-body" style="overflow-x: auto;">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>Contact</th>
                            <th title="Service Date">S.Date</th>
                            <th>Company</th>
                            <th>Service</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->status}}</td>
                                <td>{{$row->customer['name']}}</td>
                                <td>{{$row->customer['contact']}}</td>
                                @php
                                    $items = $row->item()->get();
                                    $serviceDate = '';
                                    $company = '';
                                    $service = '';
                                    $price = '';

                                    $full_amount = 0;
                                foreach($items as $rows){
                                        $serviceDate .= '<p class="no-margin border-bottom border-bottom-info-300">'.pub_date($rows->serviceDate).'</p>';
                                        $company .= '<p class="no-margin white_sp border-bottom border-bottom-info-300">'.$rows->service['name'].'</p>';
                                        $service .= '<p class="no-margin white_sp border-bottom border-bottom-info-300">'.$rows->service['serviceType'].'</p>';

                                        $full_amount += ($rows->pricing * $rows->qty);
                                }
                                @endphp
                                <td>{!! $serviceDate !!}</td>
                                <td>{!! $company !!}</td>
                                <td>{!! $service !!}</td>
                                <td class="text-right white_sp">
                                    @if($row->status == 'Complete')
                                        <button class="btn btn-xs btn-success no-padding show_book_info" data-url="{{route('booking-show', ['id' => $row->id])}}" data-toggle="modal" data-target="#bookingModal" title="{{__('site.common.view_title')}}"><i class="icon-eye"></i></button>
                                        @else
                                        <button class="btn btn-xs btn-warning no-padding show_book_info" data-url="{{route('booking-show', ['id' => $row->id])}}" data-toggle="modal" data-target="#bookingModal" title="{{__('site.common.view_title')}}"><i class="icon-eye"></i></button>
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
                var url = $(this).data('url');
                $('#show_book_info').html('Loading ...');
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