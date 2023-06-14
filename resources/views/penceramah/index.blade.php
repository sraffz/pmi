@php
    
@endphp

@extends('adminlte::page')

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Senarai Penceramah</h3>

            <div class="box-tools pull-right">
                <a href=" {{ route('penceramah.create') }}" class="btn btn-success">Tambah Penceramah</a>
            </div>
        </div>
        <div class="box-body">
            <table id="penceramahTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama Penceramah</th>
                        <th>No. K/P</th>
                        <th>No. Telefon</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($senaraiPenceramah as $key => $penceramah)
                        @php $key++ @endphp
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $penceramah->nama_penceramah }}</td>
                            <td>{{ $penceramah->no_kad_pengenalan }}</td>
                            <td>{{ $penceramah->no_telefon }}</td>
                            <td>
                                <a class='btn btn-primary'
                                    href='{{ route('penceramah.edit', [$penceramah->id_penceramah]) }}'>Kemaskini</a>
                                <a class='btn btn-danger'
                                    href='{{ route('penceramah.destroy', [$penceramah->id_penceramah]) }}'
                                    onclick="return confirm('Adakah Anda Ingin Padam Maklumat Penceramah Ini?')">Padam</a>
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
        $('#penceramahTable').DataTable()
    </script>
@endsection
