@extends('layouts.auth')

@section('htmlheader_title')Inicio de Sesión @endsection

@section('content')
    <body class="login">
        <!-- BEGIN LOGO -->
        <div style="margin: 30px auto 0; text-align: center">
            <a href="{{ url('/home') }}">
                <img src="{{ asset('img/titulo_innovacondomi.png') }}" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="{{ url('/login') }}" method="post">
                <h3 class="form-title font-green">Iniciar Sesión</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        <strong>Se encontraron los siguientes errores:</strong><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    {!! csrf_field() !!}
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Correo Electrónico</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                           placeholder="Correo Electrónico" name="email" required="required" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                           placeholder="Contraseña" name="password" required="required" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Entrar</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Recordar
                        <span></span>
                    </label>
                    <a href="{!! url('password/reset') !!}" id="forget-password" class="forget-password">¿Olvidó Contraseña?</a>
                </div>
                {{--<div class="login-options">
                    <h4>Or login with</h4>
                    <ul class="social-icons">
                        <li>
                            <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
                        </li>
                    </ul>
                </div>--}}
                <div class="create-account">
                    <p>
                        <a href="{{ url('/register') }}" id="register-btn" class="uppercase">Crear una Cuenta</a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright"> GRUPO INNOVA. <i>Desarrollo Inteligente.</i> </div>

        @include('layouts.partials.scripts_auth')
    </body>
@endsection
