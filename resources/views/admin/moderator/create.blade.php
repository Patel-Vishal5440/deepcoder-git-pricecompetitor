@extends('admin.layout.app')

@section('content')
    <div>
        <x-alert/>
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">{{$title}}</h3>
                </div>
            </div>            
            <form class="form" method="post" action="{{ route('admin.moderator.createOrUpdate', $moderator->id ?? '') }}"
                  enctype="multipart/form-data" id="create_form">
                @csrf
                <input type="hidden" name="id" value="{{ $moderator->id ?? '' }}">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6"
                               for="profileImage">{{__('admin.input.profile_image')}}</label>
                        <div class="col-lg-9 fv-row">
                            <input type="file"
                                   id="profileImage" class="form-control form-control-lg"
                                   accept="image/*"
                                   name="profileImage"
                                   value="">
                            <x-error name="profileImage"/>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6 required"
                               for="name">Name</label>
                        <div class="col-lg-9 fv-row">
                            <input type="text" id="name"
                                   name="name"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="Please enter name"
                                   value="{{ old('name', $moderator->name ?? '') }}">
                            <x-error name="name"/>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6 required"
                               for="email">Email</label>
                        <div class="col-lg-9 fv-row">
                            <input type="text"
                                   name="email" id="email" class="form-control form-control-lg form-control-solid"
                                   placeholder="Please enter email"
                                   value="{{ old('email', $moderator->email ?? '') }}">
                            <x-error name="email"/>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6 required"
                               for="type">Type</label>
                        <div class="col-lg-9 fv-row">
                            <select name="type" id="type" class="form-control form-control-lg form-control-solid" onchange="togglePermissions()">
                            <option value="system_developer" {{ (old('type', $moderator->type ?? '') == 'system_developer') ? 'selected' : '' }}>System Developer</option>    
                            <option value="price_manager" {{ (old('type', $moderator->type ?? '') == 'price_manager') ? 'selected' : '' }}>Price Manager</option>
                            </select>
                            {{-- <x-error name="type"/> --}}
                        </div>
                    </div>
                    {{-- {{ dd($moderator) }} --}}
                    @if(!isset($moderator))
                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6 required"
                               for="password">Password</label>
                        <div class="col-lg-9 fv-row">
                            <input type="text"
                                   name="password" id="password" class="form-control form-control-lg form-control-solid"
                                   placeholder="Please enter password" autocomplete="off">
                            <x-error name="password"/>
                        </div>
                    </div>
                    @endif
                    <div class="row mb-6">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6"
                               for="moderator_status">Status</label>
                        <div class="d-flex align-items-center position-relative my-1 w-25">
                            <select name="moderator_status" id="moderator_status"
                                    class="form-control w-250px ps-7 moderator_status" value="">
                                @foreach(\App\Utility\ModeratorStatusEnum::class::cases() as $value)
                                    <option
                                        value="{{$value->value}}" {{ (old('moderator_status',1)==$value->value) ? 'selected' : '' }}>
                                        {{$value->name}}
                                    </option>
                                @endforeach
                            </select>
                            <i class="ki-duotone ki-arrow-down fs-3 position-absolute end-0"
                               style="margin-right:42%"><span class="path1"></span></i>
                        </div>
                    </div>
                    <div class="row mb-6" id="permissions_section" style="display: none;">
                        <label class="col-lg-3 col-form-label fw-semibold fs-6 required"
                               for="permissions">Permissions</label>
                        <div class="col-lg-9 fv-row" id="permissions_list" style="display: flex; flex-wrap: wrap; gap: 15px;">
                            {{-- Permissions will be populated here based on the selected type --}}
                          
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{route('admin.moderator.index')}}"
                       class="btn btn-light btn-active-light-primary me-2">{{__('app.panel.cancel')}}</a>
                    <button type="submit" class="btn btn-primary">{{__('app.panel.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')

<script>
    $(document).ready(() => {
        togglePermissions();

        $('#create_form').validate({
            rules: {
                name: {required: true, minlength: 3, maxlength: 100},
                email: {required: true, email: true, maxlength: 100},
                @if(isset($moderator))
                password: {required: true, maxlength: 100}
                @endif
            },
        });
    });

    function togglePermissions() {
        const type = $('#type').val();
        const permissionsList = $('#permissions_list');
        permissionsList.empty();

        // Fetch existing permissions
        const existingPermissions = @json(old('permissions', isset($moderator) ? $moderator->permissions->pluck('name')->toArray() : []));
        const permissionCollection = @json($permissions ?? []);
        console.log(permissionCollection);

        // Use permissionCollection in your logic

        const permissionOptions = {
            'system_developer': [
                { value: 'Product', label: 'Product Management' },
                { value: 'Competitor', label: 'Competitor Management' },
                { value: 'CronJob', label: 'Cron Job' },
            ],
            'price_manager': [
                { value: 'find_competitor_urls', label: 'Find Competitor URLs' },
                { value: 'monitor_price', label: 'Monitor Price' },
            ]
        };

        // Update the permissions section based on the selected type
        if (permissionOptions[type]) {
            permissionOptions[type].forEach(permission => {
                permissionsList.append(`
                    <div class="form-check">
                        <input type="checkbox" name="permissions[]" value="${permission.value}" class="form-check-input"
                               id="permission_${permission.value}" ${permissionCollection.includes(permission.value) ? 'checked' : ''}>
                        <label class="form-check-label" for="permission_${permission.value}">${permission.label}</label>
                    </div>
                `);
            });
            $('#permissions_section').show();
        } else {
            $('#permissions_section').hide();
        }
    }

    $('#moderator_status').change(function () {
        const value = $("#moderator_status").val();
    });
</script>

 
@endsection
@section('style')
    <style>
        #moderator_status:hover {
            background-color: var(--bs-gray-100);
        }

        select > option {
            background-color: var(--bs-gray-100) !important;
        }
    </style>
@endsection
