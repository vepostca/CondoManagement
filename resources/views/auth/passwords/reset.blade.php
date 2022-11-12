@extends('layouts.auth')

@section('htmlheader_title')Recuperar Contraseña @endsection

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
        <form method="post" action="{!! url('/password/reset') !!}}">
            <h3 class="font-green">Reestablecer la Contraseña</h3>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group has-feedback {!! $errors->has('email') ? ' has-error' : '' !!}}">
                <input type="email" class="form-control" name="email" value="{!! old('email') !!}}" placeholder="Correo Electrónico">
                @if ($errors->has('email'))
                    <span class="help-block">
                        {!! $errors->first('email') !!}}
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{!! $errors->has('password') ? ' has-error' : '' !!}}">
                <input type="password" class="form-control" name="password" placeholder="Contraseña">
                @if ($errors->has('password'))
                    <span class="help-block">
                        {!! $errors->first('password') !!}}
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{!! $errors->has('password_confirmation') ? ' has-error' : '' !!}}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        {!! $errors->first('password_confirmation') !!}}
                    </span>
                @endif
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success uppercase pull-right">Enviar</button>
            </div>
            {{--<div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn red btn-block btn-flat pull-right">
                        Reset Password
                    </button>
                </div>
            </div>--}}
        </form>
    </div>
</body>
@endsection
