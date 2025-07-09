@extends('layouts.app')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mb-30">
                    <div class="card mt-4">
                        <div class="card-body p-0">
                            <div class="color-dark fw-500 mt-15 mx-4">
                                <div class="input-container icon-left position-relative">
                                    <span class="input-icon icon-left">
                                        <span data-feather="search"></span>
                                    </span>
                                    <input type="text" id="search" class="form-control form-control-default"
                                        placeholder="Search price history..." style="width: 250px;">
                                </div>
                            </div>
                            <div class="table4 p-25 bg-white mb-30">
                                <div class="table-responsive">
                                    <table class="table mb-0" id="datatable">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th>
                                                    <span class="userDatatable-title">Date</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Product Name</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Old Price</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">New Price</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Performed By</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Load data on page load
            loadPriceHistoryData();

            // Search functionality
            $('#search').on('keyup', function() {
                var searchTerm = $(this).val();
                loadPriceHistoryData(searchTerm);
            });

            function loadPriceHistoryData(searchTerm = '') {
                $.ajax({
                    url: "{{ route('price_history.list') }}",
                    type: 'GET',
                    data: {
                        ajax: true,
                        searchData: searchTerm
                    },
                    beforeSend: function() {
                        $('#datatable tbody').html(
                            '<tr><td colspan="5" class="text-center"><i class="fa fa-spinner fa-spin"></i> Loading...</td></tr>'
                        );
                    },
                    success: function(response) {
                        var tbody = $('#datatable tbody');
                        tbody.empty();

                        if (response.data && response.data.length > 0) {
                            $.each(response.data, function(index, item) {
                                var priceChangeClass = '';
                                var priceChangeIcon = '';

                                if (parseFloat(item.price_new.replace(',', '')) < parseFloat(
                                        item.price_old.replace(',', ''))) {
                                    priceChangeClass = 'text-success';
                                    priceChangeIcon = '<i class="la la-arrow-down"></i>';
                                } else if (parseFloat(item.price_new.replace(',', '')) >
                                    parseFloat(item.price_old.replace(',', ''))) {
                                    priceChangeClass = 'text-danger';
                                    priceChangeIcon = '<i class="la la-arrow-up"></i>';
                                }

                                var row = '<tr>' +
                                    '<td><div class="userDatatable-content">' + item.date +
                                    '</div></td>' +
                                    '<td><div class="userDatatable-content"><strong>' + item
                                    .product_name + '</strong></div></td>' +
                                    '<td><div class="userDatatable-content">$' + item
                                    .price_old + '</div></td>' +
                                    '<td><div class="userDatatable-content ' +
                                    priceChangeClass + '">$' + item.price_new + ' ' +
                                    priceChangeIcon + '</div></td>' +
                                    '<td><div class="userDatatable-content">' + item
                                    .performed_by + '</div></td>' +
                                    '</tr>';
                                tbody.append(row);
                            });
                        } else {
                            tbody.append(
                                '<tr><td colspan="5" class="text-center"><p class="text-muted">No price history found</p></td></tr>'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading price history:', error);
                        $('#datatable tbody').html(
                            '<tr><td colspan="5" class="text-center"><p class="text-danger">Error loading data. Please try again.</p></td></tr>'
                        );
                    }
                });
            }
        });
    </script>
@endsection
