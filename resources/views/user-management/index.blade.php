@extends('layouts.app')
@section('title', $pageTitle)
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between align-items-center mt-3 mx-4">
                                <form action="{{ route('user-management.index') }}" method="GET"
                                    class="input-container icon-left icon-right position-relative">
                                    <span class="input-icon icon-left">
                                        <span data-feather="search"></span>
                                    </span>
                                    <span class="input-icon icon-right" onclick="clearSearch()">
                                        <i data-feather="x" class="text-muted"></i>
                                    </span>
                                    <input type="text" name="search" id="search"
                                        class="form-control form-control-default" placeholder="Search users..."
                                        style="width: 250px;" value="{{ request('search') }}">
                                </form>
                                <div>
                                    <a href="{{ route('user-management.create') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-plus"></i> Create User
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive p-4">
                                <table class="table mb-0">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th class="text-center align-middle">Email</th>
                                            <th class="text-center align-middle">Role</th>
                                            <th class="text-center align-middle">Company</th>
                                            <th class="text-center align-middle">Location</th>
                                            <th class="text-center align-middle">Created</th>
                                            <th class="text-center align-middle">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                            <tr>
                                                <td class="text-center align-middle">{{ $user->email }}</td>
                                                <td class="text-center align-middle">
                                                    @if ($user->role)
                                                        <span class="badge-lg text-primary rounded px-3 py-1"
                                                            style="font-size: 12px;font-weight: 500;background-color: #5f63f221;">
                                                            {{ strtolower($user->role->name) }}
                                                        </span>
                                                    @else
                                                        <span class="badge-lg text-danger rounded px-3 py-1"
                                                            style="font-size: 12px;font-weight: 500;background-color: #ff4d4f21;">Unassigned
                                                            Role</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">{{ $user->company_name ?? 'N/A' }}</td>
                                                <td class="text-center align-middle">
                                                    @if ($user->city && $user->country)
                                                        {{ $user->city }}, {{ $user->country }}
                                                    @elseif($user->city)
                                                        {{ $user->city }}
                                                    @elseif($user->country)
                                                        {{ $user->country }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $user->created_at->format('M d, Y') }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="d-inline-flex gap-2 align-items-center">

                                                        <a href="{{ route('user-management.show', $user) }}" class="mx-2"
                                                            title="View"><i class="fas fa-eye"></i></a>
                                                        <span class="text-light">|</span>
                                                        <a href="{{ route('user-management.edit', $user) }}" class="mx-2"
                                                            title="Edit"><i class="fas fa-edit"></i></a>
                                                        <span class="text-light">|</span>
                                                        <a href="{{ route('user-management.permissions', $user) }}"
                                                            class="mx-2" title="Permissions"><i
                                                                class="fas fa-key"></i></a>
                                                        @if ($user->id !== auth()->id())
                                                            <span class="text-light">|</span>
                                                            <form action="{{ route('user-management.destroy', $user) }}"
                                                                method="POST" style="display:inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-link text-danger p-0 m-0 align-baseline mx-2"
                                                                    style="font-size:inherit;" title="Delete"
                                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                                    <i class="fas fa-trash m-0"></i> </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No users found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-3 px-4 pb-3 flex-wrap">
                                <div class="text-muted small mb-2 mb-md-0">
                                    Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of
                                    {{ $users->total() }} results
                                </div>
                                <div>
                                    {{ $users->appends(request()->except('page'))->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
