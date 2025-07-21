@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ mix('css/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ mix('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable-common.css') }}">
@endsection

@section('content')
    <div class="contents">
        <div class="container-fluid" style="max-width: 100%;">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body p-0">
                            <div class="color-dark fw-500 d-flex justify-content-between mt-15 mx-4">
                                    <div class="input-container icon-left icon-right position-relative">
                                        <span class="input-icon icon-left">
                                            <span data-feather="search"></span>
                                        </span>
                                    <span class="input-icon icon-right" onclick="clearSearch()">
                                            <i data-feather="x" class="text-muted"></i>
                                        </span>
                                    <input type="text" id="search" name="search" data-table="datatable"
                                        autocomplete="off"
                                        class="form-control form-control-default"
                                        placeholder="Search competitors by name, website, or short name"
                                        style="width: 300px;" maxlength="255">
                                    </div>
                                <div class="action-btn">
                                    <a href="{{ route('competitor.create') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-plus"></i>Add New</a>
                                </div>
                            </div>
                            
                            <!-- Success/Error Messages -->
                            @if(session('delete'))
                                <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
                                    {{ session('delete') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show mx-4 mt-3" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('create'))
                                <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
                                    {{ session('create') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('update'))
                                <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
                                    {{ session('update') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="table4 p-25 bg-white mb-30">
                                <div class="table-responsive">
                                    <table id="datatable" class="table mb-0 datatable">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th class="text-center align-middle">
                                                    <span class="userDatatable-title">Name</span>
                                                </th>
                                                <th class="text-center align-middle">
                                                    <span class="userDatatable-title">Website</span>
                                                </th>
                                                <th class="text-center align-middle">
                                                    <span class="userDatatable-title">Short Name</span>
                                                </th>
                                                <th class="text-center align-middle">
                                                    <span class="userDatatable-title">Price Class Name</span>
                                                </th>
                                                <th class="text-center align-middle">
                                                    <span class="userDatatable-title">Status</span>
                                                </th>
                                                <th class="text-center align-middle">
                                                    <span class="userDatatable-title">Actions</span>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="loadingIndicator"
     style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgb(0 0 0 / 32%); z-index: 9999; display: flex; align-items: center; justify-content: center;">
    <div class="spinner-border text-danger" role="status"></div>
    </div>


@endsection

{{-- @push('scripts') --}}
@section('scripts')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function() {
    function showPageLoading() {
        document.getElementById("loadingIndicator").style.display = "flex";
    }
    function hidePageLoading() {
        document.getElementById("loadingIndicator").style.display = "none";
    }
    
    let table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        ordering: false,
        dom: 'rt<"bottom"lp><"clear">',
        language: {
            emptyTable: `<div class="py-4 text-center text-muted">
                <i class="fas fa-users fa-2x mb-2"></i><br>
                <span style="font-size: 1.1em;">No competitors found.</span>
            </div>`
        },
        ajax: {
            url: "{{ route('competitor.list') }}",
            data: function(data) {
                hidePageLoading();
                data.searchData = $('#search').val();
            },
            complete: function() {
                $('[data-bs-toggle="tooltip"]').tooltip('dispose');
                $('[data-bs-toggle="tooltip"]').tooltip();
            }
        },
        columns: [
            { data: 'name', name: 'name', className: 'text-center competitor-name-wrap', width: '250px' },
            { data: 'website_link', name: 'website', className: 'text-center', width: '200px' },
            { data: 'shortname', name: 'shortname', className: 'text-center', width: '120px' },
            { data: 'price_class_name', name: 'price_class_name', className: 'text-center', width: '150px' },
            { data: 'status', name: 'status', className: 'text-center', width: '100px' },
            { data: 'actions', name: 'actions', className: 'text-center', searchable: false, width: '120px' },
        ]
    });

    $('#search').on('keyup', function() {
        table.ajax.reload();
    });

    // Clear search function
    window.clearSearch = function() {
        $('#search').val('');
        table.ajax.reload();
    };

    // Handle delete form submission
    $(document).on('submit', 'form[action*="competitor/delete"]', function(e) {
        e.preventDefault();
        
        if (confirm('Are you sure you want to delete this competitor?')) {
            const form = $(this);
            const url = form.attr('action');
            
            $.ajax({
                url: url,
                method: 'DELETE',
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        table.ajax.reload(null, false);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    const response = xhr.responseJSON;
                    if (response && response.message) {
                        toastr.error(response.message);
                    } else {
                        toastr.error('An error occurred while deleting the competitor.');
                    }
            }
        });
    }
});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection


