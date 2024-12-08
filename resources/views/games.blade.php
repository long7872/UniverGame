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
                        <object data="{{ asset('storage/game/Webgame_game01/index.html') }}" class="game-object"
                            allow="fullscreen" allowfullscreen>
                            <!-- Nội dung dự phòng nếu không thể tải trang trò chơi -->
                            <p>The game failed to download. Please try again later.</p>
                        </object>

                    </div>

                </div>
                <div class="row rating-instruction-row">
                    <div class="col-lg-10 instruction-rating offset-lg-1">
                        <div class="row">
                            <!-- Game Instructions and Rating Section -->

                            <!-- Game Instructions (8 columns) -->
                            <div class="game-instructions">
                                <h4>Controls</h4>
                                @foreach ($controlTypes as $index => $type)
                                    <p><strong>{{ ++$index }}.</strong> {{ $type->name }}</p>
                                    <p><strong>-</strong> {{ $type->descrip }}</p>
                                @endforeach
                            </div>

                            <!-- Rating Section (2 columns) -->

                        </div>
                        <div class="row">

                            <div class="rating-section">
                                <h3>{{ $game->name }}</h3>
                                <p>{{ $game->total_plays }} lượt chơi</p>
                                <div class="rating-buttons">
                                    <div class="rating-score">
                                        <p><strong>{{ $game->rating }}</strong> <i class="bi bi-star-fill"></i></p>
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
                                        {{ $game->descrip }}
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
                                <div class="col-lg-6"></div>
                                @foreach ($relatedGames as $game)
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('storage/gameImages/' . $game->imagePath) }}"
                                                    alt="{{ $game->imagePath }}">
                                                <a href="{{ route('play', ['id' => $game->game_id]) }}">
                                                    <div class="overlay">
                                                        <div class="info">
                                                            <h4>{{ $game->name }}</h4>
                                                            <span class="rating">{{ $game->rating }} ★</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <h2>Same-Control Games</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>
                                @foreach ($sameControlGames as $game)
                                    <div class="col-lg-2 col-md-6 col-sm-6">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="{{ asset('storage/gameImages/' . $game->imagePath) }}"
                                                    alt="{{ $game->imagePath }}">
                                                <a href="{{ route('play', ['id' => $game->game_id]) }}">
                                                    <div class="overlay">
                                                        <div class="info">
                                                            <h4>{{ $game->name }}</h4>
                                                            <span class="rating">{{ $game->rating }} ★</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
