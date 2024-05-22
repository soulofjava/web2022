<div>
    <div class="container" style="overflow-x: scroll;">
        <table class="table mt-4 table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align: center;">FOTO</th>
                    <th style="text-align: center;">NAMA</th>
                    <th style="text-align: center;">PANGKAT / GOL. RUANG</th>
                    <th style="text-align: center;">JABATAN</th>
                    <th style="text-align: center;">PENDIDIKAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($struktural as $list)
                <tr>
                    <td>
                        <img src="https://simpeg.wonosobokab.go.id/packages/upload/photo/pegawai/{{ $list['photo'] }}"
                            loading="lazy" alt="fotonya" width="100px">
                    </td>
                    <td>{{ $list['gdp'].$list['nama'].', '.$list['gdb'] }}</td>
                    <td>{{ $list['pangkat'].' / '.$list['golru'] }}</td>
                    <td>{{ $list['jabatan'] }}</td>
                    <td>{{ $list['pendidikan'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>