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
            </div>
            <div class="card-body pt-0">
                <table id="datatable">
                    <thead>
                        <tr>
                            <th class="min-w-125px removeuppercase">Date</th>
                            <th class="min-w-125px removeuppercase">Product Name</th>
                            <th class="min-w-125px removeuppercase">Old Price</th>
                            <th class="min-w-125px removeuppercase">New Price</th>
                            <th class="min-w-125px removeuppercase">Performed By</th>
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
                url: "{{ route('admin.price-history.index') }}",
                data: function (data) { 
                    data.searchData = $('#search').val();
                },
            },
            columns: [
                {data: 'date', name: 'date'},
                {data: 'product_name', name: 'product_name'},
                {data: 'price_old', name: 'price_old'},
                {data: 'price_new', name: 'price_new'},
                {data: 'performed_by', name: 'performed_by'},
            ]
        });

        $('#search').on('keyup', function () {
            table.ajax.reload();
        });

    });

</script>
@endsection

<style>
    .removeuppercase {
        text-transform: none !important;
    }
</style>