<!-- Header -->
<header id="js-header" class="u-header u-header--static">
    <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <div class="container">
                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-minus-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
              <span class="hamburger hamburger--slider">

            <span class="hamburger-box">

              <span class="hamburger-inner"></span>
              </span>
              </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Logo -->
              <a href="/">

              </a>
                <!-- End Logo -->

                <!-- Navigation -->
                <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--lg" id="navBar">
                    <ul class="navbar-nav text-uppercase g-pos-rel g-font-weight-600 ml-auto">
                        <!-- Intro -->
                        <li class="nav-item  g-mx-10--lg g-mx-15--xl">

                        </li>


                        <li class="nav-item  g-mx-10--lg g-mx-15--xl {{(Route::current()->getName() == 'home') ? 'active' : ''}}">
                            <a href="{{route('home')}}" class="nav-link g-py-7 g-px-0">Home</a>
                        </li>

                        <li class="nav-item  g-mx-10--lg g-mx-15--xl {{(Route::current()->getName() == 'purchases') ? 'active' : ''}}">
                            <a href="{{route('purchases')}}" class="nav-link g-py-7 g-px-0">Purchases</a>
                        </li>

                        <li class="nav-item  g-mx-10--lg g-mx-15--xl {{(Route::current()->getName() == 'booksPublic') ? 'active' : ''}}" >
                            <a href="{{route('booksPublic')}}" class="nav-link g-py-7 g-px-0">Books</a>
                        </li>


                        <!-- End Intro -->
                    </ul>
                </div>
                <!-- End Navigation -->


                <div  class="col-sm-auto g-pr-15 g-pr-0--sm">
                    <!-- Basket -->
                    <div  id="MainBasket" class="u-basket d-inline-block g-z-index-3">
                        <div  class=" g-py-10 g-px-6">
                            <a href="#!" id="basket-bar-invoker" class="u-icon-v1 g-color-black-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
                               aria-controls="basket-bar"
                               aria-haspopup="true"
                               aria-expanded="false"
                               data-dropdown-event="click"
                               data-dropdown-target="#basket-bar"
                               data-dropdown-type="css-animation"
                               data-dropdown-duration="300"
                               data-dropdown-hide-on-scroll="false"
                               data-dropdown-animation-in="fadeIn"
                               data-dropdown-animation-out="fadeOut">
                                <span class="u-badge-v1--sm g-color-white g-bg-primary g-font-size-11 g-line-height-1_4 g-rounded-50x g-pa-4" style="top: 7px !important; right: 3px !important;"><span id="count">{{$userBooks->count()}}</span></span>
                                <i class="icon-hotel-restaurant-105 u-line-icon-pro"></i>
                            </a>
                        </div>

                        <div  id="basket-bar" class=" CartItems u-basket__bar u-dropdown--css-animation u-dropdown--hidden g-text-transform-none g-bg-white g-brd-around g-brd-gray-light-v4"
                              aria-labelledby="basket-bar-invoker">
                            <div class="g-brd-bottom g-brd-gray-light-v4 g-pa-15 g-mb-10">
                                <span class="d-block h6 text-center text-uppercase mb-0">Shopping Cart</span>
                            </div>
                            <div  class="CartItems js-scrollbar g-height-200">

                            @foreach($userBooks as $userBook)

                                <!-- Product -->
                                    <div  class="u-basket__product g-brd-none g-px-20">
                                        <div class="row no-gutters g-pb-5">
                                            <div class="col-4 pr-3">
                                                <a class="u-basket__product-img" href="{{route('showPublicBook',$userBook->id)}}">
                                                    <img class="img-fluid" src="{{asset('img/'.$userBook->image)}}" alt="Image Description">
                                                </a>
                                            </div>

                                            <div class="col-8">
                                                <h6 class="g-font-weight-400 g-font-size-default">
                                                    <a class="g-color-black g-color-primary--hover g-text-underline--none--hover" href="{{route('showPublicBook',$userBook->id)}}">{{$userBook->name}}</a>
                                                </h6>
                                                <small class="g-color-primary g-font-size-12">{{$userBook->author}}</small>
                                            </div>
                                        </div>
                                        <button id="delete_data" data-id="{{$userBook->user_books_id}}" data-tokenDel = "{{csrf_token()}}"  type="button" class="u-basket__product-remove">&times;</button>

                                    </div>
                                    <!-- End Product -->
                                @endforeach
                                <div class="clearfix g-px-15">
                                    <div class="row align-items-center text-center g-brd-y g-brd-gray-light-v4 g-font-size-default">
                                        <div class="col g-brd-right g-brd-gray-light-v4">
                                            @if($userBooks->count()<=1)
                                                <strong class="d-block g-py-10 text-uppercase g-color-main g-font-weight-500 g-py-10">Total Item</strong>
                                            @else
                                                <strong class="d-block g-py-10 text-uppercase g-color-main g-font-weight-500 g-py-10">Total Items</strong>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <strong class="d-block g-py-10 g-color-main g-font-weight-500 g-py-10">{{$userBooks->count()}}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="g-pa-20">
                                    <div class="text-center g-mb-15">
                                        <a class="text-uppercase g-color-primary g-color-main--hover g-font-weight-400 g-font-size-13 g-text-underline--none--hover" href="page-checkout-1.html">
                                            View Cart
                                            <i class="ml-2 icon-finance-100 u-line-icon-pro"></i>
                                        </a>
                                    </div>
                                    <a class="btn btn-block u-btn-black g-brd-primary--hover g-bg-primary--hover g-font-size-12 text-uppercase rounded g-py-10" href="/books/checkout">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Basket -->
                    </div>
                </div>



                <a class=" ml-5 btn btn-outline-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <!-- Button to Open the Modal -->




            </div>
        </nav>

    </div>
</header>


<!-- End Header -->

@section('scripts')

@endsection
