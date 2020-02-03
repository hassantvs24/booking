@extends('layouts.frontend')

@section('title')
    Access denied
@endsection

@section('content')

    <!-- error-section - start
		================================================== -->
    <section id="error-section" class="error-section sec-ptb-100 bg-gray-light clearfix">
        <div class="container">
            <div class="row justify-content-center">

                <!-- error-content - start -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="icon">
                        <i class="far fa-frown"></i>
                    </div>
                </div>
                <!-- error-content - end -->

                <!-- error-content - start -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="error-content">
                        <h2>401</h2>
                        <h3>error - access denied</h3>
                        <p class="mb-30">something was wrong. Please contact with website admin.</p>
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}" class="breadcrumb-link">Home</a></li>
                    </div>
                </div>
                <!-- error-content - end -->

            </div>
        </div>
    </section>
    <!-- error-section - end
    ================================================== -->

@endsection


@section('script')
    <script type="text/javascript">



    </script>
@endsection
