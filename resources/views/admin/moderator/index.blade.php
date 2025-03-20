@extends('admin.layout.app')
@section('content')
    <div>
        <x-alert/>
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span>
                        <span class="path2"></span></i>
                    <input type="text" id="search" name="search" data-table="datatable" autocomplete="off"
                           class="form-control form-control-solid w-250px ps-12 table_search"
                           placeholder="{{__('app.panel.search_name', ['name' => str()->plural(__('admin.moderator'))])}}">
                </div>
                <div class="card-title">
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.moderator.create')}}" class="btn btn-primary btn-sm">
                            <i class="ki-duotone ki-plus fs-2"></i> {{__('app.panel.create_name', ['name' => __('admin.moderator')])}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <table id="datatable">
                    <thead>
                    <tr>
                        <th class="min-w-125px">Id</th>
                        <th class="min-w-125px">Profile Image</th>
                        <th class="min-w-125px">Name</th>
                        <th class="min-w-125px">Email</th>
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
            if (confirm('Are you sure you want to delete this moderator?')) {
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
            let table = $('#datatable').dataTable({
                processing: false,
                serverSide: true,
                searching: true,
                ordering: false,
                ajax: {
                    url: "{{ route('admin.moderator.index') }}",
                    data: function (data) { 
                        data.searchData = $('#search').val();
                    },
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', searchable: false},
                ]
            })
                .on('preDraw.dt', function () {
                    $("#loader").removeClass('d-none').addClass('d-flex')
                })
                .on('draw.dt', function () {
                    $("#loader").removeClass('d-flex').addClass('d-none')
                });
                // .on('dt-error.dt', function () {
                //     location.href = '{{route('admin.login')}}';
                // });
        })

        $.fn.dataTable.ext.errMode = 'none';

    </script>
@endsection

