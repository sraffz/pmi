@extends('adminlte::page')

@section('content')




    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Kemaskini Pengguna</h3>

        </div>

        <div class="box-body">

            <form action="{{ route('pengguna.update', ['id' => $pengguna->id_pengguna]) }}" method="POST" class="col-lg-6">
                {{ method_field('put') }}
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $pengguna->id_pengguna }}">

                <div class="form-group has-feedback {{ $errors->has('nama_penuh') ? 'has-error' : '' }}">
                    <label>Nama Penuh</label>
                    <input type="text" name="nama_penuh" id="nama_penuh" class="form-control" title="Masukkan nama penuh"
                        value="{{ old('nama_penuh', $pengguna->nama_penuh) }}">
                    @if ($errors->has('nama_penuh'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('nama_penuh')) }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group has-feedback {{ $errors->has('nama_singkatan') ? 'has-error' : '' }}">
                    <label>Nama Singkatan</label>
                    <input type="text" name="nama_singkatan" id="nama_singkatan" class="form-control"
                        title="Masukkan singkatan" value="{{ old('nama_singkatan', $pengguna->nama_singkatan) }}">
                    @if ($errors->has('nama_singkatan'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('nama_singkatan')) }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('no_kad_pengenalan') ? 'has-error' : '' }}">
                    <label>Nombor Kad Pengenalan</label>
                    <input type="number" name="no_kad_pengenalan" id="no_kad_pengenalan"
                        value="{{ old('no_kad_pengenalan', $pengguna->no_kad_pengenalan) }}" class="form-control"
                        title="Masukkan 12 Angka Nombor">
                    @if ($errors->has('no_kad_pengenalan'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('no_kad_pengenalan')) }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('jabatan') ? 'has-error' : '' }}">
                    <label>Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control select2">
                        <option value="">--Pilih Jabatan--</option>
                        @foreach ($jabatan as $jbtn)
                            <option value="{{ $jbtn->jabatan_id }}" @if (old('skim', $pengguna->jabatan) == $jbtn->jabatan_id) selected @endif>
                                {{ $jbtn->nama_jabatan }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('jabatan'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('jabatan')) }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('skim') ? 'has-error' : '' }}">
                    <label>Jawatan</label>
                    <select name="skim" id="skim" class="form-control select2">
                        <option value="">--Pilih Jawatan--</option>
                        @foreach ($skim as $skims)
                            <option value="{{ $skims->skim }}" @if (old('skim', $pengguna->skim) == $skims->skim) selected @endif>
                                {{ $skims->skim }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('skim'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('skim')) }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label>Gred Jawatan</label>
                        <div class="form-group has-feedback {{ $errors->has('gred_kod') ? 'has-error' : '' }}">
                            <select name="gred_kod" class="form-control select2" value="{{ old('gred_kod') }}" required>
                                <option value="">Kod Gred</option>
                                @foreach ($gred_kod as $gk)
                                    <option value="{{ $gk->gred_kod_abjad }}"
                                        @if (old('gred_kod', $pengguna->gred_kod) == $gk->gred_kod_abjad) selected @endif>{{ $gk->gred_kod_abjad }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('gred_kod'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gred_kod') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label><br></label>
                        <div class="form-group has-feedback {{ $errors->has('gred') ? 'has-error' : '' }}">
                            <select name="gred" class="form-control select2" value="{{ old('gred') }}" required>
                                <option value="">Gred</option>
                                @foreach ($gred_angka as $ga)
                                    <option value="{{ $ga->gred_angka_nombor }}"
                                        @if (old('gred', $pengguna->gred) == $ga->gred_angka_nombor) selected @endif>
                                        {{ $ga->gred_angka_nombor }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('gred'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gred') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group has-feedback {{ $errors->has('no_telefon') ? 'has-error' : '' }}">
                    <label>Nombor Telefon</label>
                    <input type="number" name="no_telefon" id="no_telefon" class="form-control"
                        value="{{ old('no_telefon', $pengguna->no_telefon) }}" title="Masukkan nombor telefon">
                    @if ($errors->has('no_telefon'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('no_telefon')) }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label>E-mail</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $pengguna->email) }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('email')) }}</strong>
                        </span>
                    @endif
                </div>

                @role('superadmin')

                    <div class="form-group has-feedback {{ $errors->has('status_aktif') ? 'has-error' : '' }}"">
                        <label>Status Aktif</label>
                        <select name="status_aktif" id="status_aktif" class="form-control selectpicker">
                            <option value="1" @if (old('status_aktif', $pengguna->status_aktif) == 1) selected @endif>Aktif</option>
                            <option value="0" @if (old('status_aktif', $pengguna->status_aktif) == 2) selected @endif>Tidak Aktif</option>
                        </select>
                        @if ($errors->has('status_aktif'))
                            <span class="help-block">
                                <strong>{{ ucwords($errors->first('status_aktif')) }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Jenis Pengguna</label> <br>

                        <input type="checkbox" id="admin" name="tahap[]" value="superadmin"
                            @if ($pengguna->hasRole('superadmin')) checked @endif> Admin <br>
                        <input type="checkbox" id="pengurusan" name="tahap[]" value="pengurusan"
                            @if ($pengguna->hasRole('pengurusan')) checked @endif> Pengurusan <br>
                        <input type="checkbox" id="urus setia" name="tahap[]" value="urusetia"
                            @if ($pengguna->hasRole('urusetia')) checked @endif> Urusetia <br>
                        <input type="checkbox" id="individu" name="tahap[]" value="individu"
                            @if ($pengguna->hasRole('individu')) checked @endif> Individu

                    </div>
                @endrole

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('senarai.pengguna') }}" class="btn btn-info">Kembali</a>
            </form>
        </div>

    </div>

@stop
