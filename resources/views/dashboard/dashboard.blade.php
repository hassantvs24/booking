@extends('layouts.master')
@extends('booking.box.booking')
@section('title')
    @lang('site.content.dashboard_title')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat border-top-xlg border-top-warning">
                <div class="panel-heading">
                    <h6 class="panel-title"><span class="text-semibold"><i class="icon-power3"></i> Quick</span> Access</h6>
                </div>

                <div class="panel-body">
                    <a href="{{route('new-booking')}}" class="btn btn-success btn-float btn-float-lg m-5 {{Auth::user()->access_view('new-booking')}}" title="{{ __('site.aside.new_booking')}}"><i class="icon-bookmark"></i> <span>Booking</span></a>
                    <a href="{{route('booking-task')}}" class="btn btn-info btn-float btn-float-lg m-5 {{Auth::user()->access_view('booking-task')}}" title="{{ __('site.aside.booking_task')}}"><i class="icon-clipboard5"></i> <span>Task</span></a>
                    <a href="{{route('old-booking')}}" class="btn bg-blue-400 btn-float btn-float-lg m-5 {{Auth::user()->access_view('old-booking')}}" title="{{ __('site.aside.booking_archive')}}"><i class="icon-cabinet"></i> <span>Archive</span></a>
                    <a href="{{route('service')}}" class="btn btn-danger btn-float btn-float-lg m-5 {{Auth::user()->access_view('service')}}" title="{{ __('site.aside.service_list')}}"><i class="icon-theater"></i> <span>Service</span></a>
                    <a href="{{route('party')}}" class="btn bg-indigo btn-float btn-float-lg m-5 {{Auth::user()->access_view('party')}}" title="{{ __('site.aside.party')}}"><i class="icon-megaphone"></i> <span>Party</span></a>
                    <a href="{{route('location')}}" class="btn bg-success-300 btn-float btn-float-lg m-5 {{Auth::user()->access_view('party')}}" title="{{ __('site.aside.location')}}"><i class="icon-location4"></i> <span>Location</span></a>
                    <a href="{{route('facility')}}" class="btn bg-danger-300 btn-float btn-float-lg m-5 {{Auth::user()->access_view('location')}}" title="{{ __('site.aside.facility')}}"><i class="icon-spinner4"></i> <span>Facility</span></a>
                    <a href="{{route('time-slot')}}" class="btn bg-purple-300 btn-float btn-float-lg m-5 {{Auth::user()->access_view('facility')}}" title="{{ __('site.aside.time_slot')}}"><i class="icon-hour-glass2"></i> <span>Times</span></a>
                    <a href="{{route('rules')}}" class="btn bg-pink-400 btn-float btn-float-lg m-5 {{Auth::user()->access_view('time-slot')}}" title="{{ __('site.aside.notebook')}}"><i class="icon-notebook"></i> <span>Rules</span></a>
                    <a href="{{route('users-list')}}" class="btn bg-brown-300 btn-float btn-float-lg m-5 {{Auth::user()->access_view('users-list')}}" title="{{ __('site.aside.all_user')}}"><i class="icon-users4"></i> <span>Users</span></a>
                    <a href="{{route('user-role')}}" class="btn bg-primary-300 btn-float btn-float-lg m-5 {{Auth::user()->access_view('user-role')}}" title="{{ __('site.aside.make-group')}}"><i class="icon-lock2"></i> <span>Access</span></a>
                </div>
            </div>

        </div>

        <div class="col-md-6">

            <div class="panel-body bg-teal">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-hour-glass"></i></span>
                </div>

                <h3 class="no-margin">{{$new_book ?? 0}}</h3>
                Pending Booking
            </div>

            <div class="panel-body bg-warning-700">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-firefox"></i></span>
                </div>

                <h3 class="no-margin">{{$running_book ?? 0}}</h3>
                Running Booking

            </div>

            <div class="panel-body bg-success-300">
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-alarm-check"></i></span>
                </div>

                <h3 class="no-margin">{{$complete_book ?? 0}}</h3>
                Booking Task Completed
            </div>

        </div>


    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-xlg border-top-primary-300">
                <div class="panel-heading">
                    <h6 class="panel-title"><span class="text-semibold"><i class="icon-calendar22"></i> Event</span> Calender</h6>
                </div>

                <div class="panel-body">
                    <div class="fullcalendar-event-colors"></div>
                </div>

                <div class="panel-footer" style="padding-left: 15px;">
                    <p><b>Important note:</b></p>
                   <p> * - Complete task</p>
                   <p> Click on event tusk for view details</p>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/ui/fullcalendar/fullcalendar.min.js')}}"></script>

    <script type="text/javascript">


        $(function () {
            $.get("{{route('event-calender-api')}}", function(result){

                $('.fullcalendar-event-colors').fullCalendar({
                    themeSystem:'standard',
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },

                    eventClick: function(calEvent, jsEvent, view) {
                        var url = calEvent.description;
                        $('#show_book_info').html('Loading ...');
                        $.get(url, function( datas ) {
                            $('#show_book_info').html(datas);
                            $('#bookingModal').modal('show');
                        });

                    },

                    buttonIcons: {
                        prev: ' icon-arrow-left15',
                        next: ' icon-arrow-right15',
                    },
                    defaultDate: new Date(),
                    //editable: true,
                    events: result
                });

            });
        });
        // Event colors





    </script>

@endsection