@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ $pageTitle }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                            <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Role Details</h4>
                            <div>
                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit Role
                                </a>
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to Roles
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Role Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th width="30%">ID:</th>
                                                <td>{{ $role->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name:</th>
                                                <td><strong>{{ ucfirst($role->name) }}</strong></td>
                                            </tr>
                                            <tr>
                                                <th>Description:</th>
                                                <td>{{ $role->description ?? 'No description provided' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status:</th>
                                                <td>
                                                    @if($role->is_active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Created:</th>
                                                <td>{{ $role->created_at->format('M d, Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Updated:</th>
                                                <td>{{ $role->updated_at->format('M d, Y H:i') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Assigned Users</h5>
                                    </div>
                                    <div class="card-body">
                                        @if($role->users->count() > 0)
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($role->users as $user)
                                                        <tr>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>
                                                                @if($user->is_active)
                                                                    <span class="badge bg-success">Active</span>
                                                                @else
                                                                    <span class="badge bg-danger">Inactive</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <p class="text-muted mb-0">No users assigned to this role.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Assigned Permissions ({{ $role->permissions->count() }})</h5>
                                    </div>
                                    <div class="card-body">
                                        @if($role->permissions->count() > 0)
                                            <div class="row">
                                                @php
                                                    $permissionsByGroup = $role->permissions->groupBy('group');
                                                @endphp
                                                
                                                @foreach($permissionsByGroup as $group => $groupPermissions)
                                                <div class="col-md-6 mb-3">
                                                    <div class="card border">
                                                        <div class="card-header bg-light">
                                                            <h6 class="mb-0">{{ $group }} ({{ $groupPermissions->count() }})</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <ul class="list-unstyled mb-0">
                                                                @foreach($groupPermissions as $permission)
                                                                <li class="mb-2">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <strong>{{ $permission->description }}</strong>
                                                                            <br>
                                                                            <small class="text-muted">{{ $permission->name }}</small>
                                                                        </div>
                                                                        <span class="badge bg-primary">Assigned</span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-muted mb-0">No permissions assigned to this role.</p>
                                        @endif
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
@endsection 