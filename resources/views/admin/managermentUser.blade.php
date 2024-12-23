@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.admin.navbar')
            <div class="table-responsive col-md-9">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">

                            <div class="col-sm-5">
                                <h2>User <b>Management</b></h2>
                            </div>
                            <div class="col-sm-7">
                                <form action="{{ route('admin.export-users') }}" method="post">
                                    @csrf
                                    <button class="btn btn-secondary"><i class="material-icons">&#xE24D;</i><span>Export to Excel</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date Created</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->user_id }}</td>
                                    <td><a href="#"><img
                                                src="{{ $user->auth_provider != null ? $user->imagePath : asset('storage/images/' . $user->imagePath) }}"
                                                class="avatar" style="width: 30px; height: 30px; border-radius: 50%;"
                                                alt="Avatar"> {{ $user->name }}</a></td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        @if ($user->privilege)
                                            Admin
                                        @else
                                            Player
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status == 1)
                                            <span class="status text-success">&bull;</span> Active
                                        @elseif ($user->status == 0)
                                            <span class="status text-warning">&bull;</span> Inactive
                                        @elseif ($user->status == -1)
                                            <span class="status text-danger">&bull;</span> Suspended
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.profile.edit', ['id' => $user->user_id]) }}"
                                            class="settings" title="Settings" data-toggle="tooltip"><i
                                                class="material-icons">&#xE8B8;</i></a>
                                        <form action="{{ route('user.profile.destroy', $user->user_id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this account?');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="delete delete-button" title="Delete" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE5C9;</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    @if ($users->hasPages())
                        <nav class="d-flex justify-items-center justify-content-between">
                            <div class="d-flex justify-content-between flex-fill d-sm-none">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($users->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true">
                                            <span class="page-link">@lang('pagination.previous')</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $users->previousPageUrl() }}"
                                                rel="prev">@lang('pagination.previous')</a>
                                        </li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($users->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $users->nextPageUrl() }}"
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
                                        <span class="fw-semibold">{{ $users->firstItem() }}</span>
                                        {!! __('to') !!}
                                        <span class="fw-semibold">{{ $users->lastItem() }}</span>
                                        {!! __('of') !!}
                                        <span class="fw-semibold">{{ $users->total() }}</span>
                                        {!! __('results') !!}
                                    </p>
                                </div>

                                <div>
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($users->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true"
                                                aria-label="@lang('pagination.previous')">
                                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev"
                                                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($users->links()->elements as $element)
                                            {{-- "Three Dots" Separator --}}
                                            @if (is_string($element))
                                                <li class="page-item disabled" aria-disabled="true"><span
                                                        class="page-link">{{ $element }}</span></li>
                                            @endif

                                            {{-- Array Of Links --}}
                                            @if (is_array($element))
                                                @foreach ($element as $page => $url)
                                                    @if ($page == $users->currentPage())
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
                                        @if ($users->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next"
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
