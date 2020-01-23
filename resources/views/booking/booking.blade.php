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

                                foreach($items as $rows){
                                        $serviceDate .= '<p class="no-margin border-bottom border-bottom-info-300">'.pub_date($rows->serviceDate).'</p>';
                                        $company .= '<p class="no-margin white_sp border-bottom border-bottom-info-300">'.$rows->service['name'].'</p>';
                                        $service .= '<p class="no-margin white_sp border-bottom border-bottom-info-300">'.$rows->service['serviceType'].'</p>';
                                        $price .= '<p class="no-margin border-bottom border-bottom-info-300">'.money_c($rows->pricing * $rows->qty).'</p>';
                                }
                                @endphp
                                <td>{!! $serviceDate !!}</td>
                                <td>{!! $company !!}</td>
                                <td>{!! $service !!}</td>
                                <td>{!! $price !!}</td>
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-success no-padding mr-5 approvedBtn" data-toggle="modal" data-target="#approvedModal" title="{{__('site.common.approve_title')}}"><i class="icon-checkmark2"></i></button>
                                    <button class="btn btn-xs btn-danger no-padding mr-5 cancelBtn" data-toggle="modal" data-target="#cancelModal" title="{{__('site.common.cancel_title')}}"><i class="icon-cross3"></i></button>
                                    <a class="btn btn-xs btn-info no-padding" href="{{route('time-slot-del', ['id' => $row->id])}}" title="{{__('site.common.view_title')}}"><i class="icon-eye"></i></a>
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




    </script>

@endsection