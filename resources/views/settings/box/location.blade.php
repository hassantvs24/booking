@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> @lang('site.content.location_add')</h5>
                </div>

                <form action="{{route('location-save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-7">
                                <fieldset class="gllpLatlonPicker">
                                    <input type="text" name="lat" class="gllpLatitude" value="23.78"/>
                                    <input type="text" name="lon" class="gllpLongitude" value="90.40"/>
                                    <div class="gllpMap">Google Maps</div>
                                    <input type="hidden" class="gllpLatLng"/>
                                    <input type="hidden" class="gllpZoom" value="10"/>
                                </fieldset>
                                <p class="cap1">Double Click On Map for pick Latitude and Longitude</p>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group mb-5">
                                    <span class="input-group-addon">City Name*</span>
                                    <input type="text"  list="city_save" name="city" class="form-control" placeholder="City Name" autocomplete="off" required />
                                    <datalist id="city_save">
                                        @foreach($city as $row)
                                            <option value="{{$row->city}}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Location Name*</span>
                                    <input type="text" name="name" class="form-control" placeholder="Location Name" required />
                                </div>
                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Location Address</span>
                                    <textarea type="text" name="address" class="form-control" placeholder="Location Address" ></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->


    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> @lang('site.content.location_edi')</h5>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">

                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-7">
                                    <fieldset class="gllpLatlonPicker">
                                        <input type="text" name="lat" class="gllpLatitude" value="23.78"/>
                                        <input type="text" name="lon" class="gllpLongitude" value="90.40"/>
                                        <div class="gllpMap">Google Maps</div>
                                        <input type="hidden" class="gllpLatLng"/>
                                        <input type="hidden" class="gllpZoom" value="10"/>
                                    </fieldset>
                                    <p class="cap1">Double Click On Map for pick Latitude and Longitude</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">City Name*</span>
                                        <input type="text" list="city_edit" name="city" class="form-control" placeholder="City Name" required />
                                        <datalist id="city_edit">
                                            @foreach($city as $row)
                                                <option value="{{$row->city}}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Location Name*</span>
                                        <input type="text" name="name" class="form-control" placeholder="Location Name" required />
                                    </div>
                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Location Address</span>
                                        <textarea type="text" name="address" class="form-control" placeholder="Location Address" ></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->


@endsection
