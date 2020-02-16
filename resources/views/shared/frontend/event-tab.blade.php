
<div id="absolute-eventmake-section" class="absolute-eventmake-section sec-ptb-100 bg-gray-light clearfix">
    <div class="eventmaking-wrapper">
        <ul class="nav eventmake-tabs">
            <li>
                <a id="aBook" class="active" data-toggle="tab" href="#venuebooking">
                    <i class="fas fa-university"></i>
                    venue
                </a>
            </li>

            <li>
                <a id="bBook" data-toggle="tab" href="#foodctaering">
                    <i class="fas fa-utensils"></i>
                    catering
                </a>
            </li>

            <li>
                <a id="cBook" data-toggle="tab" href="#photographer">
                    <i class="fas fa-video"></i>
                    photographer
                </a>
            </li>
            <li>
                <a id="dBook" data-toggle="tab" href="#makeupartist">
                    <i class="fas fa-magic"></i>
                    makeup art
                </a>
            </li>

            <li>
                <a id="eBook" data-toggle="tab" href="#hennaartist">
                    <i class="fas fa-leaf"></i>
                    henna art
                </a>
            </li>

            <li>
                <a id="fBook" data-toggle="tab" href="#eventplanner">
                    <i class="fas fa-gem"></i>
                    event planner
                </a>
            </li>

            <li>
                <a id="gBook" data-toggle="tab" href="#invitationcard">
                    <i class="fas fa-envelope"></i>
                    invitation card
                </a>
            </li>


        </ul>

        <div class="tab-content">
            <div id="venuebooking" class="tab-pane fade in active show">
                <form action="{{route('front.search')}}" method="get" autocomplete="off">
                    <input type="hidden" name="searchType" value="Venue">
                    <input type="hidden" name="serviceType" value="Venue Booking">
                    <ul class="mb-1">
                        <li>
                            <select class="citySet" type="text" name="city" required>
                                @foreach($city as $row)
                                    <option value="{{$row->city}}">{{$row->city}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <select type="text" class="locationSet" name="locationID" required>
                                @foreach($location as $row)
                                    <option data-city="{{$row->city}}" value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                    <ul>

                        <li>
                            <input name="bookingDate" type="text" id="datepic1" placeholder="Select Date" required/>
                        </li>

                        <li>
                            <select name="timeSlot" class="country-select" required>
                                <option value="">Time Select</option>
                                @foreach($time_slot as $row)
                                    <option value="{{$row->id}}">{{$row->name}} ({{date('h a', strtotime($row->fromTime))}} - {{date('h a', strtotime($row->toTime))}})</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <select name="partyType" class="capital-select" required>
                                <option value="">Party Type</option>
                                @foreach($party_type as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <input name="guestNumber" type="number" min="0" placeholder="Number of Guest" required>
                        </li>
                        <li>
                            <button type="submit" class="custom-btn">search venue</button>
                        </li>

                    </ul>
                </form>
            </div>

            <div id="foodctaering" class="tab-pane fade">
                <form action="{{route('front.search')}}" method="get" autocomplete="off">
                    <input type="hidden" name="searchType" value="Food & Catering">
                    <input type="hidden" name="serviceType" value="Food & Catering">
                    <ul class="mb-1">
                        <li>
                            <select class="citySet" type="text" name="city" required>
                                @foreach($city as $row)
                                    <option value="{{$row->city}}">{{$row->city}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <select type="text" class="locationSet" name="locationID" required>
                                @foreach($location as $row)
                                    <option data-city="{{$row->city}}" value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                    <ul>

                        <li>
                            <input name="bookingDate" type="text" id="datepic2" placeholder="Select Date" required/>
                        </li>

                        <li>
                            <select name="timeSlot" class="country-select" required>
                                <option value="">Time Select</option>
                                @foreach($time_slot as $row)
                                    <option value="{{$row->id}}">{{$row->name}} ({{date('h a', strtotime($row->fromTime))}} - {{date('h a', strtotime($row->toTime))}})</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <select name="partyType" class="capital-select" required>
                                <option value="">Party Type</option>
                                @foreach($party_type as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <input name="guestNumber" type="number" min="0" placeholder="Number of Guest" required>
                        </li>
                        <li>
                            <button type="submit" class="custom-btn">search catering</button>
                        </li>

                    </ul>
                </form>
            </div>

            <div id="photographer" class="tab-pane fade">
                <form action="{{route('front.search')}}" method="get" autocomplete="off">
                    <input type="hidden" name="searchType" value="Photographer">
                    <input type="hidden" name="serviceType" value="Photographer">
                    <ul class="mb-1">
                        <li>
                            <select class="citySet" type="text" name="city" required>
                                @foreach($city as $row)
                                    <option value="{{$row->city}}">{{$row->city}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <select type="text" class="locationSet" name="locationID" required>
                                @foreach($location as $row)
                                    <option data-city="{{$row->city}}" value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                    <ul>

                        <li>
                            <input name="bookingDate" type="text" id="datepic3" placeholder="Select Date" required/>
                        </li>

                        <li>
                            <select name="timeSlot" class="country-select" required>
                                <option value="">Time Select</option>
                                @foreach($time_slot as $row)
                                    <option value="{{$row->id}}">{{$row->name}} ({{date('h a', strtotime($row->fromTime))}} - {{date('h a', strtotime($row->toTime))}})</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <select name="partyType" class="capital-select" required>
                                <option value="">Party Type</option>
                                @foreach($party_type as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li style="width: 38%;">
                            <button type="submit" class="custom-btn">photographer search</button>
                        </li>

                    </ul>
                </form>
            </div>

            <div id="makeupartist" class="tab-pane fade">
                <form action="{{route('front.search')}}" method="get" autocomplete="off">
                    <input type="hidden" name="searchType" value="Makeup Artist">
                    <input type="hidden" name="serviceType" value="Makeup Artist">
                    <ul class="mb-1">
                        <li>
                            <select class="citySet" type="text" name="city" required>
                                @foreach($city as $row)
                                    <option value="{{$row->city}}">{{$row->city}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <select type="text" class="locationSet" name="locationID" required>
                                @foreach($location as $row)
                                    <option data-city="{{$row->city}}" value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                    <ul>

                        <li>
                            <input name="bookingDate" type="text" id="datepic4" placeholder="Select Date" required/>
                        </li>

                        <li>
                            <select name="timeSlot" class="country-select" required>
                                <option value="">Time Select</option>
                                @foreach($time_slot as $row)
                                    <option value="{{$row->id}}">{{$row->name}} ({{date('h a', strtotime($row->fromTime))}} - {{date('h a', strtotime($row->toTime))}})</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <select name="partyType" class="capital-select" required>
                                <option value="">Party Type</option>
                                @foreach($party_type as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li style="width: 38%;">
                            <button type="submit" class="custom-btn">makeup artist search</button>
                        </li>

                    </ul>
                </form>
            </div>

            <div id="hennaartist" class="tab-pane fade">
                <form action="{{route('front.search')}}" method="get" autocomplete="off">
                    <input type="hidden" name="searchType" value="Henna Artist">
                    <input type="hidden" name="serviceType" value="Henna Artist">
                    <ul class="mb-1">
                        <li>
                            <select class="citySet" type="text" name="city" required>
                                @foreach($city as $row)
                                    <option value="{{$row->city}}">{{$row->city}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <select type="text" class="locationSet" name="locationID" required>
                                @foreach($location as $row)
                                    <option data-city="{{$row->city}}" value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                    <ul>

                        <li>
                            <input name="bookingDate" type="text" id="datepic5" placeholder="Select Date" required/>
                        </li>

                        <li>
                            <select name="timeSlot" class="country-select" required>
                                <option value="">Time Select</option>
                                @foreach($time_slot as $row)
                                    <option value="{{$row->id}}">{{$row->name}} ({{date('h a', strtotime($row->fromTime))}} - {{date('h a', strtotime($row->toTime))}})</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <select name="partyType" class="capital-select" required>
                                <option value="">Party Type</option>
                                @foreach($party_type as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li style="width: 38%;">
                            <button type="submit" class="custom-btn">henna artist search</button>
                        </li>

                    </ul>
                </form>
            </div>

            <div id="eventplanner" class="tab-pane fade">
                <form action="{{route('front.search')}}" method="get" autocomplete="off">
                    <input type="hidden" name="searchType" value="Event Planer">
                    <input type="hidden" name="serviceType" value="Event Planer">
                    <ul class="mb-1">
                        <li>
                            <select class="citySet" type="text" name="city" required>
                                @foreach($city as $row)
                                    <option value="{{$row->city}}">{{$row->city}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <select type="text" class="locationSet" name="locationID" required>
                                @foreach($location as $row)
                                    <option data-city="{{$row->city}}" value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                    <ul>

                        <li>
                            <input name="bookingDate" type="text" id="datepic6" placeholder="Select Date" required/>
                        </li>

                        <li>
                            <select name="timeSlot" class="country-select" required>
                                <option value="">Time Select</option>
                                @foreach($time_slot as $row)
                                    <option value="{{$row->id}}">{{$row->name}} ({{date('h a', strtotime($row->fromTime))}} - {{date('h a', strtotime($row->toTime))}})</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <select name="partyType" class="capital-select" required>
                                <option value="">Party Type</option>
                                @foreach($party_type as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <input name="guestNumber" type="number" min="0" placeholder="Number of Guest" required>
                        </li>
                        <li>
                            <button type="submit" class="custom-btn">search</button>
                        </li>

                    </ul>
                </form>
            </div>

            <div id="invitationcard" class="tab-pane fade">
                <form action="{{route('front.search')}}" method="get" autocomplete="off">
                    <input type="hidden" name="searchType" value="Invitation Card">
                    <input type="hidden" name="serviceType" value="Invitation Card">
                    <ul>

                        <li>
                            <select class="citySet" type="text" name="city" required>
                                @foreach($city as $row)
                                    <option value="{{$row->city}}">{{$row->city}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <select type="text" class="locationSet" name="locationID" required>
                                @foreach($location as $row)
                                    <option data-city="{{$row->city}}" value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li>
                            <input name="cardNumber" type="number" min="0" placeholder="Number of Card" required>
                        </li>
                        <li>
                            <select name="partyType" class="capital-select" required>
                                <option value="">Party Type</option>
                                @foreach($party_type as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <button type="submit" class="custom-btn">search</button>
                        </li>

                    </ul>
                </form>
            </div>


            <!--<div class="top-event-location">
                <span class="title-text">TOP SEARCH <strong>EVENT LOCATION:</strong></span>
                <ul>

                    <li><strong>Jakarta</strong> Indonesia</li>
                    <li><strong>Paris</strong> Franc</li>
                    <li><strong>Milan</strong> Italia</li>
                    <li><strong>Amsterdam</strong> Netherland</li>
                    <li><strong>Barcelona</strong> Spain</li>
                    <li><strong>Istanbul</strong> Turkey</li>

                </ul>
            </div>-->
        </div>

    </div>
</div>
