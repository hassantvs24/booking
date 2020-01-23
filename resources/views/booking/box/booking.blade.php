
@section('box')

    <!-- Basic modal -->
    <div id="approvedModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> @lang('site.content.booking_task_approved')</h5>
                </div>

                <form action="{{route('party-save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Party Type Name*</span>
                            <input type="text" name="name" class="form-control" placeholder="Party Type Name" required />
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
    <div id="cancelModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> @lang('site.content.booking_task_cancel')</h5>
                </div>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="modal-body">

                        <div class="modal-body">

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Party Type Name*</span>
                                <input type="text" name="name" class="form-control" placeholder="Party Type Name" required />
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
