<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
</div><div>
    <div class="container">
        <table class="table mt-4 table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align: center;">NAMA</th>
                    <th style="text-align: center;">PANGKAT / GOL. RUANG</th>
                    <th style="text-align: center;">JABATAN</th>
                    <th style="text-align: center;">PENDIDIKAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($struktural as $list)
                <tr>
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