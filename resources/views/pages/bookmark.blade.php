@extends('layouts.app')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="todo-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Bookmarks</h4>
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
                <div class="bookmark-page bookmark-page--grid mb-30">
                    <div class="row">
                        <div class="columns-1 col-lg-4 col-md-5 col-sm-12">
                            <div class="bookmark-sidebar">

                                <div class="note-sidebar">
                                    <div class="card border-0">
                                        <div class="card-body px-15 pt-30">
                                            <div class="px-3">
                                                <a href="#" class="btn btn-primary btn-default btn-rounded btn-block" data-toggle="modal" data-target="#taskModal"> <span data-feather="plus"></span>
                                                    Add New Folder</a>
                                            </div>
                                            <div class="note-types task-types">
                                                <ul class="nav  mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><span data-feather="folder"></span> Designs</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><span data-feather="folder"></span>
                                                            Plugin</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><span data-feather="folder"></span>
                                                            Wireframe</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="pills-deleted-tab" data-toggle="pill" href="#pills-deleted" role="tab" aria-controls="pills-deleted" aria-selected="false"><span data-feather="folder"></span>
                                                            Prototype</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="columns-2 col-lg-8 col-md-7 col-sm-12 mt-sm-30 mt-md-0">
                            <div class="bookmark-page__list">
                                <div class="bookmark-single">
                                    <div class="bookmark-card card">
                                        <div class="card-header">
                                            <h6 class="fs-500">Designs</h6>
                                        </div>
                                        <div class="card-body pt-30">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <div class="row mx-n1">
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">File Manager Design</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark2.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Dashboard Design Structure</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark3.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Strikingdash New Features</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark4.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Snow Covered Mountain</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">File Manager Design</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark2.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Dashboard Design Structure</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark3.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Strikingdash New Features</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark4.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Snow Covered Mountain</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <div class="task-single">
                                                        <div class="row mx-n1">
                                                            <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                                <div class="card bookmark bookmark--grid">
                                                                    <div class="bookmark__image">
                                                                        <div class="like-icon">
                                                                            <button type="button" class="content-center">
                                                                                <i class="las la-star color-warning"></i>
                                                                            </button>
                                                                        </div>
                                                                        <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark.png') }}" alt="digital-chair"></a>
                                                                    </div>
                                                                    <div class="card-body px-15 py-20">
                                                                        <div class="bookmark__body text-capitalize">
                                                                            <h6 class="card-title">File Manager Design</h6>
                                                                            <a href="#">https://themeforest.net/strikingdash
                                                                                react-admin</a>
                                                                        </div>
                                                                        <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                            <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                            </button>
                                                                            <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                                <div class="card bookmark bookmark--grid">
                                                                    <div class="bookmark__image">
                                                                        <div class="like-icon">
                                                                            <button type="button" class="content-center">
                                                                                <i class="las la-star color-warning"></i>
                                                                            </button>
                                                                        </div>
                                                                        <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark2.png') }}" alt="digital-chair"></a>
                                                                    </div>
                                                                    <div class="card-body px-15 py-20">
                                                                        <div class="bookmark__body text-capitalize">
                                                                            <h6 class="card-title">Dashboard Design Structure</h6>
                                                                            <a href="#">https://themeforest.net/strikingdash
                                                                                react-admin</a>
                                                                        </div>
                                                                        <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                            <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                            </button>
                                                                            <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                                <div class="card bookmark bookmark--grid">
                                                                    <div class="bookmark__image">
                                                                        <div class="like-icon">
                                                                            <button type="button" class="content-center">
                                                                                <i class="las la-star color-warning"></i>
                                                                            </button>
                                                                        </div>
                                                                        <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark3.png') }}" alt="digital-chair"></a>
                                                                    </div>
                                                                    <div class="card-body px-15 py-20">
                                                                        <div class="bookmark__body text-capitalize">
                                                                            <h6 class="card-title">Strikingdash New Features</h6>
                                                                            <a href="#">https://themeforest.net/strikingdash
                                                                                react-admin</a>
                                                                        </div>
                                                                        <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                            <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                            </button>
                                                                            <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                                <div class="card bookmark bookmark--grid">
                                                                    <div class="bookmark__image">
                                                                        <div class="like-icon">
                                                                            <button type="button" class="content-center">
                                                                                <i class="las la-star color-warning"></i>
                                                                            </button>
                                                                        </div>
                                                                        <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark4.png') }}" alt="digital-chair"></a>
                                                                    </div>
                                                                    <div class="card-body px-15 py-20">
                                                                        <div class="bookmark__body text-capitalize">
                                                                            <h6 class="card-title">Snow Covered Mountain</h6>
                                                                            <a href="#">https://themeforest.net/strikingdash
                                                                                react-admin</a>
                                                                        </div>
                                                                        <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                            <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                            </button>
                                                                            <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                                <div class="card bookmark bookmark--grid">
                                                                    <div class="bookmark__image">
                                                                        <div class="like-icon">
                                                                            <button type="button" class="content-center">
                                                                                <i class="las la-star color-warning"></i>
                                                                            </button>
                                                                        </div>
                                                                        <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark.png') }}" alt="digital-chair"></a>
                                                                    </div>
                                                                    <div class="card-body px-15 py-20">
                                                                        <div class="bookmark__body text-capitalize">
                                                                            <h6 class="card-title">File Manager Design</h6>
                                                                            <a href="#">https://themeforest.net/strikingdash
                                                                                react-admin</a>
                                                                        </div>
                                                                        <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                            <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                            </button>
                                                                            <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                                <div class="card bookmark bookmark--grid">
                                                                    <div class="bookmark__image">
                                                                        <div class="like-icon">
                                                                            <button type="button" class="content-center">
                                                                                <i class="las la-star color-warning"></i>
                                                                            </button>
                                                                        </div>
                                                                        <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark2.png') }}" alt="digital-chair"></a>
                                                                    </div>
                                                                    <div class="card-body px-15 py-20">
                                                                        <div class="bookmark__body text-capitalize">
                                                                            <h6 class="card-title">Dashboard Design Structure</h6>
                                                                            <a href="#">https://themeforest.net/strikingdash
                                                                                react-admin</a>
                                                                        </div>
                                                                        <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                            <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                            </button>
                                                                            <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                                <div class="card bookmark bookmark--grid">
                                                                    <div class="bookmark__image">
                                                                        <div class="like-icon">
                                                                            <button type="button" class="content-center">
                                                                                <i class="las la-star color-warning"></i>
                                                                            </button>
                                                                        </div>
                                                                        <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark3.png') }}" alt="digital-chair"></a>
                                                                    </div>
                                                                    <div class="card-body px-15 py-20">
                                                                        <div class="bookmark__body text-capitalize">
                                                                            <h6 class="card-title">Strikingdash New Features</h6>
                                                                            <a href="#">https://themeforest.net/strikingdash
                                                                                react-admin</a>
                                                                        </div>
                                                                        <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                            <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                            </button>
                                                                            <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                                <div class="card bookmark bookmark--grid">
                                                                    <div class="bookmark__image">
                                                                        <div class="like-icon">
                                                                            <button type="button" class="content-center">
                                                                                <i class="las la-star color-warning"></i>
                                                                            </button>
                                                                        </div>
                                                                        <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark4.png') }}" alt="digital-chair"></a>
                                                                    </div>
                                                                    <div class="card-body px-15 py-20">
                                                                        <div class="bookmark__body text-capitalize">
                                                                            <h6 class="card-title">Snow Covered Mountain</h6>
                                                                            <a href="#">https://themeforest.net/strikingdash
                                                                                react-admin</a>
                                                                        </div>
                                                                        <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                            <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                            </button>
                                                                            <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                    <div class="row mx-n1">
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">File Manager Design</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark2.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Dashboard Design Structure</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark3.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Strikingdash New Features</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark4.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Snow Covered Mountain</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">File Manager Design</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark2.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Dashboard Design Structure</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark3.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Strikingdash New Features</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark4.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Snow Covered Mountain</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-deleted" role="tabpanel" aria-labelledby="pills-deleted-tab">
                                                    <div class="row mx-n1">
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">File Manager Design</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark2.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Dashboard Design Structure</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark3.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Strikingdash New Features</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark4.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Snow Covered Mountain</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">File Manager Design</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark2.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Dashboard Design Structure</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark3.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Strikingdash New Features</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="cus-xl-3 col-lg-6 col-md-12 col-sm-6 col-12 mb-30 px-10">

                                                            <div class="card bookmark bookmark--grid">
                                                                <div class="bookmark__image">
                                                                    <div class="like-icon">
                                                                        <button type="button" class="content-center">
                                                                            <i class="las la-star color-warning"></i>
                                                                        </button>
                                                                    </div>
                                                                    <a href="#"><img class="card-img-top img-fluid" src="{{ asset('img/bookmark4.png') }}" alt="digital-chair"></a>
                                                                </div>
                                                                <div class="card-body px-15 py-20">
                                                                    <div class="bookmark__body text-capitalize">
                                                                        <h6 class="card-title">Snow Covered Mountain</h6>
                                                                        <a href="#">https://themeforest.net/strikingdash
                                                                            react-admin</a>
                                                                    </div>
                                                                    <div class="bookmark__button d-flex mt-15 flex-wrap">
                                                                        <button class="btn btn-primary btn-sm btn-squared border-0 " data-toggle="modal" data-target="#taskModal2">Edit
                                                                        </button>
                                                                        <button class="btn btn-sm btn-squared btn-outline-light px-15 ">
                                                                            Remove
                                                                        </button>
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
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade task-modal" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Bookmark</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span data-feather="x"></span>
                                </button>
                            </div>
                            <form action="/">
                                <div class="form-group mb-20 mt-20">
                                    <input type="text" class="form-control" placeholder="Title">
                                </div>
                                <div class="form-group mb-15">
                                    <input type="text" class="form-control" placeholder="Web Url">
                                </div>
                            </form>
                            <div class="modal-footer m-n15">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Add Bookmark</button>
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
                                <h5 class="modal-title">Edit Bookmark</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span data-feather="x"></span>
                                </button>
                            </div>
                            <form action="/">
                                <div class="form-group mb-20 mt-20">
                                    <input type="text" class="form-control" placeholder="Dashboard design stucture">
                                </div>
                                <div class="form-group mb-15">
                                    <input type="text" class="form-control" placeholder="https://themeforest.net/strikingdashg">
                                </div>
                            </form>
                            <div class="modal-footer m-n15">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
@endsection
