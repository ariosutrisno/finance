@extends('layouts.homepage.app')
@section('title', 'Login')
@section('container')
    @include('layouts.homepage.css&js.csslog')
    <div class="sidenav">
        <div class="login-main-text">
            <div class="text-center">
                <img src="  img/Group 442.png" alt="#">

                <h2 class="pt-5">Lets Get You Set Up</h2>

                <p class="text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente facere
                    tempora voluptatibus
                    laborum tenetur esse. Recusandae, est nobis. Nam et quod earum! Quae, quas? Facere sequi natus dicta
                    illo tempora!</p>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="col-md-8  ml-auto mr-auto">
            <div class=" login-form " style="padding-top: 30px !important;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input type="text" id="username" class="form-control" placeholder="User Name" name="email"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Password" name="password"
                            required>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck" style="font-size:12px">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <button type="submit" onclick="login()" class="float-lg-right tombol btn">{{ __('Login') }}</button>
                </form>

            </div>

        </div>
        <p class="text-center " style="padding-top: 80px;">Don't have an account? <a href="{{ url('/register') }}"
                class="font-weight-bold">Free
                Register</a></p>

        <div class=" justify-content-center" style="bottom:0 ;margin-top:120px">
            <ul class="list-inline text-center text-dark" style="font-size:12px">
                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark"
                        href="{{ url('home') }}">Home</a>
                </li>
                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark" href="#">About</a></li>
                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark" href="#">Terms of Service
                </li>
                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark" href="#">Privacy Policy
                </li>
                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark" href="#">FAQ
                </li>

                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark" href="#">Feedback
                </li>

                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark" href="#">Blog
                </li>
            </ul>
            <ul class="list-inline text-center" style="font-size:12px">
                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark" target="_blank"
                        href="#">Downloads App</a></li>
                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark" target="_blank"
                        href="#">Downloads ios</a></li>

            </ul>
            <p class="text-center" style="font-size:12px">Alan Finance © 2020 PT. Alan
                Creative
                - All Rights Reserved</p>

        </div>
    </div>
    <script>
        function login() {

            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (username == '' || password == '') {
                Swal.fire({
                    title: '<strong>Login Failed</u></strong>',
                    icon: 'error',
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: ' Oke',
                })
            } else {
                Swal.fire({
                    title: '<strong>Login Succes</strong>',
                    icon: 'success',
                    focusConfirm: false,
                    showConfirmButton: false,
                }).then(function() {
                    // Redirect the user
                    window.location.href = "dashboard";
                    console.log('The Ok Button was clicked.');
                })
            }
        }

    </script>

@endsection
