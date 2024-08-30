<div class="mb-3">
  <label for="" class="form-label">Nombre</label>
  <input value="{{ $red->name ?? '' }}" required type="text"
    class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Ingresar nombre">
</div>
<div class="mb-3">
  <label for="" class="form-label">Descripción</label>
  <textarea required class="form-control" name="description" id="" rows="3" placeholder="Ingresar un texto que describa la red.">{{ $red->description ?? '' }}</textarea>
</div>

<div class="mb-3">
  <label for="" class="form-label">Mensaje de Whatsapp</label>
  <textarea required class="form-control" name="message" id="" rows="3" placeholder="Ingresar un texto que llegará al whatsapp.">{{ $red->message ?? '' }}</textarea>
</div>

@if ($red->name)
    <div class="mb-3">
      <label for="status" class="form-label">Estado</label>
      <select class="form-select form-select-sm" name="status" id="status">
        <option {{ ($red->status == 1) ? 'selected' : '' }} value="1">Activa</option>
        <option {{ ($red->status == 0) ? 'selected' : '' }} value="0">Inactiva</option>
      </select>
    </div>
@endif

<hr>

