@extends('public.master')

@section('title','Purchases | Sanjha Kitab')

@section('content')
    <body class="d-flex flex-column">
    <div id="page-content">
        <div class="g-bg-primary-dark-v1 g-pa-40">

            <h1 class="g-color-white">

              <i class="icon-wallet"></i>
                YOUR PURCHASES

            </h1>

        </div>
        <div class="d-flex justify-content-center">
    <div class="col-lg-9 g-mb-50">
    <div class="mt-5"></div>
        @if (\Session::has('success'))

            <div class="alert-success alert-dismissible fade show">
                <strong>Success</strong>
                <div class="ml-5">
                    {!! \Session::get('success') !!}
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        <div class="mb-5">
            @if(!$purchases->count())
                <div class="g-brd-around g-brd-gray-light-v4 rounded g-mb-30">
                    <div class="jumbotron">
                        <h1>No purchased item</h1>
                    </div>
                </div>
            @endif

            @foreach($purchases as $purchase)
        <!-- Order Block -->
        <div class="g-brd-around g-brd-gray-light-v4 rounded g-mb-30">
            <header class="g-bg-gray-light-v5 g-pa-20">
                @if($purchase->delivery_status==0)
                    <div class="alert fade show g-bg-red g-color-white rounded-0" role="alert">
                        <div class="media">
                                            <span class="d-flex g-mr-10 g-mt-5">
                                          <i class="icon-ban g-font-size-25"></i>
                                            </span>
                            <span class="media-body align-self-center">
                                                <strong>Oh snap!</strong> This book hasnot been delivered Yet.
                                            </span>
                        </div>
                    </div>
                    <!-- End Red Alert -->
                @else
                    <div class="alert fade show g-bg-teal g-color-white rounded-0" role="alert">
                        <div class="media">
                                            <span class="d-flex g-mr-10 g-mt-5">
                                          <i class="icon-check g-font-size-25"></i>
                                            </span>
                            <span class="media-body align-self-center">
                                                <strong>GREAT!</strong> This book has been already delievered at {{\Carbon\Carbon::parse($purchase->updated_at)->format('M d, Y')}}
                                            </span>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-3 col-md-2 g-mb-20 g-mb-0--sm">
                        <h4 class="g-color-gray-dark-v4 g-font-weight-400 g-font-size-12 text-uppercase g-mb-2">Order Placed</h4>
                        <span class="g-color-black g-font-weight-300 g-font-size-13">{{\Carbon\Carbon::parse($purchase->created_at)->format('M d, Y')}}</span>
                    </div>

                    <div class="col-sm-3 col-md-2 g-mb-20 g-mb-0--sm">
                        <h4 class="g-color-gray-dark-v4 g-font-weight-400 g-font-size-12 text-uppercase g-mb-2">Total</h4>
                        <span class="u-label g-rounded-20 g-bg-darkpurple g-px-15 g-mr-10 g-mb-15">
                                                    <i class="fa fa-heart g-mr-3"></i>
                                                    Free
                                                </span>

                    </div>

                    <div class="col-sm-3 col-md-2 g-mb-20 g-mb-0--sm">
                        <h4 class="g-color-gray-dark-v4 g-font-weight-400 g-font-size-12 text-uppercase g-mb-2">Ship to</h4>
                        <span class="g-color-black g-font-weight-300 g-font-size-13">James Collins</span>
                    </div>

                    <div class="col-sm-3 col-md-4 ml-auto text-sm-right">
                        <h4 class="g-color-gray-dark-v4 g-font-weight-400 g-font-size-12 text-uppercase g-mb-2">Order # 278-841024961890</h4>
                        <a class="g-font-weight-300 g-font-size-13" href="#!">Invoice</a>
                    </div>
                </div>
            </header>

            <!-- Order Content -->
            <div class="g-pa-20">
                <div class="row">

                    <div class="col-md-12">
                        <div class="mb-4">
                            <h3 class="h5 mb-1">


                            </h3>
                            <p class="g-color-gray-dark-v4 g-font-size-13">Your package was delivered per the instructions.</p>
                        </div>

                        <div class="row">
                            <div class="col-4 col-sm-3 g-mb-30">
                                <img class="img-fluid" src="{{asset('img/'.$purchase->image)}}" alt="Image Description">
                            </div>

                            <div class="col-8 col-sm-9 g-mb-30">
                                <h4 class="h6 g-font-weight-400"><a href={{route('showPublicBook',$purchase->book_id)}}>{{$purchase->name}}</a></h4>
                                <span class="d-block g-color-gray-dark-v4 g-font-size-13 mb-2">Sold by: Sanjha Kitab</span>
                                <span class="d-block g-color-lightred mb-2">      <span class="u-label g-rounded-20 g-bg-darkpurple g-px-15 g-mr-10 g-mb-15">
                                                    <i class="fa fa-heart g-mr-3"></i>
                                                    Free
                                                </span></span>
                                <a class="btn g-brd-around g-brd-gray-light-v3 g-color-gray-dark-v3 g-bg-gray-light-v5 g-bg-gray-light-v4--hover g-font-size-13 rounded g-px-18 g-py-7" href="#!">Buy it Again</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Order Content -->
        </div>
        @endforeach
                <div class="d-flex justify-content-center">
                    {{ $purchases->links() }}
                </div>
        <!-- End Order Block -->
    </div>
    </div>
    </div>
    </div>

@endsection