@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ mix('css/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ mix('css/toastr.css') }}">
@endsection

@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body p-0">
                            <div class="color-dark fw-500 d-flex justify-content-start mt-15 mx-4">
                                <div class="input-container icon-left position-relative">
                                    <span class="input-icon icon-left">
                                        <span data-feather="search"></span>
                                    </span>
                                    <input type="text" id="search" name="search" data-table="datatable"
                                        autocomplete="off"
                                        class="form-control form-control-solid w-250px ps-12 table_search"
                                        placeholder="Search Product">
                                </div>
                            </div>
                            <div class="table4 p-25 bg-white mb-30">
                                <div class="table-responsive">
                                    <table id="datatable" class="table mb-0">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th>
                                                    <span class="userDatatable-title">Id</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Name</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Sku</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Price</span>
                                                </th>
                                                @foreach ($competitors as $competitorId => $competitorName)
                                                    <th>
                                                        <span class="userDatatable-title">{{ $competitorName }} Link</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Price</span>
                                                    </th>
                                                @endforeach
                                                <th>
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

    <!-- Add Modal -->
    <div class="modal fade com_Link" id="competitorLinkModal" tabindex="-1" role="dialog"
        aria-labelledby="competitorLinkModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="competitorLinkModalLabel">Assign Competitor Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="modalCompetitorLink" placeholder="Enter Competitor Link">
                    <input type="hidden" id="modalCompetitorId">
                    <input type="hidden" id="modalProductId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveCompetitorLink">Save Link</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add this modal after the competitor link modal -->
    <div class="modal fade" id="priceEditModal" tabindex="-1" role="dialog" aria-labelledby="priceEditModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="priceEditModalLabel">Edit Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="modalPrice" placeholder="Enter Price">
                    <input type="hidden" id="modalPriceProductId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary savePriceBtn" id="savePrice">Save Price</button>
                </div>
            </div>
        </div>
    </div>

    <div id="loadingIndicator"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 9999; display: flex; align-items: center; justify-content: center;">
        <div class="spinner-border text-light" role="status"></div>
    </div>
@endsection

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
                ajax: {
                    url: "{{ route('products.list') }}",
                    data: function(data) {
                        hidePageLoading();
                        data.searchData = $('#search').val();
                    },
                    complete: function() {
                        // Reinitialize tooltips after table updates
                        $('[data-bs-toggle="tooltip"]').tooltip('dispose');
                        $('[data-bs-toggle="tooltip"]').tooltip();
                    }
                },
                columns: [{
                        data: 'odoo_id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'default_code',
                        name: 'default_code'
                    },
                    {
                        data: 'list_price',
                        name: 'list_price',
                        render: function(data, type, row) {
                            return `
                        <div class="d-flex align-items-center gap-2">
                            <span>${data}</span>
                            <a href="javascript:void(0)" 
                            class="btn btn-icon btn-sm btn-light-primary edit-price-btn" 
                            data-product-id="${row.odoo_id}"
                            data-current-price="${data}"
                            style="width: 32px; height: 32px;">
                                <i class="fas fa-edit fs-6"></i>
                            </a>
                        </div>
                    `;
                        }
                    },
                    @foreach ($competitors as $competitorId => $competitorName)
                        {
                            data: 'competitor_link_{{ $competitorId }}',
                            name: 'competitor_link_{{ $competitorId }}',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                let displayText = data ? (data.length > 30 ? data.substring(0, 30) +
                                    '...' : data) : 'No link available';
                                return `
                                <div class="d-flex align-items-center gap-2">
                                    <a href="javascript:void(0)" 
                                       class="btn btn-icon btn-sm btn-light-primary add-link-btn" 
                                       data-row-id="{{ $competitorId }}"
                                       data-product-id="${row.id}"
                                       data-current-link="${data || ''}"
                                       style="width: 32px; height: 32px;">
                                        <i class="fas fa-link fs-6"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                       class="btn btn-icon btn-sm btn-light-info" 
                                       data-bs-toggle="tooltip" 
                                       data-bs-placement="top"
                                       data-bs-custom-class="tooltip-long"
                                       data-bs-html="true"
                                       data-bs-title="${data ? `<div style='max-width: 300px; word-wrap: break-word;'>${data}</div>` : 'No link available'}"
                                       style="width: 32px; height: 32px;">
                                        <i class="bi bi-info-circle fs-6"></i>
                                    </a>
                                </div>
                            `;
                            }
                        }, {
                            data: 'competitor_price_{{ $competitorId }}',
                            name: 'competitor_price_{{ $competitorId }}',
                        },
                    @endforeach {
                        data: 'action',
                        name: 'action',
                        searchable: false
                    },
                ]
            });

            $('#search').on('keyup', function() {
                table.ajax.reload();
            });

            $(document).on("click", ".edit-price-btn", function() {
                let id = $(this).data("product-id");
                let currentPrice = $(this).data("current-price");

                $('#modalPriceProductId').val(id);
                $('#modalPrice').val(currentPrice);
                $('#priceEditModal').modal('show');
            });

            $(document).on('click', '.add-link-btn', function() {
                let rowId = $(this).data('row-id');
                let productId = $(this).data('product-id');
                let currentLink = $(this).data('current-link');

                $('#modalCompetitorId').val(rowId);
                $('#modalProductId').val(productId);
                $('#modalCompetitorLink').val(currentLink);

                $('#competitorLinkModal').modal('show');
            });

            // Add save handler for modal

            $(document).on('click', '#saveCompetitorLink', function() {
                showPageLoading(); // Show loading indicator
                let competitorId = $('#modalCompetitorId').val();
                let productId = $('#modalProductId').val();
                let link = $('#modalCompetitorLink').val();

                if (!link.trim()) {
                    toastr.error('Please enter a  URL');
                    $('.com_Link').modal('hide');
                    hidePageLoading();
                    table.ajax.reload();
                } else {
                    $.ajax({
                        url: "{{ route('products.addLink') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            competitor_id: competitorId,
                            competitor_url: link,
                            product_id: productId
                        },
                        success: function(response) {
                            hidePageLoading();
                            if (response.success) {
                                toastr.success(response.message);
                                $('#competitorLinkModal').modal('hide');
                                table.ajax.reload(null, false);
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function(response) {
                            hidePageLoading();
                            toastr.error(response.message);
                        }
                    });
                }
            });

            // Add this new click handler for the save price button
            $(document).on('click', '.savePriceBtn', function() {
                showPageLoading();
                let id = $('#modalPriceProductId').val();
                let newPrice = $('#modalPrice').val();

                $.ajax({
                    url: "{{ route('products.updatePrice') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        list_price: newPrice
                    },
                    success: function(response) {
                        hidePageLoading();
                        if (response.success) {
                            toastr.success('Price updated successfully');
                            $('#priceEditModal').modal('hide');
                            table.ajax.reload(null, false);
                        } else {
                            toastr.error('Error updating price');
                        }
                    },
                    error: function() {
                        hidePageLoading();
                        toastr.error('Error updating price');
                    }
                });

            });

            $(document).on('click', '.sync-product', function() {
                showPageLoading();
                let odooId = $(this).data('product-id');

                $.ajax({
                    url: "{{ route('products.sync-specific') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        odoo_id: odooId
                    },
                    success: function(response) {
                        hidePageLoading();
                        if (response.success) {
                            toastr.success(response.message);
                            table.ajax.reload(null, false);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function() {
                        hidePageLoading();
                        toastr.error('Error syncing product');
                    }
                });

            });

        });
    </script>
@endsection

<style>
    .tooltip-long {
        max-width: 300px !important;
    }

    .tooltip-long .tooltip-inner {
        max-width: 300px !important;
        text-align: left;
        word-break: break-word;
    }

    .removeuppercase {
        text-transform: none !important;
    }
</style>
