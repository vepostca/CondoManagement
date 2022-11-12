<div id="formContactoWeb">
    <div id="formContactoWeb_template">
        <div class="portlet box blue-oleo" style="margin-bottom: 0px">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i> Contacto Web <span id="formContactoWeb_label"></span>
                </div>
                <div class="tools">
                    <button id="formContactoWeb_remove_current" type="button" class="remove close delete" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            </div>

            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-sm-3 required">
                        {!! Form::hidden('contacto_web[#index#][id]','-1',['id'=>'formContactoWeb_#index#_id']) !!}
                        {!! Form::label('formContactoWeb_#index#_com_tipo_contacto_web_id', 'Tipo:', ['class' => 'control-label']) !!}
                        {!! Form::select('contacto_web[#index#][com_tipo_contacto_web_id]',$tipoContactoWeb,
                                         null,
                                         ['class' => 'form-control select2',
                                         'placeholder'=> 'Seleccione Tipo', 'required'=>'required',
                                         'id'=>'formContactoWeb_#index#_com_tipo_contacto_web_id', 'style'=>'width: 100%']) !!}
                    </div>

                    <div class="form-group col-sm-4 required">
                        {!! Form::label('formContactoWeb_#index#_valor', 'Descripción:', ['class' => 'control-label']) !!}
                        {!! Form::text('contacto_web[#index#][valor]', null, ['class' => 'form-control',
                                                              'placeholder' => 'Descripción o Valor',
                                                              'maxlength'   => '150',
                                                              'title'       =>'Descripción o Valor',
                                                              'required'    =>'required',
                                                              'id'=>'formContactoWeb_#index#_valor']) !!}
                    </div>

                    <div class="form-group col-sm-2 required">
                        {!! Form::label('formContactoWeb_#index#_es_principal', 'Contacto Principal:') !!}
                        {!! Form::select('contacto_web[#index#][es_principal]',['0'=>'No', '1'=>'Si'],
                                         null, ['class' => 'form-control',
                                         'required'=>'required',
                                         'id'=>'formContactoWeb_#index#_es_principal']) !!}
                    </div>

                    <div class="form-group col-sm-3">
                        {!! Form::label('formContactoWeb_#index#_notas', 'Notas:', ['class' => 'control-label']) !!}
                        {!! Form::text('contacto_web[#index#][notas]', null, ['class' => 'form-control',
                                                              'placeholder' => 'Notas',
                                                              'maxlength'   => '255',
                                                              'title'       =>'Notas',
                                                              'id'=>'formContactoWeb_#index#_notas']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="formContactoWeb_noforms_template">
        Sin Contacto Web asociado
    </div>

    <div id="formContactoWeb_controls" class="row margin">
        <div class="form-group col-sm-12" style="margin-top: 15px; margin-bottom: 0px">
            <button id="formContactoWeb_add" type="button" class="btn blue-hoki">Agregar</button>
            <button id="formContactoWeb_remove_last" type="button" class="btn blue-hoki">Borrar Ultimo</button>
            <button id="formContactoWeb_remove_all" type="button" class="btn blue-hoki">Borrar Todos</button>
            <div id="formContactoWeb_add_n" class="input-group margin">
                <input id="formContactoWeb_add_n_input" type="text" maxlength="2" class="form-control" size="4" />
                <span id="formContactoWeb_add_n_button" class="input-group-btn">
                      <button  type="button" class="btn blue-hoki">Agregar</button>
                </span>
            </div>
        </div>

    </div>
</div>