<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Master</h1>
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="javascript:;" class="text-muted text-hover-primary">Data Siswa</a>
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
                            <label class="required form-label">NIS</label>
                            <input type="text" id="nis" name="nis" class="form-control mb-2" placeholder="nis" value="{{ $data->nis }}" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">NISN</label>
                            <input type="text" id="nisn" name="nisn" class="form-control mb-2" placeholder="nisn" value="{{ $data->nisn }}" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control mb-2" placeholder="Nama" value="{{ $data->nama }}" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control mb-2" placeholder="tempat_lahir" value="{{ $data->tempat_lahir }}" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Tanggal Lahir</label>
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control mb-2" placeholder="tanggal_lahir" value="{{ $data->tanggal_lahir }}" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Gender</label>
                            <select class="form-control" name="jk">
                                <option value="">Harap pilih gender</option>
                                <option value="-" {{$data->jk == "-" ? 'selected' : ''}}>Belum jelas</option>
                                <option value="Laki-Laki" {{$data->jk == "Laki-Laki" ? 'selected' : ''}}>Laki-Laki</option>
                                <option value="Perempuan" {{$data->jk == "Perempuan" ? 'selected' : ''}}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Agama</label>
                            <select class="form-control" name="agama">
                                <option value="">Harap pilih agama</option>
                                <option value="Islam" {{$data->agama == "Islam" ? 'selected' : ''}}>Islam</option>
                                <option value="Katolik" {{$data->agama == "Katolik" ? 'selected' : ''}}>Katolik</option>
                                <option value="Protestan" {{$data->agama == "Protestan" ? 'selected' : ''}}>Protestan</option>
                                <option value="Hindu" {{$data->agama == "Hindu" ? 'selected' : ''}}>Hindu</option>
                                <option value="Buddha" {{$data->agama == "Buddha" ? 'selected' : ''}}>Buddha</option>
                            </select>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control mb-2" placeholder="alamat" value="{{ $data->alamat }}" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Tahun Masuk Sekolah</label>
                            <input type="text" id="tahun_masuk_sekolah" maxlength="4" name="tahun_masuk_sekolah" class="form-control mb-2" placeholder="tahun_masuk_sekolah" value="{{ $data->tahun_masuk_sekolah ? $data->tahun_masuk_sekolah : date('Y') }}" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control mb-2" placeholder="username" value="{{ $data->username }}" />
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="{{$data->id ? '' : 'required'}} form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control mb-2" placeholder="password" />
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="javascript:;" onclick="load_list(1);" class="btn btn-light me-5">Cancel</a>
                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{$data->id ? route('office.student.update',$data->id) : route('office.student.store')}}','{{$data->id ? 'PATCH' : 'POST'}}');" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Harap tunggu...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    number_only('nis');
    number_only('nisn');
    obj_startdatenow('tanggal_lahir');
</script>