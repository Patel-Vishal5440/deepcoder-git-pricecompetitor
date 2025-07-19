@extends('layouts.app')

@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between align-items-center mt-3 mx-4">
                                <form action="{{ route('permissions.index') }}" method="GET"
                                    class="input-container icon-left icon-right position-relative">
                                    <span class="input-icon icon-left">
                                        <span data-feather="search"></span>
                                    </span>
                                    <span class="input-icon icon-right" onclick="clearSearch()">
                                        <i data-feather="x" class="text-muted"></i>
                                    </span>
                                    <input type="text" name="search" id="search"
                                        class="form-control form-control-default" placeholder="Search permissions..."
                                        style="width: 250px;" value="{{ request('search') }}">
                                </form>
                                <div>
                                    <a href="{{ route('permissions.create') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-plus"></i> Create Permission
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive p-4">
                                <table class="table mb-0">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th class="text-center align-middle">Name</th>
                                            <th class="text-center align-middle">Description</th>
                                            <th class="text-center align-middle">Module</th>
                                            <th class="text-center align-middle">Assigned Roles</th>
                                            <th class="text-center align-middle">Status</th>
                                            <th class="text-center align-middle">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($permissions as $permission)
                                            <tr>
                                                <td class="text-center align-middle">{{ $permission->name }}</td>
                                                <td class="text-center align-middle">{{ $permission->description ?? '-' }}
                                                </td>
                                                <td class="text-center align-middle">{{ $permission->group ?? '-' }}</td>
                                                <td class="text-center align-middle">
                                                    @if ($permission->roles->count())
                                                        {{ $permission->roles->pluck('name')->join(', ') }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                @if ($permission->is_active == 'Active')
                                                    <span class="badge-lg rounded px-3 py-1"
                                                        style="font-size: 12px; font-weight: 500; color: #198754; background-color: #30ff302b;">Active
                                                    </span>
                                                    @else
                                                    <span class="badge-lg rounded px-3 py-1"
                                                        style="font-size: 12px; font-weight: 500; color: #dc3545; background-color: #ffcccc85;">Inactive
                                                    </span>
                                                @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="d-inline-flex gap-2 align-items-center">
                                                        <a href="{{ route('permissions.show', $permission) }}"
                                                            class="mx-2" title="View"><i class="fas fa-eye"></i></a>
                                                        <span class="text-light">|</span>
                                                        <a href="{{ route('permissions.edit', $permission) }}"
                                                            class="mx-2" title="Edit"><i class="fas fa-edit"></i></a>
                                                        <span class="text-light">|</span>
                                                        @if ($permission->roles->count() == 0)
                                                            <form action="{{ route('permissions.destroy', $permission) }}"
                                                                method="POST" style="display:inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-link text-danger p-0 m-0 align-baseline mx-2"
                                                                    style="font-size:inherit;" title="Delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                            <span class="text-light">|</span>
                                                        @endif
                                                        <form
                                                            action="{{ route('permissions.toggle-status', $permission) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit"
                                                                class="btn btn-link p-0 m-0 align-baseline mx-2"
                                                                style="font-size:inherit;"
                                                                title="{{ $permission->is_active ? 'Deactivate' : 'Activate' }}">
                                                                <i
                                                                    class="fas fa-{{ $permission->is_active ? 'ban' : 'check' }}"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Permission Found!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 px-4 pb-3 flex-wrap">
                                <div class="text-muted small mb-2 mb-md-0">
                                    Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of
                                    {{ $permissions->total() }} results
                                </div>
                                <div>
                                    {{ $permissions->appends(request()->except('page'))->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
