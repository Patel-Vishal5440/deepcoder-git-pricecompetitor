@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ mix('css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ mix('css/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ mix('css/toastr.css') }}">
    <style>
        table.dataTable thead th,
        table.dataTable tbody td {
            padding: 6px 8px !important; /* Reduce padding */
            vertical-align: middle !important;
            text-align: center !important;
            white-space: nowrap;
        }

        th, td {
            font-size: 14px;
            max-width: 120px; /* Adjust as needed */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        th.text-center, td.text-center {
            text-align: center !important;
        }

        th.text-start, td.text-start {
            text-align: left !important;
        }

        .product-name-wrap {
            max-width: 250px;
            white-space: normal !important;
            word-break: break-word;
            text-align: left !important;
        }
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
@endsection

@section('content')
<div class="contents">
    <div class="container-fluid" style="max-width: 100%;">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3" style="box-shadow: 0 2px 8px rgba(0,0,0,0.04); width: 100%;">
                    <div class="card-body p-3">
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
                            <div class="table-responsive" style="overflow-x:auto;">
                                <table id="datatable" class="table mb-0 datatable">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            <th class="text-center">Id</th>
                                            <th class="text-start">Name</th>
                                            <th class="text-center">Sku</th>
                                            <th class="text-center">Price</th>
                                            @foreach ($competitors as $competitorId => $competitorName)
                                                <th class="text-center">{{ $competitorName }} Link</th>
                                                <th class="text-center">Price</th>
                                            @endforeach
                                            <th class="text-center">Actions</th>
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

{{-- Modal for assigning competitor link --}}
<div class="modal fade com_Link" id="competitorLinkModal" tabindex="-1" role="dialog" aria-labelledby="competitorLinkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Competitor Link</h5>
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

{{-- Modal for editing price --}}
<div class="modal fade" id="priceEditModal" tabindex="-1" role="dialog" aria-labelledby="priceEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="modalPrice" placeholder="Enter Price">
                <input type="hidden" id="modalPriceProductId">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-danger float-left" data-bs-dismiss="modal" >Cancel</button>
                <button type="button" class="btn btn-success savePriceBtn float-end" id="savePrice">Save</button>
            </div>
        </div>
    </div>
</div>

<div id="loadingIndicator"
     style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgb(0 0 0 / 32%); z-index: 9999; display: flex; align-items: center; justify-content: center;">
    <div class="spinner-border text-danger" role="status"></div>
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
                $('[data-bs-toggle="tooltip"]').tooltip('dispose');
                $('[data-bs-toggle="tooltip"]').tooltip();
            }
        },
        columns: [
            { data: 'odoo_id', name: 'id', className: 'text-center', width: '60px' },
            { data: 'name', name: 'name', className: 'text-start product-name-wrap', width: '250px' },
            { data: 'default_code', name: 'default_code', className: 'text-center', width: '120px' },
            {
                data: 'list_price',
                name: 'list_price',
                className: 'text-center',
                render: function(data, type, row) {
                    return `
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <span>${data}</span>
                            <a href="javascript:void(0)" class="btn btn-icon btn-sm btn-light-primary edit-price-btn"
                               data-product-id="${row.odoo_id}" data-current-price="${data}">
                                <i class="fas fa-edit fs-6"></i>
                            </a>
                        </div>`;
                }
            },
            @foreach ($competitors as $competitorId => $competitorName)
            {
                data: 'competitor_link_{{ $competitorId }}',
                name: 'competitor_link_{{ $competitorId }}',
                className: 'text-center',
                render: function(data, type, row) {
                    return `
                        <div class="d-flex justify-content-center align-items-center gap-1">
                            <a href="javascript:void(0)" class="btn btn-icon btn-sm btn-light-primary add-link-btn"
                               data-row-id="{{ $competitorId }}" data-product-id="${row.id}" data-current-link="${data || ''}">
                                <i class="fas fa-link fs-6"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-icon btn-sm btn-light-info"
                               data-bs-toggle="tooltip" data-bs-placement="top"
                               data-bs-custom-class="tooltip-long" data-bs-html="true"
                               data-bs-title="${data ? `<div style='max-width: 300px;'>${data}</div>` : 'No link'}">
                                <i class="bi bi-info-circle fs-6"></i>
                            </a>
                        </div>`;
                }
            },
            {
                data: 'competitor_price_{{ $competitorId }}',
                name: 'competitor_price_{{ $competitorId }}',
                className: 'text-center',
                render: function(data) {
                    return `<span>${data}</span>`;
                }
            },
            @endforeach
            {
                data: 'action',
                name: 'action',
                className: 'text-center',
                searchable: false,
                width: '60px'
            },
        ]
    });

    $('#search').on('keyup', function() {
        table.ajax.reload();
    });

    $(document).on("click", ".edit-price-btn", function() {
        $('#modalPriceProductId').val($(this).data("product-id"));
        $('#modalPrice').val($(this).data("current-price"));
        $('#priceEditModal').modal('show');
    });

    $(document).on('click', '.add-link-btn', function() {
        $('#modalCompetitorId').val($(this).data('row-id'));
        $('#modalProductId').val($(this).data('product-id'));
        $('#modalCompetitorLink').val($(this).data('current-link'));
        $('#competitorLinkModal').modal('show');
    });

    $(document).on('click', '#saveCompetitorLink', function() {
        showPageLoading();
        let competitorId = $('#modalCompetitorId').val();
        let productId = $('#modalProductId').val();
        let link = $('#modalCompetitorLink').val();

        if (!link.trim()) {
            toastr.error('Please enter a URL');
            $('.com_Link').modal('hide');
            hidePageLoading();
            table.ajax.reload();
            return;
        }

        $.post("{{ route('products.addLink') }}", {
            _token: "{{ csrf_token() }}",
            competitor_id: competitorId,
            competitor_url: link,
            product_id: productId
        }).done(function(response) {
            hidePageLoading();
            if (response.success) {
                toastr.success(response.message);
                $('#competitorLinkModal').modal('hide');
                table.ajax.reload(null, false);
            } else {
                toastr.error(response.message);
            }
        }).fail(function() {
            hidePageLoading();
            toastr.error('Request failed');
        });
    });

    $(document).on('click', '.savePriceBtn', function() {
        var $btn = $(this);
        $btn.prop('disabled', true).text('Saving...');
        showPageLoading();
        $.post("{{ route('products.updatePrice') }}", {
            _token: "{{ csrf_token() }}",
            id: $('#modalPriceProductId').val(),
            list_price: $('#modalPrice').val()
        }).done(function(response) {
            hidePageLoading();
            $btn.prop('disabled', false).text('Save');
            if (response.success) {
                toastr.success('Price updated successfully');
                $('#priceEditModal').modal('hide');
                table.ajax.reload(null, false);
            } else {
                toastr.error('Error updating price');
            }
        }).fail(function() {
            hidePageLoading();
            $btn.prop('disabled', false).text('Save');
            toastr.error('Error updating price');
        });
    });

    $(document).on('click', '.sync-product', function() {
        showPageLoading();
        $.get("{{ route('products.sync-specific') }}", {
            _token: "{{ csrf_token() }}",
            odoo_id: $(this).data('product-id')
        }).done(function(response) {
            hidePageLoading();
            if (response.success) {
                toastr.success(response.message);
                table.ajax.reload(null, false);
            } else {
                toastr.error(response.message);
            }
        }).fail(function() {
            hidePageLoading();
            toastr.error('Error syncing product');
        });
    });

});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
