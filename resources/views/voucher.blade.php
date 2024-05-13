@extends('layouts.app')

@section('content')
<div class="congrats-bg fullwidth">

<div class="header fullwidth">
    <div class="wrapper">
        <div class="head-inn fullwidth text-center">
            <a href="https://www.jagershop.co.uk">
                <img src="{{ asset('assets/image/logo.svg') }}" alt="">
            </a>
        </div>
    </div>
</div>

<div class="congrates-sec fullwidth">
    <div class="wrapper">
        <div class="congrates-main sec-center">
            <div class="gift-image">
                <img src="{{ asset('assets/image/voucher-image.png') }}" alt="">
            </div>
            <h1>Congrats!</h1>
            <div class="congrates-txt">
                <p>You’ve won £5 off your next order <span>at the Jägermeister shop.</span></p>
            </div>
            <div class="details-btn close congrates-btn">
                <a href="{{route('vouchers')}}">Claim your voucher</a>
            </div>
            <div class="terms-text">
                <p>Terms and conditions apply <span>Visit <a href="#">jgr.ms/footballtandc</a> for
                        details</span></p>
            </div>
        </div>
    </div>
</div>


@endsection