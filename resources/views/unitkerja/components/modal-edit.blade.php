 {{-- Modall edit : #m-edit --}}
 <div class="modal fade" tabindex="-1" id="m-edit" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Edit Kertas Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body load d-none">
                <div class="d-flex flex-column align-items-center">
                    <h5>Loading Data...</h5>
                    <div class="spinner-grow" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            {{-- form start --}}
            <form action="" id="form-edit" method="POST">
            @csrf @method('PUT')
                <div class="modal-body success">
                    <div class="row mb-3">
                        <div class="col-lg">
                            <div class="text-grey mb-2">Unit Kerja : </div>
                            <h5 id="unitkerja-edit" class="text-dark font-weight-bold mb-4">Fakultas Ilmu Komputer</h5>
                        </div>
                        <div class="col-auto text-lg-right">
                            <div class="form-group">
                                <label class="font-weight-bold tx-18" for="">Ditulis di DTM :</label> <br>
                                <div class="row gutters-xs">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input 
                                                {{ old('ditulis_dtm') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="ditulis_dtm-edit-1" 
                                                name="ditulis_dtm" class="custom-control-input @error('ditulis_dtm') is-invalid @enderror">
                                            <label class="custom-control-label" for="ditulis_dtm-edit-1">
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
                                                {{ old('ditulis_dtm') === '0' ? 'checked' : '' }}
                                                value="0"
                                                type="radio" 
                                                id="ditulis_dtm-edit-2" 
                                                name="ditulis_dtm" class="custom-control-input @error('ditulis_dtm') is-invalid @enderror">
                                            <label class="custom-control-label" for="ditulis_dtm-edit-2">
                                                <span class="badge badge-secondary"><i class="fas fa-times"></i></span> Tidak 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">ID Kertas Kerja :</label>
                                <input type="text" id="id-edit" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">No Buku :</label>
                                <input 
                                    value="{{ old('no_buku') }}"
                                    name="no_buku"
                                    type="text" id="no_buku-edit" value="" class="form-control @error('no_buku') is-invalid @enderror">
                                @error('no_buku')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">No SPJ :</label>
                                <input
                                    value="{{ old('no_spj') }}" 
                                    name="no_spj"
                                    type="text" id="no_spj-edit" value="" class="form-control @error('no_spj') is-invalid @enderror">
                                @error('no_spj')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Tanggal Buku :</label>
                                <input
                                    value="{{ old('tanggal_buku') }}"
                                    data-input="datetimepicker"
                                    name="tanggal_buku" 
                                    type="text" id="tanggal_buku-edit"  class="form-control @error('tanggal_buku') is-invalid @enderror mb-3" autocomplete="off">
                                @error('tanggal_buku')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal SPJ :</label>
                                <input
                                    value="{{ old('tanggal_spj') }}"
                                    data-input="datetimepicker"
                                    name="tanggal_spj" 
                                    type="text" id="tanggal_spj-edit"  class="form-control @error('tanggal_spj') is-invalid @enderror" autocomplete="off">
                                @error('tanggal_spj')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label>Keterangan :</label>
                                <textarea 
                                    name="keterangan" 
                                    id="keterangan-edit" class="form-control" rows="6">{{ old('keterangan') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Nilai Transaksi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input 
                                        value="{{ old('nilai_transaksi') }}"
                                        name="nilai_transaksi"
                                        type="text" id="nilai_transaksi-edit" value="" class="form-control @error('nilai_transaksi') is-invalid @enderror">
                                    @error('nilai_transaksi')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Pajak Audite</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input
                                        value="{{ old('pajak_audite') }}" 
                                        name="pajak_audite"
                                        type="text" id="pajak_audite-edit" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="">Temuan Pajak :</label>
                                <textarea 
                                    name="temuan_pajak" 
                                    id="temuan_pajak-edit" class="form-control" rows="6"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian PPN :</label>
                                <select 
                                    name="kesesuaian_ppn" 
                                    id="kesesuaian_ppn-edit" 
                                    class="selectpicker @error('kesesuaian_ppn') is-invalid @enderror" 
                                    data-style="form-control" data-width="100%">
                                        @foreach ($kesesuaians as $kesesuaian)
                                            <option value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                        @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Harus Memilih
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Kesesuaian PPh :</label>
                                <select 
                                    name="kesesuaian_pph" 
                                    id="kesesuaian_pph-edit" 
                                    class="selectpicker @error('kesesuaian_ppn') is-invalid @enderror" 
                                    data-style="form-control" data-width="100%">
                                        @foreach ($kesesuaians as $kesesuaian)
                                            <option value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                        @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Harus Memilih
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="d-block">Keterlambatan Penyetoran Pajak :</label>
                                <select 
                                    name="keterlambatan_penyetoran" 
                                    id="keterlambatan_penyetoran-edit" 
                                    class="selectpicker @error('kesesuaian_ppn') is-invalid @enderror" 
                                    data-style="form-control" data-width="100%">
                                        @foreach ($keterlambatans as $keterlambatan)
                                            <option value="{{ $keterlambatan->id }}">{{ $keterlambatan->name }}</option>
                                        @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Harus Memilih
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">SSP :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('ssp') === '1' ? 'checked' : '' }}
                                        name="ssp" 
                                        id="ssp-edit-1" 
                                        value="1"
                                        type="radio" class="custom-control-input @error('ssp') is-invalid @enderror">
                                    <label class="custom-control-label" for="ssp-edit-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('ssp') === '0' ? 'checked' : '' }}
                                        name="ssp" 
                                        id="ssp-edit-2" 
                                        value="0"
                                        type="radio" class="custom-control-input @error('ssp') is-invalid @enderror">
                                    <label class="custom-control-label" for="ssp-edit-2">Tidak Ada</label> 
                                    <div class="invalid-feedback">
                                        Pilih Salah satu
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kelengkapan ttd/materai/stempel/admin :</label>
                                <div class="row gutters-xs">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio d-inline-block">
                                            <input 
                                                {{ old('kelengkapan_ttd') === '1' ? 'checked' : '' }}
                                                value="1"
                                                type="radio" 
                                                id="kelengkapan_ttd-edit-1" 
                                                name="kelengkapan_ttd" class="custom-control-input @error('kelengkapan_ttd') is-invalid @enderror">
                                            <label class="custom-control-label" for="kelengkapan_ttd-edit-1">Lengkap</label>
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
                                                id="kelengkapan_ttd-edit-2" 
                                                name="kelengkapan_ttd" class="custom-control-input @error('kelengkapan_ttd') is-invalid @enderror">
                                            <label class="custom-control-label" for="kelengkapan_ttd-edit-2">Kurang Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ old('kelengkapan_ttd') === '3' ? 'checked' : '' }}
                                                value="3"
                                                type="radio" 
                                                id="kelengkapan_ttd-edit-3" 
                                                name="kelengkapan_ttd" class="custom-control-input @error('kelengkapan_ttd') is-invalid @enderror">
                                            <label class="custom-control-label" for="kelengkapan_ttd-edit-3">Tidak Lengkap</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kuitansi :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kuitansi') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kuitansi-edit-1" 
                                        name="kuitansi" class="custom-control-input @error('kuitansi') is-invalid @enderror">
                                    <label class="custom-control-label" for="kuitansi-edit-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kuitansi') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kuitansi-edit-2" 
                                        name="kuitansi" class="custom-control-input @error('kuitansi') is-invalid @enderror">
                                    <label class="custom-control-label" for="kuitansi-edit-2">Tidak Ada</label>
                                    <div class="invalid-feedback">
                                        Pilih Salah Satu
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Surat Tugas / SK :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('surat_sk') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="surat_sk-edit-1" 
                                        name="surat_sk" class="custom-control-input @error('surat_sk') is-invalid @enderror">
                                    <label class="custom-control-label" for="surat_sk-edit-1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('surat_sk') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="surat_sk-edit-2" 
                                        name="surat_sk" class="custom-control-input @error('surat_sk') is-invalid @enderror">
                                    <label class="custom-control-label" for="surat_sk-edit-2">Tidak Ada</label>
                                    <div class="invalid-feedback">
                                        Pilih Salah Satu
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Daftar Hadir Peserta :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('daftar_hadir_peserta') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="daftar_hadir_peserta-edit-1" 
                                        name="daftar_hadir_peserta" class="custom-control-input @error('daftar_hadir_peserta') is-invalid @enderror">
                                    <label class="custom-control-label" for="daftar_hadir_peserta-edit-1">Ada</label>
                                    <div class="invalid-feedback">
                                        Pilih Salah Satu
                                    </div>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('daftar_hadir_peserta') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="daftar_hadir_peserta-edit-2" 
                                        name="daftar_hadir_peserta" class="custom-control-input @error('daftar_hadir_peserta') is-invalid @enderror">
                                    <label class="custom-control-label" for="daftar_hadir_peserta-edit-2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kesesuaian dg SBU / PMK :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_sbu') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_sbu-edit-1" 
                                        name="kesesuaian_sbu" class="custom-control-input @error('kesesuaian_sbu') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_sbu-edit-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_sbu') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_sbu-edit-2" 
                                        name="kesesuaian_sbu" class="custom-control-input @error('kesesuaian_sbu') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_sbu-edit-2">Tidak Sesuai</label>
                                    <div class="invalid-feedback">
                                        Pilih Salah Satu
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kesesuaian MAK :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_mak') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_mak-edit-1" 
                                        name="kesesuaian_mak" class="custom-control-input @error('kesesuaian_mak') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_mak-edit-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_mak') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_mak-edit-2" 
                                        name="kesesuaian_mak" class="custom-control-input @error('kesesuaian_mak') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_mak-edit-2">Tidak Sesuai</label>
                                    <div class="invalid-feedback">
                                        Pilih Salah Satu
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                                <label for="" class="d-block">Kesesuaian dengan Laporan Kegiatan :</label>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_laporan_kegiatan') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_laporan_kegiatan-edit-1" 
                                        name="kesesuaian_laporan_kegiatan" class="custom-control-input @error('kesesuaian_laporan_kegiatan') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-edit-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        {{ old('kesesuaian_laporan_kegiatan') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_laporan_kegiatan-edit-2" 
                                        name="kesesuaian_laporan_kegiatan" class="custom-control-input @error('kesesuaian_laporan_kegiatan') is-invalid @enderror">
                                    <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-edit-2">Tidak Sesuai</label>
                                    <div class="invalid-feedback">
                                        Pilih Salah Satu
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="text-grey mb-2">Temuan : </div>
                    <div class="form-group">
                        <label for="">Temuan 1 :</label>
                        <select 
                            name="temuan[temuan1]" id="temuan-edit-1" 
                            class="selectpicker" title="Pilih Temuan" data-style="form-control" data-width="100%">
                                @foreach ($kode_temuans as $temuan)
                                    <option value="{{ $temuan->id }}">{{ "[$temuan->kode] ".$temuan->detail }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Temuan 2 :</label>
                        <select 
                            name="temuan[temuan2]" id="temuan-edit-2" 
                            class="selectpicker" title="Pilih Temuan" data-style="form-control" data-width="100%">
                            @foreach ($kode_temuans as $temuan)
                                <option value="{{ $temuan->id }}">{{ "[$temuan->kode] ".$temuan->detail }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Temuan 3 :</label>
                        <select 
                            name="temuan[temuan3]" id="temuan-edit-3" 
                            class="selectpicker" title="Pilih Temuan" data-style="form-control" data-width="100%">
                            @foreach ($kode_temuans as $temuan)
                                <option value="{{ $temuan->id }}">{{ "[$temuan->kode] ".$temuan->detail }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label for="">Deskripsi Temuan dan Potensi TGR </label>
                        <textarea name="deskripsi" id="deskripsi-edit" class="form-control" rows="2"></textarea>
                    </div>


                    
                </div>
                <div class="modal-footer">
                    <div class="row gutters-xs">
                        <div class="col-sm-auto">
                            <button data-dismiss="modal" class="btn btn-secondary">Batal</button>
                        </div>
                        <div class="col-sm-auto">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
            {{-- form end --}}
            
        </div>
    </div>
</div>