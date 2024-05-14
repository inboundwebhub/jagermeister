@extends('layouts.app')

@section('content')
<div class="details-page-bg fullwidth">

    <div class="fix-content">

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
                <div class="heading-text details">
                    <h1>Enter details</span></h1>
                </div>

            </div>
        </div>

        <div class="prize-sec fullwidth">
            <div class="wrapper">
                <div class="prize-main fullwidth">
                    <div class="prize-title">
                        <h6>Play the penalt lorem ipsum os et accus amus et iusto odio dign. </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="details-sec fullwidth">
            <div class="wrapper">
                <div class="details-main sec-center">
                    <div class="details-form">
                        <form method="POST" action="{{ route('adduser') }}" id="add_user_code">
                           {{ csrf_field() }}
                            <div class="form-two-col">
                                <div class="form-left-col">
                                    <input type="text" placeholder="First Name" name="firstname">
                                    <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                        <li>
                                            <label id="firstname-error" class="hs-error-msg hs-main-font-element" for="firstname"></label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-left-col">
                                    <input type="text" placeholder="Last Name" name="lastname">
                                    <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                        <li>
                                            <label id="lastname-error" class="hs-error-msg hs-main-font-element" for="lastname"></label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-one-col">
                                <input type="email" placeholder="Email Address" name="email">
                                <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                    <li>
                                        <label id="email-error" class="hs-error-msg hs-main-font-element" for="email"></label>
                                    </li>
                                </ul>
                                <ul class="no-list hs-error-msgs inputs-list" role="alert">
                                    <li>
                                        <label class="hs-error-msg hs-main-font-element">
                                            @error('email')<i class="fa fa-exclamation-circle"></i>{{$message}} </p>@enderror
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <button type="submit" class="details-btn">Submit and take penalty</button>
                        </form>
                    </div>

                    <div class="claim-box-main">
                        <div class="claim-box">
                            <div class="claim-image">
                                <img src="{{ asset('assets/image/claim-image.png') }}" alt="">
                            </div>
                            <div class="claim-details">
                                <h6>keep your proof of purchase</h6>
                                <div class="claim-txt">
                                    <p>To claim your prize you must lorem ipsum doloit sit amet dolores a lestrud magna.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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
        $("#add_user_code").validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                }
            },
            // Specify validation error messages
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                email: {
                    required: "Please enter a valid email address",
                    email: "Please enter a valid email address"
                }
            },
            errorPlacement: function(error, element) {
                // Place the error message in the corresponding label based on the field name
                if (element.attr("name") == "firstname") {
                    error.appendTo("#firstname-error");
                } else if (element.attr("name") == "lastname") {
                    error.appendTo("#lastname-error");
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