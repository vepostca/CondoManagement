{!! Form::open(['route' => ['com.tipoPropietarios.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('com.tipoPropietarios.show', $id) }}" class='btn btn-default',
        data-toggle="tooltip" title="Ver Detalles"
        data-title="Ver Detalles"
        data-container="body">
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('com.tipoPropietarios.edit', $id) }}" class='btn btn-default',
        data-toggle="tooltip"
        data-title="Editar" title="Editar"
        data-container="body">
        <i class="fa fa-pencil"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'data-toggle'=>'tooltip',
        'data-title'=>'Eliminar', 'title' => 'Eliminar',
        'data-container'=>'body',
        'onclick' => "return confirm('¿Está seguro?')"
    ]) !!}
</div>
{!! Form::close() !!}
