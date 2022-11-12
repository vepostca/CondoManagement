@extends('layouts.auth')

@section('htmlheader_title')Recuperar Contraseña @endsection

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
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form  action="{!! url('/password/email') !!}" method="post">
            <h3 class="font-green">¿Olvidó su Contraseña?</h3>
            <p> Introduzca su dirección de correo electrónico para restablecer la contraseña. </p>
            {!! csrf_field() !!}
            <div class="form-group has-feedback {!! $errors->has('email') ? ' has-error' : '' !!}">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Correo Electrónico" name="email" required="required" />
                @if ($errors->has('email'))
                    <span class="help-block">
                                <strong>{!! $errors->first('email') !!}</strong>
                            </span>
                @endif
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn green btn-outline">
                    <a href="{!! url('login') !!}"> Iniciar Sesión</a></button>
                <button type="submit" class="btn btn-success uppercase pull-right">Enviar</button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>
    <div class="copyright"> GRUPO INNOVA. <i>Desarrollo Inteligente.</i> </div>

    @include('layouts.partials.scripts_auth')
    </body>
@endsection