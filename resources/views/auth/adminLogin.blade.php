<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Login Page 3 | | Unify - Responsive Website Template</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../favicon.ico">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/icon-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/icon-hs/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/animate.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/hs-megamenu/src/hs.megamenu.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/hamburgers/hamburgers.min.css')}}">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="{{asset('assets/css/unify-core.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/unify-components.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/unify-globals.css')}}">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>

<body>
  <main>



    <!-- Login -->
    <section class="container g-py-100">
      <div class="row justify-content-center">
        <div class="col-sm-8 col-lg-5">
          <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
            <header class="text-center mb-4">
              <h2 class="h2 g-color-black g-font-weight-600">Admin Login</h2>
            </header>

            <!-- Form -->
            <form method="post" action="{{ route('login.form.submit') }}" class="g-py-15">
              @csrf
              <div class="mb-4">
                <input id="email" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 @error('email') is-invalid @enderror" type="email" name="email" placeholder="johndoe@gmail.com">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

              </div>

              <div class="g-mb-35">
                <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3 @error('password') is-invalid @enderror" type="password" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

              </div>

              <div class="mb-4">
                <button class="btn btn-md btn-block u-btn-primary g-rounded-50 g-py-13" type="submit">Login</button>
              </div>
            </form>
            <!-- End Form -->


          </div>
        </div>
      </div>
    </section>

    <!-- End Login -->

  <!-- JS Global Compulsory -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-migrate/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('assets/vendor/popper.js/popper.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/bootstrap.min.js')}}"></script>


  <!-- JS Implementing Plugins -->
  <script src="{{asset('assets/vendor/hs-megamenu/src/hs.megamenu.js')}}"></script>

  <!-- JS Unify -->
  <script src="{{asset('assets/js/hs.core.js')}}"></script>
  <script src="{{asset('assets/js/components/hs.header.js')}}"></script>
  <script src="{{asset('assets/js/helpers/hs.hamburgers.js')}}"></script>
  <script src="{{asset('assets/js/components/hs.tabs.js')}}"></script>
  <script src="{{asset('assets/js/components/hs.go-to.js')}}"></script>

  <!-- JS Customization -->
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
      });

      $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
          event: 'hover',
          pageContainer: $('.container'),
          breakpoint: 991
        });
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });
  </script>
  </main>






</body>

</html>
