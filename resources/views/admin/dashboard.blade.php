

@extends('admin.master')

@section('content')


        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">

                                        <h2>{{$users->count()}}</h2>
                                        @if($users->count() < 2)
                                        <span>user registered</span>
                                        @else
                                            <span>users registered</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection


