@extends('layouts.app')
@section('title', $pageTitle)
@section('content')
<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">User Permissions</h4>
                                <p class="text-muted mb-0">{{ $pageDescription }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>User Information</h5>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Name:</strong></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email:</strong></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Role:</strong></td>
                                        <td>
                                            @if($user->role)
                                                <span class="badge rounded-pill px-3 py-1" style="background: #5f5fff; color: #fff; font-size: 12px; font-weight: 500;">
                                                    {{ $user->role->name }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">No Role Assigned</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Company:</strong></td>
                                        <td>{{ $user->company_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Location:</strong></td>
                                        <td>
                                            @if($user->city && $user->country)
                                                {{ $user->city }}, {{ $user->country }}
                                            @elseif($user->city)
                                                {{ $user->city }}
                                            @elseif($user->country)
                                                {{ $user->country }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5>Role Permissions</h5>
                                @if($user->role && $user->role->permissions->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Permission</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user->role->permissions as $permission)
                                                <tr>
                                                    <td>
                                                        {{ $permission->name }}
                                                    </td>
                                                    <td>{{ $permission->description ?? 'No description available' }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-info">
                                        @if($user->role)
                                            <i class="fas fa-info-circle"></i> This role has no specific permissions assigned.
                                        @else
                                            <i class="fas fa-info-circle"></i> This user has no role assigned, therefore no permissions.
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('user-management.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left"></i> Back to Users
                                    </a>
                                    <a href="{{ route('user-management.show', $user) }}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i> View User Details
                                    </a>
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