
@auth
{!! Form::open(['method'=>'DELETE','route' => ['productos.destroy',$product->id],'onsubmit'=>'return confirm(
    "Estás seguro de eliminar este producto?"
)']) !!}

<input type="submit" value="Eliminar Producto"  class="btn btn-danger">
{!! Form::close() !!}
@endauth
