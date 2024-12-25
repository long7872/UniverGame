<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light Nav-header">
    <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('storage/images/logo-uni.png') }}" alt="Logo" width="110" height="50"
            class="d-inline-block align-top" />

    </a>
    <button class="navbar-toggler me-3" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto pl-3 pr-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">HOME</a>
            </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact.home') }}">CONTACT</a>
        </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="shop.html"><i class="fas fa-shopping-cart"></i> SHOP</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="shoppingCart.html"><i class="fas fa-shopping-cart"></i> SHOP CART</a>
            </li> --}}

            <!-- Nút Đăng nhập/Đăng xuất -->
            <li class="nav-item dropdown">
                @if (Auth::check())
                    <!-- Hiển thị avatar và tên người dùng -->
                    <div class="user-menu">
                        <a class="nav-link" href="javascript:void(0)">
                            <img src="{{ Auth::user()->auth_provider!=null ? Auth::user()->imagePath : asset('storage/images/'.Auth::user()->imagePath) }}" alt="Avatar"
                                style="width: 24px; height: 24px; border-radius: 50%;"> {{ Auth::user()->name }}</a>
                        <!-- Menu thả xuống -->
                        <div class="dropdown-menu">
                            <div class="user-info">
                                <span>{{ Auth::user()->name }}</span>
                            </div>
                            <hr>
                            <ul>
                                {{-- <li><a href="{{ route('recent.play') }}"><i class="fas fa-clock"></i> Recently
                                        Played</a></li>
                                <li><a href="{{ route('bookmarks') }}"><i class="fas fa-bookmark"></i> Bookmarks</a>
                                </li>
                                <li><a href="{{ route('favorites') }}"><i class="fas fa-heart"></i> Favorites</a></li>
                                <li><a href="{{ route('achievements') }}"><i class="fas fa-trophy"></i>
                                        Achievements</a></li>
                                <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i> My Profile</a></li>
                                <li><a href="{{ route('profile.edit') }}"><i class="fas fa-edit"></i> Edit Profile</a>
                                </li>
                                <li><a href="{{ route('auth.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </li> --}}
                                @if (Auth::user()->privilege === 1)
                                <li><a href="{{ route('admin.management-user') }}"><i class="fa-solid fa-user-gear"></i> Management</a></li>
                                @endif
                                <li><a href="{{ route('user.recent', ['id' => Auth::user()->user_id]) }}"><i class="fas fa-clock"></i> Recently Played</a></li>
                                <li><a href="{{ route('user.bookmark', ['id' => Auth::user()->user_id]) }}"><i class="fas fa-bookmark"></i> Bookmarks</a></li>
                                <li><a href="{{ route('user.profile', ['id' => Auth::user()->user_id]) }}"><i class="fas fa-user"></i> My Profile</a></li>
                                <li><a href="{{ route('user.profile.edit', ['id' => Auth::user()->user_id]) }}"><i class="fas fa-edit"></i> Edit Profile</a></li>
                                <li>
                                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                        style="margin: 0;">
                                        @csrf
                                        <button type="submit" class="btn btn-link nav-link">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <!-- Hiển thị nút Đăng nhập -->
                    <a class="nav-link" href="{{ route('auth.login') }}">
                        <i class="fas fa-user"></i> Login
                    </a>
                @endif
            </li>


            <li class="nav-item">
                <form action="{{ route('games.search') }}" method="GET">
                <div class="searchBox custom-search-box">
                        <input class="searchInput" type="text" name="query" placeholder="Search">
                        <button class="searchButton" type="submit" style="margin-left: 10px;">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                </form>

            </li>
        </ul>
    </div>
</nav>
