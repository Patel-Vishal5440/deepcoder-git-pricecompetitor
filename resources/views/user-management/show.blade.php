@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4">User Details</h4>
                    <dl class="row">
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>

                        <dt class="col-sm-4">Role</dt>
                        <dd class="col-sm-8">
                            @if($user->role)
                                <span class="badge rounded-pill px-3 py-1" style="background: #5f5fff; color: #fff;">
                                    {{ strtolower($user->role->name) }}
                                </span>
                            @else
                                <span class="badge bg-secondary">No Role</span>
                            @endif
                        </dd>

                        <dt class="col-sm-4">Company</dt>
                        <dd class="col-sm-8">{{ $user->company_name ?? 'N/A' }}</dd>

                        <dt class="col-sm-4">Location</dt>
                        <dd class="col-sm-8">
                            @if($user->city && $user->country)
                                {{ $user->city }}, {{ $user->country }}
                            @elseif($user->city)
                                {{ $user->city }}
                            @elseif($user->country)
                                {{ $user->country }}
                            @else
                                N/A
                            @endif
                        </dd>

                        <dt class="col-sm-4">Created</dt>
                        <dd class="col-sm-8">{{ $user->created_at->format('M d, Y') }}</dd>
                    </dl>
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('user-management.edit', $user) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('user-management.index') }}" class="btn btn-light">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 