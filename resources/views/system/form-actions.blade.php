@if ($type == 'new-edit')
    <div class="form-actions" style="padding: 10px;">
        <div class="col-sm-12">
            <button type="submit" class="btn blue-hoki">
                <i class="fa fa-check"></i> Grabar
            </button>

            <a href="{!! route($ruta) !!}"
               class="btn blue-hoki btn-outline">
                <i class="fa fa-undo"></i> Cancelar</a>
        </div>
    </div>
@elseif($type == 'show')
    <div class="form-actions" style="padding: 10px;">
        <div class="col-sm-12">
            <a href="{!! route($ruta) !!}" class="btn blue-hoki btn-outline">Volver</a>
        </div>
    </div>
@endif