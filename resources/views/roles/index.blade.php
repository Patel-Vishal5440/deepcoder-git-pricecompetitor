@extends('layouts.app')

@section('content')
<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center mt-3 mx-4">
                            <form action="{{ route('roles.index') }}" method="GET" class="d-flex align-items-center">
                                <input type="text" name="search" id="search" class="form-control form-control-default"
                                    placeholder="Search roles..." style="width: 250px;" value="{{ request('search') }}">
                            </form>
                            <div>
                                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-plus"></i> Create Role
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive p-4">
                            <table class="table mb-0 table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Permissions</th>
                                        <th>Users</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $role)
                                    <tr>
                                        <td>{{ ucfirst($role->name) }}</td>
                                        <td>{{ $role->description ?? '-' }}</td>
                                        <td>{{ $role->permissions->count() }}</td>
                                        <td>{{ $role->users->count() }}</td>
                                        <td>{{ $role->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('roles.show', $role) }}" title="View"><i class="fas fa-eye"></i></a>
                                            |
                                            <a href="{{ route('roles.edit', $role) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('roles.toggle-status', $role) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="font-size:inherit;" title="{{ $role->is_active ? 'Deactivate' : 'Activate' }}">
                                                    <i class="fas fa-{{ $role->is_active ? 'ban' : 'check' }}"></i> {{ $role->is_active ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </form>
                                            @if($role->users->count() == 0)
                                            <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" style="font-size:inherit;" title="Delete">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                            @endif
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
                        <div class="d-flex justify-content-between align-items-center mt-3 px-4 pb-3 flex-wrap">
                            <div class="text-muted small mb-2 mb-md-0">
                                Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} results
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