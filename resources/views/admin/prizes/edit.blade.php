{{-- @php
dd($prize);
@endphp --}}
@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.navbars.auth.topnav', ['title' => ' Edit Prize'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        {{-- <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('assets/admin/images/team-1.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->name ?? 'Firstname' }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Public Relations
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                    <i class="ni ni-app"></i>
                                    <span class="ms-2">App</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-email-83"></i>
                                    <span class="ms-2">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="ms-2">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div id="alert">
        @include('admin.components.alert')
    </div>
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card">
                    <form role="form" method="POST" action="{{ route('admin.prizes.update', $prize->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0  flex-grow-1">Edit prize</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">	Prize Type</label>
                                        <input class="form-control" type="text" name="prize_type" value="{{ old('prize_type',$prize->prize_type) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">	Prize Number</label>
                                        <input class="form-control" type="text" name="prize_number" value="{{ old('prize_number',$prize->prize_number) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="assigned" class="form-control-label">Assigned</label>
                                        <select class="form-control" id="assigned" name="assigned">
                                            <option value="" {{ $prize->assigned === null ? 'selected' : '' }}>--Select--</option>
                                            <option value="true" {{ $prize->assigned == 'true' ? 'selected' : '' }}>true</option>
                                            <option value="false" {{ $prize->assigned == 'false' ? 'selected' : '' }}>false</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirmed" class="form-control-label">Confirmed</label>
                                        <select class="form-control" id="confirmed" name="confirmed">
                                            <option value="" {{ $prize->confirmed === null ? 'selected' : '' }}>--Select--</option>
                                            <option value="true" {{ $prize->confirmed === 'true' ? 'selected' : '' }}>true</option>
                                            <option value="false" {{ $prize->confirmed === 'false' ? 'selected' : '' }}>false</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                
                                
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
