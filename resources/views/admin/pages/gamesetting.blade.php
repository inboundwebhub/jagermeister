@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.navbars.auth.topnav', ['title' => 'Game Setting'])
    @php
    $general = gs();
    $game_setting = $general->game_setting;
    @endphp
    <div id="alert">
        @include('admin.components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
            
                <div class="card">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Game Setting</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mt-2 mb-5 d-flex">
                                <h6 class="mb-0">Game Stop</h6>
                                <div class="form-check form-switch ps-0 ms-3">
                                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="game_setting" name="game_setting" value="1" @if($game_setting == '1') {{ 'checked'}} @endif >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('admin.layouts.footers.auth.footer')
    </div>
@endsection
