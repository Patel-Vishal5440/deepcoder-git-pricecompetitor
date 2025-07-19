@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
<div class="contents">
    <div class="col-lg-8 col-md-10 col-12 mx-auto my-4">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h4 class="mb-4">Create Role</h4>

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Role Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control border @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control border @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Permissions</label>
                        <div class="row">
                            @php $permissionsByGroup = $permissions->groupBy('group'); @endphp

                            @foreach($permissionsByGroup as $group => $groupPermissions)
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-header py-2 border">
                                            <strong>{{ $group }}</strong>
                                        </div>
                                        <div class="card-body py-2 border">
                                            @foreach($groupPermissions as $permission)
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input"
                                                           type="checkbox"
                                                           name="permissions[]"
                                                           value="{{ $permission->id }}"
                                                           id="permission_{{ $permission->id }}"
                                                           {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                        {{ $permission->description }}
                                                        <small class="text-muted d-block">{{ $permission->name }}</small>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @error('permissions')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end my-4 gap-2">
                        <a href="{{ route('roles.index') }}" class="btn btn-light px-4 mx-1"> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4 mx-1">Create Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card-header.bg-light.border-bottom-0 {
        background: #8d8bbd !important;
        color: #fff !important;
        border-radius: 0.5rem 0.5rem 0 0;
        font-weight: 600;
        font-size: 1rem;
    }
    .card.shadow-sm {
        margin-bottom: 3rem !important;
    }
</style>
@endpush
