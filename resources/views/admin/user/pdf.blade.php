<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->jabatan }}</td>
                @if ($item->is_tugas == false)
                    <td>Belum Ditugaskan</td>
                @else
                    <td>Sudah Ditugaskan</td>
                @endif
                <td>{{ $item->is_tugas }}</td>
            </tr>  
        @endforeach
    </tbody>
</table>