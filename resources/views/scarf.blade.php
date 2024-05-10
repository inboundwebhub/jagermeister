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

        <div class="congrates-sec tickets fullwidth">
            <div class="wrapper">
                <div class="congrates-main sec-center">
                    <div class="gift-image">
                        <img src="{{ asset('assets/image/scarf-gift.png') }}" alt="">
                    </div>
                    <h1>Congrats!</h1>
                    <div class="congrates-txt">
                        <p>You’ve won a limited edition Jägermeister football scarf for wearing on the terraces!</p>
                    </div>
                    <div class="details-btn close congrates-btn">
                        <a href="{{route('scarfform')}}">claim you prize</a>
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
