@extends('layouts.app')

@section('content')
    <div class="main-banner">

    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Navbar bên trái -->

            <!-- Nội dung chính -->
            <div class="col-lg-8 offset-lg-2">
                <!-- Phần Trending -->
                <!-- Phần Most Played -->
                <div class="section most-played">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    {{-- <h6>TOP GAMES</h6> --}}
                                    <h2>Your bookmarked games</h2>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="main-button">
                                    <a href="{{ route('index') }}" class="tag">Back to Home</a>
                                </div>
                            </div>

                        </div>
                        <div id="game-list">
                            @foreach ($games->chunk(6) as $row)
                                <div class="row">
                                    @foreach ($row as $game)
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="section trending" data-context="bookmarkpage">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination_index">
                                <li><a data-page="0" class="disabled"> &lt; </a></li>
                                <li><a data-page="1" class="is_active">1</a></li>
                                <li><a data-page="2">2</a></li>
                                <li><a data-page="3">3</a></li>
                                <li><a data-page="2"> &gt; </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    // Truyền thông tin người dùng vào biến toàn cục
                    window.Laravel = {
                        userId: "{{ Auth::user()->user_id ?? '' }}"
                    };
                </script>
            </div>
        </div>
    </div>
@endsection
