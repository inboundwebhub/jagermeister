@extends('layouts.app')
@push('style')
<style type="text/css">
    .image-selected .file-input__label{
        background-color: #76b82a;
    } 
</style>
@endpush
@section('content')
<div class="claim-prize-bg fullwidth">

    <div class="header fullwidth">
        <div class="wrapper">
            <div class="head-inn fullwidth text-center">
                <a href="https://www.jagershop.co.uk">
                    <img src="{{ asset('assets/image/logo.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="claim-prize-hero-sec fullwidth">
        <div class="wrapper">
            <div class="thank-hero-main sec-center">
                <div class="heading-text details thanks">
                    <h1>Enter Your <span>details</span></h1>
                </div>
                <div class="prize-title details">
                    <h6>Because you’ve won a main prize, we just need to know a little bit more.</h6>
                </div>
                <form action="{{route('add-detail')}}" id="add_form_code" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="your-details-form">
                        <div class="single-col">
                            <input type="text" name="address_line1" placeholder="Address Line 1">
                            <input type="hidden" name="image_name" id="image_name">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="address_line1-error" class="hs-error-msg hs-main-font-element" for="address_line_1"></label>
                                </li>
                            </ul>
                        </div>
                        <div class="single-col">
                            <input type="text" name="address_line2" placeholder="Address Line 2">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="address_line2-error" class="hs-error-msg hs-main-font-element" for="address_line_2"></label>
                                </li>
                            </ul>
                        </div>
                        <div class="single-col">
                            <input type="text" name="town" placeholder="Town">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="town-error" class="hs-error-msg hs-main-font-element" for="town"></label>
                                </li>
                            </ul>
                        </div>
                        <div class="single-col">
                            <input type="text" name="city" placeholder="City">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="city-error" class="hs-error-msg hs-main-font-element" for="city"></label>
                                </li>
                            </ul>
                        </div>
                        <div class="single-col">
                            <input type="number" name="postcode" placeholder="Postcode">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="postcode-error" class="hs-error-msg hs-main-font-element" for="postcode"></label>
                                </li>
                            </ul>
                        </div>
                        <div class="single-col">
                            <input type="email" placeholder="Email Address" name="email"  value="{{ $email }}" @if($email !="") {{ 'readonly' }} @endif>
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="email-error" class="hs-error-msg hs-main-font-element" for="email"></label>
                                </li>
                            </ul>
                        </div>
                        @if($prizeType =='tshirt')
                        <div class="single-col">
                            <select class="dropdown" id="cars" name="size">
                                <option  disabled selected hidden>Preferred shirt size</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xll">XLL</option>
                            </select>
                             <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="size-error" class="hs-error-msg hs-main-font-element" for="size"></label>
                                </li>
                            </ul>
                        </div>
                        @endif
                        <div class="single-col">
                            <input type="file" name="proof_img" id="file-input" class="file-input__input"  accept=".png, .jpg, .jpeg"  />
                            <label class="file-input__label" for="file-input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="21" viewBox="0 0 24 21" fill="none">
                                    <path d="M15.799 14.5H18.195C18.195 14.5 22.5 13.939 22.5 9.71701C22.5 7.04201 20.291 4.84301 17.545 4.94401C16.472 2.67801 14.172 1.10901 11.5 1.10901C7.937 1.10901 5.032 3.89401 4.824 7.40301C2.592 6.93601 0.5 8.63501 0.5 10.912C0.5 14.557 4.326 14.5 4.326 14.5H7.189M11.5 8.80301V19.803M11.5 8.80301L14.5 11.803M11.5 8.80301L8.5 11.803" stroke="#0D2B20" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>Upload your photo</span>
                            </label>
                             <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="file-error" class="hs-error-msg hs-main-font-element" for="proof_img"></label>
                                </li>
                            </ul>
                        </div>

                        <button class="details-btn claim-prize">Claim Prize</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@php 
