@extends('layouts.auth')

@section('htmlheader_title')Selección de Perfil de Acceso
@endsection

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
            <form class="login-form" action="{{ url('/loginrol') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title font-green">Perfil de Acceso</h3>
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
                <div class="form-group" lang="es">
                    <label class="control-label visible-ie8 visible-ie9" for="seg_rol">Rol</label>
                    {!! Form::select('seg_rol',$rolesUsuario, null, ['class' => 'form-control select2',
                                        'id'=>'seg_rol', 'data-placeholder'=> 'Rol',
                                        'required'=>'required', 'style'=>'width: 100%']) !!}
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9" for="com_cliente">Compañía</label>
                    {!! Form::select('com_cliente',[], null, ['class' => 'form-control select2',
                                        'id'=>'com_cliente', 'data-placeholder'=> 'Compañía',
                                        'required'=>'required', 'style'=>'width: 100%']) !!}
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9" for="com_org">Condominio</label>
                    {!! Form::select('com_org',[], null, ['class' => 'form-control select2',
                                        'id'=>'com_org', 'data-placeholder'=> 'Condominio',
                                         'required'=>'required', 'style'=>'width: 100%']) !!}
                </div>
                <div class="form-actions" style="padding: 5px 30px; border-bottom: 0px;">
                    <a class="btn green btn-outline" href="{!! url('/logout') !!}">Cancelar</a>
                    <button type="submit" id="selrol-submit-btn" class="btn btn-success pull-right">Aceptar</button>
                </div>
            </form>
        </div>

    @include('layouts.partials.scripts_auth')

    <script>
        $(document).ready(function() {
            var rolId='';
            $("#seg_rol").select2({
                language: "es",
                allowClear: true
            });
            $("#com_cliente").select2({
                language: "es",
                allowClear: true
            });
            $("#com_org").select2({
                language: "es",
                allowClear: true
            });
            var org_rol = new Select2Cascade($("#com_cliente"), $("#com_org"), "{{ url('com/orgs_json') }}",
                    {rol: (function(){
                            return $("#seg_rol").val()
                        })
                    });

            var cliente_rol = new Select2Cascade($("#seg_rol"), $("#com_cliente"), "{{ url('com/clientes_json') }}");
            cliente_rol.then( function(parent, child, items) {
                rolId=parent.select2().val();
            });

            $("#seg_rol").on("change", function (e) { $("#com_org").val(null).trigger("change"); });
        })

    </script>
    </body>

@endsection
