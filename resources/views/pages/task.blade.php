@extends('layouts.app')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="todo-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Task App</h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <div class="form-group mb-0">
                                        <div class="input-container icon-left position-relative">
                                                <span class="input-icon icon-left">
                                                    <span data-feather="calendar"></span>
                                                </span>
                                            <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                                            <span class="input-icon icon-right">
                                                    <span data-feather="chevron-down"></span>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown action-btn">
                                    <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-download"></i> Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <span class="dropdown-item">Export With</span>
                                        <div class="dropdown-divider"></div>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-print"></i> Printer</a>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-file-pdf"></i> PDF</a>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-file-text"></i> Google Sheets</a>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-file-csv"></i> CSV</a>
                                    </div>
                                </div>
                                <div class="dropdown action-btn">
                                    <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="la la-share"></i> Share
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                        <span class="dropdown-item">Share Link</span>
                                        <div class="dropdown-divider"></div>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-facebook"></i> Facebook</a>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-twitter"></i> Twitter</a>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-google"></i> Google</a>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-feed"></i> Feed</a>
                                        <a href="" class="dropdown-item">
                                            <i class="la la-instagram"></i> Instagram</a>
                                    </div>
                                </div>
                                <div class="action-btn">
                                    <a href="" class="btn btn-sm btn-primary btn-add">
                                        <i class="la la-plus"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="note-contents">
                <div class="note-sibebar-wrapper mb-30">

                    <div class="note-sidebar">
                        <div class="card border-0">
                            <div class="card-body px-15 pt-30">
                                <div class="px-3">
                                    <a href="#" class="btn btn-primary btn-default btn-rounded btn-block" data-toggle="modal" data-target="#taskModal"> <span data-feather="plus"></span>
                                        Add Tasks</a>
                                </div>
                                <div class="note-types task-types">
                                    <ul class="nav  mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><span data-feather="edit"></span> All</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><span data-feather="star"></span>
                                                Favorite</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><span data-feather="check"></span>
                                                Completed</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-deleted-tab" data-toggle="pill" href="#pills-deleted" role="tab" aria-controls="pills-deleted" aria-selected="false"><span data-feather="trash-2"></span>
                                                Deleted</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ends: .col-lg-2 -->
                <div class="note-grid-wrapper mb-30">
                    <div class="task-wrapper">
                        <div class="task-single">
                            <div class="task-card card">
                                <div class="card-header">
                                    Task Lists
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                        <div class="card-body task-card__body">
                                            <div class="task-card__content d-flex justify-content-between align-items-center">
                                                <div class="task-card__header">
                                                    <div class="checkbox-group d-flex">
                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox" id="check-grp-task1">
                                                            <label for="check-grp-task1" class="">
                                                                Dashboard design stucture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s.</span>
                                                </div>
                                                <div class="table-actions">
                                                    <a href="#" class="">
                                                        <span data-feather="star"></span>
                                                    </a>
                                                    <div class="dropdown dropdown-click">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-default dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                            <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-body task-card__body">
                                            <div class="task-card__content d-flex justify-content-between align-items-center">
                                                <div class="task-card__header">
                                                    <div class="checkbox-group d-flex">
                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox" id="check-grp-task2">
                                                            <label for="check-grp-task2" class="">
                                                                Dashboard design stucture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s.</span>
                                                </div>
                                                <div class="table-actions">
                                                    <a href="#" class="active">
                                                        <span data-feather="star"></span>
                                                    </a>
                                                    <div class="dropdown dropdown-click">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-default dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                            <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-body task-card__body">
                                            <div class="task-card__content d-flex justify-content-between align-items-center">
                                                <div class="task-card__header">
                                                    <div class="checkbox-group d-flex">
                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox" id="check-grp-task3" checked>
                                                            <label for="check-grp-task3" class="">
                                                                Dashboard design stucture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s.</span>
                                                </div>
                                                <div class="table-actions">
                                                    <a href="#" class="">
                                                        <span data-feather="star"></span>
                                                    </a>
                                                    <div class="dropdown dropdown-click">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-default dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                            <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="task-single">

                                            <div class="card-body task-card__body">
                                                <div class="task-card__content d-flex justify-content-between align-items-center">
                                                    <div class="task-card__header">
                                                        <div class="checkbox-group d-flex">
                                                            <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                <input class="checkbox" type="checkbox" id="check-grp-task4">
                                                                <label for="check-grp-task4" class="">
                                                                    Dashboard design stucture
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                            the industry's standard dummy text ever since the 1500s.</span>
                                                    </div>
                                                    <div class="table-actions">
                                                        <a href="#" class="active">
                                                            <span data-feather="star"></span>
                                                        </a>
                                                        <div class="dropdown dropdown-click">
                                                            <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span data-feather="more-vertical"></span>
                                                            </button>
                                                            <div class="dropdown-default dropdown-menu">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                                <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card-body task-card__body">
                                                <div class="task-card__content d-flex justify-content-between align-items-center">
                                                    <div class="task-card__header">
                                                        <div class="checkbox-group d-flex">
                                                            <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                <input class="checkbox" type="checkbox" id="check-grp-task5">
                                                                <label for="check-grp-task5" class="">
                                                                    Dashboard design stucture
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                            the industry's standard dummy text ever since the 1500s.</span>
                                                    </div>
                                                    <div class="table-actions">
                                                        <a href="#" class="active">
                                                            <span data-feather="star"></span>
                                                        </a>
                                                        <div class="dropdown dropdown-click">
                                                            <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span data-feather="more-vertical"></span>
                                                            </button>
                                                            <div class="dropdown-default dropdown-menu">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                                <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card-body task-card__body">
                                                <div class="task-card__content d-flex justify-content-between align-items-center">
                                                    <div class="task-card__header">
                                                        <div class="checkbox-group d-flex">
                                                            <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                <input class="checkbox" type="checkbox" id="check-grp-task6">
                                                                <label for="check-grp-task6" class="">
                                                                    Dashboard design stucture
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                            the industry's standard dummy text ever since the 1500s.</span>
                                                    </div>
                                                    <div class="table-actions">
                                                        <a href="#" class="active">
                                                            <span data-feather="star"></span>
                                                        </a>
                                                        <div class="dropdown dropdown-click">
                                                            <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span data-feather="more-vertical"></span>
                                                            </button>
                                                            <div class="dropdown-default dropdown-menu">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                                <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                                        <div class="card-body task-card__body">
                                            <div class="task-card__content d-flex justify-content-between align-items-center">
                                                <div class="task-card__header">
                                                    <div class="checkbox-group d-flex">
                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox" id="check-grp-task7" checked>
                                                            <label for="check-grp-task7" class="">
                                                                Dashboard design stucture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s.</span>
                                                </div>
                                                <div class="table-actions">
                                                    <a href="#" class="">
                                                        <span data-feather="star"></span>
                                                    </a>
                                                    <div class="dropdown dropdown-click">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-default dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                            <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-body task-card__body">
                                            <div class="task-card__content d-flex justify-content-between align-items-center">
                                                <div class="task-card__header">
                                                    <div class="checkbox-group d-flex">
                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox" id="check-grp-task8" checked>
                                                            <label for="check-grp-task8" class="">
                                                                Dashboard design stucture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s.</span>
                                                </div>
                                                <div class="table-actions">
                                                    <a href="#" class="">
                                                        <span data-feather="star"></span>
                                                    </a>
                                                    <div class="dropdown dropdown-click">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-default dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                            <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-body task-card__body">
                                            <div class="task-card__content d-flex justify-content-between align-items-center">
                                                <div class="task-card__header">
                                                    <div class="checkbox-group d-flex">
                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox" id="check-grp-task9" checked>
                                                            <label for="check-grp-task9" class="">
                                                                Dashboard design stucture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s.</span>
                                                </div>
                                                <div class="table-actions">
                                                    <a href="#" class="">
                                                        <span data-feather="star"></span>
                                                    </a>
                                                    <div class="dropdown dropdown-click">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-default dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                            <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="pills-deleted" role="tabpanel" aria-labelledby="pills-deleted-tab">

                                        <div class="card-body task-card__body">
                                            <div class="task-card__content d-flex justify-content-between align-items-center">
                                                <div class="task-card__header">
                                                    <div class="checkbox-group d-flex">
                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox" id="check-grp-task10">
                                                            <label for="check-grp-task10" class="">
                                                                Dashboard design stucture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s.</span>
                                                </div>
                                                <div class="table-actions">
                                                    <a href="#" class="active">
                                                        <span data-feather="star"></span>
                                                    </a>
                                                    <div class="dropdown dropdown-click">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-default dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                            <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-body task-card__body">
                                            <div class="task-card__content d-flex justify-content-between align-items-center">
                                                <div class="task-card__header">
                                                    <div class="checkbox-group d-flex">
                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox" id="check-grp-task11">
                                                            <label for="check-grp-task11" class="">
                                                                Dashboard design stucture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s.</span>
                                                </div>
                                                <div class="table-actions">
                                                    <a href="#" class="active">
                                                        <span data-feather="star"></span>
                                                    </a>
                                                    <div class="dropdown dropdown-click">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-default dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                            <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-body task-card__body">
                                            <div class="task-card__content d-flex justify-content-between align-items-center">
                                                <div class="task-card__header">
                                                    <div class="checkbox-group d-flex">
                                                        <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox" id="check-grp-task12">
                                                            <label for="check-grp-task12" class="">
                                                                Dashboard design stucture
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s.</span>
                                                </div>
                                                <div class="table-actions">
                                                    <a href="#" class="active">
                                                        <span data-feather="star"></span>
                                                    </a>
                                                    <div class="dropdown dropdown-click">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-vertical"></span>
                                                        </button>
                                                        <div class="dropdown-default dropdown-menu">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> edit</a>
                                                            <a class="dropdown-item" href="#"><span data-feather="trash-2"></span> delete</a>
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
                </div><!-- ends: .col-lg-10 -->
            </div>
        </div><!-- ends: .col-lg-12 -->
    </div>
</div>
</div>
</div>
<!-- ends: .atbd-page-content -->

<div class="modal fade task-modal" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-body">
        <div class="modal-header">
            <h5 class="modal-title">Add Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span data-feather="x"></span>
            </button>
        </div>
        <form action="/">
            <div class="form-group mb-20 mt-20">
                <input type="text" class="form-control" placeholder="Title">
            </div>
            <div class="form-group mb-15">
                <textarea class="form-control" placeholder="Add description"></textarea>
            </div>
        </form>
        <div class="modal-footer m-n15">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Add Task</button>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade task-modal" id="taskModal2" tabindex="-1" aria-labelledby="taskModalLabal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-body">
        <div class="modal-header">
            <h5 class="modal-title">Edit Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span data-feather="x"></span>
            </button>
        </div>
        <form action="/">
            <div class="form-group mb-20 mt-20">
                <input type="text" class="form-control" placeholder="Edit Title" value="Dashboard design stucture">
            </div>
            <div class="form-group mb-15">
                <textarea class="form-control" placeholder="Add description"></textarea>
            </div>
        </form>
        <div class="modal-footer m-n15">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
</div>
</div>



</div>
    </div>
@endsection
