@extends('layouts.master')
@section('title')
    @lang('site.content.service_add')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><a href="{{route('service')}}" class="btn btn-danger btn-labeled"><b><i class="icon-previous2"></i></b> @lang('site.content.go_service')</a></p>
        </div>
        <div class="col-md-6">

            @if ($errors->any())
                <div class="notification is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('site.content.service_add')</h6>
                </div>
                <form id="serviceForm" action="{{route('service-save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body mainFrom">

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="text-semibold"><i class="icon-reading position-left"></i> Basic details</legend>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Service Type</span>
                                        <select type="text" name="serviceType" class="form-control">
                                            <option value="Venue Booking">Venue Booking</option>
                                            <option value="Food & Catering">Food & Catering</option>
                                            <option value="Photographer">Photographer</option>
                                            <option value="Henna Artist">Henna Artist</option>
                                            <option value="Makeup Artist">Makeup Artist</option>
                                            <option value="Event Planer">Event Planer</option>
                                            <option value="Invitation Card">Invitation Card</option>
                                        </select>
                                    </div>

                                    @if(Auth::user()->userType == 'Vendor')
                                        <input type="hidden" name="vendorID" value="{{Auth::user()->id}}">
                                        @else
                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Vendor*</span>
                                        <select type="text" name="vendorID" class="form-control select" required>
                                            @foreach($vendor as $row)
                                                <option value="{{$row->id}}">{{$row->name}} ({{$row->contact}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Name*</span>
                                        <input type="text" name="name" class="form-control" placeholder="Service Name/Company" value="{{old('name')}}" required />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Email</span>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Location*</span>
                                        <select type="text" name="locationID" class="form-control">
                                            @foreach($location as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Address</span>
                                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{old('address')}}" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Landmark</span>
                                        <input type="text" name="landmark" class="form-control" placeholder="Landmark" value="{{old('landmark')}}" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Min Guest*</span>
                                        <input type="number" name="minGuest" class="form-control" min="0" value="{{old('maxGuest') ?? 0}}" placeholder="Min Guest" required />
                                        <span class="input-group-addon">Max Guest*</span>
                                        <input type="number" name="maxGuest" class="form-control" min="0" value="{{old('maxGuest') ?? 0}}" placeholder="Max Guest" required />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Mobile*</span>
                                        <input type="text" name="mobile" class="form-control" placeholder="11 Digit Mobile Number" value="{{old('mobile')}}" required />
                                        <span class="input-group-addon">Land Phone</span>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{old('phone')}}"/>
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">WhatsApp</span>
                                        <input type="text" name="WhatsApp" class="form-control" placeholder="WhatsApp" value="{{old('WhatsApp')}}" />
                                        <span class="input-group-addon">Viber</span>
                                        <input type="text" name="Viber" class="form-control" placeholder="Viber" value="{{old('Viber')}}" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Website Link</span>
                                        <input type="text" name="website" class="form-control" placeholder="Website Link" value="{{old('website')}}" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Short Description</span>
                                        <input type="text" name="additional" class="form-control" placeholder="Max 255 letter Short Description [Optional]" value="{{old('additional')}}" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Profile Photo*</span>
                                        <input type="file" name="primaryPhoto" class="form-control" placeholder="Profile Photo" accept="image/x-png,image/gif,image/jpeg" required/>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="text-semibold"><i class="icon-truck position-left"></i> Other details</legend>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Party Type</span>
                                        <select class="form-control select" name="partyType[]" multiple="multiple">
                                            @foreach($partyTypes as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Facility</span>
                                        <select class="form-control select" name="facility[]" multiple="multiple">
                                            @foreach($facility as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Rules</span>
                                        <select class="form-control select" name="rules[]" multiple="multiple">
                                            @foreach($rules as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-5"><button id="addSocial" type="button" class="btn btn-link"><i class="icon-plus2"></i> Add Social Link</button></div>
                                    <div id="socialShow"></div>


                                    <div class="mb-5"><button id="addPackage" type="button" class="btn btn-link"><i class="icon-plus2"></i> Add Package and pricing setup</button></div>
                                    <div id="packageShow"></div>

                                    <div class="mb-5"><button id="addFaq" type="button" class="btn btn-link"><i class="icon-plus2"></i> Add FAQ</button></div>
                                    <div id="faqShow"></div>

                                    <div class="mb-5"><button id="addPhoto" type="button" class="btn btn-link"><i class="icon-plus2"></i> Add Photo Gallery</button></div>
                                    <div id="photoShow"></div>

                                </fieldset>
                            </div>
                        </div>


                        <textarea id="content" name="description" rows="3" style="width: 100%;" class="hidden"></textarea>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="summernote"></div>
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <div class="heading-elements">
                            <button id="go_submit" style="display: none;" type="submit"></button>
                            <button type="button" id="pes" class="btn btn-primary heading-btn pull-right"><i class="icon-checkmark4"></i> Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link href="{{asset('public/assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/summernote/summernote.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('script')

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{asset('public/summernote/summernote.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <!-- /theme JS files -->



    <script type="text/javascript">

        $(function () {

            $('#addSocial').click(function () {

                $('#socialShow').append('<div class="input-group mb-5 gnInput">\n' +
                    '<span class="input-group-addon">Name</span>\n' +
                    '<input type="text" name="socialName[]" class="form-control" placeholder="Ex: Facebook" required/>\n' +
                    '<span class="input-group-addon">Link</span>\n' +
                    '<input type="url" name="socialLink[]" class="form-control" placeholder="Social Link" required/>\n' +
                    '<span class="input-group-btn">\n' +
                    '<button class="btn btn-danger delInput" type="button">X</button>\n' +
                    '</span>\n' +
                    '</div>');

                $('.delInput').click(function () {
                    $(this).parents('.gnInput').remove();
                });
            });


            $('#addFaq').click(function () {

                $('#faqShow').append('<div class="input-group mb-5 gnInput">\n' +
                    ' <span class="input-group-addon">Question</span>\n' +
                    ' <input type="text" name="question[]" class="form-control" placeholder="FAQ Question" required/>\n' +
                    ' <span class="input-group-addon">Answer</span>\n' +
                    ' <input type="text" name="answer[]" class="form-control" placeholder="Answer This" required/>\n' +
                    ' <span class="input-group-btn">\n' +
                    '   <button class="btn btn-danger delInput" type="button">X</button>\n' +
                    '  </span>\n' +
                    '</div>');

                $('.delInput').click(function () {
                    $(this).parents('.gnInput').remove();
                });
            });



            $('#addPackage').click(function () {

                $('#packageShow').append('<div class="input-group mb-5 gnInput">\n' +
                    ' <span class="input-group-addon">Package Name</span>\n' +
                    ' <input type="text" name="package[]" class="form-control" placeholder="Package Name" required/>\n' +
                    ' <span class="input-group-addon">Item</span>\n' +
                    ' <input type="text" name="items[]" class="form-control" placeholder="Package Item" required/>\n' +
                    ' <span class="input-group-addon">Price</span>\n' +
                    ' <input type="number" name="price[]" class="form-control" min="0" value="0" placeholder="Package Price" required/>\n' +
                    ' <span class="input-group-btn">\n' +
                    '   <button class="btn btn-danger delInput" type="button">X</button>\n' +
                    '  </span>\n' +
                    '</div>');

                $('.delInput').click(function () {
                    $(this).parents('.gnInput').remove();
                });
            });

            $('#addPhoto').click(function () {

                $('#photoShow').append('<div class="input-group mb-5 gnInput">\n' +
                    '<span class="input-group-addon">Photo Caption</span>\n' +
                    '<input type="text" name="photoName[]" class="form-control" placeholder="Photo Caption" required/>\n' +
                    '<span class="input-group-addon">Upload Photo</span>\n' +
                    '<input type="file" name="gallery[]" class="form-control" placeholder="Upload Gallery Photo" accept="image/x-png,image/gif,image/jpeg" required/>\n' +
                    '  <span class="input-group-btn">\n' +
                    '     <button class="btn btn-danger delInput" type="button">X</button>\n' +
                    '  </span>\n' +
                    '</div>');

                $('.delInput').click(function () {
                    $(this).parents('.gnInput').remove();
                });
            });



            $('.summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'hr']],
                    ['view', ['fullscreen']],
                    ['help', ['help']]
                ]
            });

            $('.select').select2();

            $('#pes').click(function () {
                var content = $('.summernote').summernote('code');

                $('#content').val(encodeURIComponent(content));

                $('#go_submit').trigger('click');

                //$('#serviceForm').submit();
            });
        });



    </script>

@endsection