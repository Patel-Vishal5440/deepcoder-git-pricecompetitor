@extends('layouts.app')
@section('content')
<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="text-capitalize font-weight-bold mb-2 mt-3" style="font-size: 1.35rem;"> </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="user-info-tab w-100 bg-white global-shadow radius-xl mb-50">
                    <div class="ap-tab-wrapper border-bottom ">
                        <ul class="nav px-30 ap-tab-main text-capitalize" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <li class="nav-item">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span data-feather="user"></span>personal info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span data-feather="lock"></span>change password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row justify-content-center">
                                <div class="col-xl-8 col-sm-10 col-12">
                                    <div class="mt-40 mb-50">
                                        <div class="user-tab-info-title mb-40 text-capitalize">
                                            <h5 class="fw-500">Personal Information</h5>
                                        </div>
                                        <div class="account-profile d-flex align-items-center mb-4 ">
                                            <div class="ap-img pro_img_wrapper">
                                                <input id="file-upload" type="file" name="profile_image" class="d-none" accept="image/*">
                                                <!-- Profile picture image-->
                                                <label for="file-upload">
                                                <img class="ap-img__main rounded-circle wh-120 bg-lighter d-flex" 
                                                     src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('img/author/profile.png') }}" 
                                                     alt="profile" id="profile-image-preview">
                                                <span class="cross" id="remove_pro_pic">
                                                <span data-feather="camera"></span>
                                                </span>
                                                </label>
                                            </div>
                                            <div class="account-profile__title">
                                                <h6 class="fs-15 ml-20 fw-500 text-capitalize">profile photo</h6>
                                                <p class="fs-13 ml-20 color-light">Click to upload new image</p>
                                            </div>
                                        </div>
                                        <div class="edit-profile__body">
                                            <form method="POST" action="{{ route('profile.update') }}">
                                                @csrf
                                                @method('PUT')
                                                
                                                @if (session('status') === 'profile-updated')
                                                    <div class="alert alert-success" role="alert">
                                                        Profile updated successfully!
                                                    </div>
                                                @endif

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-25">
                                                            <label for="name">Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                                            @error('name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-25">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                                                            <small class="form-text text-muted">Email cannot be changed</small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-25">
                                                            <label for="phone_number">Phone Number <span class="text-danger">*</span></label>
                                                            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" 
                                                                   id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required>
                                                            @error('phone_number')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-25">
                                                            <label for="company_name">Company Name</label>
                                                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" 
                                                                   id="company_name" name="company_name" value="{{ old('company_name', $user->company_name) }}">
                                                            @error('company_name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-25">
                                                            <label for="country">Country</label>
                                                            <input type="text" class="form-control @error('country') is-invalid @enderror" 
                                                                   id="country" name="country" value="{{ old('country', $user->country) }}">
                                                            @error('country')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-25">
                                                            <label for="city">City</label>
                                                            <input type="text" class="form-control @error('city') is-invalid @enderror" 
                                                                   id="city" name="city" value="{{ old('city', $user->city) }}">
                                                            @error('city')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="website">Website</label>
                                                    <input type="url" class="form-control @error('website') is-invalid @enderror" 
                                                           id="website" name="website" value="{{ old('website', $user->website) }}" placeholder="https://example.com">
                                                    @error('website')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="bio">Bio</label>
                                                    <textarea class="form-control @error('bio') is-invalid @enderror" 
                                                              id="bio" name="bio" rows="4" placeholder="Tell us about yourself...">{{ old('bio', $user->bio) }}</textarea>
                                                    @error('bio')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="button-group d-flex pt-25 justify-content-end">
                                                    {{-- <a href="{{ route('dashboard') }}" class="btn btn-light btn-default btn-squared fw-400 text-capitalize radius-md">cancel</a> --}}
                                                    <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize radius-md shadow2">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-sm-8 col-12">
                                    <div class="mt-40 mb-50">
                                        <div class="user-tab-info-title mb-35 text-capitalize">
                                            <h5 class="fw-500">Change Password</h5>
                                        </div>
                                        <div class="edit-profile__body">
                                            <form method="POST" action="{{ route('password.update') }}" id="password-form">
                                                @csrf
                                                @method('PUT')
                                                
                                                @if (session('status') === 'password-updated')
                                                    <div class="alert alert-success" role="alert">
                                                        Password updated successfully!
                                                    </div>
                                                @endif

                                                <div class="form-group mb-25">
                                                    <label for="current_password">Current Password <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
                                                           id="current_password" name="current_password" required>
                                                    @error('current_password', 'updatePassword')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="password">New Password <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
                                                           id="password" name="password" required>
                                                    @error('password', 'updatePassword')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-25">
                                                    <label for="password_confirmation">Confirm New Password <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" 
                                                           id="password_confirmation" name="password_confirmation" required>
                                                </div>

                                                <div class="button-group d-flex pt-20 justify-content-end">
                                                    {{-- <a href="{{ route('dashboard') }}" class="btn btn-light btn-default btn-squared fw-400 text-capitalize radius-md">cancel</a> --}}
                                                    <button type="submit" class="btn btn-primary btn-default btn-squared text-capitalize radius-md shadow2">Update Password</button>
                                                </div>
                                            </form>
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

@push('scripts')
<script>
$(document).ready(function() {
    // Handle profile image upload
    $('#file-upload').change(function() {
        var file = this.files[0];
        if (file) {
            var formData = new FormData();
            formData.append('profile_image', file);
            formData.append('_token', '{{ csrf_token() }}');
            
            $.ajax({
                url: '{{ route("profile.image") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $('#profile-image-preview').attr('src', response.image_url);
                        toastr.success('Profile image updated successfully!');
                    } else {
                        toastr.error(response.message || 'Failed to update profile image');
                    }
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        Object.keys(errors).forEach(function(key) {
                            toastr.error(errors[key][0]);
                        });
                    } else {
                        toastr.error('Failed to update profile image');
                    }
                }
            });
        }
    });

    // Handle password form submission
    $('#password-form').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#password-form')[0].reset();
                }
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(function(key) {
                        toastr.error(errors[key][0]);
                    });
                } else {
                    toastr.error('Failed to update password');
                }
            }
        });
    });
});
</script>
@endpush
@endsection 