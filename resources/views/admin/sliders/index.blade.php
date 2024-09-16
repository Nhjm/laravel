@extends('admin.layouts.master')

@section('title')
    danh sách sliders
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
                                    <div class="col-md-6 d-f">
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
                                    {{-- <div class="col-md-6 d-flex align-items-md-center ps-md-4">
                                        <div class="form-check form-switch form-switch-success ">
                                            <label for="exampleFormControlInput1" class="form-label">Is_active</label>
                                            <input name="is_active" class="form-check-input" type="checkbox" role="switch"
                                                value="1" checked>
                                        </div>
                                    </div> --}}
                                </div>
                                <button id="submit_form_create" type="button" class="btn btn-success add-btn"><i
                                        class="ri-add-line align-bottom me-1"></i>Thêm mới</button>
                            </form>
                        </div>
                        <div class="table-card mt-3 mb-1 ">
                            <div class="dropzone" style="min-height: 100px">
                                <!-- Phần thay thế nếu trình duyệt không hỗ trợ Drag & Drop -->
                                <div class="fallback">
                                    <input name="images[]" type="file" multiple="multiple">
                                </div>
                                <!-- Phần thông báo khi kéo thả hoặc click để tải lên -->
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                    </div>
                                    <h4>Drop files here or click to upload.</h4>
                                </div>
                            </div>

                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                <li class="mt-2" id="dropzone-preview-list">
                                    <!-- Mẫu xem trước tệp sẽ được sử dụng -->
                                    {{-- @dd($product_galleries) --}}
                                    <div class="border rounded">
                                        <div class="d-flex p-2">
                                            <div class="flex-shrink-0 me-3">
                                                <!-- Hình ảnh xem trước của tệp sẽ được hiển thị tại đây -->
                                                <div class="avatar-sm bg-light rounded"
                                                    style="overflow: hidden; height: 5rem; width: 9rem">
                                                    <img data-dz-thumbnail class="img-fluid rounded d-block"
                                                        src="{{ asset('theme/admins/velzon/assets/images/new-document.png') }}"
                                                        alt="Dropzone-Image" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="pt-1">
                                                    <!-- Tên tệp sẽ được hiển thị tại đây -->
                                                    <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                    <!-- Kích thước của tệp sẽ được hiển thị tại đây -->
                                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                    <!-- Thông báo lỗi (nếu có) sẽ được hiển thị tại đây -->
                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-3">
                                                <!-- Nút xóa để loại bỏ tệp đã tải lên khỏi danh sách -->
                                                <button type="button" data-dz-remove
                                                    class="btn btn-sm btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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

                        <div class="d-sm-flex flex-wrap mt-3">
                            @foreach ($data as $item)
                                <div style="width: 330px; height: 200px;"
                                    class="me-3 mb-3 overflow-hidden bg-dark-subtle rounded position-relative div_image">
                                    <img width="100%" src="{{ Storage::url($item->image) }}" alt="">
                                    <div style=" font-size: 17px; cursor: pointer; padding: 3px 7px;"
                                        class="position-absolute top-0 end-0 rounded text-bg-danger pe delete_image"
                                        data-id={{ $item->id }}>Xóa</div>
                                </div>
                            @endforeach
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

    <!-- dropzone css -->
    <link rel="stylesheet" href="{{ asset('theme/admins/velzon/assets/libs/dropzone/dropzone.css') }}" type="text/css" />

    <style>
        .delete_image {
            display: none;
        }

        .div_image:hover .delete_image {
            display: block;
            /* Hiển thị .delete_image khi hover qua .div_image */
        }
    </style>
@endsection

@section('script_libs')
    <!-- dropzone min -->
    <script src="{{ asset('theme/admins/velzon/assets/libs/dropzone/dropzone-min.js') }}"></script>

    <!-- listjs init -->
    {{-- <script src="{{ asset('theme/admins/velzon/assets/js/pages/listjs.init.js') }}"></script> --}}

    <!-- Sweet Alerts js -->
    <script src="{{ asset('theme/admins/velzon/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var previewTemplate,
                dropzone,
                dropzonePreviewNode = document.querySelector("#dropzone-preview-list"),
                inputMultipleElements;

            if (dropzonePreviewNode) {
                dropzonePreviewNode.id = "";
                previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
                dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);

                var myDropzone = new Dropzone(".dropzone", {
                    url: "/file-upload", // Đường dẫn để xử lý upload
                    autoProcessQueue: false, // Tắt tự động tải lên
                    uploadMultiple: true, // Cho phép tải lên nhiều tệp
                    previewTemplate: previewTemplate, // Mẫu hiển thị cho các tệp
                    previewsContainer: "#dropzone-preview", // Container để hiển thị các bản xem trước
                    acceptedFiles: 'image/*', // Chỉ chấp nhận tệp hình ảnh
                    thumbnailWidth: null,
                    resizeQuality: 1,

                });
            }

            document.querySelector('.show_form_create').addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();

                console.log(myDropzone.getAcceptedFiles().length);

                if (!myDropzone.getAcceptedFiles().length > 0) return

                let formData = new FormData()

                myDropzone.getAcceptedFiles().forEach(function(file) {
                    formData.append('images[]', file);
                });

                let url = '{{ route('admin.sliders.store') }}'
                fetch_and_handle(url, 'POST', formData, true)
                    .catch(error => {
                        // Xử lý lỗi và hiển thị thông báo lỗi
                        console.error('Fetch Error:', error);
                    });

            })

            // document.querySelectorAll('.div_image').forEach(e => {
            //     e.addEventListener('mouseover', function() {
            //         console.log(this.querySelector('.delete_image').classList.remove('d-none'));
            //     })
            // })

            document.querySelectorAll('.delete_image').forEach(e => {
                e.addEventListener('click', function() {
                    let id = this.dataset.id;
                    let url = `{{ route('admin.sliders.destroy', '') }}/${id}`;

                    this.parentNode.remove()
                    fetch_and_handle(url, 'DELETE')
                })
            })

        })

        // $(document).ready(function() {
        //     $('.show_form_create').click(function() {
        //         $(this).hide();
        //         $('#div_form_create').slideDown();
        //         $('.hide_form_create').show()
        //         $('#div_form_create').find('input[name="name"]').focus();
        //     });

        //     $('.hide_form_create').click(function() {
        //         $(this).hide();
        //         $('#div_form_create').slideUp();
        //         $('.show_form_create').show();
        //     });
        // });
    </script>
@endsection
