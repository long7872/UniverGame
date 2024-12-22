@extends('layouts.app')

@section('content')
    <div class="container-fluid">
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
            <div class="table-responsive col-md-9">
                <div class="table-wrapper">
                    <div class="d-flex flex-column">
                        <!-- Report Card 1 -->
                        <div class="report-card">
                            <img src="https://via.placeholder.com/40" alt="User Image">
                            <div class="report-content">
                                <p class="report-title">John Doe</p>
                                <p class="report-text">
                                    <strong class="report-user-name"> Lorem :</strong> ipsum dolor sit amet, consectetur
                                    adipiscing elit.
                                </p>
                            </div>
                        </div>
                        <!-- Report Card 1 -->
                        <div class="report-card">
                            <img src="https://via.placeholder.com/40" alt="User Image">
                            <div class="report-content">
                                <p class="report-title">John Doe</p>
                                <p class="report-text">
                                    <strong class="report-user-name"> Lorem :</strong> ipsum dolor sit amet, consectetur
                                    adipiscing elit.
                                </p>
                            </div>
                        </div>
                        <!-- Report Card 1 -->
                        <div class="report-card">
                            <img src="https://via.placeholder.com/40" alt="User Image">
                            <div class="report-content">
                                <p class="report-title">John Doe</p>
                                <p class="report-text">
                                    <strong class="report-user-name"> Lorem :</strong> ipsum dolor sit amet, consectetur
                                    adipiscing elit.
                                </p>
                            </div>
                        </div>


                    </div>
                    <div class="clearfix">
                        <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#">Previous</a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div>
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
