@extends('layouts.master')
@section('title')
    @lang('site.content.service_edi')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><a href="{{route('service')}}" class="btn btn-danger btn-labeled"><b><i class="icon-previous2"></i></b> @lang('site.content.go_service')</a></p>
        </div>
        <div class="col-md-6">
            @if ($errors->any())
                <div class="notification is-danger">
                    <button class="delete bt-del"></button>
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
                    <h6 class="panel-title">@lang('site.content.service_edi')</h6>
                </div>
                <form id="serviceForm" action="{{route('service-edit', ['id' => $table->id])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="panel-body mainFrom">

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="text-semibold"><i class="icon-reading position-left"></i> Basic details</legend>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Service Type</span>
                                        <select type="text" id="venueBooking" name="serviceType" class="form-control">
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
                                            <select id="vendorID" type="text" name="vendorID" class="form-control select" required>
                                                @foreach($vendor as $row)
                                                    <option value="{{$row->id}}">{{$row->name}} ({{$row->contact}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Name*</span>
                                        <input type="text" name="name" class="form-control" value="{{$table->name}}" placeholder="Service Name/Company" required />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Email</span>
                                        <input type="email" name="email" class="form-control" value="{{$table->email}}" placeholder="Email" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Location*</span>
                                        <select id="locationSet" type="text" name="locationID" class="form-control">
                                            @foreach($location as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Address</span>
                                        <input type="text" name="address" class="form-control" value="{{$table->address}}" placeholder="Address" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Landmark</span>
                                        <input type="text" name="landmark" class="form-control" value="{{$table->landmark}}" placeholder="Landmark" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Min Guest*</span>
                                        <input type="number" name="minGuest" class="form-control" min="0" value="{{$table->minGuest}}" placeholder="Min Guest" required />
                                        <span class="input-group-addon">Max Guest*</span>
                                        <input type="number" name="maxGuest" class="form-control" min="0" value="{{$table->maxGuest}}" placeholder="Max Guest" required />
                                    </div>

                                    @php
                                        $contact = json_decode($table->contact, true);

                                        $additional = json_decode($table->additional, true);
                                        $partyType_json = $additional['partyType'];
                                        $faq_json = $additional['faq'];

                                        //dd($partyType_json);


                                       $facility_json = json_decode($table->facility, true);
                                       $rules_json = json_decode($table->rules, true);


                                        $facil = "";
                                        foreach ($facility_json as $val){
                                            $facil .= str_replace('"', '',$val).',';
                                        }
                                        $facilitys = rtrim($facil, ',');

                                        $ru = "";
                                        foreach ($rules_json as $val){
                                            $ru .= str_replace('"', '',$val).',';
                                        }
                                        $ruleses = rtrim($ru, ',');

                                        $partyType = "";
                                        if($partyType_json != null){
                                            $party = "";
                                            foreach ($partyType_json as $val){
                                                $party .= str_replace('"', '',$val).',';
                                            }
                                            $partyType = rtrim($party, ',');
                                        }





                                        $social = json_decode($table->social, true);
                                        $pricing = json_decode($table->pricing, true);
                                        $photos = json_decode($table->photos, true);

                                    @endphp

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Mobile*</span>
                                        <input type="text" name="mobile" class="form-control" value="{{$contact['mobile'] ?? 0}}" placeholder="11 Digit Mobile Number" required />
                                        <span class="input-group-addon">Land Phone</span>
                                        <input type="text" name="phone" class="form-control" value="{{$contact['phone'] ?? 0}}" placeholder="Phone Number" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">WhatsApp</span>
                                        <input type="text" name="WhatsApp" class="form-control" value="{{$contact['whatsApp'] ?? 0}}" placeholder="WhatsApp" />
                                        <span class="input-group-addon">Viber</span>
                                        <input type="text" name="Viber" class="form-control" value="{{$contact['viber'] ?? 0}}" placeholder="Viber" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Website Link</span>
                                        <input type="text" name="website" class="form-control" value="{{$table->website}}" placeholder="Website Link" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Short Description</span>
                                        <input type="text" name="additional" class="form-control" placeholder="Max 255 letter Short Description [Optional]" value="{{$additional['description'] ?? ''}}" />
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Profile Photo*</span>
                                        <input type="file" name="primaryPhoto" class="form-control" placeholder="Profile Photo" accept="image/x-png,image/gif,image/jpeg"/>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="text-semibold"><i class="icon-truck position-left"></i> Other details</legend>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Party Type</span>
                                        <select  id="partyTypes"class="form-control select" name="partyType[]" multiple="multiple">
                                            @foreach($partyTypes as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Facility</span>
                                        <select id="facility" class="form-control select" name="facility[]" multiple="multiple">
                                            @foreach($facility as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mb-5">
                                        <span class="input-group-addon">Rules</span>
                                        <select id="rules" class="form-control select" name="rules[]" multiple="multiple">
                                            @foreach($rules as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-5"><button id="addSocial" type="button" class="btn btn-link"><i class="icon-plus2"></i> Add Social Link</button></div>
                                    <div id="socialShow">
                                        @foreach($social as $row)

                                            <div class="input-group mb-5 gnInput">
                                                <span class="input-group-addon">Name</span>
                                                <input type="text" name="socialName[]" class="form-control" value="{{$row['name'] ?? ''}}" placeholder="Ex: Facebook" required/>
                                                <span class="input-group-addon">Link</span>
                                                <input type="url" name="socialLink[]" class="form-control" value="{{$row['link'] ?? ''}}"  placeholder="Social Link" required/>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger delInput" type="button">X</button>
                                                </span>
                                            </div>

                                        @endforeach
                                    </div>


                                    <div class="mb-5"><button id="addPackage" type="button" class="btn btn-link"><i class="icon-plus2"></i> Add Package and pricing setup</button></div>
                                    <div id="packageShow">
                                        @foreach($pricing as $row)

                                            <div class="input-group mb-5 gnInput">
                                                <span class="input-group-addon">Package Name</span>
                                                <input type="text" name="package[]" class="form-control" value="{{$row['name'] ?? ''}}" placeholder="Package Name" required/>
                                                <span class="input-group-addon">Item</span>
                                                <input type="text" name="items[]" class="form-control" value="{{$row['item'] ?? ''}}" placeholder="Package Item" required/>
                                                <span class="input-group-addon">Price</span>
                                                <input type="number" name="price[]" class="form-control" min="0" value="{{$row['price'] ?? 0}}" placeholder="Package Price" required/>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger delInput" type="button">X</button>
                                                </span>
                                            </div>

                                        @endforeach
                                    </div>

                                    <div class="mb-5"><button id="addFaq" type="button" class="btn btn-link"><i class="icon-plus2"></i> Add FAQ</button></div>
                                    <div id="faqShow">
                                        @foreach($faq_json as $row)
                                            <div class="input-group mb-5 gnInput">
                                                <span class="input-group-addon">Question</span>
                                                <input type="text" name="question[]" class="form-control" value="{{$row['question'] ?? ''}}" placeholder="FAQ Question" required/>
                                                <span class="input-group-addon">Answer</span>
                                                <input type="text" name="answer[]" class="form-control" value="{{$row['answer'] ?? ''}}" placeholder="Answer This" required/>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger delInput" type="button">X</button>
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mb-5"><button id="addPhoto" type="button" class="btn btn-link"><i class="icon-plus2"></i> Add Photo Gallery</button></div>
                                    <div id="photoShow"></div>

                                </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($photos as $i => $row)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="thumbnail">
                                        <div class="thumb">
                                            <img src="{{asset('public/gallery/'.$row['photo'])}}" alt="{{$row['name']}}">
                                            <div class="caption-overflow">
                                            <span>
                                                @if($i != 0)
                                                <a href="{{route('service-del-photo', ['id' => $table->id, 'key' => $i])}}" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5" onclick='return confirm("{{__('site.common.delete')}}")' title="{{__('site.common.del_title')}}"><i class="icon-trash"></i></a>
                                                    @endif
                                            </span>
                                            </div>
                                        </div>

                                        <div class="caption">
                                            <h6 class="no-margin"><a href="#" class="{{$i == 0 ? 'text-blue':'text-default'}}">{{$row['name']}}</a></h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <textarea id="content" name="description" rows="3" style="width: 100%;" class="hidden"></textarea>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="summernote">{!! urldecode($table->description) ?? '' !!}</div>
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

            $('.delInput').click(function () {
                $(this).parents('.gnInput').remove();
            });

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

            //$('.select').select2();

            $('#pes').click(function () {
                var content = $('.summernote').summernote('code');

                $('#content').val(encodeURIComponent(content));

                $('#go_submit').trigger('click');

                //$('#serviceForm').submit();
            });
        });


        $(function () {

            $('#locationSet').val("{{$table->locationID}}");
            $('#venueBooking').val("{{$table->serviceType}}");

            $('#facility').val([{{$facilitys}}]);
            $('#facility').select2();

            $('#rules').val([{{$ruleses}}]);
            $('#rules').select2();

            $('#partyTypes').val([{{$partyType}}]);
            $('#partyTypes').select2();

            $('#vendorID').val({{$table->vendorID}});
            $('#vendorID').select2();

        });



    </script>

@endsection