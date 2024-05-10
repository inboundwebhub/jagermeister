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
    <div class="congrates-sec shirt fullwidth">
        <div class="wrapper">
            <div class="congrates-main sec-center">
                <div class="gift-image">
                    <img src="{{ asset('assets/image/Jager-Kit-2.png') }}" alt="">
                </div>
                <h1>Congrats!</h1>
                <div class="congrates-txt">
                    <p>This shirts got your name on it!<span>You’ve won a limited edition</span> Jägermeister
                        football shirt.</p>
                </div>
                <div class="details-btn close congrates-btn">
                    <a href="{{ route('tshirt-form') }}">claim you prize</a>
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