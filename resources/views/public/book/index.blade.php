@extends('public.master')

@section('Books | Sanjha Kitab')

    @section('content')

        <body class="d-flex flex-column">
        <div id="page-content">

            <!-- Article -->
            @foreach($books as $book)
            <article class="d-md-table w-100 g-bg-white g-mb-1">
                <!-- Date -->
                <div class="d-md-table-cell align-middle g-width-125--md text-center g-color-gray-dark-v5 g-py-10 g-px-20">
                    <time datetime="2015-06-27">
                        <span class="d-block g-color-gray-dark-v5 g-font-size-11 text-uppercase">Release date</span>
                        <span class="d-block g-color-black g-font-weight-700 g-font-size-40 g-line-height-1">{{\Carbon\Carbon::parse($book->release_date)->format('d')}}</span>
        {{\Carbon\Carbon::parse($book->release_date)->format('M')}} , {{\Carbon\Carbon::parse($book->release_date)->format('Y')}}

    </time>
</div>
<!-- End Date -->

<!-- Article Image -->
<a class="d-md-table-cell align-middle g-width-130" href="#!">
    <img class="d-block info-v5-2__image g-ml-minus-1" src="{{asset('img/'.$book->image)}}" alt="Image Description">
</a>
<!-- End Article Image -->

<!-- Article Content -->
<div class="d-md-table-cell align-middle g-py-15 g-px-20">
    <h3 class="h6 g-font-weight-700 text-uppercase">
        <a class="g-color-gray-dark-v2" href="#!">{{$book->name}}</a>
    </h3>
    <em class="g-color-gray-dark-v5 g-font-style-normal">{{$book->author}}</em>
</div>
<!-- End Article Content -->

<!-- Price -->
<div class="d-md-table-cell align-middle g-py-5 g-px-20">

    <span class="d-block g-color-gray-dark-v2 g-font-weight-700">{{($book->quantity <= 0) ? 'Out of stock': $book->quantity }}</span>
    @if($book->quantity <= 0)
        <span class="d-block g-color-gray-dark-v5 g-font-size-11 text-uppercase"></span>
    @else
        <span class="d-block g-color-gray-dark-v5 g-font-size-11 text-uppercase">are available</span>
    @endif
</div>
<!-- End Price -->

<!-- Actions -->
<div class="d-md-table-cell align-middle text-md-right g-pa-20">
    <div class="g-mt-minus-10 g-mx-minus-5">
        <a class="btn btn-lg u-btn-primary g-font-weight-600 g-font-size-12 text-uppercase g-mx-5 g-mt-10" href="{{route('showPublicBook',$book->id)}}">Show details</a>
    </div>
</div>
<!-- End Actions -->
</article>
            <br>
<!-- End Article -->
@endforeach
</div>
        <div class="d-flex justify-content-center">
            {{ $books->links() }}
        </div>
@endsection