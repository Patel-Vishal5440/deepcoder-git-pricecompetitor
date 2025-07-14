@extends('layouts.app')
@section('title', $pageTitle)
@section('content')
<div class="contents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center mt-3 mx-4">
                            <form action="{{ route('user-management.index') }}" method="GET" class="d-flex align-items-center">
                                <input type="text" name="search" id="search" class="form-control form-control-default"
                                    placeholder="Search users..." style="width: 250px;" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary ms-2" style="height:35px;line-height:20px;">
                                    <i class="fas fa-search"></i>
                                </button>
                                @if(request('search'))
                                    <a href="{{ route('user-management.index') }}" class="btn btn-outline-secondary ms-2" style="height:35px;line-height:20px;">
                                        <i class="fas fa-times"></i> Clear
                                    </a>
                                @endif
                            </form>
                            <div>
                                <a href="{{ route('user-management.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-plus"></i> Create User
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive p-4">
                            <table class="table mb-0 table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Company</th>
                                        <th>Location</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->role)
                                                <span class="badge rounded-pill px-3 py-1" style="background: #5f5fff; color: #fff; font-size: 12px; font-weight: 500;">
                                                    {{ strtolower($user->role->name) }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">No Role</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->company_name ?? 'N/A' }}</td>
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
                                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('user-management.show', $user) }}" title="View"><i class="fas fa-eye"></i></a>
                                            |
                                            <a href="{{ route('user-management.edit', $user) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                            |
                                            <a href="{{ route('user-management.permissions', $user) }}" title="Permissions"><i class="fas fa-key"></i></a>
                                            @if($user->id !== auth()->id())
                                            |
                                            <form action="{{ route('user-management.destroy', $user) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" style="font-size:inherit;" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                            @endif
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
                        <div class="d-flex justify-content-between align-items-center mt-3 px-4 pb-3 flex-wrap">
                            <div class="text-muted small mb-2 mb-md-0">
                                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    let searchTimeout;
    
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            searchInput.form.submit();
        }, 500); // 500ms delay
    });
});
</script>
@endpush