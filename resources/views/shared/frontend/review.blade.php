<div id="login-modal" class="reglog-modal-wrapper mfp-hide clearfix" style="background-image: url({{asset('public/frontend/assets/images/login-modal-bg.jpg')}});">
    <div class="overlay-black clearfix">
        <!-- rightside-content - start -->
        <div class="rightside-content text-center">

            <div class="mb-30">
                <h2 class="form-title title-large white-color">Service <strong>Review</strong></h2>
            </div>


            <div class="or-text mb-30">
                <span>post your valuable review</span>
            </div>

            <div class="login-form text-center mb-50">
                <form id="reviewForm" action="{{route('front.review-save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="userID" value="{{Auth::user()->id}}">
                    <input type="hidden" name="serviceID">
                    <input type="hidden" name="bookingID">
                    <div class="form-item">
                        <input type="number" name="rating" min="1" max="5" step="any" placeholder="Rating 1 to 5" required>
                    </div>
                    <div class="form-item">
                        <input type="text" name="comment" placeholder="Comment">
                    </div>
                    <button type="submit" class="login-btn">review now</button>
                </form>
            </div>
        </div>
        <!-- rightside-content - end -->

        <a class="popup-modal-dismiss" href="#!">
            <i class="fas fa-times"></i>
        </a>

    </div>
</div>