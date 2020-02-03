<div class="row">
    <div class="col-md-12">
        <div class="panel panel-flat border-top-success">
            <div class="panel-body" style="overflow-x: auto;">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th></th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th class="text-right">Current Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$table->id}}</td>
                            <td>{{$table->status}}</td>
                            <td>{{pub_date($table->created_at)}}</td>
                            <td></td>
                            <td>{{$table->customer['name'] ?? ''}}</td>
                            <td>{{$table->customer['email'] ?? ''}}</td>
                            <td>{{$table->customer['contact'] ?? ''}}</td>
                            <td class="text-right">{{money_c($table->customer['balance']) ?? 0.00}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="panel panel-flat border-top-success">
            <div class="panel-heading">
                <h6 class="panel-title">Service List</h6>
            </div>
            <div class="panel-body" style="overflow-x: auto;">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Service</th>
                        <th>Company</th>
                        <th>Package</th>
                        <th>Qty</th>
                        <th class="text-right">Price</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                            $payment = $table->payment();
                            $i = 1;
                            $services = $table->item()->get();
                            $total_amount = 0;
                            $discount_json = json_decode($table->discount, true);
                            $additionalCost_json = json_decode($table->additionalCost, true);
                            $otherDescription_json = json_decode($table->otherDescription, true);
                    @endphp
                    @foreach($services as $row)
                        @php
                            $package_json = json_decode($row->package, true);
                        @endphp
                        <tr class="{{$row->isComplete != null ? 'text-success' : ''}}">
                            <td>{{$i}}</td>
                            <td>{{pub_date($row->serviceDate)}}</td>
                            <td>{{$row->time_slot['name'] ?? ''}} ({{date('ha', strtotime($row->time_slot['fromTime']))}}-{{date('ha', strtotime($row->time_slot['toTime']))}})</td>
                            <td>{{$row->service['serviceType'] ?? ''}}</td>
                            <td>{{$row->service['name'] ?? ''}}</td>
                            <td>
                                <b class="m-0">{{$package_json['name'] ?? ''}}</b> <small class="text-grey-300">({{$package_json['item']}})</small>
                            </td>
                            <td>{{$row->qty}}</td>
                            <td class="text-right">{{money_c($row->pricing)}}</td>
                            <td class="text-right">{{money_c($row->pricing * $row->qty)}}</td>
                        </tr>
                        @php
                            $total_amount += ($row->pricing * $row->qty);
                            $i++;
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-right" colspan="8">Total</th>
                            <th class="text-right">{{money_c($total_amount)}}</th>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="9"></th>
                        </tr>
                        <tr>
                            <th colspan="6">{{$discount_json['description']}}</th>
                            <th>{{$discount_json['types']}}</th>
                            <th class="text-right">Discount</th>
                            <th class="text-right">{{money_c($discount_json['amount'])}}</th>
                        </tr>
                        <tr>
                            <th colspan="6">{{$additionalCost_json['description']}}</th>
                            <th>{{$additionalCost_json['types']}}</th>
                            <th class="text-right">Other Cost</th>
                            <th class="text-right">{{money_c($additionalCost_json['amount'])}}</th>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="8">Sub Total</th>
                            <th class="text-right">{{money_c($total_amount + $discount_json['amount'] -  $discount_json['amount'])}}</th>
                        </tr>
                        <tr>
                            <td colspan="9">{{$otherDescription_json['otherInformation'] ?? ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><b>Admin Note: </b>{{$otherDescription_json['notesAdmin'] ?? ''}}</p>
                                <p><b>Other Note:</b> {{$otherDescription_json['refund'] ?? ''}}</p>
                            </td>
                        </tr>
                        <tr>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-flat border-top-success">
            <div class="panel-heading">
                <h6 class="panel-title">Payment Information</h6>
            </div>
            <div class="panel-body" style="overflow-x: auto;">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Pay Type</th>
                        <th>Pay Method</th>
                        <th>Description</th>
                        <th>IN</th>
                        <th>OUT</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $balance = 0;
                    @endphp
                    @foreach($payment as $row)
                        @php
                            $payDescription_json = json_decode($row->payDescription, true);
                        @endphp
                    <tr>
                        <td>{{pub_date($row->created_at)}}</td>
                        <td>{{$row->payType}}</td>
                        <td>{{$row->payMethod}}</td>
                        <td>
                            <p class="no-margin">{{$payDescription_json['payMethod'] ?? ''}}</p>
                            <p class="no-margin">{{$payDescription_json['cardType'] ?? ''}}</p>
                            <p class="no-margin">{{$payDescription_json['bankName'] ?? ''}}</p>
                            <p class="no-margin">{{$payDescription_json['slipNo'] ?? ''}}</p>
                            <p class="no-margin">{{$payDescription_json['bkashNo'] ?? ''}}</p>
                            <p class="no-margin">{{$payDescription_json['rocketNo'] ?? ''}}</p>
                        </td>
                        <td>{{money_c($row->amountIN)}}</td>
                        <td>{{money_c($row->amountOUT)}}</td>
                        @php
                            $balance += ($row->amountIN - $row->amountOUT);
                        @endphp
                        <td>{{money_c($balance)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-right" colspan="6">Total Payment</th>
                            <th>{{money_c($balance)}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
