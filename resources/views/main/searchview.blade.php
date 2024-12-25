@extends('layouts.app')

@section('content')
    <div class="main-banner"></div>
    <div class="container-fluid">
        <div class="row">
            <!-- Nội dung chính -->
            <div class="col-lg-8 offset-lg-2">
                <!-- Phần Most Played -->
                <div class="section most-played">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h2>Search Results for "{{ $query }}"</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="main-button">
                                    <a href="{{ route('index') }}" class="tag">Back to Home</a>
                                </div>
                            </div>
                        </div>

                        <!-- Game List -->
                        <div id="game-list">
                            @if($games->isEmpty())
                                <p class="text-center">No games found for "{{ $query }}". Try a different search!</p>
                            @else
                                @foreach ($games->chunk(6) as $row)
                                    <div class="row">
                                        @foreach ($row as $game)
                                            <div class="col-lg-2 col-md-6 col-sm-6">
                                                <div class="item">
                                                    <div class="thumb">
                                                        <img src="{{ asset('storage/gameImages/' . $game->imagePath) }}"
                                                            alt="{{ $game->name }}">
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="section trending" data-context="recentpage">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @if($games->hasPages())
                                <ul class="pagination">
                                    {{ $games->appends(['query' => $query])->links() }}
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
