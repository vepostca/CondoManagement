<div class="tabbable-custom ">
    <ul class="nav nav-tabs ">
        <li class="active">
            <a href="#tab_direccion" data-toggle="tab">
                <b><i class="fa fa-map-marker"></i>  Direcciones</b>
            </a>
        </li>
        <li>
            <a href="#tab_telefono" data-toggle="tab">
                <b><i class="fa fa-phone"></i>  Tel&eacute;fonos</b>
            </a>
        </li>
        <li>
            <a href="#tab_contacto_web" data-toggle="tab">
                <b><i class="fa fa-globe"></i>  Contacto Web</b></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_direccion">
            @include('com.direcciones.fields')
        </div>
        <div class="tab-pane" id="tab_telefono">
            @include('com.telefonos.fields')
        </div>
        <div class="tab-pane" id="tab_contacto_web">
            @include('com.contacto_web.fields')
        </div>
    </div>
</div>