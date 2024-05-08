@extends('layouts.app')

@section('content')

<div id="page1" class="page">

    <div class="preloader">
        <div class="page-tow-bg">
            <div class="header fullwidth">
                <div class="wrapper">
                    <div class="head-inn fullwidth text-center">
                        <a href="https://www.jagershop.co.uk">
                            <img src="{{ asset('assets/image/logo.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="loading-sec fullwidth">
                <div class="wrapper">
                    <div class="lading-main">
                        <h1>Loading</h1>
                    </div>
                    <div class="progressBarcontainer">
                        <div class="progressBarValue ht"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-tow-bg fullwidth">
        <div class="header fullwidth">
            <div class="wrapper">
                <div class="head-inn fullwidth text-center">
                    <a href="https://www.jagershop.co.uk">
                        <img src="{{ asset('assets/image/logo.svg') }}" alt="" />
                    </a>
                </div>
            </div>
        </div>

        <div class="hero-sec fullwidth">
            <div class="wrapper">
                <div class="heading-text">
                    <h1>Score big with jägermeister</h1>
                </div>
            </div>
        </div>

        <div class="prize-sec fullwidth">
            <div class="wrapper">
                <div class="prize-main fullwidth">
                    <div class="prize-title">
                        <h6>
                            Score your penalty to win a selection of fantastic prizes
                            including:
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="ticket-image">
      <img src="./image/ticket-image.png" alt="">
  </div> -->

        <div class="prize-col fullwidth">
            <div class="wrapper">
                <div class="prize-col-main">
                    <div class="prize-box">
                        <div class="prize-image">
                            <img src="{{ asset('assets/image/Group129.png') }}" alt="" />
                        </div>
                        <div class="prize-content">
                            <h5>Prize 1</h5>
                            <div class="prize-col-text">
                                <p>3 Pairs of football tickets</p>
                            </div>
                        </div>
                    </div>
                    <div class="prize-box">
                        <div class="prize-image">
                            <img src="{{ asset('assets/image/shirts.png') }}" alt="" />
                        </div>
                        <div class="prize-content">
                            <h5>Prize 2</h5>
                            <div class="prize-col-text">
                                <p>200 Jägermeister football shirts</p>
                            </div>
                        </div>
                    </div>
                    <div class="prize-box">
                        <div class="prize-image">
                            <img src="{{ asset('assets/image/scarf1.png') }}" alt="" />
                        </div>
                        <div class="prize-content">
                            <h5>Prize 3</h5>
                            <div class="prize-col-text">
                                <p>100 Jägermeister football scarves</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="terms-sec fullwidth">
            <div class="wrapper">
                <div class="terms-main">
                        <div class="checkbox">
                            <label for="enough">
                                <input type="checkbox" id="enough" name="" value="enter" />
                                <span class="checkmark"></span>
                                I am old enough
                            </label>
                        </div>
                        <a  href="{{ route('initial') }}">
                        <button id="myButton" class="btn nextButton1" disabled>enter</button>
                        </a>
                    <div class="terms-text">
                        <p>
                            Terms and conditions apply
                            <span>Visit <a href="#">jgr.ms/footballtandc</a> for details</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer fullwidth">
            <div class="wrapper">
                <div class="footer-logo">
                    <img src="{{ asset('assets/image/footer-logo.svg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

