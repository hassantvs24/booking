@extends('layouts.master')
@extends('settings.box.location')
@section('title')
    @lang('site.content.location_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled {{Auth::user()->access_view('location-save')}}" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> @lang('site.content.location_add')</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('site.content.location_page')</h6>
                </div>

                <div class="panel-body">

                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>City</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Lat</th>
                            <th>Lon</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->city}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->lat}}</td>
                                <td>{{$row->lon}}</td>
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn {{Auth::user()->access_view('location-edit')}}"
                                            data-url="{{route('location-edit', ['id' => $row->id])}}"
                                            data-name="{{$row->name}}"
                                            data-address="{{$row->address}}"
                                            data-lat="{{$row->lat}}"
                                            data-lon="{{$row->lon}}"
                                            data-toggle="modal" data-target="#ediModal" title="{{__('site.common.edi_title')}}"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding {{Auth::user()->access_view('location-del')}}" href="{{route('location-del', ['id' => $row->id])}}" onclick='return confirm("{{__('site.common.delete')}}")' title="{{__('site.common.del_title')}}"><i class="icon-bin"></i></a>
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

@section('style')
    <link href="{{asset('public/css/jquery-gmaps-latlon-picker.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('script')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCJ7FU3y6klDKrt1w1tnmWf2rEdkRydW3A&sensor=false"></script>
    <script type="text/javascript" src="{{asset('public/js/jquery-gmaps-latlon-picker.js')}}"></script>

    <script type="text/javascript">
        $(function () {

            $('.ediBtn').click(function () {
                var url = $(this).data('url');
                var name = $(this).data('name');
                var address = $(this).data('address');
                var lat = $(this).data('lat');
                var lon = $(this).data('lon');

                $('#ediModal form').attr('action', url);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=address]').val(address);
                $('#ediModal [name=lat]').val(lat);
                $('#ediModal [name=lon]').val(lon);

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