@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <style>
        .login-page
        {
            background-color: #f4fafe !important;
        }
    </style>
    @yield('css')
@stop

 @section('body_class', 'login-page') 

@section('body') 


    <div class="login-box" style="margin-top: 30px;">
        <div class="text-center p-t-45 p-b-10"> 
                    	
            <span class="db mt-5"> 
                <a href="{{ url('/') }}"><img src="{{ asset('images/suk.png')}}" width="100px" alt="logo"></a> <br>
                <img src="{{ asset('images/e-PMI-logo.png') }}" width="180px" alt="">
                {{-- <h4 style="color:maroon;"><b> Sistem Pembangunan Modal Insan</b></h4>  --}}
        
                
            </span>  
        <div class="login-logo">         
            {{-- <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}"> {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a> --}}
        </div>
        <!-- /.login-logo -->

        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.login_message') }}</p>
            
            <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group has-feedback {{ $errors->has('no_kad_pengenalan') ? 'has-error' : '' }}">
                    <label for="no_kad_pengenalan" class="pull-left">{{ trans('adminlte::adminlte.no_kad_pengenalan') }}</label>
                    <input type="text" id="no_kad_pengenalan" name="no_kad_pengenalan" class="form-control" value="{{ old('no_kad_pengenalan') }}"
                           placeholder="{{ trans('adminlte::adminlte.no_kad_pengenalan') }}">
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                    @if ($errors->has('no_kad_pengenalan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('no_kad_pengenalan') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="pull-left">{{ trans('adminlte::adminlte.password') }}</label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback showpass">&nbsp;</span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <div class="icheck-primary pull-left">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">{{ trans('adminlte::adminlte.remember_me') }}</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary btn-block btn-flat pull-right">
                            {{ trans('adminlte::adminlte.sign_in') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <br>
            <p>
                <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}" class="text-center">
                    {{ trans('adminlte::adminlte.i_forgot_my_password') }}
                </a>
            </p>
            
            @if (config('adminlte.register_url', 'register'))
                <p>
                    <a href="{{ url(config('adminlte.register_url', 'register')) }}" class="text-center">
                        {{ trans('adminlte::adminlte.register_a_new_membership') }}
                    </a>
                </p>
            @endif
            <p>
                <a href="{{ route('welcome') }}" class="text-center">
                    Laman Utama
                </a>
            </p>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('adminlte_js')
    @yield('js')
    @if (Session::has('alert.config'))
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif

<script>
    $(document).ready(function(){

        $('.showpass').on('click', function(){
            console.log('test');
                // var passInput=$("#password");
                // togglePassView($(this), passInput)
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
