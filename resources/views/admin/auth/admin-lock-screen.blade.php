<!DOCTYPE html>
<html lang="en" dir="ltr">
@php
    use Carbon\Carbon;
@endphp

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>{{ config('app.name', 'BRC') }}</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/icons/brc_icon.ico') }}" type="image/jpg" />

    <!-- loader-->
    <link href="{{ asset('assets/admin/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/admin/js/pace.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/extra-icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;800;1000&display=swap');
    </style>

    <!-- Icons CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/icons.css') }}" /> --}}
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@800;1000&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;800;1000&display=swap');
    </style>

    <style>
        .password input {
            border-top-left-radius: 3px !important;
            border-bottom-left-radius: 3px !important;

            border-top-right-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
        }

        .password a {
            border-top-left-radius: 0px !important;
            border-bottom-left-radius: 0px !important;

            border-top-right-radius: 3px !important;
            border-bottom-right-radius: 3px !important;
        }
    </style>

</head>

<body class="bg-lock-screen">

    <!-- wrapper -->
    <div class="wrapper">

        <div class="authentication-lock-screen d-flex align-items-center justify-content-center">
            <div class="card shadow-none bg-transparent">
                <div class="card-body p-md-5 text-center">

                    <h2 id="time" class="text-white"> </h2>
                    <h5 class="text-white"> {{ Carbon::now()->tz('Asia/Kuwait')->format('D ,F d ,Y') }} </h5>
                    <div class="">
                        <img src="{{ asset('assets/admin/images/icons/user.png') }}" class="mt-5" width="120"
                            alt="" />
                    </div>
                    <p class="mt-2 text-white">{{ __('Administrator') }}</p>

                    <br>

                    <div class="form-body">

                        <form method="POST" action="{{ route('admin.auth.login') }}" class="row g-3"
                            style="direction: ltr">
                            @csrf

                            <div class="col-12">
                                <label for="user_name" class="form-label text-white">{{ __('User Name') }}</label>
                                <input type="text" class="form-control" id="user_name" name="user_name"
                                    placeholder="User Name">
                            </div>


                            <div class="col-12">
                                <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                                <div class="input-group password" id="show_hide_password">

                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Password">
                                        <a href="javascript:;" class="input-group-text text-info bg-black"><i
                                            class="bx bx-hide"></i></a>
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">{{ __('Sign in') }}<i
                                            class="bx bxs-lock-open"></i></button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->

</body>

</html>

<!-- JQuery -->
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>

<script>
    function time() {
        var now = new Date();
        //     var mm = now.getYear();
        var h = now.getHours();
        var m = now.getMinutes();
        var s = now.getSeconds();
        document.getElementById("time").innerHTML = "" + h + ":" + m + ":" + s;
    }
    setInterval(() => {
        time()
    }, 1000);

    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>
