{{-- Modal add : #m-add --}}
<div class="modal fade" tabindex="-1" id="m-add-kertaskerja" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Tambah Kertas Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-danger d-none">Mohon isi input dengan valid, Check setiap validasi input yang ada !</div>

            <form id="store" class="needs-validation" novalidate action="{{ route('kertaskerja.store', $unitkerja->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                {{-- step 1 --}}
                <div class="tab">
                    {{-- input text/default --}}
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">Nama Kertas Kerja :</label>
                                <input 
                                    value="{{ 'Kertas Kerja '.$unitkerja->name }}"
                                    type="text" name="nama_kertaskerja" class="form-control">
                                <div class="invalid-feedback">
                                    Harus Diisi
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            {{-- input number --}}
                            <div class="form-group">
                                <label for="">No. Buku :</label>
                                <input
                                    value="{{ old('no_buku') }}"
                                    name="no_buku"
                                    type="number" class="form-control @error('no_buku') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    Harus Diisi
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg">
                            {{-- input date --}}
                            <div class="form-group">
                                <label for="">Tanggal Buku :</label>
                                <input 
                                    value="{{ old('tanggal_buku') }}"
                                    name="tanggal_buku"
                                    data-input="datetimepicker" class="form-control @error('tanggal_buku') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    Harus Diisi
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">Tanggal SPJ :</label>
                                <input 
                                    value="{{ old('tanggal_spj') }}"
                                    name="tanggal_spj"
                                    data-input="datetimepicker" class="form-control @error('tanggal_spj') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    Harus Diisi
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">No. SPJ :</label>
                                <input
                                    value="{{ old('no_spj') }}"
                                    name="no_spj"
                                    type="number" class="form-control @error('no_spj') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    Harus Diisi
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label>Keterangan :</label>
                                <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan') }}</textarea>
                            </div>
                        </div> 
                    </div>
                </div>

                {{-- step 2 --}}
                <div class="tab">        
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">Nilai Transaksi :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input 
                                        value="{{ old('nilai_transaksi') }}"
                                        name="nilai_transaksi"
                                        type="number" class="form-control @error('nilai_transaksi') is-invalid @enderror" required>
                                    <div class="invalid-feedback">
                                        Harus Diisi
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">Pajak Audite :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input 
                                        value="{{ old('pajak_audite') }}"
                                        name="pajak_audite"
                                        type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian PPN :</label>
                                <select name="kesesuaian_ppn" id="kesesuaian_ppn" class="selectpicker @error('kesesuaian_ppn') is-invalid @enderror" title="Pilih Kesesuaian" data-style="form-control" data-width="100%" required>
                                    @foreach ($kesesuaians as $kesesuaian)
                                        <option {{ old('kesesuaian_ppn') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Harus Memilih
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian PPh :</label>
                                <select name="kesesuaian_pph" id="kesesuaian_pph" class="selectpicker @error('kesesuaian_pph') is-invalid @enderror" title="Pilih Kesesuaian" data-style="form-control" data-width="100%" required>
                                    @foreach ($kesesuaians as $kesesuaian)
                                        <option {{ old('kesesuaian_pph') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Harus Memilih
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">Temuan Pajak :</label>
                                <input name="temuan_pajak" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="" class="d-block">SSP :</label>
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input 
                                                name="ssp" 
                                                id="ssp-1" 
                                                value="1"
                                                type="radio" class="custom-control-input @error('ssp') is-invalid @enderror">
                                            <label class="custom-control-label" for="ssp-1">Ada</label>
                                            <div class="invalid-feedback">
                                                Pilih Salah satu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input 
                                                name="ssp" 
                                                id="ssp-2" 
                                                value="0"
                                                type="radio" class="custom-control-input">
                                            <label class="custom-control-label" for="ssp-2">Tidak Ada</label> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>

                {{-- step 3 --}}
                <div class="tab">
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="" class="d-block">Keterlambatan Penyetoran Pajak :</label>
                                <select name="keterlambatan_penyetoran" id="" class="selectpicker @error('keterlambatan_penyetoran') is-invalid @enderror" title="Pilih Jenis Keterlambatan" data-style="form-control" data-width="100%" required>
                                    @foreach ($keterlambatans as $keterlambatan)
                                        <option {{ old('keterlambatan_penyetoran') === $keterlambatan->id ? 'selected' : '' }} value="{{ $keterlambatan->id }}">{{ $keterlambatan->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Harus Memilih
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="" class="d-block">Kelengkapan ttd/materai/stempel/admin :</label>
                                <div class="row gutters-xs">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input 
                                                {{ old('kelengkapan_ttd') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="kelengkapan_ttd-1" 
                                                name="kelengkapan_ttd" class="custom-control-input @error('kelengkapan_ttd') is-invalid @enderror">
                                            <label class="custom-control-label" for="kelengkapan_ttd-1">Lengkap</label>
                                            <div class="invalid-feedback">
                                                Pilih Salah Satu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('kelengkapan_ttd') === '2' ? 'checked' : '' }}
                                                value="2"
                                                type="radio" 
                                                id="kelengkapan_ttd-2" 
                                                name="kelengkapan_ttd" class="custom-control-input @error('kelengkapan_ttd') is-invalid @enderror">
                                            <label class="custom-control-label" for="kelengkapan_ttd-2">Kurang Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('kelengkapan_ttd') === '3' ? 'checked' : '' }}
                                                value="3"
                                                type="radio" 
                                                id="kelengkapan_ttd-3" 
                                                name="kelengkapan_ttd" class="custom-control-input @error('kelengkapan_ttd') is-invalid @enderror">
                                            <label class="custom-control-label" for="kelengkapan_ttd-3">Tidak Lengkap</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group mb-1 d-flex align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sesuai-1">
                                    <label class="custom-control-label" for="sesuai-1">Opsi Semua</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Kuitansi :</label>
                                <div class="row gutters-xs">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input 
                                                {{ old('kuitansi') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="kuitansi-1" 
                                                name="kuitansi" class="custom-control-input @error('kuitansi') is-invalid @enderror">
                                            <label class="custom-control-label" for="kuitansi-1">Ada</label>
                                            <div class="invalid-feedback">
                                                Pilih Salah Satu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('kuitansi') === '0' ? 'checked' : '' }}
                                                value="0"
                                                type="radio" 
                                                id="kuitansi-2" 
                                                name="kuitansi" class="custom-control-input @error('kuitansi') is-invalid @enderror">
                                            <label class="custom-control-label" for="kuitansi-2">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Surat Tugas / SK :</label>
                                <div class="row gutters-xs">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input 
                                                {{ old('surat_sk') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="surat_sk-1" 
                                                name="surat_sk" class="custom-control-input @error('surat_sk') is-invalid @enderror">
                                            <label class="custom-control-label" for="surat_sk-1">Ada</label>
                                            <div class="invalid-feedback">
                                                Pilih Salah Satu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('surat_sk') === '0' ? 'checked' : '' }}
                                                value="0"
                                                type="radio" 
                                                id="surat_sk-2" 
                                                name="surat_sk" class="custom-control-input @error('surat_sk') is-invalid @enderror">
                                            <label class="custom-control-label" for="surat_sk-2">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Daftar Hadir Peserta :</label>
                                <div class="row gutters-xs">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input 
                                                {{ old('daftar_hadir_peserta') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="daftar_hadir_peserta-1" 
                                                name="daftar_hadir_peserta" class="custom-control-input @error('daftar_hadir_peserta') is-invalid @enderror">
                                            <label class="custom-control-label" for="daftar_hadir_peserta-1">Ada</label>
                                            <div class="invalid-feedback">
                                                Pilih Salah Satu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('daftar_hadir_peserta') === '0' ? 'checked' : '' }}
                                                value="0"
                                                type="radio" 
                                                id="daftar_hadir_peserta-2" 
                                                name="daftar_hadir_peserta" class="custom-control-input @error('daftar_hadir_peserta') is-invalid @enderror">
                                            <label class="custom-control-label" for="daftar_hadir_peserta-2">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-1 d-flex align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sesuai-2">
                                    <label class="custom-control-label" for="sesuai-2">Opsi Semua</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian dg SBU / PMK :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_sbu') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_sbu-1" 
                                        name="kesesuaian_sbu" class="custom-control-input @error('kesesuaian_sbu') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_sbu-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_sbu') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_sbu-2" 
                                        name="kesesuaian_sbu" class="custom-control-input @error('kesesuaian_sbu') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_sbu-2">Tidak Sesuai</label>
                                    <div class="invalid-feedback">
                                        Pilih Salah Satu
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian MAK :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_mak') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_mak-1" 
                                        name="kesesuaian_mak" class="custom-control-input @error('kesesuaian_mak') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_mak-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('ksesuaian_mak') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_mak-2" 
                                        name="kesesuaian_mak" class="custom-control-input @error('kesesuaian_mak') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_mak-2">Tidak Sesuai</label>
                                    <div class="invalid-feedback">
                                        Pilih Salah Satu
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian dengan Laporan Kegiatan :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_laporan_kegiatan') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_laporan_kegiatan-1" 
                                        name="kesesuaian_laporan_kegiatan" class="custom-control-input @error('kesesuaian_laporan_kegiatan') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_laporan_kegiatan') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_laporan_kegiatan-2" 
                                        name="kesesuaian_laporan_kegiatan" class="custom-control-input @error('kesesuaian_laporan_kegiatan') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-2">Tidak Sesuai</label>
                                    <div class="invalid-feedback">
                                        Pilih Salah Satu
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- step 4 --}}
                <div class="tab">
                    <div class="form-group">
                        <label for="">Temuan 1 :</label>
                        <select 
                            name="temuan[temuan1]" id="" 
                            class="selectpicker" title="Pilih Temuan" data-style="form-control" data-width="100%">
                                @foreach ($kode_temuans as $temuan)
                                    <option value="{{ $temuan->id }}">{{ "[$temuan->kode] ".$temuan->detail }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Temuan 2 :</label>
                        <select 
                            name="temuan[temuan2]" id="" 
                            class="selectpicker" title="Pilih Temuan" data-style="form-control" data-width="100%">
                            @foreach ($kode_temuans as $temuan)
                                <option value="{{ $temuan->id }}">{{ "[$temuan->kode] ".$temuan->detail }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Temuan 3 :</label>
                        <select 
                            name="temuan[temuan3]" id="" 
                            class="selectpicker" title="Pilih Temuan" data-style="form-control" data-width="100%">
                            @foreach ($kode_temuans as $temuan)
                                <option value="{{ $temuan->id }}">{{ "[$temuan->kode] ".$temuan->detail }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">Deskripsi Temuan dan Potensi TGR (tulis strip(-) jika tidak ada):</label>
                                <textarea 
                                    name="deskripsi" 
                                    class="form-control" 
                                    id="" rows="2" required>{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="font-weight-bold tx-18" for="">Ditulis di DTM :</label> <br>
                                <div class="row gutters-xs">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input 
                                                {{ old('ditulis_dtm') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="ditulis_dtm-1" 
                                                name="ditulis_dtm" class="custom-control-input @error('ditulis_dtm') is-invalid @enderror">
                                            <label class="custom-control-label" for="ditulis_dtm-1">
                                                <span class="badge badge-success"><i class="fas fa-check"></i></span> Iya 
                                            </label>
                                            <div class="invalid-feedback">
                                                Pilih Salah satu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('ditulis_dtm') === '1' ? 'checked' : '' }}
                                                value="0"
                                                type="radio" 
                                                id="ditulis_dtm-2" 
                                                name="ditulis_dtm" class="custom-control-input @error('ditulis_dtm') is-invalid @enderror">
                                            <label class="custom-control-label" for="ditulis_dtm-2">
                                                <span class="badge badge-secondary"><i class="fas fa-times"></i></span> Tidak 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="tab">
                    <div class="alert alert-warning">
                        Konfirmasi Submit Data ?
                    </div>
                </div>


                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </div>
            </form>
            <div class="modal-footer">
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button class="btn btn-secondary" type="button" id="prevBtn" onclick="nextPrev(-1)">Kembali</button>
                        <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of Modal add : #m-add --}}