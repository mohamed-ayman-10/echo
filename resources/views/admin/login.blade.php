<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == 'ar' ? 'rtl':'ltr'}}">
<head class="{{app()->getLocale() == 'ar' ? 'rtl':'ltr'}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="tivo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Tivo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets')}}/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon/favicon.png" type="image/x-icon">
    <title>{{\App\Models\Setting::query()->pluck('title')[0]}} | @lang('Login')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/feather-icon.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css">
    <link id="color" rel="stylesheet" href="{{asset('assets')}}/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/responsive.css">
</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
</div>
<!-- Loader ends-->
<!-- login page start-->
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card">
                <div>
                    <div><a class="logo" href="{{route('admin.index')}}"><img width="100" height="100" class="img-fluid for-light"
                                                                              src="{{asset(\App\Models\Setting::query()->pluck('logo')[0])}}"
                                                                              alt="Logo"></a></div>
                    <div class="login-main">
                        <form class="theme-form" action="{{route('admin.postLogin')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label class="col-form-label">@lang('Email')</label>
                                <input class="form-control" type="email" name="email" required=""
                                       placeholder="@lang('Email')">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">@lang('Password')</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="password"
                                           autocomplete="new-password" required="" placeholder="@lang('Password')">
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="text-end mt-3">
                                    <button class="btn btn-primary btn-block w-100"
                                            type="submit">@lang('Sign in')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('assets')}}/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('assets')}}/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="{{asset('assets')}}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{asset('assets')}}/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{asset('assets')}}/js/config.js"></script>
    <!-- Template js-->
    <script src="{{asset('assets')}}/js/script.js"></script>
    <!-- login js-->
</div>
</body>
</html>
