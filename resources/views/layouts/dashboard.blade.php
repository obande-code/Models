@extends('layouts.apps')
@section('content')
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow mb-0"
    style="background-color: #770D0D !important;">
    <button class="navbar-toggler position-absolute d-md-none collapsed border-0" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"
        style="left: -5px">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarText">
        <p class="navbar-text text-white mb-2 hidden_P" style="visibility: hidden">
            Hi, Bryan Altes
        </p>
        <p class="text-white my-2" id="title"></p>
        <div class="d-flex">
            <p class="navbar-text text-white mb-1 header_username">
                Hi, {{ $authenticated->firstname }}{{ $authenticated->lastname }}
            </p>
            <div class="dropdown" style="width: 75px; margin-bottom: 7px">
                <svg style="width: 20px" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="bi bi-person-circle text-white mx-5 mt-2 dropdown-toggle" viewBox="0 0 16 16"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <path d="M11 6a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1116 0A8 8 0 010 8zm8-7a7 7 0 00-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 008 1z">
                    </path>
                </svg>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/userprofile">View Profile</a>
                    <a class="dropdown-item" href="/">Live Now!</a>
                    <a class="dropdown-item" href="/logout">Log-out</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" style="background-color: #770D0D !important"
            class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse w-75">
            <ul class="nav flex-column mt-5">
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/" id="home">
                        <span><img src="{{ asset('image/download (67).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Home</span>
                    </a>
                </li>
                @if(session('usertype') == 'model')
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/dashboardpage" id="dashboard">
                        <span><img src="{{ asset('image/download (76).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/analytics" id="analytics">
                        <span><img src="{{ asset('image/download (75).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Analytics</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/managepost" id="managepost">
                        <span><img src="{{ asset('image/download (81).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Manage Posts</span>
                    </a>
                </li>
                @endif
                @if(session('usertype') == 'admin')
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/modelmanagement" id="modelmanagement">
                        <span><img src="{{ asset('image/download (81).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Manage Model</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/bannermanagement" id="bannermanagement">
                        <span><img src="{{ asset('image/download (81).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Manage Banners</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/advertisemanagement" id="advertisemanagement">
                        <span><img src="{{ asset('image/download (81).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Manage Advertisement</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/blogsmanagement" id="blogsmanagement">
                        <span><img src="{{ asset('image/download (81).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Manage Blogs</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/faqsmanagement" id="faqsmanagement">
                        <span><img src="{{ asset('image/download (81).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Manage FAQs</span>
                    </a>
                </li>
                @endif
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/chats" id="chats">
                        <span><img src="{{ asset('image/download (77).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Chats</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/models" id="models">
                        <span><img src="{{ asset('image/download (20).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Models</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/premiumvideos" id="premiumvideo">
                        <span><img src="{{ asset('image/download (21).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Premium Videos</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/livenow" id="livenow">
                        <span><img src="{{ asset('image/download (66).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Live Now</span>
                    </a>
                </li>
                @if(session('usertype') == 'fan')
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/explore" id="explore">
                        <span><img src="{{ asset('image/download (68).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Explore</span>
                    </a>
                </li>
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/favorites" id="favorites">
                        <span><img src="{{ asset('image/download (22).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Favorites</span>
                    </a>
                </li>
                @endif
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/ablogs" id="ablogs">
                        <span><img src="{{ asset('image/download (23).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Blogs</span>
                    </a>
                </li>
                @if(session('usertype') == 'fan')
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/contactus" id="contactus">
                        <span><img src="{{ asset('image/download (24).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">Contact Us</span>
                    </a>
                </li>
                @endif
                <li class="nav-item mb-3 ml-3">
                    <a class="nav-link text-white" href="/afaqs" id="faqs">
                        <span><img src="{{ asset('image/download (25).png') }}" id="tickets_icon" style="width: 25px"
                                alt="Kiwi standing on oval"></span>
                        <span class="ml-2 menu_item" id="tickets_text" style="font-size: 14px">FAQs</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar_footer">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('image/download (19).png') }}" alt="">
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <div style="font-size: 0.8vw" class="text-white">Copyright &copy; 2021 OHAIII</div>
                </div>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main">
            <div class="row">
                <div class="col-md-9 col-sm-12" style="height: 95vh">
                    @yield('mainContent')
                </div>
                <div class="col-3 d-flex flex-column mt-2 border-left mt-3 models_search">
                    <div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-right-0 bg-white" id="basic-addon1"
                                    data-nsfw-filter-status="swf">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" class="form-control border-left-0" placeholder="Search for Conversation"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                   @foreach($models as $model)
                    <div class="d-flex mt-2">
                        <div class="round-img-right">
                            @if($model->profile != NULL)
                            <img src="{{asset('storage/uploads/' .$model->profile. '')}}" class="round-img" alt="">
                            @endif
                            @if($model->profile == NULL)
                            <img src="{{ asset('image/download (10).png') }}" class="round-img" alt="">
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center ml-2">
                        {{$model->name}}
                        </div>
                    </div>
                    @endforeach
                </div>
        </main>
    </div>
</div>
@endsection