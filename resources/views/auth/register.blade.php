@extends('layouts.auth')

@section('htmlheader_title')Inicio de Sesión @endsection

@section('content')
<body class=" login">
    <!-- BEGIN LOGO -->
    <div style="margin: 30px auto 0; text-align: center">
        <a href="{{ url('/home') }}">
            <img src="{{ asset('img/titulo_innovacondomi.png') }}" alt="" /> </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">

        <!-- BEGIN REGISTRATION FORM -->
        <form action="{{ url('/register') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h3 class="font-green">Regístrese</h3>
            <p class="hint"> Introduzca sus datos personales a continuación: </p>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Nombres</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Nombres" name="nombres" value="{{ old('nombres') }}"/>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Apellidos</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}"/>
            </div>

            <p class="hint"> Ingrese los detalles de su cuenta a continuación: </p>

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Correo Electrónico</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Correo Electrónico" name="email" value="{{ old('email') }}"/>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Usuario</label>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username" value="{{ old('username') }}"/>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Contraseña" name="password" />
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Reescriba Contraseña</label>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Reescriba Contraseña" name="password_confirmation" /> </div>
            <div class="form-group margin-top-20 margin-bottom-20">
                <label class="mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="terms" /> Estoy de acuerdo con los
                    <a href="#termsModal" data-toggle="modal" data-target="#termsModal">Términos de Servicio </a>
                    <span></span>
                </label>

                <div id="register_tnc_error"> </div>
            </div>
            <div class="form-actions" style="padding: 5px 30px; border-bottom: 0px;">
                <button type="button" id="register-back-btn" class="btn green btn-outline">
                    <a href="{!! url('login') !!}"> Iniciar Sesión</a>
                </button>
                <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Registrar</button>
            </div>
        </form>
        <!-- END REGISTRATION FORM -->
    <!-- END REGISTRATION FORM -->
    </div>
    <div class="copyright"> GRUPO INNOVA. <i>Desarrollo Inteligente.</i> </div>
    @include('auth.terms')
    @include('layouts.partials.scripts_auth')
</body>

@endsection