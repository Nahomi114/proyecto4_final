@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Ingreso</h1>
    <form action="{{ route('ingresos.store') }}" method="POST" id="ingresoForm">
        @csrf
        <div class="form-group">
            <label for="ID_proveedores">Proveedor:</label>
            <select name="ID_proveedores" id="ID_proveedores" class="form-control">
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->ID_proveedores }}">{{ $proveedor->Nom_proveedores }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="user_id">Usuario:</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="serie_comprob">Serie del Comprobante:</label>
            <input type="text" name="serie_comprob" id="serie_comprob" class="form-control">
        </div>

        <div class="form-group">
            <label for="fec_ingreso">Fecha de Ingreso:</label>
            <input type="date" name="fec_ingreso" id="fec_ingreso" class="form-control">
        </div>

        <h3>Detalles del Ingreso</h3>
        <table class="table" id="detallesTable">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <button type="button" id="addDetalle" class="btn btn-primary">Agregar Detalle</button>

        <div class="form-group">
            <label for="impuesto">Impuesto:</label>
            <input type="text" name="impuesto" id="impuesto" class="form-control" value="0.18" readonly>
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" name="total" id="total" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success">Guardar Ingreso</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let detallesTable = document.querySelector('#detallesTable tbody');
    let addDetalleButton = document.querySelector('#addDetalle');
    let totalInput = document.querySelector('#total');
    let impuestoInput = document.querySelector('#impuesto');
    let detalleCount = 0;

    addDetalleButton.addEventListener('click', function () {
        let newRow = detallesTable.insertRow();
        newRow.innerHTML = `
            <tr>
                <td>
                    <select name="detalles[${detalleCount}][ID_producto]" class="form-control">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->ID_producto }}">{{ $producto->Nom_producto }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="detalles[${detalleCount}][cant_det_ingreso]" class="form-control" min="1" step="1" required>
                </td>
                <td>
                    <input type="number" name="detalles[${detalleCount}][precio_det_ingreso]" class="form-control" min="0" step="0.01" required>
                </td>
                <td class="subtotal">0.00</td>
                <td>
                    <button type="button" class="btn btn-danger removeDetalle">Eliminar</button>
                </td>
            </tr>
        `;
        detalleCount++;
        updateSubtotals();
    });

    detallesTable.addEventListener('input', updateSubtotals);
    detallesTable.addEventListener('click', function (event) {
        if (event.target.classList.contains('removeDetalle')) {
            event.target.closest('tr').remove();
            updateSubtotals();
        }
    });

    function updateSubtotals() {
        let total = 0;
        detallesTable.querySelectorAll('tr').forEach(row => {
            let cantidad = row.querySelector('input[name$="[cant_det_ingreso]"]').value;
            let precio = row.querySelector('input[name$="[precio_det_ingreso]"]').value;
            let subtotal = parseFloat(cantidad) * parseFloat(precio);
            row.querySelector('.subtotal').textContent = subtotal.toFixed(2);
            total += subtotal;
        });
        let impuesto = total * parseFloat(impuestoInput.value);
        totalInput.value = (total + impuesto).toFixed(2);
    }
});
</script>
@endsection
