{{ csrf_field() }}

<div class="form-group">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $producto->titulo ?? '') }}" required>
</div>

<div class="form-group">
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="precio">Precio:</label>
    <input type="number" name="precio" class="form-control" value="{{ old('precio', $producto->precio ?? '') }}" required>
</div>

<div class="form-group">
    <label for="categoria">Categoría:</label>
    <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $producto->categoria ?? '') }}" required>
</div>

<button type="submit" class="btn btn-primary">
    {{ isset($producto) ? 'Actualizar Producto' : 'Crear Producto' }}
</button>

@push('scripts')

@endpush
