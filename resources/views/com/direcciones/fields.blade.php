<div id="formDireccion">
    <div id="formDireccion_template" class="margin">
        <div class="portlet box blue-oleo" style="margin-bottom: 0px">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-map-marker"></i> Direcci&oacute;n <span id="formDireccion_label"></span>
                </div>
                <div class="tools">
                    {{--<a id="formDireccion_remove_current" href="javascript:;" class="remove delete"
                       data-dismiss="alert" aria-hidden="true"> </a>--}}
                    <button id="formDireccion_remove_current" type="button" class="remove close delete" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group col-sm-4 required">
                        {!! Form::hidden('direcciones[#index#][id]','-1',['id'=>'formDireccion_#index#_id']) !!}
                        {!! Form::label('formDireccion_#index#_com_tipo_direccion_id', 'Tipo Dirección:') !!}
                        {!! Form::select('direcciones[#index#][com_tipo_direccion_id]',$tipoDireccion, null,
                                        ['class' => 'form-control select2',
                                         'required'=>'required',
                                         'id'=>'formDireccion_#index#_com_tipo_direccion_id','style'=>'width: 100%']) !!}
                    </div>
                    <div class="form-group col-sm-4 required">
                        {!! Form::label('formDireccion_#index#_com_pais_id', 'País:') !!}
                        {!! Form::select('direcciones[#index#][com_pais_id]',$paises, '', ['class' => 'form-control select2',
                                         'required'=>'required',
                                         'id'=>'formDireccion_#index#_com_pais_id','style'=>'width: 100%']) !!}
                    </div>
                    <div class="form-group col-sm-4 required">
                        {!! Form::label('formDireccion_#index#_com_region_id', $labelRegion.':') !!}
                        {!! Form::select('direcciones[#index#][com_region_id]',$regiones, null, ['class' => 'form-control select2',
                                         'id'=>'formDireccion_#index#_com_region_id','style'=>'width: 100%']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4 required">
                        {!! Form::label('formDireccion_#index#_ciudad', 'Ciudad:', ['class' => 'control-label']) !!}
                        {!! Form::text('direcciones[#index#][ciudad]', old('direcciones[#index#][ciudad]'), ['class' => 'form-control',
                                                              'placeholder' => 'Ciudad',
                                                              'maxlength'   => '255',
                                                              'title'       =>'Ciudad',
                                                              'required'    =>'required',
                                                              'id'=>'formDireccion_#index#_ciudad']) !!}
                    </div>
                    <div class="form-group col-sm-8 required">
                        {!! Form::label('formDireccion_#index#_linea_dir', 'Dirección:', ['class' => 'control-label']) !!}
                        {!! Form::text('direcciones[#index#][linea_dir]', null, ['class' => 'form-control',
                                                              'placeholder' => 'Dirección',
                                                              'maxlength'   => '255',
                                                              'title'       =>'Dirección',
                                                              'required'    =>'required',
                                                              'id'=>'formDireccion_#index#_linea_dir']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="formDireccion_noforms_template">
        Sin Direcci&oacute;n Asociada.
    </div>
    <div id="formDireccion_controls" class="row">
        <div class="form-group col-sm-12" style="margin-top: 15px; margin-bottom: 0px">
            <button id="formDireccion_add" type="button" class="btn blue-hoki">Agregar</button>
            <button id="formDireccion_remove_last" type="button" class="btn blue-hoki">Borrar Último</button>
            <button id="formDireccion_remove_all" type="button" class="btn blue-hoki">Borrar Todos</button>
            <div id="formDireccion_add_n" class="input-group">
                <input id="formDireccion_add_n_input" type="text" maxlength="2" class="form-control" size="4" />
                <span id="formDireccion_add_n_button" class="input-group-btn">
                      <button  type="button" class="btn blue-hoki">Agregar</button>
                </span>
            </div>
        </div>
    </div>
</div>