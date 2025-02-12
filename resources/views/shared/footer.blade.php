<!-- Danger modal -->
<div id="credit_show_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body text-center">
                <img src="{{asset('public/product_logo.png')}}">
                <p class="m-0 text-muted text-size-large">Version: {{config('naz.version')}}</p>
                <h3 class="mb-0">Credit</h3>
                <p class="m-0">Nazmul Hossain</p>

                <p class="mb-0 mt-15">Copyright © {{date('Y')}} © Infinity Flame Soft</p>

                <hr>

                <img src="{{asset('public/ifslogo.png')}}" style="width: 200px;">
                <h2 class="text-center mb-5">Infinity Flame Soft</h2>
                <address class="m-0">
                    417-420 No, Rongmohol Tower, 3rd Floor, Bandar Bazar
                    Sylhet. Bangladesh.
                </address>
                <p class="m-0"><strong>Contact:</strong> <a href="tel:+8801675870047">+8801675870047</a></p>
                <p class="m-0"><strong>Email: </strong><a href="mailto:info@infinityglamesoft.com" target="_top">info@infinityglamesoft.com</a> </p>
                <p class="m-0"><strong>Website:</strong> <a href="http://infinityflamesoft.com" target="_blank">www.infinityflamesoft.com</a></p>

            </div>

        </div>
    </div>
</div>
<!-- /default modal -->

<div class="footer text-muted" style="left: 20px; right: 20px;">

    <div class="row">
        <div class="col-xs-8">
            <span>Copyright © {{date('Y')}} © <a href="http://www.infinityflamesoft.com/" target="_blank">Infinity Flame Soft</a>. All rights reserved.</span>
            <span>Help Line: +8801675 870047</span></div>
        <div class="col-xs-4 text-right"><span>iBooking Version: {{config('naz.version')}} | <a href="#" data-toggle="modal" data-target="#credit_show_modal">Credit</a></span></div>
    </div>


</div>