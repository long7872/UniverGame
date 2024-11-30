@extends('layouts.app')

@section('content')
    {{-- <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Modern Warfare® II</h3>
                    <span class="breadcrumb"><a href="#">Home</a> > <a href="#">Shop</a> > Assasin Creed</span>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="game-container">

        <div class="game-embed-section">
            <div class="container">
                <div class="row">
                    <!-- Game Embed Area -->
                    <div class="col-lg-10 game-frame offset-lg-1">
                        <object data="https://quyen-jr.github.io/Webgame_game01/" class="game-object" allow="fullscreen"
                            allowfullscreen>
                            <!-- Nội dung dự phòng nếu không thể tải trang trò chơi -->
                            <p>Trò chơi không thể tải được. Vui lòng thử lại sau.</p>
                        </object>

                    </div>

                </div>
                <div class="row rating-instruction-row">
                    <div class="col-lg-10 instruction-rating offset-lg-1">
                        <div class="row">
                            <!-- Game Instructions and Rating Section -->

                            <!-- Game Instructions (8 columns) -->
                            <div class="game-instructions">
                                <h4>Hướng dẫn chơi game</h4>
                                <p><strong>1.</strong> Sử dụng các phím <span class="key">W</span><span
                                        class="key">A</span><span class="key">S</span><span class="key">D</span> để
                                    điều khiển.</p>
                                <p><strong>2.</strong> Nhấn <strong>ESC</strong> để mở menu tạm dừng.</p>
                                <p><strong>3.</strong> Tham gia vào các màn chơi để ghi điểm và khám phá thêm nhiều tính
                                    năng hấp dẫn.</p>
                            </div>

                            <!-- Rating Section (2 columns) -->

                        </div>
                        <div class="row">

                            <div class="rating-section">
                                <h3>Game Name</h3>
                                <p>286,084 lượt chơi</p>
                                <div class="rating-buttons">
                                    <div class="rating-score">
                                        <p><strong>8.1</strong> <i class="bi bi-star-fill"></i></p>
                                    </div>
                                    <button class="rating-btn" data-rate="like">
                                        <i class="bi bi-hand-thumbs-up fa-lg" aria-hidden="true"></i>
                                    </button>
                                    <button class="rating-btn" data-rate="dislike">
                                        <i class="bi bi-hand-thumbs-down fa-lg" aria-hidden="true"></i>
                                    </button>
                                    <!-- Dropdown for reporting -->
                                    <div class="dropdown">
                                        <button class="dropdown-btn" id="dropDownReport">Báo cáo</button>
                                        <div class="dropdownReport-content">
                                            <a href="#" data-report="bug">Lỗi</a>
                                            <a href="#" data-report="harmful">Có hại</a>
                                            <a href="#" data-report="illegal">Vi phạm pháp luật</a>
                                        </div>
                                    </div>
                                </div>



                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="more-info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10  offset-lg-1">
                        <div class="tabs-content">
                            <div class="row">
                                <div class="nav-wrapper ">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                                data-bs-target="#description" type="button" role="tab"
                                                aria-controls="description" aria-selected="true">Description</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                                data-bs-target="#reviews" type="button" role="tab"
                                                aria-controls="reviews" aria-selected="false">Reviews (3)</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <p>You can search for more templates on Google Search using keywords such as
                                            "templatemo
                                            digital marketing", "templatemo one-page", "templatemo gallery", etc. Please
                                            tell
                                            your friends about our website. If you need a variety of HTML templates, you may
                                            visit Tooplate and Too CSS websites.</p>
                                        <br>
                                        <p>Coloring book air plant shabby chic, crucifix normcore raclette cred swag artisan
                                            activated charcoal. PBR&B fanny pack pok pok gentrify truffaut kitsch helvetica
                                            jean
                                            shorts edison bulb poutine next level humblebrag la croix adaptogen. Hashtag
                                            poke
                                            literally locavore, beard marfa kogi bruh artisan succulents seitan tonx
                                            waistcoat
                                            chambray taxidermy. Same cred meggings 3 wolf moon lomo irony cray hell of
                                            bitters
                                            asymmetrical gluten-free art party raw denim chillwave tousled try-hard
                                            succulents
                                            street art.</p>
                                    </div>
                                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                        <p>Coloring book air plant shabby chic, crucifix normcore raclette cred swag artisan
                                            activated charcoal. PBR&B fanny pack pok pok gentrify truffaut kitsch helvetica
                                            jean
                                            shorts edison bulb poutine next level humblebrag la croix adaptogen.
                                            <br><br>Hashtag
                                            poke literally locavore, beard marfa kogi bruh artisan succulents seitan tonx
                                            waistcoat chambray taxidermy. Same cred meggings 3 wolf moon lomo irony cray
                                            hell of
                                            bitters asymmetrical gluten-free art party raw denim chillwave tousled try-hard
                                            succulents street art.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-games">
            <div class="row">
                <!-- Navbar bên trái -->

                <!-- Nội dung chính -->
                <div class="col-lg-12">
                    <!-- Phần Trending -->
                    <!-- Phần Most Played -->
                    <div class="section most-played">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h2>Related Games</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="main-button">
                                        <a href="{{ route('shop') }}">View All</a>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-01.jpg') }}" alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-02.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-03.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-04.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-05.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-06.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-01.jpg') }}" alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-02.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-03.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-04.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-05.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('details') }}"><img
                                                    src="{{ asset('storage/images/top-game-06.jpg') }}"
                                                    alt=""></a>
                                            <div class="overlay">
                                                <div class="info">
                                                    <h4>The dead of php</h4>
                                                    <span class="rating">8.1 ★</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
