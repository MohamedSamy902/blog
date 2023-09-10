@extends('layouts.admin.master')

@section('title')
    E-labclub | عرض موظف
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/photoswipe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">

@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>عرض بيانات الموظف</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">الموظفين</a></li>
        <li class="breadcrumb-item active">عرض موظف</li>
    @endcomponent

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user profile header start-->
                <div class="col-sm-12">
                    <div class="card profile-header">
                        <img class="img-fluid bg-img-cover" src="{{ asset('assets/images/user-profile/bg-profile.jpg') }}"
                            alt="" />
                        <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover"
                                src="{{ asset('assets/images/user-profile/bg-profile.jpg') }}" alt="" /></div>
                        <div class="userpro-box">
                            <div class="img-wrraper">
                                <div class="avatar"><img class="img-fluid" alt=""
                                        src="{{ asset('assets/images/user/7.jpg') }}" /></div>
                                <a class="icon-wrapper" href="{{ route('users.edit', $user->id) }}"><i class="icofont icofont-pencil-alt-5"></i></a>
                            </div>
                            <div class="user-designation">
                                <div class="title">
                                    {{-- <a target="_blank" href=""> --}}
                                        <h4>{{ $user->name }}</h4>
                                        <h6>{{ $user->roles_name }}</h6>
                                    {{-- </a> --}}
                                </div>
                                {{-- <div class="social-media">
                                    <ul class="user-list-social">
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-rss"></i></a>
                                        </li>
                                    </ul>
                                </div> --}}
                                <div class="follow">
                                    <ul class="follow-list">
                                        <li>
                                            <div class="follow-num counter">{{ $point }}</div>
                                            <span> النقط</span>
                                        </li>
                                        <li>
                                            <div class="follow-num counter">{{ $productHave }}</div>
                                            <span>المستلمه</span>
                                        </li>
                                        <li>
                                            <div class="follow-num counter">{{ $productComplate }}</div>
                                            <span>المنتهيه</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- user profile header end-->
                <div class="col-xl-3 col-lg-12 col-md-5 xl-35">
                    <div class="default-according style-1 faq-accordion job-accordion">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="p-0">
                                            <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                                data-bs-target="#collapseicon2" aria-expanded="true"
                                                aria-controls="collapseicon2">About Me</button>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                        data-parent="#accordion">
                                        <div class="card-body post-about">
                                            <ul>
                                                <li>
                                                    <div class="icon"><i data-feather="map-pin"></i></div>
                                                    <div>
                                                        <h5>{{ $user->name }}</h5>
                                                        <p>last 5 year</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i data-feather="briefcase"></i></div>
                                                    <div>
                                                        <h5>{{ $user->roles_name }}</h5>
                                                        {{-- <p>banglore - 2021</p> --}}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i data-feather="book"></i></div>
                                                    <div>
                                                        <h5>{{ $user->email }}</h5>
                                                        {{-- <p>at london univercity - 2015</p> --}}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i data-feather="heart"></i></div>
                                                    <div>
                                                        <h5>{{ $user->point }}</h5>
                                                        {{-- <p>single</p> --}}
                                                    </div>
                                                </li>
                                                {{-- <li>
                                                    <div class="icon"><i data-feather="map-pin"></i></div>
                                                    <div>
                                                        <h5>lived in london</h5>
                                                        <p>last 5 year</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i data-feather="droplet"></i></div>
                                                    <div>
                                                        <h5>blood group</h5>
                                                        <p>O+ positive</p>
                                                    </div>
                                                </li> --}}
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12 col-md-7 xl-65">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- Zero Configuration  Starts-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Zero Configuration</h5>
                                            <div class="select">Enter <select name="" id="">
                                                    <option value="1">7</option>
                                                    <option value="2">66</option>
                                                    <option value="3">5</option>
                                                    <option value="4">12</option>
                                                </select></div>

                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display" id="basic-1">
                                                    <thead>
                                                        <tr>
                                                            <th>اسم المنتج</th>
                                                            <th>العطل</th>
                                                            <th> العميل</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($user->history as $history)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ route('products.show', $history->product->id) }}">{{ $history->product->name }}</a>
                                                                </td>
                                                                <td>{{ $history->product->damage }}</td>
                                                                <td>{{ $history->product->customer->name }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Zero Configuration  Ends-->
                            </div>
                        </div> -
                    </div>
                </div>
                <!-- user profile fifth-style end-->

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->


    @push('scripts')
        <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
        <script src="{{ asset('assets/js/photoswipe/photoswipe.min.js') }}"></script>
        <script src="{{ asset('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
        <script src="{{ asset('assets/js/photoswipe/photoswipe.js') }}"></script>
        <!-- Plugins JS start-->
        <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
        <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
        <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
        <!-- Plugins JS Ends-->
    @endpush
@endsection
