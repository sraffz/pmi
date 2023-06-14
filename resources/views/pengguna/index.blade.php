@extends('adminlte::page')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Senarai Pengguna</h3>
            <div class="box-tools pull-right">
                <a class="btn btn-success" href='{{ route('pengguna.create') }}'>Tambah Pengguna</a>
            </div>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No. Kad Pengenalan</th>
                        <th>E-Mail</th>
                        <th>No. Telefon</th>
                        <th>Alamat</th>
                        <th>Status Aktif</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($senaraiPengguna as $pengguna)
                        <tr>
                            <td>{{ $pengguna->nama_penuh }}</td>
                            <td>{{ $pengguna->no_kad_pengenalan }}</td>
                            <td>{{ $pengguna->email }}</td>
                            <td>{{ $pengguna->no_telefon }}</td>
                            <td>{{ $pengguna->alamat }}</td>
                            <td>
                                @if ($pengguna->status_aktif == 1)
                                    <small class="label bg-green">Aktif</small>
                                @else
                                    <small class="label bg-red">Tidak Aktif</small>
                                @endif
                            </td>
                            <td>
                                <a class='btn btn-block btn-primary'
                                    href='{{ route('pengguna.edit', [$pengguna->id_pengguna]) }}'>Kemaskini</a>
                                <a class='btn btn-block btn-danger'
                                    href='{{ route('pengguna.destroy', [$pengguna->id_pengguna]) }}'
                                    onclick="return confirm('Adakah Anda Ingin Padam Maklumat Pengguna ini?')">Padam</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#example1').DataTable()
    </script>
@endsection
