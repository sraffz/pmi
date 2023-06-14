@extends('adminlte::master')

@section('adminlte_css')
    @yield('css')
    <style>
        select:required:invalid {
            color: gray;
          }
          option[value=""][disabled] {
            display: none;
          }
          option {
            color: black;
          }
          /* .register-box {
            width: 768px;
            margin: auto;
            margin-top: 7%;
          } */
          .register-page
        {
            background-color: #f4fafe !important;
        }

        @@media all and (min-width: 768px) { 
            .register-box {
                width: auto !important;
            }
         }
        @@media all and (min-width: 992px) { 
            .register-box {
                width: 768px !important;
            }
         }
        
    </style>

@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box" >
        <div class="register-logo">
            <span class="db"> 
                <div class="container-fluid">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/suk.png')}}" width="100px" alt="logo"></a> <br>
                    <img src="{{ asset('images/e-PMI-logo.png') }}" width="180px" alt="">
                    {{-- <h4 style="color:maroon;"><b> Sistem Pembangunan Modal Insan</b></h4>  --}}
                </div>
                
        
                
            </span>  
            {{-- <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a> --}}
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {{ csrf_field() }}

                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group has-feedback {{ $errors->has('nama_penuh') ? 'has-error' : '' }}">
                            <input type="text" name="nama_penuh" class="form-control" value="{{ old('nama_penuh') }}"
                                placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('nama_penuh'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama_penuh') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('nama_singkatan') ? 'has-error' : '' }}">
                            <input type="text" name="nama_singkatan" id="nama_singkatan" class="form-control" value="{{ old('nama_singkatan') }}"
                                placeholder="{{ trans('adminlte::adminlte.short_name') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('nama_singkatan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama_singkatan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('no_kad_pengenalan') ? 'has-error' : '' }}">
                            <input type="text" name="no_kad_pengenalan" class="form-control" value="{{ old('no_kad_pengenalan') }}"
                                placeholder="{{ trans('adminlte::adminlte.no_kad_pengenalan') }}">
                            <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                            @if ($errors->has('no_kad_pengenalan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_kad_pengenalan') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off" 
                                placeholder="{{ trans('adminlte::adminlte.password') }}"  data-toggle="tooltip" title="Katalaluan mesti mempunyai sekurangnya 12 aksara, 1 nombor, 1 huruf besar dan kecil serta 1 simbol">
                                <span class="input-group-addon"><i id="showPass1" class="fa fa-eye-slash"></i></span>
                            </div>
                            {{-- <input type="password" name="password" class="form-control"
                                placeholder="{{ trans('adminlte::adminlte.password') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span> --}}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                                <span class="input-group-addon"><i id="showPass2" class="fa fa-eye-slash"></i></span>
                            </div>
                            {{-- <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                                placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span> --}}
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group has-feedback {{ $errors->has('kategori') ? 'has-error' : '' }}">
                            
                            <select name="kategori" class="form-control" value="{{ old('kategori') }}" required>
                                <option value="" disabled selected>{{ trans('adminlte::adminlte.category') }}</option>
                                @foreach ($senaraiKategoriPengguna as $kategoriPengguna)
                                    <option value="{{ $kategoriPengguna->id_kategori_pengguna }}" @if(old('kategori') == $kategoriPengguna->id_kategori_pengguna) selected @endif >{{ $kategoriPengguna->kategori }}</option>    
                                @endforeach
                            </select>
                            @if ($errors->has('kategori'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kategori') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('alamat') ? 'has-error' : '' }}">
                            <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}"
                                placeholder="{{ trans('adminlte::adminlte.alamat') }}">
                            <span class="glyphicon glyphicon-bed form-control-feedback"></span>
                            @if ($errors->has('alamat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('no_telefon') ? 'has-error' : '' }}">
                            <input type="number" name="no_telefon" class="form-control" value="{{ old('no_telefon') }}"
                                placeholder="{{ trans('adminlte::adminlte.no_telefon') }}">
                            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                            @if ($errors->has('no_telefon'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_telefon') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="off"
                                placeholder="{{ trans('adminlte::adminlte.email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group has-feedback {{ $errors->has('captcha') ? 'has-error' : '' }}">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                            <br>
                            <input type="text" id="captcha" name="captcha" autocomplete="off" class="form-control" placeholder="{{ trans('adminlte::adminlte.captcha') }}">
                            @if ($errors->has('captcha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    {{ trans('adminlte::adminlte.register') }}
                </button>
                </div>
                

                
                
            </form>
            <br>
            <p>
                <a href="{{ url(config('adminlte.login_url', 'login')) }}" class="text-center">
                    {{ trans('adminlte::adminlte.i_already_have_a_membership') }}
                </a>
            </p>
            <p>
                <a href="{{ route('welcome') }}" class="text-center">
                    Laman Utama
                </a>
            </p>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
    <!-- /.reload-captcha -->
    <script>
        $('#reload').click(function () {
       $.ajax({
           type: 'GET',
           url: "{{ url('reload-captcha') }}",
           success: function (data) {
               $(".captcha span").html(data.captcha);
           }
       });
   });
   </script>

    <script>
         $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '{{ url('reload-captcha') }}',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
  
            $('#showPass1').on('click', function(){
                    var passInput=$("#password");
                    togglePassView($(this), passInput)
                })
            

            $('#showPass2').on('click', function(){
                    var passInput=$("#password_confirmation");
                    togglePassView($(this), passInput)
                })
        })

        function togglePassView(buttonPass, fieldPass)
        {
            if(fieldPass.attr('type')==='password')
                {
                    fieldPass.attr('type','text');
                    buttonPass.removeClass("fa-eye-slash");
                    buttonPass.addClass("fa-eye");
                }else{
                    fieldPass.attr('type','password');
                    buttonPass.removeClass("fa-eye-slash");
                    buttonPass.addClass("fa-eye-slash");
                }
        }
        
    </script>
@stop
