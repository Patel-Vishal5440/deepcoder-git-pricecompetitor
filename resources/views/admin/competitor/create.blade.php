@extends('admin.layout.app')
@section('content')
    <div>
        <x-alert/>
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">{{ isset($competitor) ? 'Edit Competitor' : 'Add Competitor' }}</h3>
                </div>
            </div>
            <form class="form" method="POST"
                action="{{ route('admin.competitor.createOrUpdate', $competitor->id ?? '') }}"
                enctype="multipart/form-data" id="create_form">
            @csrf
                <div class="card-body border-top p-9">
                    <!-- Name Field -->
                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6 required" for="name">Name</label>
                        <div class="col-lg-9 fv-row">
                            <input type="text" id="name"
                                   name="name"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="Please enter name"
                                   value="{{ old('name', isset($competitor) ? $competitor->name : '') }}">
                            <x-error name="name"/>
                        </div>
                    </div>

                    <!-- Website Field -->
                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6 required" for="website">Website</label>
                        <div class="col-lg-9 fv-row">
                            <input type="text" name="website" id="website"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="Please enter website"
                                   value="{{ old('website', isset($competitor) ? $competitor->website : '') }}">
                            <x-error name="website"/>
                        </div>
                    </div>

                     <!-- shortname Field -->
                     <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6 required" for="shortname">shortname</label>
                        <div class="col-lg-9 fv-row">
                            <input type="text" name="shortname" id="shortname"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="Please enter shortname"
                                   value="{{ old('shortname', isset($competitor) ? $competitor->shortname : '') }}">
                            <x-error name="shortname"/>
                        </div>
                    </div>

                     <!-- price class name Field -->
                     <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6 required" for="shortname">class name</label>
                        <div class="col-lg-9 fv-row">
                            <input type="text" name="price_class_name" id="priceClassName"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="Please enter price class name"
                                   value="{{ old('price_class_name', isset($competitor) ? $competitor->price_class_name : '') }}">
                            <x-error name="price_class_name"/>
                        </div>
                    </div>

                    <!-- Status Field -->
                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6" for="status">Status</label>
                        <div class="d-flex align-items-center position-relative my-1 w-25">
                            <select name="status" id="competitor_status"
                                    class="form-control w-250px ps-7 status">
                                @foreach(\App\Utility\CompetitorStatusEnum::cases() as $value)
                                    <option value="{{ $value->value }}"
                                            {{ old('status', isset($competitor) ? $competitor->status : 1) == $value->value ? 'selected' : '' }}>
                                        {{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="ki-duotone ki-arrow-down fs-3 position-absolute end-0"
                               style="margin-right:42%"><span class="path1"></span></i>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{route('admin.competitor.index')}}"
                       class="btn btn-light btn-active-light-primary me-2">{{__('app.panel.cancel')}}</a>
                    <button type="submit" class="btn btn-primary">{{ isset($competitor) ? __('app.panel.updates') : __('app.panel.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(() => {
        $('#create_form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
                website: {
                    required: true,
                    url: true,
                    maxlength: 100
                },
            },
            messages: {
                website: {
                    url: "Please enter a valid website URL."
                }
            }
        });
    });

    $('#competitor_status').change(function () {
        value = $("#competitor_status").val();
    });
</script>
@endsection
