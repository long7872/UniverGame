@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Sidebar -->
        <div class="row">
            <div class="col-md-3 left-sidebar" id="left-sidebar" style="display: block;">
                <div class="sidebar">

                    <ul class="list-group mt-3">
                        <li class="list-group-item">
                            <a href="{{ route('index') }}" class="sidebar-link">HOME</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('uploadGame') }}" class="sidebar-link">UPLOAD GAME</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('report') }}" class="sidebar-link">REPORTS</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('managermentUser') }}" class="sidebar-link">MANAGEMENT USERS</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- Main content (Upload form) -->
            <div class="col-md-9">
                <form accept-charset="UTF-8" action="https://getform.io/f/{your-form-endpoint-goes-here}" method="POST"
                    enctype="multipart/form-data" target="_blank" class="p-4 border rounded shadow game-upload">
                    <div class="row mb-4">
                        <h1 class="text-center upload-title ">UPLOAD GAME</h1>
                        <br>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="gameName" class="form-label">Name of Game</label>
                            <input type="text" name="game_name" class="form-control w-100" id="gameName"
                                placeholder="Enter game name" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="gameDescription" class="form-label">Game Description</label>
                            <textarea name="game_description" class="form-control w-100" id="gameDescription" rows="2"
                                placeholder="Enter game description" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="instructions" class="form-label">Game Instructions</label>
                            <textarea name="instructions" class="form-control w-100" id="instructions" rows="2"
                                placeholder="Enter game instructions" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="platform" class="form-label">Game genre</label>
                            <select class="form-control" id="platform" name="platform" required>
                                <option value="adventure">Adventure</option>
                                <option value="fighting">Fighting</option>
                                <option value="shooter">Shooter</option>
                                <option value="action">Action</option>
                                <option value="battle_royale">Battle Royale</option>
                                <option value="fantasy">Fantasy</option>
                                <option value="rpg">Fighting RPG</option>
                                <option value="horror">Horror</option>
                                <option value="multiplayer">Multiplayer</option>
                                <option value="platformer">Platformer</option>
                                <option value="puzzle">Puzzle</option>
                                <option value="racing">Racing</option>
                                <option value="rpg">RPG</option>
                                <option value="sci_fi">Sci-Fi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label for="gameFile" class="form-label">Upload Game</label>
                            <input type="file" class="form-control upload-game-file" name="game_file" id="gameFile"
                                accept=".zip, .exe, .rar, .tar, .7z" />
                        </div>
                    </div>

                    {{-- upload cover image --}}
                    <div class="row mb-4">
                        <div class="file-upload">
                            <button class="file-upload-btn" type="button"
                                onclick="$('.file-upload-input').trigger('click')">Add
                                Game Cover Image</button>

                            <div class="image-upload-wrap">
                                <input class="file-upload-input" type="file" onchange="readURL(this);"
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
