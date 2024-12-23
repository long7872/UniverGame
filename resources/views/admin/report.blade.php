@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.admin.navbar')
            <div class="table-responsive col-md-9">
                <div class="table-wrapper">
                    <div class="d-flex flex-column">
                        @foreach ($reports as $report)
                            <div class="report-card">
                                <!-- Hình ảnh -->
                                <img src="{{ $report->user->auth_provider != null ? $report->user->imagePath : asset('storage/images/' . $report->user->imagePath) }}" alt="User Image">

                                <!-- Nội dung report -->
                                <div class="report-content">
                                    <p class="report-title">
                                        <a href="{{ route('games.play', ['id' => $report->game->game_id]) }}">
                                            {{ $report->game->name }}
                                        </a>
                                    </p>
                                    <p class="report-text">
                                        <strong class="report-user-name">
                                            <a href="{{ route('user.profile', ['id' => $report->user->user_id]) }}">
                                                {{ $report->user->name }}
                                            </a>:
                                        </strong>
                                        {{ $report->report }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($reports->hasPages())
                        <nav class="d-flex justify-items-center justify-content-between">
                            <div class="d-flex justify-content-between flex-fill d-sm-none">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($reports->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true">
                                            <span class="page-link">@lang('pagination.previous')</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $reports->previousPageUrl() }}"
                                                rel="prev">@lang('pagination.previous')</a>
                                        </li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($reports->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $reports->nextPageUrl() }}"
                                                rel="next">@lang('pagination.next')</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled" aria-disabled="true">
                                            <span class="page-link">@lang('pagination.next')</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                                <div>
                                    <p class="small text-muted">
                                        {!! __('Showing') !!}
                                        <span class="fw-semibold">{{ $reports->firstItem() }}</span>
                                        {!! __('to') !!}
                                        <span class="fw-semibold">{{ $reports->lastItem() }}</span>
                                        {!! __('of') !!}
                                        <span class="fw-semibold">{{ $reports->total() }}</span>
                                        {!! __('results') !!}
                                    </p>
                                </div>

                                <div>
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($reports->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.previous')">
                                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $reports->previousPageUrl() }}" rel="prev"
                                                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($reports->links()->elements as $element)
                                            {{-- "Three Dots" Separator --}}
                                            @if (is_string($element))
                                                <li class="page-item disabled" aria-disabled="true"><span
                                                        class="page-link">{{ $element }}</span></li>
                                            @endif

                                            {{-- Array Of Links --}}
                                            @if (is_array($element))
                                                @foreach ($element as $page => $url)
                                                    @if ($page == $reports->currentPage())
                                                        <li class="page-item active" aria-current="page"><span
                                                                class="page-link">{{ $page }}</span></li>
                                                    @else
                                                        <li class="page-item"><a class="page-link"
                                                                href="{{ $url }}">{{ $page }}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($reports->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $reports->nextPageUrl() }}" rel="next"
                                                    aria-label="@lang('pagination.next')">&rsaquo;</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.next')">
                                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection

<script>
    // JavaScript để bật/tắt sidebar
    document.getElementById("toggle-btn").addEventListener("click", function() {
        var sidebar = document.getElementById("left-sidebar");
        sidebar.classList.toggle("hide");
    });

    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
