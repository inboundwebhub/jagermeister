@extends('layouts.app')

@section('content')
<div class="page-tow-bg fullwidth">

    <div class="header fullwidth">
        <div class="wrapper">
            <div class="head-inn fullwidth text-center">
                <a href="https://www.jagershop.co.uk">
                    <img src="{{ asset('assets/image/logo.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="congrates-sec unlucky fullwidth">
        <div class="wrapper">
            <div class="congrates-main sec-center">
                <!-- <div class="gift-image">
                    <img src="./image/voucher-image.png" alt="">
                </div> -->
                <h1>Unlucky!</h1>
                <div class="congrates-txt">
                    <p>Thank you for participating!<span>While you didn't win a prize this</span> <span>time, feel
                            free to explore the</span> <span>Jägermeister shop for more</span>great items. </p>
                </div>
                <div class="details-btn close congrates-btn">
                    <a href="#">Visit the shop</a>
                </div>
                <div class="terms-text">
                    <p>Terms and conditions apply <span>Visit <a href="#">jgr.ms/footballtandc</a> for
                            details</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection