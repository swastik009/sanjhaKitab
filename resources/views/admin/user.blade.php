@extends('admin.master')

@section('content')

    <div class="container-fluid" id="usersCollection">>
        @if (\Session::has('success'))

            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success</span>
                <div class="ml-5">
                    {!! \Session::get('success') !!}
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <div class="row">
        <div class="col-md-4">
        <h2 class="pb-2 display-5"><span style="color: cornflowerblue">
                <i class="fas fa-users"></i>
                Users
            </span>
        </h2>
        </div>
            <div class="col-md-4">
                <div class="float-right">
                    <form action="{{route('usersCreate')}}">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-plus"></i>
                </button>
                    </form>
                </div>
            </div>


        </div>
        <hr>

        <div class="row">

            @foreach($users as $user)
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Joined at {{\Carbon\Carbon::parse($user->created_at)->format('M d, Y')}} </strong>
                    </div>
                    <div class="card-body">

                        @section('styles')
                            <style>
                            .fixedImage {

                                width: 100%;
                                height: 20vw;
                                object-fit: cover;
                            }

                            </style>
                        @endsection

                        <div class="mx-auto d-block">
                            <img class="rounded-circle fixedImage img-fluid mx-auto d-block img-thumbnail" src="{{asset('img/'.$user->image)}}" alt="{{$user->name}}">


                            <div class="mt-5"></div>
                            <h5 class="text-sm-center mt-2 mb-1">{{$user->name}}</h5>
                            <div class="location text-sm-center">
                                <i class="fas fa-envelope"></i> <small>{{$user->email}}</small></div>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">
                            <a href="{{route('usersEdit',$user->id)}}">
                                <i class="fas fa-edit"></i>
                            </a>

                                <i data-id="{{$user->id}}" class=" delete_data fas fa-trash-alt" style="color: red"></i>


                                </div>
                    </div>
                </div>
            </div>
                @endforeach

                @section('scripts')
                    <script>

                        $('.delete_data').click(function(){
                            // console.log('here clicked');
                            var id = $(this).data('id');
                            event.preventDefault();
                            var url = 'admin/users/'+id;
                            console.log(url);
                            swal({
                                title: "Are you sure you want to delete ?",
                                text: "User will be deleted",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#1FAB45",
                                confirmButtonText: "Okay",
                                cancelButtonText: "Cancel",
                                buttonsStyling: true,
                                //closeOnConfirm: false
                            }).then(function(){

                                $.ajax({
                                    url: '/admin/users/'+id,
                                    data: {"_token": "{{ csrf_token()}}","id":id},

                                    method: 'DELETE',
                                    dataType: 'json',
                                    success: function(response) {
                                        console.log(response);
                                        swal(
                                            "User has been sucessfully delete"
                                        );
                                        $('#usersCollection').load(' #usersCollection');

                                    },
                                    failure: function (response) {
                                        swal(
                                            "Internal Error",
                                            "Oops, your item was not deleted.", // had a missing comma
                                            "error"
                                        )
                                    },

                                    error: function(xhr){
                                        alert(xhr.responseText);
                                    }

                                });


                            });
                        });

                    </script>
                    <script>
                        $('.delete_data').hover(function() {
                            $(this).css('cursor','pointer');
                        });
                    </script>
                @endsection

        </div>
        <div class="d-flex justify-content-center">
            {{$users->links()}}
        </div>
    </div>
    <hr>

@endsection