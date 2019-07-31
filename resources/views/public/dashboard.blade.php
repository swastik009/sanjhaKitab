@extends('public.master')

@section('title')
  Hello !  {{Auth::user()->name}}
@endsection


@section('content')

    <body class="d-flex flex-column">
    <div id="page-content">
        <article class="g-bg-size-cover" data-bg-img-src="{{asset('img/books.jpg')}}" style="background-image:'{{asset("img/books.jpg")}}';
                background-attachment: fixed;
                background-repeat: no-repeat;">
            <div class="w-100 g-min-height-360 g-flex-middle g-width-50x--md g-bg-primary-opacity-0_8 g-pa-25 ml-auto">
                <div class="g-flex-middle-item">
                    <div class="col-md-6">
                        <kbd><span class="mb-0" id="greetings"></span></kbd>
                    </div>
                    <div class="col-md-6">
                        <h1 class="display-4 font-weight-bold" style="color: white">{{Auth::user()->name}}</h1>
                    </div>
                    <div class="container">
                        <a href="{{route('books')}}" class="btn btn-xl u-btn-pink u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-mr-10 g-mb-15">
                            <i class="fas fa-book pull-left g-font-size-42 g-mr-10"></i>
                            <span class="float-right text-left">
    Let's See all books
    <span class="d-block g-font-size-11"><i class="fas fa-info-circle"></i> You can only have single quantity of book for free !</span>
  </span>
                        </a>
                    </div>
                </div>
            </div>
        </article>








        <hr>
        <div class=" mt-5  container-fluid" style="background-color: whitesmoke">
            <h2 class="text-center"><span class="lead"> Featured Books</span></h2>

            <div class="row ">

            @foreach($books as $book)


                        <div class="col-md-6 col-lg-3 g-mb-30">


                            <!-- Article -->

                            @if($book->purchased_status)
                                <article class="info-v5-6 g-pos-rel g-bg-gray-dark-v2 g-bg-primary--hover g-color-white g-rounded-4 g-transition-0_3">
                                    @else
                                        <article class="u-block-hover u-block-hover__additional--jump u-shadow-v19 g-bg-white rounded g-transition-0_3">
                                    @endif


                                            @if($book->purchased_status)

                                                <span class="u-label g-rounded-3 g-bg-orange g-mr-10 g-mb-15">
                                                 <i class="fa fa-bookmark g-mr-3"></i>
                                                   Purchased
                                                </span>

                                        @endif
                                <!-- Article Image -->
                                <img class="w-100" src="{{asset('img/'.$book->image)}}" alt="Image Description">
                                <!-- End Article Image -->

                                <!-- Article Content -->
                                <div class="g-pa-25">
                                    <div class="g-mb-20">
                                        <h3 class="h5 g-mb-5">{{$book->name}}</h3>
                                        <div class="js-rating info-v5-6__rating g-transition-0_3 g-color-primary g-color-gray-light-v5--hover g-font-size-11 g-mb-10" data-rating="2.5" data-spacing="5"></div>
                                        <p class="g-opacity-0_8">{{$book->description}}</p>
                                    </div>
                                    <a class="btn btn-md u-btn-primary g-color-red--hover g-bg-red--hover g-font-weight-600 g-font-size-11 text-uppercase" href="books/{{$book->id}}">Show details</a>

                                </div>
                                <!-- End Article Content -->

                                <a href="/books/{{$book->id}}" class="u-link-v2"></a>
                            </article>
                            <!-- End Article -->
                        </div>
                @endforeach

        </div>
            <br>
            <div class="d-flex justify-content-center">
            {{ $books->links() }}
            </div>
        </div>
        </div>

        <br>


@endsection

@section('scripts')
    <script>
    $(document).ready(function() {
        var now = new Date();
        var hrs = now.getHours();
        console.log(hrs);
        var msg='';

        if (hrs >=6 || hrs>=0) msg = "<i class='fas fa-mug-hot fa-lg' style='color: lawngreen;'></i> Good Morning,";
        if (hrs >=12) msg = "<i class='fas fa-sun fa-lg' style='color:yellow'></i> Good Afternoon,";    // After 12pm
        if (hrs >= 17) msg = "<i class='fas fa-cloud-sun fa-lg' style='color:orange'></i> Good Evening,";      // After 5pm
        if (hrs >=22) msg = "<i class='fas fa-moon fa-lg' style='color:blue'></i> Have a Good Night,";
        $('#greetings').html(msg);

    });

    </script>

@endsection