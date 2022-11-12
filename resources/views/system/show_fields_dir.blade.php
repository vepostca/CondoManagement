<table class="table table-bordered table-striped table-condensed flip-content">
    <thead class="flip-content">
        <tr>
            <th class="text-left"> Tipo </th>
            <th class="numeric"> País </th>
            <th class="numeric"> Región </th>
            <th class="numeric"> Ciudad </th>
            <th class="numeric"> Dirección </th>
        </tr>
    </thead>
    <tbody>
    @foreach($cliente->direcciones as $direccion)
        <tr>
            <td>{!! $direccion->tipoDireccion->nombre !!}</td>
            <td>{!! $direccion->pais->nombre !!}</td>
            <td>{!! $direccion->region->nombre !!}</td>
            <td>{!! $direccion->ciudad !!}</td>
            <td>{!! $direccion->linea_dir !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>