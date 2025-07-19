@extends('layouts.app')

@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between align-items-center mt-3 mx-4">
                                <form action="{{ route('roles.index') }}" method="GET"
                                    class="input-container icon-left icon-right position-relative">
                                    <span class="input-icon icon-left">
                                        <span data-feather="search"></span>
                                    </span>
                                    <span class="input-icon icon-right" onclick="clearSearch()">
                                        <i data-feather="x" class="text-muted"></i>
                                    </span>
                                    <input type="text" name="search" id="search"
                                        class="form-control form-control-default" placeholder="Search roles..."
                                        style="width: 250px;" value="{{ request('search') }}">
                                </form>
                                <div>
                                    <a href="{{ route('roles.create') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-plus"></i> Create Role
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive p-4">
                                <table class="table mb-0">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th class="text-center align-middle">Name</th>
                                            <th class="text-center align-middle">Description</th>
                                            <th class="text-center align-middle">Permissions</th>
                                            <th class="text-center align-middle">Users</th>
                                            <th class="text-center align-middle">Status</th>
                                            <th class="text-center align-middle">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($roles as $role)
                                            <tr>
                                                <td class="text-center align-middle">{{ ucfirst($role->name) }}</td>
                                                <td class="text-center align-middle">{{ $role->description ?? '-' }}</td>
                                                <td class="text-center align-middle">{{ $role->permissions->count() }}</td>
                                                <td class="text-center align-middle">{{ $role->users->count() }}</td>
                                                <td class="text-center align-middle">
                                                    <span class="badge-lg rounded px-3 py-1"
                                                        style="font-size: 12px; font-weight: 500; color: {{ $role->is_active ? '#198754' : '#dc3545' }}; background-color: {{ $role->is_active ? '#30ff302b' : '#ffcccc85' }};">
                                                        {{ $role->is_active ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="d-inline-flex gap-2 align-items-center">
                                                        <a href="{{ route('roles.show', $role) }}" title="View" class="mx-2"><i
                                                                class="fas fa-eye"></i></a>
                                                        <span class="text-light">|</span>
                                                        <a href="{{ route('roles.edit', $role) }}" title="Edit" class="mx-2 "><i
                                                                class="fas fa-edit"></i></a>
                                                        <span class="text-light">|</span>
                                                        @if ($role->users->count() == 0)
                                                            <form action="{{ route('roles.destroy', $role) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-link text-danger p-0 m-0 align-baseline mx-2"
                                                                    style="font-size:inherit;" title="Delete">
                                                                    <i class="fas fa-trash m-0"></i> </button>
                                                            </form>
                                                            <span class="text-light">|</span>
                                                        @endif
                                                        <form action="{{ route('roles.toggle-status', $role) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit"
                                                                class="btn btn-link p-0 m-0 align-baseline mx-2"
                                                                style="font-size:inherit;"
                                                                title="{{ $role->is_active ? 'Deactivate' : 'Activate' }}">
                                                                <i
                                                                    class="fas fa-{{ $role->is_active ? 'ban' : 'check' }}"></i>
                                                                {{-- {{ $role->is_active ? 'Deactivate' : 'Activate' }} --}}
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Role Found!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-3 px-4 pb-3 flex-wrap">
                                <div class="text-muted small mb-2 mb-md-0">
                                    Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of
                                    {{ $roles->total() }} results
                                </div>
                                <div>
                                    {{ $roles->appends(request()->except('page'))->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
