@extends('layouts.app')

@section('content')

<div class="thanks-bg fullwidth">

    <div class="header fullwidth">
        <div class="wrapper">
            <div class="head-inn fullwidth text-center">
                <a href="https://www.jagershop.co.uk">
                    <img src="{{ asset('assets/image/logo.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="thanks-hero-sec fullwidth">
        <div class="wrapper">
            <div class="thank-hero-main sec-center">
                <div class="heading-text details thanks">
                    <h1>Thanks for <span>stepping up</span></h1>
                </div>
                <div class="prize-title details">
                    <h6>Here’s a little something off your <span>next Jäger order.</span></h6>
                </div>

                <div class="terms-main thanks">
                    <h6>Your £5 off voucher code</h6>

                    <div class="copy-box">
                        <div class="copy-nbr" id="p1">5offjager</div>
                        <button class="click-box" onclick="copyToClipboard('#p1')" title="Copy Code"> Copy Code <div class="copy-code">copied</div> </button>

                    </div>

                    <div class="details-btn close congrates-btn">
                        <a href="https://www.jagershop.co.uk/">Visit the shop</a>
                    </div>
                    <div class="terms-text">
                        <p>Terms and conditions apply <span>Visit <a href="#">jgr.ms/footballtandc</a> for
                                details</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection     
