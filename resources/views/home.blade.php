@extends('layouts.app')

@section('content')

<style type="text/css">
    body {
        background-image: url("{{ asset('assets/images/background.png') }}") ;
    }
    .site_logo {
        width: 250px;
    }
    .center-checkbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
    .site-btn {
        background-color: #dd5a12;
        border-color: #dd5a12;
        padding: 12px 100px;
        font-weight: bold;
    }
    .site-btn.disabled, .site-btn:disabled {
        pointer-events: none;
        background-color: #223f2e;
        border-color: #223f2e;
        opacity: 0.7;
    }
    .custom_box-border {
        border: 2px solid #dd5a12;
        border-radius: 15px;
    }
    a {
        color: #dd5a12;
        text-decoration: none;
        transition: all 0.4s ease-in-out;
        -moz-transition: all 0.4s ease-in-out;
        -webkit-transition: all 0.4s ease-in-out;
        -o-transition: all 0.4s ease-in-out;
    }
    .custom-control {
        color:#fff;
        background-color: transparent;
        border: 2px solid #fff;
        height: 60px;
    }
   .custom-control::placeholder {
        color: #fff; /* Change the color here */
    }
    .details_form_buttom_section {
        background-color: #e9e3c7;
        border-radius: 15px;
    } 
    .text-green {
        color: #0D2B20;
    }  
</style>
<div class="full_site_bagorund">
    <div class="container pt-5 pb-5">
        <div class="row  justify-content-center">
            <div class="col-md-12 text-center">
                <img src="{{ asset('assets/images/logo.png') }}" class="site_logo img-fluid">
            </div>
            <div class="col-12 col-md-5" id="form_one_age">
                <div class="mt-3">
                    <h1 class="text-uppercase text-center text-white">Score big with jägermeister</h1>
                </div>
                <div class="mt-3">
                    <h5 class="text-uppercase text-center text-white">Score your penalty to win a selection of fantastic prizes including:</h5>
                </div>
                <div>
                    <img src="{{ asset('assets/images/group_img.png') }}" class="img-fluid">
                </div>
                <div class="p-3 custom_box-border">
                    <div class="mb-3 form-check text-uppercase center-checkbox">
                        <input type="checkbox" class="form-check-input" id="ageconfirm">
                        <label class="form-check-label text-white ms-2 age_confirm" for="ageconfirm">I AM OLD ENOUGH</label>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary site-btn w-100 shadow " id="check_age" disabled>ENTER</button>
                    </div>
                   
                    <div class="h5 text-white text-uppercase text-center mt-3">Terms and conditions apply</div>
                    <p class="text-white text-uppercase text-center">Visit <a>jgr.ms/footballtandc</a> for details</p>
                </div>
                <div class="mt-3 text-center">
                    <img src="{{ asset('assets/images/jm_img.png') }}" class="img-fluid jm_img">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-5 d-none" id="form_two_details">
                <div class="mt-3">
                    <h1 class="text-uppercase text-center text-white">Enter your details</h1>
                </div>
                <div class="mt-3">
                    <h5 class="text-uppercase text-center text-white">To get your name on the team sheet, enter the following details.</h5>
                </div>
                
                <div>
                    <form method="POST" action="{{ route('adduser') }}">
                         @csrf
                        <div class="row g-3">
                          <div class="col-md-6 mb-3">
                            <input type="text" class="form-control custom-control" placeholder="First name" aria-label="First name">
                          </div>
                          <div class="col-md-6 mb-3">
                            <input type="text" class="form-control custom-control" placeholder="Last name" aria-label="Last name">
                          </div>
                          <div class="col-md-12 mb-3">
                            <input type="email" class="form-control custom-control" placeholder="Email Address" aria-label="First name">
                          </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary site-btn w-100 shadow">SETP UP AND TAKE YOUR SHOT</button>
                        </div>
                    </form>
                    <div class="details_form_buttom_section p-3 mt-3">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('assets/images/Layer_1.png') }}" class="img-fluid">
                            </div>
                            <div class="col">
                                <div class="h5 text-green text-uppercase">keep your proof of purchase</div>
                                 <p class="text-green ">To claim your prize you must have proof of receipt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="h5 text-white text-uppercase text-center mt-3">Having issues? Please contact:</div>
                    <p class="text-white text-uppercase text-center"><a href="mailto:marketing@jaegermeister.co.uk">marketing@jaegermeister.co.uk</p>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
jQuery(document).ready(function($) {
     $('#ageconfirm').change(function(){
        if(this.checked){
           $('#check_age').prop('disabled', false); 
        } else {
           $('#check_age').prop('disabled', true); 
        }
    });
    jQuery(document).on('click', '#check_age', function(event) {
         event.preventDefault();
         /* Act on the event */
         $('#form_one_age').addClass('d-none');
         $('#form_two_details').removeClass('d-none');
        
    }); 
});
</script>


@endsection