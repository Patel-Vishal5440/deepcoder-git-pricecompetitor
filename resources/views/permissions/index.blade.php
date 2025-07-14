@extends('layouts.app')

@section('content')
<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center mt-3 mx-4">
                            <form action="{{ route('permissions.index') }}" method="GET" class="d-flex align-items-center">
                                <input type="text" name="search" id="search" class="form-control form-control-default"
                                    placeholder="Search permissions..." style="width: 250px;" value="{{ request('search') }}">
                            </form>
                            <div>
                                <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-plus"></i> Create Permission
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive p-4">
                            <table class="table mb-0 table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Module</th>
                                        <th>Assigned Roles</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->description ?? '-' }}</td>
                                            <td>{{ $permission->group ?? '-' }}</td>
                                            <td>
                                                @if($permission->roles->count())
                                                    {{ $permission->roles->pluck('name')->join(', ') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $permission->is_active ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('permissions.show', $permission) }}" title="View"><i class="fas fa-eye"></i></a>
                                                |
                                                <a href="{{ route('permissions.edit', $permission) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('permissions.toggle-status', $permission) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="font-size:inherit;" title="{{ $permission->is_active ? 'Deactivate' : 'Activate' }}">
                                                        <i class="fas fa-{{ $permission->is_active ? 'ban' : 'check' }}"></i> {{ $permission->is_active ? 'Deactivate' : 'Activate' }}
                                                    </button>
                                                </form>
                                                @if($permission->roles->count() == 0)
                                                <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display:inline">
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
                                            <td colspan="6" class="text-center">No Permission Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3 px-4 pb-3 flex-wrap">
                            <div class="text-muted small mb-2 mb-md-0">
                                Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of {{ $permissions->total() }} results
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