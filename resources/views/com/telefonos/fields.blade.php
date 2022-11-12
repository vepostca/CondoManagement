<div id="formTelefono">
    <div id="formTelefono_template">
        <div class="portlet box blue-oleo" style="margin-bottom: 0px">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-phone"></i> Teléfono <span id="formTelefono_label"></span>
                </div>
                <div class="tools">
                    <button id="formTelefono_remove_current" type="button" class="remove close delete" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-sm-3 required">
                        {!! Form::hidden('telefonos[#index#][id]','-1',['id'=>'formTelefono_#index#_id']) !!}
                        {!! Form::label('formTelefono_#index#_com_tipo_telefono_id', 'Tipo:', ['class' => 'control-label']) !!}
                        {!! Form::select('telefonos[#index#][com_tipo_telefono_id]',$tipoTelefono, null,
                                ['class' => 'form-control select2',
                                         'placeholder'=> 'Seleccione Tipo', 'required'=>'required',
                                         'id'=>'formTelefono_#index#_com_tipo_telefono_id', 'style'=>'width: 100%']) !!}
                    </div>

                    <div class="form-group col-sm-2 required">
                        {!! Form::label('formTelefono_#index#_codigo_area', 'Cod. Area:', ['class' => 'control-label']) !!}
                        {!! Form::text('telefonos[#index#][codigo_area]', null, ['class' => 'form-control',
                                                              'placeholder' => 'Cod. Area',
                                                              'maxlength'   => '4',
                                                              'title'       =>'Código de Área',
                                                              'required'    =>'required',
                                                              'id'=>'formTelefono_#index#_codigo_area']) !!}
                    </div>

                    <div class="form-group col-sm-3 required">
                        {!! Form::label('formTelefono_#index#_num_telf', 'Nro. Teléfono:', ['class' => 'control-label']) !!}
                        {!! Form::text('telefonos[#index#][num_telf]', null, ['class' => 'form-control',
                                                              'placeholder' => 'Número Teléfono',
                                                              'maxlength'   => '10',
                                                              'title'       =>'Número Teléfono',
                                                              'required'    =>'required',
                                                              'id'=>'formTelefono_#index#_num_telf']) !!}
                    </div>

                    <div class="form-group col-sm-2 required">
                        {!! Form::label('formTelefono_#index#_es_principal', 'Nro. Principal:') !!}
                        {!! Form::select('telefonos[#index#][es_principal]',['0'=>'No', '1'=>'Si'],
                                         null, ['class' => 'form-control',
                                         'required'=>'required',
                                         'id'=>'formTelefono_#index#_es_principal']) !!}
                    </div>

                    <div class="form-group col-sm-2">
                        {!! Form::label('formTelefono_#index#_notas', 'Notas:', ['class' => 'control-label']) !!}
                        {!! Form::text('telefonos[#index#][notas]', null, ['class' => 'form-control',
                                                              'placeholder' => 'Notas',
                                                              'maxlength'   => '255',
                                                              'title'       =>'Notas',
                                                              'id'=>'formTelefono_#index#_notas']) !!}
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{----}}
                {{--</div>--}}
            </div>
        </div>
    </div>
    <div id="formTelefono_noforms_template">
        Sin Teléfono asociado
    </div>

    <div id="formTelefono_controls" class="row">
        <div class="form-group col-sm-12" style="margin-top: 15px; margin-bottom: 0px">
            <button id="formTelefono_add" type="button" class="btn blue-hoki">Agregar</button>
            <button id="formTelefono_remove_last" type="button" class="btn blue-hoki">Borrar Ultimo</button>
            <button id="formTelefono_remove_all" type="button" class="btn blue-hoki">Borrar Todos</button>
            <div id="formTelefono_add_n" class="input-group margin">
                <input id="formTelefono_add_n_input" type="text" maxlength="2" class="form-control" size="4" />
                    <span id="formTelefono_add_n_button" class="input-group-btn">
                          <button  type="button" class="btn blue-hoki">Agregar</button>
                    </span>
            </div>
        </div>
    </div>
</div>