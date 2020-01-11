@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> @lang('site.content.rules_add')</h5>
                </div>

                <form action="{{route('rules-save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Rules*</span>
                            <input type="text" name="name" class="form-control" placeholder="Rules" required />
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Rules For</span>
                            <select type="text" name="rulesFor" class="form-control"required >
                                <option value="All">All</option>
                                <option value="Venue Booking">Venue Booking</option>
                                <option value="Food & Catering">Food & Catering</option>
                                <option value="Photographer">Photographer</option>
                                <option value="Henna Artist">Henna Artist</option>
                                <option value="Makeup Artist">Makeup Artist</option>
                                <option value="Event Planer">Event Planer</option>
                                <option value="Invitation Card">Invitation Card</option>
                            </select>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> @lang('site.content.rules_edi')</h5>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">

                        <div class="modal-body">

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Rules*</span>
                                <input type="text" name="name" class="form-control" placeholder="Rules" required />
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Rules For</span>
                                <select type="text" name="rulesFor" class="form-control"required >
                                    <option value="All">All</option>
                                    <option value="Venue Booking">Venue Booking</option>
                                    <option value="Food & Catering">Food & Catering</option>
                                    <option value="Photographer">Photographer</option>
                                    <option value="Henna Artist">Henna Artist</option>
                                    <option value="Makeup Artist">Makeup Artist</option>
                                    <option value="Event Planer">Event Planer</option>
                                    <option value="Invitation Card">Invitation Card</option>
                                </select>
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
