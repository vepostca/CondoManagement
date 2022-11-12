<div class="panel-group accordion scrollable" id="accordion_config">
    <div class="panel panel-default">
        <div class="panel-heading bg-blue-oleo bg-font-blue-oleo">
            <h4 class="panel-title">
                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion_config"
                   href="#accordion_config_1"><i class="fa fa-envelope-o"></i> Parámetros de Correo Electrónico
                </a>
            </h4>
        </div>
        <div id="accordion_config_1" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-sm-5">
                        {!! Form::label('servidor_smtp', 'Servidor SMTP:', ['class' => 'control-label']) !!}
                        {!! Form::text('servidor_smtp', null, ['class' => 'form-control',
                                                              'placeholder' => 'Nombre o IP del Servidor SMTP',
                                                              'maxlength'   => '50',
                                                              'title'       =>'Nombre o IP del Servidor SMTP'
                                                              ]) !!}
                    </div>
                    <div class="form-group col-sm-4 required">
                        {!! Form::label('puerto_smtp', 'Puerto SMTP:', ['class' => 'control-label']) !!}
                        {!! Form::text('puerto_smtp', null, ['class' => 'form-control',
                                                              'placeholder' => 'Nro. de Puerto.',
                                                              'maxlength'   => '10',
                                                              'title'       =>'Puerto de conexión SMTP'
                                                              ]) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('seguridad_smtp', 'Seguridad SMTP:') !!}
                        {!! Form::select('seguridad_smtp', ['no' => 'No', 'ssl' => 'SSL', 'tls' => 'TLS'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-2 required">
                        {!! Form::label('autorizacion_smtp', 'Autorización SMTP:',['class' => 'control-label']) !!}
                        <label class="checkbox-inline" style="padding-left:0px">
                            {!! Form::hidden('autorizacion_smtp',false) !!}
                            {!! Form::checkbox('autorizacion_smtp', '1', true, ['data-toggle' => 'toggle',
                                                                     'data-on' => 'Si', 'data-onstyle' => 'primary',
                                                                     'data-off' => 'No', 'data-offstyle' => 'danger',
                                                                     'data-size' => 'normal',
                                                                     'data-height' => '28',
                                                                     'data-width' => '50']) !!}
                        </label>
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('cuenta_smtp', 'Cuenta de Usuario SMTP:', ['class' => 'control-label']) !!}
                        {!! Form::text('cuenta_smtp', null, ['class' => 'form-control',
                                                              'placeholder' => 'Nombre de Usuario SMTP',
                                                              'maxlength'   => '50',
                                                              'title'       =>'Cuenta de Usuario SMTP'
                                                              ]) !!}
                    </div>
                    <div class="form-group col-sm-3">
                        {!! Form::label('pwd_smtp', 'Password SMTP:', ['class' => 'control-label']) !!}
                        {!! Form::password('pwd_smtp', ['class' => 'form-control',
                                                              'placeholder' => 'Password',
                                                              'maxlength'   => '50',
                                                              'title'       =>'Password SMTP']) !!}
                    </div>
                    <div class="form-group col-sm-3 required">
                        {!! Form::label('enviador_smtp', 'Cuenta de Envío SMTP:', ['class' => 'control-label']) !!}
                        {!! Form::text('enviador_smtp', null, ['class' => 'form-control',
                                                              'placeholder' => 'ej. usuario.envio@dominio.com',
                                                              'maxlength'   => '50',
                                                              'title'       =>'Cuenta desde la cual se envía el mensaje.'
                                                              ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>