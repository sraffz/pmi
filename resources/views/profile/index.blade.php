@extends('adminlte::page')

@section('content_header')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">KEMASKINI PROFIL</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <form action="{{ route('profile.update') }}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('nama_penuh') ? 'has-error' : '' }}">
                    <label for="nama_penuh">Nama Penuh</label>
                    <input type="text" name="nama_penuh" class="form-control" value="{{ $profile->nama_penuh }}" />
                    @if ($errors->has('nama_penuh'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('nama_penuh')) }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('nama_singkatan') ? 'has-error' : '' }}">
                    <label for="nama_singkatan">Nama Singkatan</label>
                    <input type="text" name="nama_singkatan" class="form-control"
                        value="{{ $profile->nama_singkatan }}" />
                    @if ($errors->has('nama_singkatan'))
                        <span class="help-block">
                            <strong>{{ ucwords($errors->first('nama_singkatan')) }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="no_kad_pengenalan">No. Kad Pengenalan</label>
                    <input type="text" class="form-control" value="{{ $profile->no_kad_pengenalan }}"
                        id="no_kad_pengenalan" disabled="disable" />
                </div>
                <div class="form-group has-feedback {{ $errors->has('jabatan') ? 'has-error' : '' }}">
                    <label>Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control select2">
                        <option value="">--Pilih Jabatan--</option>
                        @foreach ($jabatan as $jbtn)
                            <option value="{{ $jbtn->jabatan_id }}" @if (old('skim', $profile->jabatan) == $jbtn->jabatan_id) selected @endif>
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
                            <option value="{{ $skims->skim }}" @if (old('skim', $profile->skim) == $skims->skim) selected @endif>
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
                                        @if (old('gred_kod', $profile->gred_kod) == $gk->gred_kod_abjad) selected @endif>{{ $gk->gred_kod_abjad }}
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
                                        @if (old('gred', $profile->gred) == $ga->gred_angka_nombor) selected @endif>
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
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group has-feedback {{ $errors->has('no_telefon') ? 'has-error' : '' }}">
                            <label for="no_telefon">No Telefon</label>
                            <input type="text" name="no_telefon" class="form-control"
                                value="{{ $profile->no_telefon }}" />
                            @if ($errors->has('no_telefon'))
                                <span class="help-block">
                                    <strong>{{ ucwords($errors->first('no_telefon')) }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $profile->email }}" />
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ ucwords($errors->first('email')) }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <input type="submit" name="kemaskini" class="btn btn-primary" value="Kemaskini">
            </form>
        </div>
    </div>
@endsection
@section('adminlte_js')
    @yield('js')
    <script>
        $('.select2').select2();
    </script>
@endsection
