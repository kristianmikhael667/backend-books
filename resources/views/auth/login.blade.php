<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>E - Library | Adminstrator</title>
    <link rel="icon" href="{{ '/images/logo.jpg' }}" type="image/jpg" sizes="16x16">

    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <div class="page-loader" id="page-loader">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <span>Loading...</span>
    </div><!-- page loader -->
    <div class="theme-layout gray-bg vh-100">

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-8">
                    <div class="logo-up">
                        {{-- <figure class="logo"><img style="width:200px; height:200px" alt=""
                                src="{{ '/images/guemuda.png' }}"></figure> --}}
                    </div>
                    <div class="box">
                        {{-- <input type="checkbox" id="toggle" class="box__toggle" hidden> --}}
                        <img style="width:30%; height:50%" src="{{ '/images/logo.jpg' }}" alt="Picture by Autumn Studio"
                            class="">

                        @if(session('status'))
                        <div class="alert alert-success mb-3 rounded-0" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="form form--login" method="POST" action="{{ route('login') }}">
                            @csrf
                            <span><svg id="login" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg></span>
                            <h1 class="form__title">Sign in</h1>
                            <div class="form__helper">
                                <input value="{{ old('email') }}" type="text" name="email" id="email"
                                    placeholder="Email"
                                    class="form__input {{ $errors->has('email') ? 'is-invalid' : '' }}" />

                                <label class="form__label" for="email">{{ $errors->has('email') ? '' : 'Email'
                                    }}</label>
                                <x-jet-input-error for="email"></x-jet-input-error>
                            </div>

                            <div class="form__helper">
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="form__input {{ $errors->has('password') ? ' is-invalid' : '' }}" />
                                <label class="form__label" for="password">{{ $errors->has('password') ? '' : 'Password'
                                    }}</label>
                                <x-jet-input-error for="password"></x-jet-input-error>
                            </div>

                            <x-jet-button class="form__button">
                                {{ __('Log in') }}
                            </x-jet-button>
                            {{-- <p class="form__text">Don't have an account?
                                <label for="toggle" class="form__link">Sign up!</label>
                            </p> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- <figure class="bottom-mockup"><img alt="" src="images/footer.png"></figure> --}}
        {{-- <div class="bottombar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="">&copy; Copyright All rights reserved by E - Library 2022</span>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>

    <script src="js/main.min.js"></script>
    <script src="js/vivus.min.js"></script>
    <script src="js/script.js"></script>


</body>

</html>