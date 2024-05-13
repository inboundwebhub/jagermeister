@extends('layouts.app')

@section('content')
<div class="full-bg fullwidth">
    <div class="header fullwidth">
        <div class="wrapper">
            <div class="head-inn fullwidth text-center">
                <a href="https://www.jagershop.co.uk">
                    <img src="{{ asset('assets/image/logo.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="hero-sec fullwidth">
        <div class="wrapper">
            <div class="heading-text">
                <h1>Sorry this competition is now closed</h1>
            </div>
        </div>
    </div>
    <div class="prize-sec fullwidth">
        <div class="wrapper">
            <div class="prize-main fullwidth">
                <div class="prize-title close">
                    <h6>Make sure to follow us on social <span>media and stay tuned for thrilling</span> <span>upcoming competitions and exclusive</span>  events with Jägermeister!</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="social-sec fullwidth">
        <div class="wrapper">
            <div class="social-media-main sec-center">
                <div class="social-inner sec-center">
                    <div class="social-link">
                        <a href="https://www.facebook.com/JagermeisterUK">
                            <img src="{{ asset('assets/image/facebook.png') }}" alt="">
                        </a>
                    </div>
                    <div class="social-link">
                        <a href="https://twitter.com/jageruk">
                            <img src="{{ asset('assets/image//twitter.png') }}" alt="">
                        </a>
                    </div>
                    <div class="social-link">
                        <a href="https://www.instagram.com/jagermeisteruk/">
                            <img src="{{ asset('assets/image/instagram.png') }}" alt="">
                        </a>
                    </div>
                    <div class="social-link">
                        <a href="https://www.youtube.com/user/JagerUK">
                            <img src="{{ asset('assets/image/youtube.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="details-btn close">
                    <a href="https://www.jagershop.co.uk/">Visit the shop</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer fullwidth">
        <div class="wrapper">
            <div class="footer-logo">
                <img src="{{ asset('assets/image/footer-logo.svg') }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
