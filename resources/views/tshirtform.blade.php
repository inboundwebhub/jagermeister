@extends('layouts.app')

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

                <form action="{{route('add-detail')}}" id="add_form_code" method="post">
                    <div class="your-details-form">
                        <div class="single-col">
                            <input type="text" name="address_line1" placeholder="Address Line 1">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="address_line1-error" class="hs-error-msg hs-main-font-element" for="firstname"></label>
                                </li>
                            </ul>
                        </div>
                        <div class="single-col">
                            <input type="text" name="address_line2" placeholder="Address Line 2">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="address_line2-error" class="hs-error-msg hs-main-font-element" for="firstname"></label>
                                </li>
                            </ul>
                        </div>
                        <div class="single-col">
                            <input type="text" name="town" placeholder="Town">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="town-error" class="hs-error-msg hs-main-font-element" for="firstname"></label>
                                </li>
                            </ul>
                        </div>
                        <div class="single-col">
                            <input type="text" name="city" placeholder="City">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="city-error" class="hs-error-msg hs-main-font-element" for="firstname"></label>
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
                            <input type="email" placeholder="Email Address" name="email">
                            <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="email-error" class="hs-error-msg hs-main-font-element" for="firstname"></label>
                                </li>
                            </ul>
                        </div>

                        <div class="single-col">
                            <select class="dropdown" id="cars" name="cars">
                                <option disabled selected hidden>Preferred shirt size</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xll">XLL</option>
                            </select>
                            <!-- <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                <li>
                                    <label id="dropdown-error" class="hs-error-msg hs-main-font-element" for="dropdown"></label>
                                </li>
                            </ul> -->
                        </div>

                        <div class="single-col">
                            <input type="file" name="file-input" id="file-input" class="file-input__input" />
                            <label class="file-input__label" for="file-input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="21" viewBox="0 0 24 21" fill="none">
                                    <path d="M15.799 14.5H18.195C18.195 14.5 22.5 13.939 22.5 9.71701C22.5 7.04201 20.291 4.84301 17.545 4.94401C16.472 2.67801 14.172 1.10901 11.5 1.10901C7.937 1.10901 5.032 3.89401 4.824 7.40301C2.592 6.93601 0.5 8.63501 0.5 10.912C0.5 14.557 4.326 14.5 4.326 14.5H7.189M11.5 8.80301V19.803M11.5 8.80301L14.5 11.803M11.5 8.80301L8.5 11.803" stroke="#0D2B20" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>Upload your photo</span></label>
                        </div>
                        <button class="details-btn claim-prize">Claim Prize</button>
                    </div>
                    </form>

            </div>
        </div>
    </div>

</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Include jQuery Validator -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        // Add validation rules to form fields
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
                // dropdown: {
                //     required: true,
                // },
            },
            // Specify validation error messages
            messages: {
                address_line1: "address line 1 is required ",
                address_line2: "address line 2 is required ",
                town: "town is required",
                city: "city is required",
                postcode: "Postcode is required",
                email: {
                    required: "Please enter a valid email address",
                    email: "Please enter a valid email address"
                },
                // dropdown: "size is required",
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
                } else {
                    // For other fields, display the error message as usual
                    error.insertAfter(element);
                }
            }

        });
    });
</script>