$image =   asset('assets/image/loader.gif');
@endphp
@endsection
@push('script-leb')
@endpush
@push('style-lib')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('script-lib')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endpush
@section('js')
<script>
    $(document).ready(function() {
        var img = `{{ $image }}`;
        // Add validation rules to form fields
        @if($prizeType =='tshirt')
            $("#add_form_code").validate({
                rules: {
                    address_line1: {
                        required: true
                    },
                    address_line2: {
                        required: true,
                    },
                    town: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    postcode: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    proof_img: {
                        required: true,
                    },
                    size: {
                        required: true,
                    },
                },
                // Specify validation error messages
                messages: {
                    address_line1: "Address line 1 is required ",
                    address_line2: "Address line 2 is required ",
                    town: "Town is required",
                    city: "City is required",
                    postcode: "Postcode is required",
                    proof_img: "This field is required.",
                    size: "This field is required.",
                    email: {
                        required: "Please enter a valid email address",
                        email: "Please enter a valid email address"
                    }
                },
                errorPlacement: function(error, element) {
                    // Place the error message in the corresponding label based on the field name
                    if (element.attr("name") == "address_line1") {
                        error.appendTo("#address_line1-error");
                    } else if (element.attr("name") == "address_line2") {
                        error.appendTo("#address_line2-error");
                    } else if (element.attr("name") == "town") {
                        error.appendTo("#town-error");
                    } else if (element.attr("name") == "city") {
                        error.appendTo("#city-error");
                    } else if (element.attr("name") == "postcode") {
                        error.appendTo("#postcode-error");
                    } else if (element.attr("name") == "email") {
                        error.appendTo("#email-error");
                    } else if (element.attr("name") == "size") {
                        error.appendTo("#size-error");
                    } else if (element.attr("name") == "proof_img") {
                        error.appendTo("#file-error");
                    } else if (element.attr("name") == "proof_img") {
                        error.appendTo("#file-error");
                    } else {
                        // For other fields, display the error message as usual
                        error.insertAfter(element);
                    }
                }

            });
        @else
            $("#add_form_code").validate({
                rules: {
                    address_line1: {
                        required: true
                    },
                    address_line2: {
                        required: true,
                    },
                    town: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    postcode: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    proof_img: {
                        required: true,
                    },
                   

                },
                // Specify validation error messages
                messages: {
                    address_line1: "Address line 1 is required ",
                    address_line2: "Address line 2 is required ",
                    town: "Town is required",
                    city: "City is required",
                    postcode: "Postcode is required",
                    email: {
                        required: "Please enter a valid email address",
                        email: "Please enter a valid email address"
                    }
                },
                errorPlacement: function(error, element) {
                    // Place the error message in the corresponding label based on the field name
                    if (element.attr("name") == "address_line1") {
                        error.appendTo("#address_line1-error");
                    } else if (element.attr("name") == "address_line2") {
                        error.appendTo("#address_line2-error");
                    } else if (element.attr("name") == "town") {
                        error.appendTo("#town-error");
                    } else if (element.attr("name") == "city") {
                        error.appendTo("#city-error");
                    } else if (element.attr("name") == "postcode") {
                        error.appendTo("#postcode-error");
                    } else if (element.attr("name") == "email") {
                        error.appendTo("#email-error");
                    } else if (element.attr("name") == "file") {
                        error.appendTo("#file-error");
                    } else {
                        // For other fields, display the error message as usual
                        error.insertAfter(element);
                    }
                }

            });
        @endif 
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#file-input').change(function(e){
             e.preventDefault();
            var formData = new FormData($('#add_form_code')[0]);
            var thisOBJ = $(this);
            thisOBJ.closest('.single-col').removeClass('image-selected');
            $(this).closest('.single-col').find('.file-input__label').html('<img src='+img+' style="margin: 5px;"><span>Uploading photo</span>');
            $.ajax({
                url: "{{route('upload.proof')}}", // Your Laravel route for handling the upload
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    toastr.success(response.success); // Display success message
                    $('#image_name').val(response.image);
                    thisOBJ.closest('.single-col').addClass('image-selected');
                    thisOBJ.closest('.single-col').find('.file-input__label').html('<svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.875 7.75L7.125 13L19.125 1" stroke="#0D2B20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Photo Uploaded</span>');
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    toastr.error(xhr.responseText); // Display error message
                    thisOBJ.closest('.single-col').find('.file-input__label').html(' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="21" viewBox="0 0 24 21" fill="none"><path d="M15.799 14.5H18.195C18.195 14.5 22.5 13.939 22.5 9.71701C22.5 7.04201 20.291 4.84301 17.545 4.94401C16.472 2.67801 14.172 1.10901 11.5 1.10901C7.937 1.10901 5.032 3.89401 4.824 7.40301C2.592 6.93601 0.5 8.63501 0.5 10.912C0.5 14.557 4.326 14.5 4.326 14.5H7.189M11.5 8.80301V19.803M11.5 8.80301L14.5 11.803M11.5 8.80301L8.5 11.803" stroke="#0D2B20" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" /> </svg><span>Upload your photo</span>');
                    thisOBJ.closest('.single-col').removeClass('image-selected');
                }
            });
        });
    });
</script>


@endsection