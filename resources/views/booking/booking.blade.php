@extends('layouts.master')
@extends('booking.box.booking')
@section('title')
    @lang('site.content.booking_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('site.content.booking_page')</h6>
                </div>

                <div class="panel-body" style="overflow-x: auto;">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Contact</th>
                            <th title="Service Date">S.Date</th>
                            <th>Company</th>
                            <th>Service</th>
                            <th>Amount</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{pub_date($row->created_at)}}</td>
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
                                        $price .= '<p class="no-margin border-bottom border-bottom-info-300">'.money_c($rows->pricing * $rows->qty).'</p>';

                                        $full_amount += ($rows->pricing * $rows->qty);
                                }
                                @endphp
                                <td>{!! $serviceDate !!}</td>
                                <td>{!! $company !!}</td>
                                <td>{!! $service !!}</td>
                                <td>{!! $price !!}</td>
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-success no-padding mr-5 approvedBtn" data-id="{{$row->id}}" data-toggle="modal" data-target="#approvedModal" title="{{__('site.common.approve_title')}}"><i class="icon-checkmark2"></i></button>
                                    <button class="btn btn-xs btn-danger no-padding mr-5 cancelBtn" data-id="{{$row->id}}" data-amount="{{$full_amount}}" data-toggle="modal" data-target="#cancelModal" title="{{__('site.common.cancel_title')}}"><i class="icon-cross3"></i></button>
                                    <button class="btn btn-xs btn-info no-padding show_book_info" data-url="{{route('booking-show', ['id' => $row->id])}}" data-toggle="modal" data-target="#bookingModal" title="{{__('site.common.view_title')}}"><i class="icon-eye"></i></button>
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
            $('.approvedBtn').click(function () {
                var id = $(this).data('id');

                $('#approvedModal [name=id]').val(id);
            });

            $('.cancelBtn').click(function () {
                var id = $(this).data('id');
                var amount = $(this).data('amount');

                $('#cancelModal [name=id]').val(id);
                $('#refund').val('');
                $('#refundInput').html('');

                $('#refund').change(function () {
                    var refundOption = $(this).val();

                    if(refundOption == 'refund'){
                        var formInput = '<div class="input-group mb-5">\n' +
            '                                    <span class="input-group-addon">Refund Payment</span>\n' +
            '                                    <select name="payMethod" class="form-control" required>\n' +
            '                                        <option value="">Select Payment Method</option>\n' +
            '                                        <option value="Cash">Cash Payment</option>\n' +
            '                                        <option value="Bank">Bank Payment</option>\n' +
            '                                        <option value="Account">Add to user found</option>\n' +
            '                                    </select>\n' +
            '                                </div>\n' +
            '                                <div class="input-group mb-5">\n' +
            '                                    <span class="input-group-addon">Refund Amount Full/Partial</span>\n' +
            '                                    <input type="number" name="payAmount" class="form-control" min="0" step="any" value="'+amount+'" placeholder="Full Amount / Partial Amount" required/>\n' +
            '                                </div>\n' +
            '                                <div class="input-group mb-5">\n' +
            '                                    <span class="input-group-addon">Payment Description</span>\n' +
            '                                    <input type="text" name="description" class="form-control" placeholder="Payment Description like bank cheque number"/>\n' +
            '                                </div>';

                        $('#refundInput').html(formInput);
                    }else{
                        $('#refundInput').html('');
                    }
                });

            });
        });

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