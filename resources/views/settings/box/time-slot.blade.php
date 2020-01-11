@section('box')

    @php
    $times = [
        '00:00:00' => '12:00 AM',
        '01:00:00' => '01:00 AM',
        '02:00:00' => '02:00 AM',
        '03:00:00' => '03:00 AM',
        '04:00:00' => '04:00 AM',
        '05:00:00' => '05:00 AM',
        '06:00:00' => '06:00 AM',
        '07:00:00' => '07:00 AM',
        '08:00:00' => '08:00 AM',
        '09:00:00' => '09:00 AM',
        '10:00:00' => '10:00 AM',
        '11:00:00' => '11:00 AM',
        '12:00:00' => '12:00 PM',
        '13:00:00' => '01:00 PM',
        '14:00:00' => '02:00 PM',
        '15:00:00' => '03:00 PM',
        '16:00:00' => '04:00 PM',
        '17:00:00' => '05:00 PM',
        '18:00:00' => '06:00 PM',
        '19:00:00' => '07:00 PM',
        '20:00:00' => '08:00 PM',
        '21:00:00' => '09:00 PM',
        '22:00:00' => '10:00 PM',
        '23:00:00' => '11:00 PM',
        '23:59:59' => '11:59 PM'
    ];
    @endphp

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> @lang('site.content.time_slot_add')</h5>
                </div>

                <form action="{{route('time-slot-save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Time Slot Name*</span>
                            <input type="text" name="name" class="form-control" placeholder="Time Slot Name" required />
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Start Time</span>
                            <select type="text" name="fromTime" class="form-control"required >
                                @foreach($times as $key=>$time)
                                <option value="{{$key}}">{{$time}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">End Time</span>
                            <select type="text" name="toTime" class="form-control"required >
                                @foreach($times as $key=>$time)
                                    <option value="{{$key}}">{{$time}}</option>
                                @endforeach
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
                    <h5 class="modal-title"><i class="icon-pencil7"></i> @lang('site.content.time_slot_edi')</h5>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">

                        <div class="modal-body">

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Time Slot Name*</span>
                                <input type="text" name="name" class="form-control" placeholder="Time Slot Name" required />
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Start Time</span>
                                <select type="text" name="fromTime" class="form-control"required >
                                    @foreach($times as $key=>$time)
                                        <option value="{{$key}}">{{$time}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-addon">End Time</span>
                                <select type="text" name="toTime" class="form-control"required >
                                    @foreach($times as $key=>$time)
                                        <option value="{{$key}}">{{$time}}</option>
                                    @endforeach
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
