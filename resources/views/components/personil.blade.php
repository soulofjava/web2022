<div>
    <div class="container">
        <center>
            <h1 class="mt-5">Personil</h1>
        </center>
        <table class="table mt-4 table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>NAMA</th>
                    <th>PANGKAT / GOL. RUANG</th>
                    <th>JABATAN</th>
                    <th>PENDIDIKAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kadis as $list)
                <tr>
                    <td>{{ $list->gdp.$list->nama.', '.$list->gdb }}</td>
                    <td>{{ $list->pangkat.' / '.$list->golru }}</td>
                    <td>{{ $list->jabatan }}</td>
                    <td>{{ $list->pendidikan }}</td>
                </tr>
                @endforeach
                @foreach ($sekdin as $list)
                <tr>
                    <td>{{ $list->gdp.$list->nama.', '.$list->gdb }}</td>
                    <td>{{ $list->pangkat.' / '.$list->golru }}</td>
                    <td>{{ $list->jabatan }}</td>
                    <td>{{ $list->pendidikan }}</td>
                </tr>
                @endforeach
                @foreach ($kabid_informatika as $list)
                <tr>
                    <td>{{ $list->gdp.$list->nama.', '.$list->gdb }}</td>
                    <td>{{ $list->pangkat.' / '.$list->golru }}</td>
                    <td>{{ $list->jabatannya }}</td>
                    <td>{{ $list->pendidikan }}</td>
                </tr>
                @endforeach
                @foreach ($kabid_ikp as $list)
                <tr>
                    <td>{{ $list->gdp.$list->nama.', '.$list->gdb }}</td>
                    <td>{{ $list->pangkat.' / '.$list->golru }}</td>
                    <td>{{ $list->jabatannya }}</td>
                    <td>{{ $list->pendidikan }}</td>
                </tr>
                @endforeach
                @foreach ($staff_diskominfo as $list)
                <tr>
                    <td>{{ $list->gdp.$list->nama.', '.$list->gdb }}</td>
                    <td>{{ $list->pangkat.' / '.$list->golru }}</td>
                    <td>{{ $list->jabatannya }}</td>
                    <td>{{ $list->pendidikan }}</td>
                </tr>
                @endforeach
    
            </tbody>
        </table>
    </div>
</div>