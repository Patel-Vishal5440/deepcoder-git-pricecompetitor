@extends('layouts.app')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body p-0">
                            <div class="color-dark fw-500 d-flex justify-content-between mt-15 mx-4">
                                <form action="{{ route('competitor.list') }}" method="GET" class="d-flex align-items-center">
                                    <div class="input-container icon-left position-relative">
                                        <span class="input-icon icon-left">
                                            <span data-feather="search"></span>
                                        </span>
                                        <input type="text" name="search" id="search" class="form-control form-control-default"
                                            placeholder="Search competitors" style="width: 250px;" value="{{ $search ?? '' }}">
                                    </div>
                                    <input type="hidden" name="per_page" value="{{ $perPage ?? 10 }}">
                                </form>
                                <div class="action-btn">
                                    <a href="{{ route('competitor.create') }}" class="btn btn-sm btn-success btn-add">
                                        <i class="la la-plus"></i> Add New</a>
                                </div>
                            </div>
                            <div class="table4  p-25 bg-white mb-30">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th>
                                                    <span class="userDatatable-title">Name</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Website</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Short Name</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Price Class Name</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Status</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Actions</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($competitors) == 0)
                                                <tr>
                                                    <td colspan="6">
                                                        <p class="text-center">No Competitor Found !</p>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($competitors as $competitor)
                                                    <tr>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                {{ $competitor->name }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                {{ $competitor->website == null ? 'N/A' : $competitor->website }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                {{ $competitor->shortname }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                {{ $competitor->price_class_name }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <span
                                                                    class="badge badge-{{ $competitor->status == 1 ? 'success' : 'danger' }}">
                                                                    {{ $competitor->status == 1 ? 'Active' : 'Inactive' }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <a href="{{ route('competitor.edit', $competitor->id) }}"
                                                                    class="btn btn-warning btn-xs btn-rounded float-left">Edit</a>
                                                                <button
                                                                    onclick="
                                             if(confirm('Are you sure you want to delete ?')){                                    
                                                event.preventDefault();
                                                document.getElementById('delete-{{ $competitor->id }}').submit();
                                             }else{
                                                event.preventDefault();
                                             }
                                          "
                                                                    class="btn btn-danger btn-xs btn-rounded float-left ml-1">Delete</button>
                                                                <form style="display:none;"
                                                                    id="delete-{{ $competitor->id }}"
                                                                    action="{{ route('competitor.delete', $competitor->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('post')
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="d-flex align-items-center">
                                        <form action="{{ route('competitor.list') }}" method="GET">
                                            <input type="hidden" name="search" value="{{ $search ?? '' }}">
                                            <span class="me-1">Show</span>
                                            <select name="per_page" class="form-select form-select-sm" style="width: auto; display: inline-block;" onchange="this.form.submit()">
                                                <option value="10" {{ ($perPage ?? 10) == 10 ? 'selected' : '' }}>10</option>
                                                <option value="25" {{ ($perPage ?? 10) == 25 ? 'selected' : '' }}>25</option>
                                                <option value="50" {{ ($perPage ?? 10) == 50 ? 'selected' : '' }}>50</option>
                                                <option value="100" {{ ($perPage ?? 10) == 100 ? 'selected' : '' }}>100</option>
                                            </select>
                                            <span class="ms-1">entries</span>
                                        </form>
                                    </div>
                                    <div>
                                        {{ $competitors->appends(request()->except('page'))->links() }}
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
