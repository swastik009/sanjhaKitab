@extends('public.master')

@section('title','Sanjha Kitab | '.$book->name)


@section('content')

    <body class="d-flex flex-column">


    <div id="page-content">

        <div class="container g-py-50">
            <div class="d-flex justify-content-end">

                <a href="{{route('booksPublic')}}" class="btn btn-md u-btn-3d u-btn-yellow g-mr-10 g-mb-15">  <i class="icon-graduation"></i>
                    Show All Books</a>
            </div>
            <div class="row">

                <div class="col-lg-7">
                    <!-- Carousel -->
                    <div id="carouselCus1" class="js-carousel g-pt-10 g-mb-10"
                         data-infinite="true"
                         data-fade="true"
                         data-arrows-classes="u-arrow-v1 g-brd-around g-brd-white g-absolute-centered--y g-width-45 g-height-45 g-font-size-14 g-color-white g-color-primary--hover rounded-circle"
                         data-arrow-left-classes="fa fa-angle-left g-left-40"
                         data-arrow-right-classes="fa fa-angle-right g-right-40"
                         data-nav-for="#carouselCus2">
                        <div class="js-slide g-bg-cover g-bg-black-opacity-0_1--after">
                            <img class="img-fluid w-100" src="{{asset('img/'.$book->image)}}" alt="Image Description">
                        </div>

                    </div>


                    <!-- End Carousel -->
                </div>

                <div class="col-lg-5">
                    <div class="g-px-40--lg g-pt-70">
                        <!-- Product Info -->
                        <div class="g-mb-30">
                            <h1 class="g-font-weight-300 mb-4">{{$book->name}}</h1>
                            <p>{{$book->description}}</p>
                        </div>
                        <!-- End Product Info -->

                        <!-- Price -->
                        <div class="g-mb-30">
                            <h2 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-12 text-uppercase mb-2">Price</h2>
                            <button type="button" class="btn btn-primary" data-container="body" data-title="This Item is currently Free" data-toggle="popover" data-placement="top" data-content="Grab {{$book->name}} for free">
                               {{$book->name." is free !!"}}
                            </button>
                        </div>
                        <!-- End Price -->

                        <!-- Author -->
                        <div class="d-flex justify-content-between align-items-center g-brd-bottom g-brd-gray-light-v3 py-3" role="tab">
                            <h5 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-default mb-0">Author</h5>


                            <label class="form-check-inline u-check mb-0 ml-auto g-mr-10">
                             {{$book->author}}
                            </label>

                        </div>
                        <!-- End Author -->

                        <!-- Author -->
                        <div class="d-flex justify-content-between align-items-center g-brd-bottom g-brd-gray-light-v3 py-3" role="tab">
                            <h5 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-default mb-0">Release Date</h5>


                            <label class="form-check-inline u-check mb-0 ml-auto g-mr-10">
                                {{$book->getReleaseYear()}}
                            </label>

                        </div>
                        <!-- End Author -->

                        <!-- Quantity -->
                        <div class="d-flex justify-content-between align-items-center g-brd-bottom g-brd-gray-light-v3 py-3 g-mb-30" role="tab">
                            <h5 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-default mb-0">Quantity</h5>

                            @if($book->quantity <=0)
                                <label class="form-check-inline u-check mb-0 ml-auto g-mr-10">
                                    <button type="button" class="btn btn-danger" data-container="body" data-title="This Item is currently out of stock" data-toggle="popover" data-placement="top" data-content="{{$book->name}} is out of stock.">
                                            OUT OF STOCK
                                    </button>
                                </label>
                            @else
                            <label class="form-check-inline u-check mb-0 ml-auto g-mr-10">
                                {{$book->quantity}}
                            </label>
                            @endif


                        </div>
                        <!-- End Quantity -->

                        <!-- Buttons -->
                        <div class="row g-mx-minus-5 g-mb-20">
                            <div id="CartButtons" class="col g-px-5 g-mb-10">

                               @if($book->quantity <=0)
                                <button class="btn btn-block u-btn-secondary g-font-size-12 text-uppercase g-py-15 g-px-25" type="button" disabled>
                                    Add to Cart <i class="align-middle ml-2 icon-finance-100 u-line-icon-pro"></i>
                                </button>
                                @else
                                @if(!$book->ClickCartExists)
                                    @if(!$book->ClickPurchasedExists)
                                    <button id="AddToCart" data-token="{{@csrf_token()}}" class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-25">
                                        Add to Cart <i class="align-middle ml-2 icon-finance-100 u-line-icon-pro"></i>
                                    </button>
                                     @else
                                            <button class="btn btn-block u-btn-secondary g-font-size-12 text-uppercase g-py-15 g-px-25" type="button" disabled>
                                                Already Purchased <i class="align-middle ml-2 icon-finance-100 u-line-icon-pro"></i>
                                            </button>
                                        @endif
                                   @else
                                        <button class="btn btn-block u-btn-secondary g-font-size-12 text-uppercase g-py-15 g-px-25" type="button" disabled>
                                            Already In cart <i class="align-middle ml-2 icon-finance-100 u-line-icon-pro"></i>
                                        </button>
                                    @endif
                                @endif
                            </div>

                        </div>
                        <!-- End Buttons -->


                        <!-- Tab Panes -->
                        <div id="nav-1-1-default-hor-left" class="tab-content">
                            <div class="tab-pane fade show active g-pt-30" id="nav-1-1-default-hor-left--3" role="tabpanel">
                                <p class="g-color-gray-dark-v4 g-font-size-13 mb-0">You can only add one book to cart.
                                    <a href="#!">FAQ</a>.</p>
                            </div>

                        <!-- End Tab Panes -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Description -->

    </div>
@endsection

@section('scripts')
                <script>

                       $('#AddToCart').click(function(){
                          var token = $(this).data('tokenDel');
                          $.ajax({
                             data: token,
                             method: 'GET',
                             url : "{{route('add_to_cart',$book->id)}}",
                             beforeSend:function(){
                                 $(this).hide();
                                 $('#CartButtons').html('<a href="#!" id="AddtoCartSpinner" class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-25">' +
                                     '<i class="fas fa-spinner fa-spin"></i>' +
                                     '<span class="sr-only">Loading...</span>' +
                                     '</a>');
                             },
                             success: function(data){
                                 $('#AddtoCartSpinner').fadeOut(3000);
                                 setTimeout(function(){$('#AddtoCartSpinner').remove();},3000);
                                 //setTimeout(function(){},3000);
                                 $('#CartButtons').load(' #CartButtons');
                                 //$('#MainBasket').load(' #MainBasket');
                                $('#count').load(' #count');
                                 $('.CartItems').load(' .CartItems');
                                 swal(
                                     "Success!",
                                     "Your item has been added to the cart",
                                 )
                             },
                             error: function(xhr){
                                 alert(xhr.responseText);
                             }

                          });
                       });


                </script>


@endsection