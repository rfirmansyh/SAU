{{-- Modall detail : #m-detail --}}
<div class="modal fade" tabindex="-1" id="m-detail" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Detail Kertas Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body load">
                <div class="d-flex flex-column align-items-center">
                    <h5>Loading Data...</h5>
                    <div class="spinner-grow" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="modal-body success">
                <div class="row mb-3">
                    <div class="col-lg">
                        <div class="text-grey mb-2">Unit Kerja : </div>
                        <h5 id="unitkerja-detail" class="text-dark font-weight-bold mb-4">Fakultas Ilmu Komputer</h5>
                    </div>
                    <div class="col-auto text-lg-right">
                        <div>Ditulis DTM</div>
                        <div id="dtm-detail">
                            <span class="badge badge-success"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">ID Kertas Kerja :</label>
                            <input type="text" id="id-detail" value="" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">No Buku :</label>
                            <input type="text" id="no_buku-detail" value="1" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">No SPJ :</label>
                            <input type="text" id="no_spj-detail" value="13" class="form-control" disabled>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Tanggal Buku :</label>
                            <input type="text" id="tanggal_buku-detail" value="23 Jan 2020" class="form-control mb-3" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal SPJ :</label>
                            <input type="text" id="tanggal_spj-detail" value="23 Jan 2020" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                            <label>Keterangan :</label>
                            <textarea name="keterangan" id="keterangan-detail" class="form-control" rows="6" disabled></textarea>
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
                                <input type="text" id="nilai_transaksi-detail" value="25000" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Pajak Audite</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" id="pajak_audite-detail" value="100000" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="">Temuan Pajak :</label>
                            <textarea name="temuan_pajak" id="temuan_pajak-detail" class="form-control" rows="6" disabled></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="d-block">Kesesuaian PPN :</label>
                            <select 
                                name="kesesuaian_ppn" 
                                id="kesesuaian_ppn-detail" 
                                class="selectpicker" 
                                data-style="form-control" data-width="100%" disabled>
                                    @foreach ($kesesuaians as $kesesuaian)
                                        <option {{ old('kesesuaian_ppn') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="d-block">Kesesuaian PPh :</label>
                            <select 
                                name="kesesuaian_pph" 
                                id="kesesuaian_pph-detail" 
                                class="selectpicker" 
                                data-style="form-control" data-width="100%" disabled>
                                    @foreach ($kesesuaians as $kesesuaian)
                                        <option {{ old('kesesuaian_pph') === $kesesuaian->id ? 'selected' : '' }} value="{{ $kesesuaian->id }}">{{ $kesesuaian->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="d-block">Keterlambatan Penyetoran Pajak :</label>
                            <select 
                                name="keterlambatan_penyetoran" 
                                id="keterlambatan_penyetoran-detail" 
                                class="selectpicker" 
                                data-style="form-control" data-width="100%" disabled>
                                    @foreach ($keterlambatans as $keterlambatan)
                                        <option {{ old('keterlambatan_penyetoran') === $keterlambatan->id ? 'selected' : '' }} value="{{ $keterlambatan->id }}">{{ $keterlambatan->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                            <label for="" class="d-block">SSP :</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('ssp') === '1' ? 'checked' : ''  }}
                                    name="ssp" 
                                    id="ssp-detail-1" 
                                    value="1"
                                    type="radio" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="ssp-detail-1">Ada</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('ssp') === '2' ? 'checked' : ''  }}
                                    name="ssp" 
                                    id="ssp-detail-2" 
                                    value="0"
                                    type="radio" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="ssp-detail-2">Tidak Ada</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                            <label for="" class="d-block">Kelengkapan ttd/materai/stempel/admin :</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('kelengkapan_ttd') === '1' ? 'checked' : '' }}
                                    value="1"
                                    type="radio" 
                                    id="kelengkapan_ttd-detail-1" 
                                    name="kelengkapan_ttd" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="kelengkapan_ttd-detail-1">Lengkap</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('kelengkapan_ttd-detail') === '2' ? 'checked' : '' }}
                                    value="2"
                                    type="radio" 
                                    id="kelengkapan_ttd-detail-2" 
                                    name="kelengkapan_ttd" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="kelengkapan_ttd-detail-2">Kurang Lengkap</label>
                                </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('kelengkapan_ttd-detail') === '3' ? 'checked' : '' }}
                                    value="3"
                                    type="radio" 
                                    id="kelengkapan_ttd-detail-3" 
                                    name="kelengkapan_ttd" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="kelengkapan_ttd-detail-3">Tidak Lengkap</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                            <label for="" class="d-block">Kuitansi :</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('kuitansi') === '1' ? 'checked' : '' }}
                                    value="1"
                                    type="radio" 
                                    id="kuitansi-detail-1" 
                                    name="kuitansi" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="kuitansi-detail-1">Ada</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('kuitansi') === '0' ? 'checked' : '' }}
                                    value="0"
                                    type="radio" 
                                    id="kuitansi-detail-2" 
                                    name="kuitansi" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="kuitansi-detail-2">Tidak Ada</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                            <label for="" class="d-block">Surat Tugas / SK :</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('surat_sk') === '1' ? 'checked' : '' }}
                                    value="1"
                                    type="radio" 
                                    id="surat_sk-detail-1" 
                                    name="surat_sk" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="surat_sk-detail-1">Ada</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('surat_sk') === '0' ? 'checked' : '' }}
                                    value="0"
                                    type="radio" 
                                    id="surat_sk-detail-2" 
                                    name="surat_sk" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="surat_sk-detail-2">Tidak Ada</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                            <label for="" class="d-block">Daftar Hadir Peserta :</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('daftar_hadir_peserta') === '1' ? 'checked' : '' }}
                                    value="1"
                                    type="radio" 
                                    id="daftar_hadir_peserta-detail-1" 
                                    name="daftar_hadir_peserta" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="daftar_hadir_peserta-detail-1">Ada</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('daftar_hadir_peserta') === '0' ? 'checked' : '' }}
                                    value="0"
                                    type="radio" 
                                    id="daftar_hadir_peserta-detail-2" 
                                    name="daftar_hadir_peserta" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="daftar_hadir_peserta-detail-2">Tidak Ada</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                            <label for="" class="d-block">Kesesuaian dg SBU / PMK :</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('kesesuaian_sbu') === '1' ? 'checked' : '' }}
                                    value="1"
                                    type="radio" 
                                    id="kesesuaian_sbu-detail-1" 
                                    name="kesesuaian_sbu" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="kesesuaian_sbu-detail-1">Sesuai</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('kesesuaian_sbu') === '0' ? 'checked' : '' }}
                                    value="0"
                                    type="radio" 
                                    id="kesesuaian_sbu-detail-2" 
                                    name="kesesuaian_sbu" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="kesesuaian_sbu-detail-2">Tidak Sesuai</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                            <label for="" class="d-block">Kesesuaian MAK :</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('kesesuaian_mak') === '1' ? 'checked' : '' }}
                                    value="1"
                                    type="radio" 
                                    id="kesesuaian_mak-detail-1" 
                                    name="kesesuaian_mak" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="kesesuaian_mak-detail-1">Sesuai</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    {{ old('ksesuaian_mak') === '0' ? 'checked' : '' }}
                                    value="0"
                                    type="radio" 
                                    id="kesesuaian_mak-detail-2" 
                                    name="kesesuaian_mak" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="kesesuaian_mak-detail-2">Tidak Sesuai</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group bg-disabled px-3 py-1 rounded-lg">
                            <label for="" class="d-block">Kesesuaian dengan Laporan Kegiatan :</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kesesuaian_laporan_kegiatan') === '1' ? 'checked' : '' }}
                                        value="1"
                                        type="radio" 
                                        id="kesesuaian_laporan_kegiatan-detail-1" 
                                        name="kesesuaian_laporan_kegiatan" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-detail-1">Sesuai</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input 
                                        {{ old('kesesuaian_laporan_kegiatan') === '0' ? 'checked' : '' }}
                                        value="0"
                                        type="radio" 
                                        id="kesesuaian_laporan_kegiatan-detail-2" 
                                        name="kesesuaian_laporan_kegiatan" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="kesesuaian_laporan_kegiatan-detail-2">Tidak Sesuai</label>
                                </div>
                        </div>
                    </div>
                </div>

                <hr>
                
                <div class="text-grey mb-2">Temuan : </div>
                <div id="temuan-wrapper-detail">
                    {{--  --}}
                </div>
                <div class="form-group mt-4">
                    <label for="">Deskripsi Temuan dan Potensi TGR </label>
                    <textarea name="deskripsi" id="deskripsi-detail" class="form-control" rows="2" disabled></textarea>
                </div>


                
            </div>
        </div>
    </div>
</div>