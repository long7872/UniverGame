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
                                    <h6>TOP GAMES</h6>
                                    <h2>Most Played</h2>
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
                                                src="{{ asset('storage/images/top-game-02.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-03.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-04.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-05.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-06.jpg') }}" alt=""></a>
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
    {{-- section game hahahaha --}}
    <div class="container-fluid">
        <div class="row">
            <!-- Nội dung chính -->
            <div class="col-lg-8 offset-lg-2">
                <!-- Heading trên phần tìm kiếm -->
                <!-- Phần các tag -->
                <div class="tag-container">
                    <button class="tag">For Girls</button>
                    <button class="tag">Fighting</button>
                    <button class="tag">Driving</button>
                    <button class="tag">Shooting</button>
                    <button class="tag">Strategy & RPG</button>
                    <button class="tag">Action & Adventure</button>
                    <button class="tag">2 player</button>
                    <button class="tag">Gun</button>
                    <button class="tag">Car</button>
                    <button class="tag">Dress Up</button>
                    <button class="tag">Scary</button>
                    <button class="tag">Arcade</button>
                    <button class="tag">Cooking</button>
                    <button class="tag">Football</button>
                </div>
            </div>
        </div>
    </div>


    {{-- trang game heheheheheheh --}}

    <div class="trending container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section most-played mgBottom">
                    <div class="container">
                        <div class="row">
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
                                                src="{{ asset('storage/images/top-game-02.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-03.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-04.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-05.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-06.jpg') }}" alt=""></a>
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
                        <div class="row">
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
                                                src="{{ asset('storage/images/top-game-02.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-03.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-04.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-05.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-06.jpg') }}" alt=""></a>
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
                        <div class="row">
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
                                                src="{{ asset('storage/images/top-game-02.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-03.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-04.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-05.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-06.jpg') }}" alt=""></a>
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
                        <div class="row">
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
                                                src="{{ asset('storage/images/top-game-02.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-03.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-04.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-05.jpg') }}" alt=""></a>
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
                                                src="{{ asset('storage/images/top-game-06.jpg') }}" alt=""></a>
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

            <div class="row">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li><a href="#"> &lt; </a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="is_active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"> &gt; </a></li>
                    </ul>
                </div>
            </div>

        </div>
        
    </div>
@endsection
