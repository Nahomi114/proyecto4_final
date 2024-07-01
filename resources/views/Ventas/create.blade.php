@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Crear Venta</h1>
        <form action="{{ route('ventas.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="ID_clientes" class="block text-sm font-medium text-gray-700">Cliente</label>
                <select name="ID_clientes" id="ID_clientes" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->ID_clientes }}">{{ $cliente->Nom_cliente }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
                <select name="user_id" id="user_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="fecha_venta" class="block text-sm font-medium text-gray-700">Fecha de Venta</label>
                <input type="date" name="fecha_venta" id="fecha_venta" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
            </div>

            <h3 class="text-xl font-semibold mb-4">Detalles de Venta</h3>
            <table class="min-w-full divide-y divide-gray-200 mb-4" id="detalle-venta-table">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descuento</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4">
                            <select name="productos[]" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md producto-select">
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->ID_producto }}" data-precio="{{ $producto->Precio_producto }}">
                                        {{ $producto->Nom_producto }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <input type="number" name="cantidades[]" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md cantidad" value="1" min="1">
                        </td>
                        <td class="px-6 py-4 precio">0.00</td>
                        <td class="px-6 py-4">
                            <input type="number" name="descuentos[]" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md descuento" value="0" min="0">
                        </td>
                        <td class="px-6 py-4 subtotal">0.00</td>
                        <td class="px-6 py-4">
                            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md remove-row">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md add-row mb-4">Añadir Producto</button>
            
            <div class="mb-4">
                <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
                <input type="number" name="total" id="total" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" readonly>
            </div>
            
            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Guardar Venta</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateTotals() {
                let total = 0;
                document.querySelectorAll('#detalle-venta-table tbody tr').forEach(row => {
                    const cantidad = row.querySelector('.cantidad').value;
                    const precio = parseFloat(row.querySelector('.producto-select option:checked').dataset.precio);
                    const descuento = row.querySelector('.descuento').value;
                    const subtotal = (cantidad * precio) - descuento;
                    row.querySelector('.precio').innerText = precio.toFixed(2); // Actualiza el precio visualizado
                    row.querySelector('.subtotal').innerText = subtotal.toFixed(2);
                    total += subtotal;
                });
                document.getElementById('total').value = total.toFixed(2);
            }

            document.querySelector('.add-row').addEventListener('click', function () {
                const newRow = document.querySelector('#detalle-venta-table tbody tr').cloneNode(true);
                document.querySelector('#detalle-venta-table tbody').appendChild(newRow);
                updateTotals();
            });

            document.querySelector('#detalle-venta-table').addEventListener('change', function (e) {
                if (e.target.classList.contains('cantidad') || e.target.classList.contains('descuento') || e.target.classList.contains('producto-select')) {
                    updateTotals();
                }
            });

            document.querySelector('#detalle-venta-table').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-row')) {
                    e.target.closest('tr').remove();
                    updateTotals();
                }
            });

            updateTotals();
        });
    </script>
@endsection

