@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
<div class="contents">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="card shadow-sm rounded-4">
                    <div class="card-body">
                        <form action="{{ route('permissions.store') }}" method="POST" autocomplete="off">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Permission Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name') }}"
                                       placeholder="Permission Name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="group" class="form-label">Group</label>
                                <select class="form-select @error('group') is-invalid @enderror"
                                        id="group" name="group">
                                    <option value="">Select Group</option>
                                    <option value="User Management" {{ old('group') == 'User Management' ? 'selected' : '' }}>User Management</option>
                                    <option value="Role Management" {{ old('group') == 'Role Management' ? 'selected' : '' }}>Role Management</option>
                                    <option value="Permission Management" {{ old('group') == 'Permission Management' ? 'selected' : '' }}>Permission Management</option>
                                    <option value="Product Management" {{ old('group') == 'Product Management' ? 'selected' : '' }}>Product Management</option>
                                    <option value="Competitor Management" {{ old('group') == 'Competitor Management' ? 'selected' : '' }}>Competitor Management</option>
                                    <option value="Price History" {{ old('group') == 'Price History' ? 'selected' : '' }}>Price History</option>
                                    <option value="Dashboard" {{ old('group') == 'Dashboard' ? 'selected' : '' }}>Dashboard</option>
                                    <option value="System Settings" {{ old('group') == 'System Settings' ? 'selected' : '' }}>System Settings</option>
                                    <option value="General" {{ old('group') == 'General' ? 'selected' : '' }}>General</option>
                                </select>
                                @error('group')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="3"
                                          placeholder="Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('permissions.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 