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
                        <object data="{{ asset('storage/game/' . $game->gamePath) }}" class="game-object" allow="fullscreen"
                            allowfullscreen>
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
                                <p>{{ $game->total_plays }} total plays</p>
                                <div class="rating-buttons">
                                    <div class="rating-score">
                                        <p><strong>{{ $game->rating }}</strong> <i class="bi bi-star-fill"></i></p>
                                    </div>

                                    {{-- like_dislike = 0,  --}}
                                    @if ($userStatus === null)
                                        <button class="rating-btn" data-rate="like" data-id="{{ $game->game_id }}"
                                            id="like-btn">
                                            <i class="bi bi-hand-thumbs-up fa-lg" aria-hidden="true"></i>
                                        </button>
                                        <button class="rating-btn" data-rate="dislike" data-id="{{ $game->game_id }}"
                                            id="dislike-btn">
                                            <i class="bi bi-hand-thumbs-down fa-lg" aria-hidden="true"></i>
                                        </button>
                                    @else
                                        @if ($userStatus->like_dislike === 1)
                                            <button class="rating-btn active-like" data-rate="like"
                                                data-id="{{ $game->game_id }}" id="like-btn">
                                                <i class="bi bi-hand-thumbs-up fa-lg" aria-hidden="true"></i>
                                            </button>
                                            <button class="rating-btn" data-rate="dislike" data-id="{{ $game->game_id }}"
                                                id="dislike-btn">
                                                <i class="bi bi-hand-thumbs-down fa-lg" aria-hidden="true"></i>
                                            </button>
                                        @elseif ($userStatus->like_dislike === -1)
                                            <button class="rating-btn" data-rate="like" data-id="{{ $game->game_id }}"
                                                id="like-btn">
                                                <i class="bi bi-hand-thumbs-up fa-lg" aria-hidden="true"></i>
                                            </button>
                                            <button class="rating-btn active-dislike" data-rate="dislike"
                                                data-id="{{ $game->game_id }}" id="dislike-btn">
                                                <i class="bi bi-hand-thumbs-down fa-lg" aria-hidden="true"></i>
                                            </button>
                                        @else
                                            <button class="rating-btn" data-rate="like" data-id="{{ $game->game_id }}"
                                                id="like-btn">
                                                <i class="bi bi-hand-thumbs-up fa-lg" aria-hidden="true"></i>
                                            </button>
                                            <button class="rating-btn" data-rate="dislike" data-id="{{ $game->game_id }}"
                                                id="dislike-btn">
                                                <i class="bi bi-hand-thumbs-down fa-lg" aria-hidden="true"></i>
                                            </button>
                                        @endif
                                    @endif

                                    <div class="dropdown">
                                        <button class="dropdown-btn" id="dropDownReport">Report</button>
                                        <div class="dropdownReport-content">
                                            <a href="#" data-report="bug">Error</a>
                                            <a href="#" data-report="harmful">Harmful</a>
                                            <a href="#" data-report="illegal">Violation of the law</a>
                                        </div>
                                    </div>
                                    <div>
                                        @if ($userStatus === null)
                                            <button class="bookmark-btn unactive"><i class="fa-solid fa-bookmark"></i> Bookmark</button>
                                        @else
                                            @if ($userStatus->bookmark === 1)
                                                <button class="bookmark-btn active"><i class="fa-solid fa-bookmark"></i> Bookmark</button>
                                            @else
                                                <button class="bookmark-btn unactive"><i class="fa-solid fa-bookmark"></i> Bookmark</button>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="loginModalLabel"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Please login to perform this action.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="{{ route('auth.login') }}" class="btn btn-primary">Login</a>
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
                                    <div class="tab-pane fade" id="reviews" role="tabpanel"
                                        aria-labelledby="reviews-tab">
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
                                                <a href="{{ route('games.play', ['id' => $game->game_id]) }}">
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
                                                <a href="{{ route('games.play', ['id' => $game->game_id]) }}">
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

    <script>
        let startTime;
    
        // Lưu thời điểm người dùng vào trang
        window.onload = function () {
            startTime = Date.now();
        };
    
        // Gửi thời gian đã sử dụng trước khi rời trang
        window.onbeforeunload = function () {
            const endTime = Date.now();
            const timeSpent = Math.round((endTime - startTime) / 1000); // Thời gian tính bằng giây
    
            // Gửi dữ liệu đến server
            navigator.sendBeacon('/games/log-time', JSON.stringify({
                game_id: {{ $game->game_id }},
                time_spent: timeSpent,
            }));
            console.log(JSON.stringify({
                game_id: {{ $game->game_id }},
                time_spent: timeSpent,
            }));
            
            startTime = Date.now();
        };
        // Gửi thời gian đã sử dụng trước khi rời trang
        //  window.onbeforeunload = async function() {
        //     const endTime = Date.now();
        //     const timeSpent = Math.round((endTime - startTime) / 1000); // Thời gian tính bằng giây

        //     await fetch('/games/log-time', {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}' // Gửi CSRF token qua header
        //         },
        //         body: JSON.stringify({
        //             game_id: {{ $game->game_id }},
        //             time_spent: timeSpent
        //         })
        //     });
        //     startTime = Date.now();
        // };
    </script>
@endsection
