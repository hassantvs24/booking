@extends('layouts.frontend')

@section('title')
    Checkout
@endsection

@section('content')

    <!-- breadcrumb-section - start
		================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">
        <div class="jarallax" style="background-image: url({{asset('public/frontend/assets/images/breadcrumb/0.breadcrumb-bg.jpg')}});">
            <div class="overlay-black">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-12 col-sm-12">

                            <!-- breadcrumb-title - start -->
                            <div class="breadcrumb-title text-center mb-50">
                                <h2 class="big-title">checkout</h2>
                            </div>
                            <!-- breadcrumb-title - end -->

                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="{{route('front.home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                                </ul>
                            </div>
                            <!-- breadcrumb-list - end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- booking-section - start
    ================================================== -->
    <section id="booking-section" class="booking-section bg-gray-light sec-ptb-100 clearfix">
        <div class="container">
            <div class="row">

                <!-- booking-content-wrapper - start -->
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="booking-content-wrapper">

                        <!-- reg-info - start -->
                        <div class="reg-info mb-50">

                            <div class="section-title mb-30">
                                <h2 class="big-title">billing <strong>information</strong></h2>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Company</th>
                                                <th>Service</th>
                                                <th>Package</th>
                                                <th>Amount</th>
                                                <th>x</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $total_temp_val = 0;
                                        @endphp
                                        @foreach($temp_cart as $row)
                                            @php
                                                $package_json = json_decode($row->package, true);
                                            //dd($package_json);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <p style="margin: 0px;">{{pub_date($row->serviceDate)}}</p>
                                                    <p style="margin: 0px; color: grey;"><small>{{$row->time_slot['name']}} ({{date('ha', strtotime($row->time_slot['fromTime']))}}-{{date('ha', strtotime($row->time_slot['toTime']))}})</small></p>

                                                </td>
                                                <td>{{$row->services['name']}}</td>
                                                <td>{{$row->services['serviceType']}}</td>
                                                <td>
                                                    <p class="m-0">{{$package_json['name'] ?? ''}}</p>
                                                    <small>{{$package_json['item']}}</small>
                                                </td>
                                                <td>
                                                    <p style="margin: 0px;">{{money_c($row->pricing * $row->qty) ?? 0.00}}</p>
                                                    <p style="margin: 0px; color: grey;"><small>&#36;{{$row->pricing ?? 0}}x{{$row->qty ?? 0}}</small></p>
                                                </td>
                                                <td><a href="{{route('front.del-cart', ['id' => $row->id])}}" onclick='return confirm("{{__('site.common.delete')}}")' title="{{__('site.common.del_title')}}">x</a></td>
                                                @php
                                                    $total_temp_val += ($row->pricing * $row->qty);
                                                @endphp
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-warning text-right">
                                                <th colspan="4">Total</th>
                                                <th>{{money_c($total_temp_val) ?? 0.00}}</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- reg-info - end -->



                        <!-- billing-info - start -->
                        <div class="billing-info mb-50">

                            <!-- section-title - start -->
                            <div class="section-title mb-30">
                                <h2 class="big-title">payment <strong>information</strong></h2>
                            </div>
                            <!-- section-title - end -->

                            <!-- billing-form - start -->
                            <div class="billing-form form-wrapper" style="height: auto;">
                                <form action="{{route('front.checkout-save')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="payAmount" value="{{$total_temp_val ?? 0}}">
                                    @php
                                        $remain_balance = Auth::user()->balance - $total_temp_val;
                                    @endphp
                                    <input type="hidden" id="balance" name="balance" value="{{$remain_balance ?? 0}}">
                                    <div class="form-item">
                                        <select id="payMethod" class="country-select" name="payMethod" required>
                                            <option value="">Select Payment Method First</option>
                                            <option value="Card">Card</option>
                                            <option value="Bank">Bank</option>
                                            <option value="Bkash">Bkash</option>
                                            <option value="Rocket">Rocket</option>
                                            <option value="Account">Account Fund</option>
                                        </select>
                                    </div>

                                    <div id="payForm">&nbsp;</div>

                                    <div class="form-item">
                                        <input name="additionalInformation" placeholder="Additional Information" />
                                    </div><br>


                                    <div class="text-center">
                                        <button id="payNow" type="submit" class="custom-btn">
                                            pay now
                                        </button>
                                    </div>

                                </form>
                            </div>
                            <!-- billing-form - end -->

                        </div>
                        <!-- billing-info - end -->

                    </div>
                </div>
                <!-- booking-content-wrapper - end -->

            <!-- sidebar-section - start -->
            @include('shared.frontend.right-pan')
            <!-- location-wrapper - end -->

            </div>
        </div>
    </section>
    <!-- booking-section - end
    ================================================== -->


