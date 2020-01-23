<form action="{{route('front.add-cart')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="serviceID" value="{{$table->id}}">
    <div class="form-item">
        <input type="date" name="bookingDate" placeholder="dd/mm/yyyy" value="{{$bookingDate}}" required>
    </div>
    <div class="form-item">
        <select name="timeSlotID" required>
            <option selected="">Time Slot</option>
            @foreach($time_slot as $row)
                <option value="{{$row->id}}" {{$row->id == $timeSlotID ? 'selected':''}}>{{$row->name}} ({{date('h a', strtotime($row->fromTime))}} - {{date('h a', strtotime($row->toTime))}})</option>
            @endforeach
        </select>
    </div>
    <div class="form-item">
        <select name="partyType" required>
            <option selected="">Party type</option>
            @foreach($party_type as $row)
                <option value="{{$row->id}}" {{$row->id == $partyType ? 'selected':''}}>{{$row->name}}</option>
            @endforeach
        </select>
    </div>
    @if($table->serviceType == 'Venue Booking' || $table->serviceType == 'Food & Catering' || $table->serviceType == 'Event Planer' )
    <div class="form-item">
        <input type="number" name="guestNumber" placeholder="Number of guest" min="{{$table->minGuest ?? 0}}" max="{{$table->maxGuest}}" value="{{$guestNumber}}" required>
    </div>
    @endif

    @php
        $pricing = json_decode($table->pricing, true);
    @endphp

    <div style="max-height: 185px; overflow-y: auto;">

    @foreach($pricing as $i => $row)
        <div class="form-check" style="text-align: left;">
            <input type="radio" name="pricing" class="form-check-input" value="{{$row['price']}}, {{$i}}" id="exampleCheck{{$i}}" required>
            <label class="form-check-label" style="color: #0a001f;" for="exampleCheck{{$i}}">{{$row['name'] ?? ''}} | {{$row['item'] ?? ''}} | <i class="fas fa-dollar-sign"></i> {{money_c($row['price']) ?? '0.00'}}</label>
        </div>

    @endforeach
    </div>

    <button type="submit" class="login-btn">Order now</button>
</form>
