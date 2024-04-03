<div>
    @if(!$showDiv)
    <div class="centered" style="display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;">
        <button type="button" class="btn btn-primary" wire:click="toggleDiv">Pinjam Tempat Rapat</button>
    </div>
    <div style="padding: 25px;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center;">NO</th>
                    <th scope="col" style="text-align: center;">TANGGAL</th>
                    <th scope="col" style="text-align: center;">INSTANSI/LEMBAGA</th>
                    <th scope="col" style="text-align: center;">ACARA</th>
                    <th scope="col" style="text-align: center;">JUMLAH PESERTA</th>
                    <th scope="col" style="text-align: center;">WAKTU</th>
                    <th scope="col" style="text-align: center;">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data Tabel -->
                @forelse($rapat as $item)
                <tr>
                    <th style="text-align: center;" scope="row">{{ $loop->iteration }}</th>
                    <td style="text-align: center;">{{ $item->tanggal }}</td>
                    <td style="text-align: center;">{{ $item->instansi }}</td>
                    <td style="text-align: center;">{{ $item->acara }}</td>
                    <td style="text-align: center;">{{ $item->jumlah }}</td>
                    <td style="text-align: center;">{{ $item->waktu }}</td>
                    <td style="text-align: center;">
                        <span class="badge" style="background-color: {{
                            $item->status == 'STATUS_ST_01' ? 'grey' :
                            ($item->status == 'STATUS_ST_02' ? 'green' :
                            ($item->status == 'STATUS_ST_03' ? 'red' :
                            ($item->status == 'STATUS_ST_04' ? 'blue' : '')))
                            }};">
                            {{
                            $item->status == 'STATUS_ST_01' ? 'Menunggu Persetujuan' :
                            ($item->status == 'STATUS_ST_02' ? 'Disetujui' :
                            ($item->status == 'STATUS_ST_03' ? 'Ditolak' :
                            ($item->status == 'STATUS_ST_04' ? 'Dibatalkan' : '')))
                            }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <th colspan="7" style="text-align: center;">Tidak Ada Data</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @else
    <div style="padding: 25px;">
        <center>
            <h1>Form Pengajuan Pinjam Tempat</h1>
        </center>
        <form wire:submit="simpan">
            <div class="row" style="margin-top: 25px;">
                <!-- Nama -->
                <div class="col-md-6">
                    <label for="nama">Nama:</label><br>
                    <input type="text" wire:model.live="nama" class="form-control">
                    <div style="color: red;">@error('nama') {{ $message }} @enderror</div>
                </div>

                <!-- Jenis Kelamin -->
                <div class="col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin:</label><br>
                    <select wire:model.live="jkel" class="form-control" style="height: 50px;">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div style="color: red;">@error('jkel') {{ $message }} @enderror</div>
                </div>
            </div>

            <div class="row">
                <!-- Usia -->
                <div class="col-md-6">
                    <label for="usia">Usia:</label><br>
                    <input type="number" wire:model.live="usia" class="form-control">
                    <div style="color: red;">@error('usia') {{ $message }} @enderror</div>
                </div>

                <!-- Pekerjaan -->
                <div class="col-md-6">
                    <label for="pekerjaan">Pekerjaan:</label><br>
                    <select class="form-control " wire:model.live="pekerjaan" style="height: 50px;">
                        <option selected="selected" value="">Pilih Pekerjaan</option>
                        <option value="1">ASN</option>
                        <option value="2">TNI</option>
                        <option value="3">POLRI</option>
                        <option value="4">Swasta</option>
                        <option value="5">Wirausaha</option>
                        <option value="6">Lainnya</option>
                    </select>
                    <div style="color: red;">@error('pekerjaan') {{ $message }} @enderror</div>
                </div>
            </div>

            <div class="row">
                <!-- Pendidikan -->
                <div class="col-md-6">
                    <label for="pendidikan">Pendidikan:</label><br>
                    <select class="form-control" wire:model.live="pendidikan" style="height: 50px;">
                        <option selected="selected" value="">Pilih Pendidikan</option>
                        <option value="1">SD</option>
                        <option value="2">SMP</option>
                        <option value="3">SMA</option>
                        <option value="4">Diploma</option>
                        <option value="5">S-1</option>
                        <option value="6">S-2</option>
                        <option value="7">S-3</option>
                        <option value="8">Lainnya</option>
                    </select>
                    <div style="color: red;">@error('pendidikan') {{ $message }} @enderror</div>
                </div>

                <!-- Instansi/Lembaga -->
                <div class="col-md-6">
                    <label for="instansi">Instansi/Lembaga:</label><br>
                    <input type="text" wire:model.live="instansi" class="form-control">
                    <div style="color: red;">@error('instansi') {{ $message }} @enderror</div>
                </div>
            </div>

            <div class="row">
                <!-- Tanggal -->
                <div class="col-md-6">
                    <label for="tanggal">Tanggal:</label><br>
                    <input type="date" wire:model.live="tanggal" class="form-control">
                    <div style="color: red;">@error('tanggal') {{ $message }} @enderror</div>
                </div>

                <!-- Waktu -->
                <div class="col-md-6">
                    <label for="waktu">Waktu:</label><br>
                    <input type="time" wire:model.live="waktu" class="form-control">
                    <div style="color: red;">@error('waktu') {{ $message }} @enderror</div>
                </div>
            </div>

            <div class="row">
                <!-- Nama Kegiatan -->
                <div class="col-md-6">
                    <label for="kegiatan">Nama Kegiatan:</label><br>
                    <input type="text" wire:model.live="kegiatan" class="form-control">
                    <div style="color: red;">@error('kegiatan') {{ $message }} @enderror</div>
                </div>

                <!-- Acara -->
                <div class="col-md-6">
                    <label for="acara">Acara:</label><br>
                    <select class="form-control" wire:model.live="acara" style="height: 50px;">
                        <option selected="selected" value="">Pilih Acara</option>
                        <option value="Daring">Daring</option>
                        <option value="Luring">Luring</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                    <div style="color: red;">@error('acara') {{ $message }} @enderror</div>
                </div>
            </div>

            <div class="row">
                <!-- Jumlah Peserta -->
                <div class="col-md-6">
                    <label for="jumlah_peserta">Jumlah Peserta:</label><br>
                    <input type="number" wire:model.live="jumlah" class="form-control">
                    <div style="color: red;">@error('jumlah') {{ $message }} @enderror</div>
                </div>

                <!-- Kontak Person (WhatsApp) -->
                <div class="col-md-6">
                    <label for="kontak_person">Kontak Person (WhatsApp):</label><br>
                    <input type="tel" wire:model.live="kontak" class="form-control" pattern="[0-9]{9,15}">
                    <div style="color: red;">@error('kontak') {{ $message }} @enderror</div>
                </div>
            </div>

            <div class="row">
                <!-- Surat Permohonan (pdf) -->
                <div class="col-md-6">
                    <label for="surat_permohonan">Surat Permohonan (PDF):</label><br>
                    <input type="file" wire:model.live="surat" class="form-control" accept="application/pdf">
                    <div style="color: red;">@error('surat') {{ $message }} @enderror</div>
                </div>
            </div>

            <!-- Tombol Batal dan Submit -->
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-6">
                    <button wire:click="toggleDiv" type="button" class="btn btn-default">Batal</button>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </div>
        </form>
    </div>
    @endif
</div>