@extends('layouts.public')

@section('content')
    <div class="container-fluid">
        <div class="row" style="margin-bottom: 10px">
            <div class="col col-md-12">
                @php
                    use Jenssegers\Agent\Agent;

                    $agent = new Agent();
                @endphp
                @if ($agent->isDesktop())
                    <img src="{{ asset('images/suk.png') }}" class="center-block" alt="" width="162">
                @else
                    <img src="{{ asset('images/suk.png') }}" class="center-block" alt="" width="40%">
                @endif
                
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12">
                <div class="well" style="text-align: center">
                    <span style="font-size: 12pt;"> <strong> Daftar Kehadiran </strong></span>
                </div>
                <div class="callout callout-warning">
                    <p>
                        Sila pastikan anda telah mempunyai akaun pengguna sebelum mendaftar kehadiran, sekiranya tiada sila klik pautan dibawah <br> <a href="{{ route('register') }}">Daftar Akaun Baru</a>
                    </p>
                  </div>

                  
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <center>
                            <h3 class="box-title"> <strong>{{ $program->nama_program }}</strong> </h3>
                        </center>
                      
                    </div>
                    <div class="box-body">
                      <form action="{{ route('program.daftar-kehadiran', ['id' => $program->id_program]) }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback {{ $errors->has('no_kad_pengenalan') ? 'has-error' : '' }}">
                            <input type="text" name="no_kad_pengenalan" class="form-control" value="{{ old('no_kad_pengenalan') }}" placeholder="No Kad Pengenalan">
                            <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                            @if ($errors->has('no_kad_pengenalan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_kad_pengenalan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" name="password" class="form-control" placeholder="Katalaluan Akaun">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button class="btn btn-primary btn-block" type="submit">Daftar Kehadiran</button>
                      </form>
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
        </div>
    </div>
@endsection