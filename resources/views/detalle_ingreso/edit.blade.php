@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4">Editar Ingreso</h1>
    <form action="{{ route('ingresos.update', ['ingreso' => $ingreso->ID_ingresos]) }}" method="POST" id="ingresoForm" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="ID_proveedores" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Proveedor:</label>
            <select name="ID_proveedores" id="ID_proveedores" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->ID_proveedores }}" {{ $ingreso->ID_proveedores == $proveedor->ID_proveedores ? 'selected' : '' }}>{{ $proveedor->Nom_proveedores }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Usuario:</label>
            <select name="user_id" id="user_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $ingreso->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="serie_comprob" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Serie del Comprobante:</label>
            <input type="text" name="serie_comprob" id="serie_comprob" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $ingreso->serie_comprob }}">
        </div>

        <div class="mb-4">
            <label for="fec_ingreso" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Fecha de Ingreso:</label>
            <input type="date" name="fec_ingreso" id="fec_ingreso" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $ingreso->fec_ingreso }}">
        </div>

        <h3 class="text-lg font-semibold mb-2">Detalles del Ingreso</h3>
        <table class="min-w-full divide-y divide-gray-200 mb-4">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                </tr>
            </thead>
            <tbody id="detallesTable" class="bg-white divide-y divide-gray-200">
                @foreach($ingreso->detalles as $detalle)
                <tr>
                    <td>
                        <select name="detalles[{{ $loop->index }}][ID_producto]" class="form-control block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach($productos as $producto)
                                <option value="{{ $producto->ID_producto }}" {{ $detalle->ID_producto == $producto->ID_producto ? 'selected' : '' }}>{{ $producto->Nom_producto }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="detalles[{{ $loop->index }}][cant_det_ingreso]" class="form-control block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" min="1" step="1" value="{{ $detalle->cant_det_ingreso }}" required>
                    </td>
                    <td>
                        <input type="number" name="detalles[{{ $loop->index }}][precio_det_ingreso]" class="form-control block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" min="0" step="0.01" value="{{ $detalle->precio_det_ingreso }}" required>
                    </td>
                    <td class="px-4 py-2">{{ $detalle->cant_det_ingreso * $detalle->precio_det_ingreso }}</td>
                    <td>
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" id="addDetalle" class="bg-blue-900 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 mb-4">Agregar Detalle</button>

        <div class="mb-4">
            <label for="impuesto" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Impuesto:</label>
            <input type="text" name="impuesto" id="impuesto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="0.18" readonly>
        </div>

        <div class="mb-4">
            <label for="total" class="block text-sm font-medium text-gray-700 dark:text-muted-foreground">Total:</label>
            <input type="text" name="total" id="total" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $ingreso->total }}" readonly>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Guardar Cambios</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let detallesTable = document.querySelector('#detallesTable');
    let addDetalleButton = document.querySelector('#addDetalle');
    let totalInput = document.querySelector('#total');
    let impuestoInput = document.querySelector('#impuesto');
    let detalleCount = {{ $ingreso->detalles->count() }};

    addDetalleButton.addEventListener('click', function () {
        let newRow = detallesTable.insertRow();
        newRow.innerHTML = `
            <tr>
                <td>
                    <select name="detalles[${detalleCount}][ID_producto]" class="form-control block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->ID_producto }}">{{ $producto->Nom_producto }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="detalles[${detalleCount}][cant_det_ingreso]" class="form-control block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" min="1" step="1" required>
                </td>
                <td>
                    <input type="number" name="detalles[${detalleCount}][precio_det_ingreso]" class="form-control block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" min="0" step="0.01" required>
                </td>
                <td class="px-4 py-2">0.00</td>
                <td>
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Eliminar</button>
                </td>
            </tr>
        `;
        detalleCount++;
        updateSubtotals();
    });

    detallesTable.addEventListener('input', updateSubtotals);
    detallesTable.addEventListener('click', function (event) {
        if (event.target.classList.contains('bg-red-500')) {
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
            row.querySelector('.px-4.py-2').textContent = subtotal.toFixed(2);
            total += subtotal;
        });
        let impuesto = total * parseFloat(impuestoInput.value);
        totalInput.value = (total + impuesto).toFixed(2);
    }
});
</script>
@endsection