@endsection


@section('script')
    <script type="text/javascript">

        $(function () {

            var card = '        <div class="form-item">\n' +
                '                                        <select name="cardType" class="country-select" required>\n' +
                '                                            <option value="">Card Type</option>\n' +
                '                                            <option value="Master Card">Master Card</option>\n' +
                '                                            <option value="Visa Card">Visa Card</option>\n' +
                '                                            <option value="American Express">American Express</option>\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="form-item">\n' +
                '                                        <input name="name" type="text" placeholder="Card holder name" required>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <!-- form-item-group - start -->\n' +
                '                                    <div class="form-item-group">\n' +
                '                                        <ul>\n' +
                '\n' +
                '                                            <li style="width: 60%;">\n' +
                '                                                <div class="form-item">\n' +
                '                                                    <input name="cardNumber" type="text" placeholder="Card Number" required>\n' +
                '                                                </div>\n' +
                '                                            </li>\n' +
                '                                            <li style="width: 23%;">\n' +
                '                                                <div class="form-item">\n' +
                '                                                    <input name="expireDate" type="text" placeholder=" 01/20 Expire Date" required>\n' +
                '                                                </div>\n' +
                '                                            </li>\n' +
                '                                            <li style="width: 15%;">\n' +
                '                                                <div class="form-item">\n' +
                '                                                    <input name="cvv" type="text" placeholder="CVV" required>\n' +
                '                                                </div>\n' +
                '                                            </li>\n' +
                '\n' +
                '                                        </ul>\n' +
                '                                    </div>';


            var bank = '           <div class="form-item">\n' +
                '                                        <input name="bankName" type="text" placeholder="Bank Name" required>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="form-item">\n' +
                '                                        <input name="slipNo" type="text" placeholder="Slip No" required>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="form-item">\n' +
                '                                        <input name="slipFile" type="file" placeholder="Bank Name" accept="image/*" required>\n' +
                '                                    </div>';

            var bkash = '       <div class="form-item">\n' +
                '                                        <input name="bkashNo" type="text" placeholder="Bkash Account No" required>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="form-item">\n' +
                '                                        <input name="transectionID" type="text" placeholder="Transaction ID" required>\n' +
                '                                    </div>';

            var rocket = '       <div class="form-item">\n' +
                '                                        <input name="rocketNo" type="text" placeholder="Rocket Account No" required>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="form-item">\n' +
                '                                        <input name="transectionID" type="text" placeholder="Transaction ID" required>\n' +
                '                                    </div>';
            var acc = '<div class="form-item-group">\n' +
                '                                        <ul>\n' +
                '                                            <li>Require Balance: <b>{{money_c($total_temp_val)}}</b></li>\n' +
                '                                            <li>Found: <b>{{money_c(Auth::user()->balance)}}</b></li>\n' +
                '                                            <li>Remaining: <b>{{money_c(Auth::user()->balance - $total_temp_val)}}</b></li>\n' +
                '                                        </ul>\n' +
                '                                    </div>';

           $('#payMethod').change(function () {
               var paymethod = $(this).val();
               var balance = $('#balance').val();

               if(paymethod == 'Account' && balance < 0){
                   $('#payNow').attr('disabled', 'disabled');
                   $('#payNow').html('Payment Not Possible');

               }else{
                   $('#payNow').removeAttr('disabled');
                   $('#payNow').html('Pay Now');
               }

               //alert(paymethod);

               switch (paymethod) {
                   case 'Card':
                       $('#payForm').html(card);
                       break;
                   case 'Bank':
                       $('#payForm').html(bank);
                       break;
                   case 'Bkash':
                       $('#payForm').html(bkash);
                       break;
                   case 'Rocket':
                       $('#payForm').html(rocket);
                       break;
                   case 'Account':
                       $('#payForm').html(acc);
                       break;
                   case '':
                       $('#payForm').html('&nbsp;');

               }

           });
        });

    </script>
@endsection