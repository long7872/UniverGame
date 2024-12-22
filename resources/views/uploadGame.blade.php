@extends('layouts.app')

@section('content')
    <div class="col-md-6 offset-md-3 mt-5 ">

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
            <!-- Thêm phần tải lên file game -->
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
                    <!-- Thay đổi nội dung của nút để phù hợp với chức năng chọn ảnh bìa -->
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger('click')">Add
                        Game Cover Image</button>

                    <div class="image-upload-wrap">
                        <!-- Thay đổi chỗ này để hỗ trợ việc tải ảnh bìa game -->
                        <input class="file-upload-input" type="file" onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                            <h3>Drag and drop a cover image or select "Add Game Cover Image"</h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <!-- Hiển thị ảnh bìa đã được tải lên -->
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <!-- Thay đổi tên nút để xóa ảnh bìa -->
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
@endsection
<script>
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
