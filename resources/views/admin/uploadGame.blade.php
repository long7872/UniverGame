@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.admin.navbar')


            <!-- Main content (Upload form) -->
            <div class="col-md-9">
                {{-- @if ($errors->any())
                    <ul class="text-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}
                <form accept-charset="UTF-8" action="{{ route('admin.upload-game.post') }}" method="POST"
                    enctype="multipart/form-data" class="p-4 border rounded shadow game-upload">
                    @csrf
                    <div class="row mb-4">
                        <h1 class="text-center upload-title ">UPLOAD GAME</h1>
                        <br>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="gameName" class="form-label">Name of Game</label>
                            <input type="text" name="name" class="form-control w-100" id="gameName"
                                placeholder="Enter game name" maxlength="40" required>
                        </div>
                        <div>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="gameDescription" class="form-label">Game Description</label>
                            <textarea name="descrip" class="form-control w-100" id="gameDescription" rows="2"
                                placeholder="Enter game description" maxlength="1000" required></textarea>
                        </div>
                        <div>
                            @if ($errors->has('descrip'))
                                <span class="text-danger">{{ $errors->first('descrip') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="platform" class="form-label">Interaction method</label>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-wrap">
                                @foreach ($control_types as $type)
                                    <div class="form-check me-3 mb-3">
                                        <input class="form-check-input" type="checkbox" name="control_types[]"
                                            id="method_{{ $type->control_type_id }}" value="{{ $type->control_type_id }}">
                                        <label class="form-check-label" for="method_{{ $type->control_type_id }}">
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            @if ($errors->has('control_types'))
                                <span class="text-danger">{{ $errors->first('control_types') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="category" class="form-label">Game Category</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @if ($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label for="gameFile" class="form-label">Upload Game</label>
                            <input type="file" class="form-control upload-game-file" name="gamePath" id="gameFile"
                                accept=".zip" required>
                        </div>
                        <div>
                            @if ($errors->has('gamePath'))
                                <span class="text-danger">{{ $errors->first('gamePath') }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- upload cover image --}}
                    <div class="row mb-4">
                        <div class="file-upload">
                            <button class="file-upload-btn" type="button"
                                onclick="$('.file-upload-input').trigger('click')">Add
                                Game Cover Image
                            </button>
                            <div>
                                @if ($errors->has('imagePath'))
                                    <span class="text-danger">{{ $errors->first('imagePath') }}</span>
                                @endif
                            </div>
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" name="imagePath" type="file" onchange="readURL(this);"
                                    accept="image/*" />
                                <div class="drag-text">
                                    <h3>Drag and drop a cover image or select "Add Game Cover Image"</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                            class="image-title">Uploaded Cover Image</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Submit</button>
                    </div>
                </form>
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
