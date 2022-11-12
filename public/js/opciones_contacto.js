var opciones_direccion ={
    separator: "",
    allowRemoveLast: true,
    allowRemoveCurrent: true,
    allowRemoveAll: true,
    allowAdd: true,
    allowAddN: false,
    maxFormsCount: 3,
    minFormsCount: 0,
    iniFormsCount: 0,
    continuousIndex: true,

    removeLastConfirmation: true,
    removeCurrentConfirmation: true,
    removeAllConfirmation: true,
    removeLastConfirmationMsg: '¿Está Seguro?',
    removeCurrentConfirmationMsg: '¿Está Seguro?',
    removeAllConfirmationMsg: '¿¿Está Seguro?',

};

var opciones_telefono ={
    separator: "",
    allowRemoveLast: true,
    allowRemoveCurrent: true,
    allowRemoveAll: true,
    allowAdd: true,
    allowAddN: false,
    maxFormsCount: 3,
    minFormsCount: 0,
    iniFormsCount: 1,
    continuousIndex: true,

    removeLastConfirmation: true,
    removeCurrentConfirmation: true,
    removeAllConfirmation: true,
    removeLastConfirmationMsg: '¿Está Seguro?',
    removeCurrentConfirmationMsg: '¿Está Seguro?',
    removeAllConfirmationMsg: '¿¿Está Seguro?',
};

var opciones_contacto_web ={
    separator: "",
    allowRemoveLast: true,
    allowRemoveCurrent: true,
    allowRemoveAll: true,
    allowAdd: true,
    allowAddN: false,
    maxFormsCount: 3,
    minFormsCount: 0,
    iniFormsCount: 0,
    continuousIndex: true,

    removeLastConfirmation: true,
    removeCurrentConfirmation: true,
    removeAllConfirmation: true,
    removeLastConfirmationMsg: '¿Está Seguro?',
    removeCurrentConfirmationMsg: '¿Está Seguro?',
    removeAllConfirmationMsg: '¿Está Seguro?',
};

function getOpcionesSheepIt(maxCount,minCount,iniCount){
    var options = {
        separator: "",
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        allowRemoveAll: true,
        allowAdd: true,
        allowAddN: false,
        maxFormsCount: maxCount,
        minFormsCount: minCount,
        iniFormsCount: iniCount,
        continuousIndex: true,

        removeLastConfirmation: true,
        removeCurrentConfirmation: true,
        removeAllConfirmation: true,
        removeLastConfirmationMsg: '¿Está Seguro?',
        removeCurrentConfirmationMsg: '¿Está Seguro?',
        removeAllConfirmationMsg: '¿¿Está Seguro?',
    }
    return options;
}

function initSelect2Direccion(newForm, url){
    $(newForm).find("[id*=com_tipo_direccion_id]").select2({
        language: "es",
        placeholder: "Seleccione Tipo Dirección"
    });
    $(newForm).find("[id*=com_pais_id]").select2({
        language: "es",
        placeholder: "Seleccione País",
        allowClear: true
    });
    $(newForm).find("[id*=com_region_id]").select2({
        language: "es",
        placeholder: "Seleccione Región"
    });

    cmbPaisId = $(newForm).find("[id*=com_pais_id]").attr("id");
    cmbRegionId = $(newForm).find("[id*=com_region_id]").attr("id");

    new Select2Cascade($('#' + cmbPaisId), $('#' + cmbRegionId), url);
    //$(newForm).find('select').select2({language: "es"});
}

function initSelect2Telefono(newForm){
    $(newForm).find("[id*=com_tipo_telefono_id]").select2({
        language: "es",
        placeholder: "Seleccione Tipo"
    });
}

function initSelect2Web(newForm){
    $(newForm).find("[id*=com_tipo_contacto_web_id]").select2({
        language: "es",
        placeholder: "Seleccione Tipo"
    });
}