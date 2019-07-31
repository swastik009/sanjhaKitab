@extends('admin.master')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <strong><i class="fas fa-edit"></i> Create</strong> Form
            </div>
            @section('styles')
                <style>
                    .fixedImage {

                        width: 100%;
                        height: 20vw;
                        object-fit: cover;
                    }

                </style>
            @endsection

            <div class="card-body card-block">
                @if ($errors->any())
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Validation Error</span>
                        <div class="ml-5">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

                <form action="{{route('booksCreate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('POST')}}
                    <div class="col-md-4 mt-4">
                        <div class="mx-auto d-block">
                            <img id="imageDis" name="image" class=" rounded-circle fixedImage img-fluid mx-auto d-block img-thumbnail" src="{{asset('img/book.jpg')}}" alt="Enter Your Image">
                        </div>
                        @section('scripts')
                            <script>
                                function readURL(input) {

                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            $('#imageDis').attr('src', e.target.result);
                                            $('#imageDis').hide();
                                            $('#imageDis').fadeIn(3000);
                                        }

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }

                                $("#nf-image").change(function() {
                                    readURL(this);
                                });
                            </script>
                        @endsection
                    </div>

                    <div class="form-group">
                        <label for="image" class=" form-control-label">Image</label>
                        <input type="file" id="image" name="image" class="btn btn-primary form-control">
                        <span class="help-block">Please enter image of the book</span>
                    </div>

                    <div class="form-group">
                        <label for="name" class=" form-control-label">Name</label>
                        <input type="text" id="nf-name" name="name" placeholder="Enter the name of the book" class="form-control">
                        <span class="help-block">Please enter name</span>
                    </div>

                    <div class="form-group">
                        <label for="author" class=" form-control-label">Author name</label>
                        <input type="text" id="nf-author" name="author" placeholder="Enter author name" class="form-control" required>
                        <span class="help-block">Please enter author name</span>
                    </div>

                    <div class="mt-3"></div>
                    <div class="form-group">
                        <label for="quantity" class=" form-control-label">Quantity    </label>

                            <span class="minus">-</span>
                            <input type="text" value="1" required/>
                            <span class="plus">+</span>
                         <br>
                        <span class="help-block">Please enter the quantity</span>
                    </div>
                    <div class="mt-3"></div>
                    <div class="form-group">
                    <textarea name="description" id="description" class="form-control" placeholder="Enter your description"></textarea>
                    </div>


                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>

                </form>
            </div>
            <div class="card-footer">
                These information are is crucial fill out as per needed
            </div>
        </div>

    </div>


@endsection