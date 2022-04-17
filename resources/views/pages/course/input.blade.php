<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Master</h1>
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="javascript:;" class="text-muted text-hover-primary">Data Mata Kuliah</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">{{$data->id ? 'Perbarui '. $data->name : 'Tambah baru'}}</li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="javascript:;" onclick="load_list(1);" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>
</div>
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <form id="form_input" class="form d-flex flex-column flex-lg-row">
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Umum</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control mb-2" placeholder="Nama" value="{{ $data->nama }}" />
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="javascript:;" onclick="load_list(1);" class="btn btn-light me-5">Cancel</a>
                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{$data->id ? route('office.course.update',$data->id) : route('office.course.store')}}','{{$data->id ? 'PATCH' : 'POST'}}');" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Harap tunggu...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>