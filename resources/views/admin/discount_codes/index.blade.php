@extends('admin.layouts.master')

@section('title')
    danh sách danh mục
@endsection

@section('content')

    {{-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> --}}
    {{-- <a class="btn btn-primary" href="{{ route('admin.catalogues.create') }}">Thêm mới</a> --}}


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Listjs</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Listjs</li>
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
                    <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    {{-- <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                        id="create-btn" data-bs-target="#showModal"><i
                                            class="ri-add-line align-bottom me-1"></i>Thêm mới</button> --}}
                                    <button type="button" class="btn btn-success add-btn show_form_create"><i
                                            class="ri-add-line align-bottom me-1"></i>Thêm mới</button>
                                    <button style="display: none" class="btn btn-danger hide_form_create">Hủy</button>
                                    {{-- <a href="{{ route('admin.catalogues.create') }}">
                                        <button type="button" class="btn btn-success add-btn">
                                            <i class="ri-add-line align-bottom me-1"></i> Thêm mới
                                        </button>
                                    </a> --}}
                                    <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                            class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="div_form_create" style="display: none">
                            <form id="form_create">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-4 d-f">
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <input type="text" name="name" class="form-control danger"
                                                    id="firstnamefloatingInput" placeholder="Enter your firstname">
                                                <div class="invalid-feedback" id="err_name">
                                                </div>
                                                <label for="firstnamefloatingInput">Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-f" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Nếu bỏ trống sẽ không giới hạn số lượt sử dụng">
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <input type="text" name="limit" class="form-control danger"
                                                    id="firstnamefloatingInput" placeholder="Enter your firstname">
                                                <div class="invalid-feedback" id="err_name">
                                                </div>
                                                <label for="firstnamefloatingInput">Limit</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="firstnamefloatingInput">Type:</label>
                                        <select id="select_type" name="type" class="form-select-sm w-100"
                                            aria-label="Default select example">
                                            <option value="percentage">%</option>
                                            <option selected value="fixed">vnđ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-floating d-flex">
                                            <input type="number" name="amount" class="form-control danger"
                                                id="firstnamefloatingInput" placeholder="Enter your firstname">
                                            <div class="invalid-feedback" id="err_name"></div>
                                            <label for="firstnamefloatingInput">Amount</label>
                                            <span class="input-group-text" id="type">vnđ</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <!-- Input Date -->
                                        <div>
                                            <label for="exampleInputdate" class="form-label">Start:</label>
                                            <input name="start" type="date" class="form-control" id="exampleInputdate">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <!-- Input Date -->
                                        <div>
                                            <label for="exampleInputdate" class="form-label">End:</label>
                                            <input name="end" type="date" class="form-control"
                                                id="exampleInputdate">
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-md-center ">
                                        <div class="form-check form-switch form-switch-success ">
                                            <label for="exampleFormControlInput1" class="form-label">Is_active</label>
                                            <input name="is_active" class="form-check-input" type="checkbox"
                                                role="switch" value="1" checked>
                                        </div>
                                    </div>
                                </div>
                                <button id="submit_form_create" type="button" class="btn btn-success add-btn"><i
                                        class="ri-add-line align-bottom me-1"></i>Thêm mới</button>
                            </form>
                        </div>
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>
                                        <th class="sort" data-sort="customer_name">ID</th>
                                        <th class="sort" data-sort="email">NAME</th>
                                        <th class="sort" data-sort="phone" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                            data-bs-title="Nếu bỏ trống sẽ không giới hạn số lượt sử dụng">LIMIT</th>
                                        <th class="sort" data-sort="phone">AMOUNT</th>
                                        <th class="sort" data-sort="phone">TYPE</th>
                                        <th class="sort" data-sort="phone">START</th>
                                        <th class="sort" data-sort="phone">END</th>
                                        <th class="sort" data-sort="date">IS ACTIVE</th>
                                        <th>CREATED AT</th>
                                        <th>UPDATED AT</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                        value="option1">
                                                </div>
                                            </th>
                                            <td class="id" style="display:none;">
                                                <a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>
                                            </td>
                                            <td class="customer_name">{{ $item->id }}</td>
                                            <td style="cursor: pointer" class="email name update_data"
                                                data-id="{{ $item->id }}" data-name="name">
                                                {{ $item->name }}
                                            </td>

                                            <td class="phone update_data" data-name="limit">
                                                {{ $item->limit ?? 'Không' }}
                                            </td>
                                            <td class="phone update_data" data-name="amount">
                                                {{ number_format($item->amount, 2) }}
                                            </td>
                                            <td class="phone update_data" data-name="type">
                                                {{-- {{ $item->type == 'fixed' ? 'vnđ' : '%' }} --}}
                                                <select name="catalogue_id" class="form-select form-select-sm"
                                                    aria-label=".form-select-lg example" style="width: 80px;">
                                                    <option value="percentage" @selected($item->type == 'percentage')>%</option>
                                                    <option value="fixed" @selected($item->type == 'fixed')>vnđ</option>
                                                </select>
                                            </td>
                                            <td class="phone">
                                                {{ $item->start ?? 'không' }}
                                            </td>
                                            <td class="phone">
                                                {{ $item->end ?? 'không' }}
                                            </td>
                                            <td class="date">
                                                {{-- {!! $item->is_active
                                                    ? '<span class="badge bg-success-subtle text-success text-uppercase">Yes</span>'
                                                    : '<span class="badge bg-danger-subtle text-danger text-uppercase">No</span>' !!} --}}

                                                <div class="form-check form-switch form-switch-success">
                                                    <input class="is_active form-check-input"
                                                        data-id="{{ $item->id }}" type="checkbox" role="switch"
                                                        value="1" @checked($item->is_active)>
                                                </div>
                                            </td>

                                            <td class="status">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="status">
                                                {{ $item->updated_at }}
                                            </td>
                                            {{-- <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                            data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                                    </div>
                                                    <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteRecordModal">Remove</button>
                                                    </div>
                                                </div>
                                            </td> --}}
                                            <td>
                                                {{-- <a class="btn btn-info"
                                                    href="{{ route('admin.catalogues.edit', $item->id) }}">Sửa</a> --}}
                                                {{-- <a class="btn btn-secondary"
                                                    href="{{ route('admin.catalogues.show', $item->id) }}">Chi tiết</a> --}}
                                                {{-- <form class="mt-1"
                                                    action="{{ route('admin.catalogues.destroy', $item) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('chắn chắn xóa?')">Xóa</button>
                                                </form> --}}
                                                <button data-id="{{ $item->id }}" type="button"
                                                    class="btn btn-outline-danger ms-3" data-bs-toggle="modal"
                                                    data-bs-target="#removeNotificationModal">Remove</button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a"
                                        style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                        orders for you search.</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="javascript:void(0);">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    {{-- <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form class="tablelist-form" autocomplete="off">
                    <div class="modal-body">
                        <div class="mb-3" id="modal-id" style="display: none;">
                            <label for="id-field" class="form-label">ID</label>
                            <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                        </div>

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Customer Name</label>
                            <input type="text" id="customername-field" class="form-control" placeholder="Enter Name"
                                required />
                            <div class="invalid-feedback">Please enter a customer name.</div>
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Email</label>
                            <input type="email" id="email-field" class="form-control" placeholder="Enter Email"
                                required />
                            <div class="invalid-feedback">Please enter an email.</div>
                        </div>

                        <div class="mb-3">
                            <label for="phone-field" class="form-label">Phone</label>
                            <input type="text" id="phone-field" class="form-control" placeholder="Enter Phone no."
                                required />
                            <div class="invalid-feedback">Please enter a phone.</div>
                        </div>

                        <div class="mb-3">
                            <label for="date-field" class="form-label">Joining Date</label>
                            <input type="text" id="date-field" class="form-control" placeholder="Select Date"
                                required />
                            <div class="invalid-feedback">Please select a date.</div>
                        </div>

                        <div>
                            <label for="status-field" class="form-label">Status</label>
                            <select class="form-control" data-trigger name="status-field" id="status-field" required>
                                <option value="">Status</option>
                                <option value="Active">Active</option>
                                <option value="Block">Block</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}


    {{-- @dd(session()->all()) --}}
@endsection

@section('style_libs')
    <!-- Sweet Alert css-->
    <link href="{{ asset('theme/admins/velzon/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('script_libs')
    <!-- prismjs plugin -->
    <script src="{{ asset('theme/admins/velzon/assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('theme/admins/velzon/assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('theme/admins/velzon/assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ asset('theme/admins/velzon/assets/js/pages/listjs.init.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('theme/admins/velzon/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const removeNotificationModal = document.getElementById('removeNotificationModal')

            removeNotificationModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-id')
                console.log(id);

                document.getElementById('delete-notification').addEventListener('click', () => {
                    console.log('id', id);

                    let url = `{{ route('admin.discount_codes.destroy', '') }}/${id}`;

                    fetch_and_handle(url, 'DELETE')
                })

            })

            document.querySelectorAll('.is_active').forEach(element => {
                element.addEventListener('change', () => {

                    console.log(element.getAttribute('data-id'));
                    let id = element.getAttribute('data-id')
                    let url = `{{ route('admin.discount_codes.update', '') }}/${id}`;
                    if (element.checked) {
                        console.log('bật');
                        fetch_and_handle(url, 'PUT', {
                            is_active: 1
                        })
                    } else {
                        console.log('tắt');
                        fetch_and_handle(url, 'PUT', {
                            is_active: 0
                        })
                    }
                })
            });

            document.querySelectorAll('.update_data').forEach(element => {
                if (element.querySelector('select')) {
                    element.querySelector('select').addEventListener('change', function() {
                        console.log(this.parentElement.dataset.name.trim());
                        let name = this.parentElement.dataset.name.trim();

                        let id = this.parentElement.parentElement.querySelectorAll('td')[1]
                            .textContent.trim();

                        use_fetch(name, this, id)
                    })
                } else {
                    element.style.cursor = 'pointer'

                    element.addEventListener('dblclick', function() {
                        let id = this.parentElement.querySelectorAll('td')[1].textContent.trim()
                        let data_name = this.dataset.name.trim()
                        let element = this

                        let input = document.createElement('textarea')
                        // input.type = 'text'
                        input.classList.add('form-control');
                        input.style.width = '140px'

                        let data_input = this.textContent.trim();
                        // input.value = data_input
                        input.value = data_input
                        this.textContent = '';
                        this.appendChild(input);
                        input.focus();

                        input.addEventListener('blur', e => {
                            let data_new = input.value.trim()
                            console.log(data_name);
                            if (data_name === 'limit' && data_new !==
                                data_input) {} else if (data_new == '' || data_new ==
                                data_input) {
                                input.remove();
                                element.textContent = data_input
                                return
                            }

                            use_fetch(data_name, input, id, element);
                        });

                        input.addEventListener('keypress', e => {
                            let data_new = input.value.trim()

                            if (e.key === 'Enter') {
                                if (data_name === 'limit' && data_new !==
                                    data_input) {} else if (data_new == '' || data_new ==
                                    data_input) {
                                    input.blur();
                                    element.textContent = data_input
                                    return
                                }

                                use_fetch(data_name, input, id, element);
                            }
                        });

                    })

                }

            });

            function use_fetch(name, input, id, element = null) {
                let data_new = input.value.trim()
                let url = `{{ route('admin.discount_codes.update', '') }}/${id}`;
                fetch_and_handle(url, 'PUT', {
                        [name]: data_new
                    })
                    .then(() => {
                        if (element) element.textContent = data_new
                    })
                    .catch(error => {
                        input.focus()
                        console.log(error)
                        if (error.name) {
                            input.classList.add('is-invalid')
                            console.log(input.parentElement);
                            if (input.parentElement.querySelector(
                                    '.invalid-feedback')) {
                                input.parentElement.querySelector(
                                        '.invalid-feedback')
                                    .textContent = error.name
                                return
                            }
                            let err =
                                `<div class="invalid-feedback">${error.name}</div>`
                            input.parentElement.insertAdjacentHTML('beforeend',
                                err);
                        }
                    })
            }


            document.getElementById('submit_form_create').addEventListener('click', () => {
                let form_create = document.getElementById('form_create')
                // let input = form_create.querySelector('input[name="name"]')

                // if (input.value == '') {
                //     input.classList.add('is-invalid')
                //     input.focus()
                //     form_create.querySelector('#err_name').textContent = 'name là trường bắt buộc'
                //     return
                // }

                let form_data = new FormData(form_create)

                let url = '{{ route('admin.discount_codes.store') }}'
                fetch_and_handle(url, 'POST', form_data, true)
                    .catch(error => {
                        // Xử lý lỗi và hiển thị thông báo lỗi
                        console.error('Fetch Error:', error);
                        if (error.name) {
                            input.classList.add('is-invalid')
                            input.focus()
                            form_create.querySelector('#err_name').textContent = error.name
                        }
                    });
            })

            const select_catalogue = document.querySelectorAll('.select_catalogue')
            select_catalogue.forEach(element => {
                element.addEventListener('change', e => {
                    console.log(e.target.value);

                    let id = element.getAttribute('data-id')
                    console.log('id', id);
                    // return
                    let url = `{{ route('admin.catalogues.update', '') }}/${id}`;
                    fetch_and_handle(url, 'PUT', {
                        catalogue_id: e.target.value
                    })
                })
            })

            document.querySelector('#select_type').addEventListener('change', e => {
                document.querySelector('#type').textContent = e.target.options[e.target.selectedIndex]
                    .textContent.trim()
            })

        });

        $(document).ready(function() {
            $('.show_form_create').click(function() {
                $(this).hide();
                $('#div_form_create').slideDown();
                $('.hide_form_create').show()
                $('#div_form_create').find('input[name="name"]').focus();
            });

            $('.hide_form_create').click(function() {
                $(this).hide();
                $('#div_form_create').slideUp();
                $('.show_form_create').show();
            });
        });
    </script>
@endsection
