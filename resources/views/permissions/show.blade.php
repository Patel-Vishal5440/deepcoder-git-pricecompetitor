@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
<div class="contents">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9 col-12">
                <div class="card mt-4">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Permission Details</h5>
                            <div>
                                <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-edit me-1"></i> Edit</a>
                                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-light">Back</a>
                            </div>
                        </div>
                        <dl class="row mb-0">
                            <dt class="col-sm-4">Name</dt>
                            <dd class="col-sm-8">{{ $permission->name }}</dd>

                            <dt class="col-sm-4">Description</dt>
                            <dd class="col-sm-8">{{ $permission->description ?? '-' }}</dd>

                            <dt class="col-sm-4">Module</dt>
                            <dd class="col-sm-8">{{ $permission->group ?? '-' }}</dd>

                            <dt class="col-sm-4">Status</dt>
                            <dd class="col-sm-8">
                                <span class="badge rounded-pill px-3 py-1" style="background: {{ $permission->is_active ? '#3bb77e' : '#e74c3c' }}; color: #fff; font-size: 12px; font-weight: 500;">
                                    {{ $permission->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </dd>

                            <dt class="col-sm-4">Assigned Roles</dt>
                            <dd class="col-sm-8">
                                @if($permission->roles->count())
                                    <div class="d-flex flex-wrap gap-1">
                                        @foreach($permission->roles as $role)
                                            <span class="badge rounded-pill px-2 py-1" style="background: #e0e7ff; color: #5f5fff; font-size: 11px; font-weight: 500;">{{ $role->name }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 