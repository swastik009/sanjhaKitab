@extends('admin.master')

@section('content')
    <div class="container">

    <div class="card">
        <div class="card-header">
            <strong><i class="fas fa-edit"></i> Edit</strong> Form
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

            <form action="{{route('usersUpdate',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                <div class="col-md-4 mt-4">
                    <div class="mx-auto d-block">
                        <img id="imageDis" name="image" class=" rounded-circle fixedImage img-fluid mx-auto d-block img-thumbnail" src="{{asset('img/'.$user->image)}}" alt="{{$user->name}}">
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
                    <input type="file" id="nf-image" name="image" value="{{$user->image}}" class="btn btn-primary form-control">
                    <span class="help-block">Please enter image</span>
                </div>

                <div class="form-group">
                    <label for="name" class=" form-control-label">Name</label>
                    <input type="text" id="nf-name" name="name" placeholder="Enter Name.." value="{{$user->name}}" class="form-control">
                    <span class="help-block">Please enter name</span>
                </div>

                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Email</label>
                    <input type="email" id="nf-email" name="email" value="{{$user->email}}" placeholder="Enter Email.." class="form-control" required>
                    <span class="help-block">Please enter  email</span>
                </div>
                @if($user->provider == '')
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Password</label>
                    <input type="password" id="nf-password" name="nf-password" placeholder="Enter Password.." value="{{$user->password  }}" class="form-control">
                    <span class="help-block">Please enter  password</span>
                </div>
                @endif

                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>

            </form>
        </div>
        <div class="card-footer">
            These information are crucial please edit as per needed.
        </div>
    </div>

    </div>


@endsection