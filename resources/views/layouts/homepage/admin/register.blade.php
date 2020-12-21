@extends('layouts.homepage.app')
@section('title', 'Register')
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
        <div class="col-md-8 ml-auto mr-auto">
            <div class="login-form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label" value="{{ old('name') }}">Nama</label>
                        <div class=" col-sm-8">
                            <input type="nama" class="form-control" id="nama" value="{{ old('name') }}" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">E-Mail</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="pwd" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="pwd" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="repwd" class="col-sm-4 col-form-label">Repeat Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="repwd" name="password_confirmation">
                        </div>
                    </div>
                    <center>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck" style="font-size:12px">
                                    I have read and agree with Terms of Service Alan Finance
                                </label>
                            </div>


                            <button type="submit" onclick="register()" class="mx-auto tombol btn btn-black"
                                style="width: 180px;">{{ __('Register') }}
                                Now</button>
                        </div>
                    </center>
                </form>
            </div>
            <p class="text-center " style="padding-top: 40px;">Already Registered? <a href="{{ url('/login') }}"
                    class="font-weight-bold">Login Here</a></p>
        </div>
        <div class=" justify-content-center " style="bottom:0;margin-top: 140px;">
            <ul class="list-inline text-center text-dark" style="font-size:12px">
                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark"
                        href="{{ route('home') }}">Home</a>
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
                        href="#">Downloads
                        App</a></li>
                <li class="list-inline-item"><a class="social-icon text-xs-center text-dark" target="_blank"
                        href="#">Downloads
                        ios</a></li>

            </ul>
            <p class="text-center" style="font-size:12px">Alan Finance © 2020 PT. Alan
                Creative
                - All Rights Reserved</p>

        </div>
    </div>
    <script src="css/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        function register() {

            var nama = document.getElementById("nama").value;
            var email = document.getElementById("email").value;
            var pwd = document.getElementById("pwd").value;
            var repwd = document.getElementById("repwd").value;

            if (nama == '' || email == '' || pwd == '' || repwd == '') {
                Swal.fire({
                    title: '<strong>Register Failed</u></strong>',
                    icon: 'error',

                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: ' Oke',
                })
            } else {
                Swal.fire({
                    title: '<strong>Welcome</strong>',
                    icon: 'success',

                    focusConfirm: false,
                    confirmButtonText: ' Continue',


                }).then(function() {
                    // Redirect the user
                    window.location.href = "dashboard";
                    console.log('The Ok Button was clicked.');
                })
            }
        }

    </script>
@endsection
