@extends('admin.layouts.master')

@section('tittle')
    Danh sách sản phẩm
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Datatables</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Datatables</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    @session('error')
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endsession
    @session('success')
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endsession


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Basic Datatables</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div>
                            {{-- <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                            id="create-btn" data-bs-target="#showModal"><i
                                class="ri-add-line align-bottom me-1"></i>Thêm mới</button> --}}
                            <a href="{{ route('admin.products.create') }}" type="button" class="btn btn-success add-btn"><i
                                    class="ri-add-line align-bottom me-1"></i>Thêm mới</a>
                            {{-- <button style="display: none" class="btn btn-danger hide_form_create">Hủy</button> --}}
                            {{-- <a href="{{ route('admin.catalogues.create') }}">
                            <button type="button" class="btn btn-success add-btn">
                                <i class="ri-add-line align-bottom me-1"></i> Thêm mới
                            </button>
                        </a> --}}
                            <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                    class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th>
                                <th data-ordering="false">ID</th>
                                <th data-ordering="false">Name</th>
                                <th data-ordering="false">Email</th>
                                <th data-ordering="false">Phone</th>
                                <th data-ordering="false">Address</th>
                                <th data-ordering="false">Note</th>
                                <th data-ordering="false">Total Price</th>
                                <th data-ordering="false">Status Order</th>
                                <th data-ordering="false">Status Payment</th>
                                {{-- <th data-ordering="false">is_hot_deal</th>
                            <th data-ordering="false">is_good_deal</th>
                            <th data-ordering="false">is_new</th>
                            <th data-ordering="false">is_show_home</th> --}}
                                {{-- <th data-ordering="false">Tags</th> --}}
                                <th data-ordering="false">created_at</th>
                                <th data-ordering="false">updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                value="option1">
                                        </div>
                                    </th>
                                    <td data-ordering="false">{{ $item->id }}</td>
                                    <td data-ordering="false">{{ $item->user_name }}</td>
                                    <td data-ordering="false">
                                        {{ $item->user_email }}
                                    </td>
                                    <td data-ordering="false">{{ $item->user_phone }}</td>
                                    <td>{{ $item->user_address }}</td>
                                    <td data-ordering="false">{{ $item->user_notes }}</td>
                                    <td data-ordering="false">{{ number_format($item->total_price) }}</td>
                                    <td data-ordering="false">
                                        <select data-id="{{ $item->id }}"
                                            class="form-select form-select-sm select_order" aria-label=".form-select-lg">
                                            @foreach ($status_order as $key => $name)
                                                <option value="{{ $key }}" @selected($item->status_order == $key)>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td data-ordering="false">
                                        <select data-id="{{ $item->id }}"
                                            class="form-select form-select-sm select_payment" aria-label=".form-select-lg">
                                            @foreach ($status_payment as $key => $name)
                                                <option value="{{ $key }}" @selected($item->status_payment == $key)>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td data-ordering="false">{{ $item->created_at }}</td>
                                    <td data-ordering="false">{{ $item->updated_at }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a target="_blank"
                                                        href="{{ route('admin.orders.export_order', $item) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-file-list-fill align-bottom me-2 text-muted"></i>Xuất
                                                        hóa đơn</a>
                                                </li>
                                                <li><a href="{{ route('admin.orders.show', $item) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a href="{{ route('admin.products.edit', $item) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li>
                                                    <button data-id={{ $item->id }}
                                                        class="btn_delete dropdown-item remove-item-btn"
                                                        data-bs-toggle="modal" data-bs-target="#removeNotificationModal">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@section('style_libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    {{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <style>
        /* CSS cho cột "Name" */
        .table td:nth-child(3),
        .table th:nth-child(3) {
            /* Thiết lập cho phép cột "Name" xuống dòng */
            white-space: normal !important;
            /* Cho phép xuống dòng */
            word-wrap: break-word;
            /* Tách từ khi vượt quá kích thước cột */
            max-width: none !important;
            /* Bỏ giới hạn chiều rộng */
        }
    </style>

    <!-- Sweet Alert css-->
    <link href="{{ asset('theme/admins/velzon/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('script_libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    {{-- <script src="{{ asset('theme/admins/velzon/assets/js/pages/datatables.init.js') }}"></script> --}}

    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    <!-- listjs init -->
    {{-- <script src="{{ asset('theme/admins/velzon/assets/js/pages/listjs.init.js') }}"></script> --}}

    <!-- Sweet Alerts js -->
    <script src="{{ asset('theme/admins/velzon/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // new DataTable("#example")
            $('#example').DataTable();

            $('#example').on('change', '.select_order', function(e) {
                let id = $(this).data('id');
                console.log('id', id);

                let url = `{{ route('admin.orders.update', '') }}/${id}`;
                fetch_and_handle(url, 'PUT', {
                    status_order: e.target.value
                });
            });

            $('#example').on('change', '.select_payment', function(e) {
                let id = $(this).data('id');
                console.log('id', id);

                let url = `{{ route('admin.orders.update', '') }}/${id}`;
                fetch_and_handle(url, 'PUT', {
                    status_payment: e.target.value
                });
            });

        });
    </script>
@endsection
