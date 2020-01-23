<a href="#login-modal" class="login-modal-btn">
    <i class="fas fa-lock"></i>
    Login
</a>
<div id="login-modal" class="reglog-modal-wrapper mfp-hide clearfix" style="background-image: url({{asset('public/frontend/assets/images/login-modal-bg.jpg')}});">
    <div class="overlay-black clearfix">
        <!-- rightside-content - start -->
        <div class="rightside-content text-center">

            <div class="mb-30">
                <h2 class="form-title title-large white-color">Account <strong>Login</strong></h2>
                <span class="form-subtitle white-color">Login to our website, or <a href="#register-modal" ><strong>REGISTER</strong></a></span>
            </div>


            <div class="or-text mb-30">
                <span>or sign in</span>
            </div>

            <div class="login-form text-center mb-50">
                <form action="#!">
                    <div class="form-item">
                        <input type="email" placeholder="example@gmail.com">
                    </div>
                    <div class="form-item">
                        <input type="password" placeholder="Password">
                    </div>
                    <button type="submit" class="login-btn">login now</button>
                </form>
            </div>

            <div class="bottom-text white-color">
                <p class="m-0">
                    * Denotes mandatory field.
                </p>
                <p class="m-0">** At least one telephone number is required.</p>
            </div>

        </div>
        <!-- rightside-content - end -->

        <a class="popup-modal-dismiss" href="#!">
            <i class="fas fa-times"></i>
        </a>

    </div>
</div>