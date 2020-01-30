
@section('box')

    <!-- Basic modal -->
    <div id="approvedModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-checkmark2"></i> @lang('site.content.booking_task_approved')</h5>
                </div>

                <form action="{{route('booking-status')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id">
                    <input type="hidden" name="status" value="Running">
                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Approved Note</span>
                            <input type="text" name="notes" class="form-control" placeholder="Approved Note" />
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
                    <h5 class="modal-title"><i class="icon-cross3"></i> @lang('site.content.booking_task_cancel')</h5>
                </div>

                <form action="{{route('booking-status')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id">
                    <input type="hidden" name="status" value="Cancel">
                    <div class="modal-body">

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Cancel Note</span>
                                <input type="text" name="notes" class="form-control" placeholder="Cancel Note" />
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Refund Payment</span>
                                <select id="refund" name="refund" class="form-control" required>
                                    <option value="">Select Refund Option</option>
                                    <option value="cancel">Cancel/Delete Payment</option>
                                    <option value="not_refund">No Payment Refund</option>
                                    <option value="refund">Payment Refund</option>
                                </select>
                            </div>

                            <div id="refundInput"></div>


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

    <!-- Basic Edi modal -->
    <div id="bookingModal" class="modal fade">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> @lang('site.content.show_booking')</h5>
                </div>

                    <div class="modal-body" id="show_book_info">
                        Loading ...
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                    </div>

            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->


@endsection
