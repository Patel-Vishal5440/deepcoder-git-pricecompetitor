@extends('admin.layout.app')
@section('content')
    <div>
        <x-alert/>
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="d-flex align-items-center position-relative my-1">
                    <input type="text" id="search" name="search" data-table="datatable" autocomplete="off"
                           class="form-control form-control-solid w-250px ps-12 table_search"
                           placeholder="{{__('app.panel.search_name', ['name' => str()->plural(__('admin.competitor'))])}}">
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.competitor.create')}}" class="btn btn-primary btn-sm">
                            <i class="ki-duotone ki-plus fs-2"></i> {{__('app.panel.create_name', ['name' => __('admin.competitor')])}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <table id="datatable">
                    <thead>
                    <tr>
                        <th class="min-w-125px">Name</th>
                        <th class="min-w-125px">Website</th>
                        <th class="min-w-125px">Shortname</th>
                        <th class="min-w-125px">Price Class Name</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>

    function confirmDelete(url) {
        if (confirm('Are you sure you want to delete this competitor?')) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert(response.message);
                    $('#datatable').DataTable().ajax.reload(); // Reload table after deletion
                },
                error: function(xhr) {
                    alert('Something went wrong!');
                }
            });
        }
    }

    
    $(document).ready(function () {
        let table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ordering: false,
            ajax: {
                url: "{{ route('admin.competitor.index') }}",
                data: function (data) { 
                    data.searchData = $('#search').val();
                },
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'website', name: 'website'},
                {data: 'shortname', name: 'shortname'},
                {data: 'price_class_name', name: 'price_class_name'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', searchable: false},
                ]
            });

        $('#search').on('keyup', function () {
            table.ajax.reload();
        });

        // function confirmDelete(deleteUrl) {
     
        //     // Show confirmation dialog
        //     if (confirm("Are you sure you want to delete this product?")) {
        //         // Send DELETE request using AJAX
        //         $.ajax({
        //             url: deleteUrl, // The URL passed to confirmDelete
        //             method: "DELETE",
        //             data: {
        //                 _token: "{{ csrf_token() }}", // CSRF token for security
        //             },
        //             success: function(response) {
        //                 if (response.success) {
        //                     alert(response.message); // Show success message
        //                     // Reload the DataTable to reflect the deletion
        //                     $('#datatable').DataTable().ajax.reload(null, false);
        //                 } else {
        //                     alert("Error deleting product.");
        //                 }
        //             },
        //             error: function(jqXHR, textStatus, errorThrown) {
        //                 alert("Error: " + errorThrown);
        //             }
        //         });
        //     }
        // }
    });

</script>
@endsection
