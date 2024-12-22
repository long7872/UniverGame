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
                    <div class="table-title">
                        <div class="row">

                            <div class="col-sm-5">
                                <h2>User <b>Management</b></h2>
                            </div>
                            <div class="col-sm-7">
                                <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add
                                        New
                                        User</span></a>
                                <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i>
                                    <span>Export
                                        to Excel</span></a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Date Created</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar"
                                            alt="Avatar">
                                        Michael Holz</a></td>
                                <td>04/10/2013</td>
                                <td>Admin</td>
                                <td><span class="status text-success">&bull;</span> Active</td>
                                <td>
                                    <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                            class="material-icons">&#xE8B8;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE5C9;</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="#"><img src="/examples/images/avatar/2.jpg" class="avatar"
                                            alt="Avatar">
                                        Paula Wilson</a></td>
                                <td>05/08/2014</td>
                                <td>Publisher</td>
                                <td><span class="status text-success">&bull;</span> Active</td>
                                <td>
                                    <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                            class="material-icons">&#xE8B8;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE5C9;</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><a href="#"><img src="/examples/images/avatar/3.jpg" class="avatar"
                                            alt="Avatar">
                                        Antonio Moreno</a></td>
                                <td>11/05/2015</td>
                                <td>Publisher</td>
                                <td><span class="status text-danger">&bull;</span> Suspended</td>
                                <td>
                                    <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                            class="material-icons">&#xE8B8;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE5C9;</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><a href="#"><img src="/examples/images/avatar/4.jpg" class="avatar"
                                            alt="Avatar">
                                        Mary Saveley</a></td>
                                <td>06/09/2016</td>
                                <td>Reviewer</td>
                                <td><span class="status text-success">&bull;</span> Active</td>
                                <td>
                                    <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                            class="material-icons">&#xE8B8;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE5C9;</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><a href="#"><img src="/examples/images/avatar/5.jpg" class="avatar"
                                            alt="Avatar">
                                        Martin Sommer</a></td>
                                <td>12/08/2017</td>
                                <td>Moderator</td>
                                <td><span class="status text-warning">&bull;</span> Inactive</td>
                                <td>
                                    <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                            class="material-icons">&#xE8B8;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE5C9;</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><a href="#"><img src="/examples/images/avatar/5.jpg" class="avatar"
                                            alt="Avatar">
                                        Long Sommer</a></td>
                                <td>12/08/2017</td>
                                <td>ĐẸP zai </td>
                                <td><span class="status text-warning">&bull;</span> Inactive</td>
                                <td>
                                    <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                            class="material-icons">&#xE8B8;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE5C9;</i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
