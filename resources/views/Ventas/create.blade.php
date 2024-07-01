@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Venta</h1>
        <form action="{{ route('ventas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ID_clientes">Cliente</label>
                <select name="ID_clientes" id="ID_clientes" class="form-control">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->ID_clientes }}">{{ $cliente->Nom_cliente }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">Usuario</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_venta">Fecha de Venta</label>
                <input type="date" name="fecha_venta" id="fecha_venta" class="form-control" required>
            </div>

            <h3>Detalles de Venta</h3>
            <table class="table table-bordered" id="detalle-venta-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="productos[]" class="form-control producto-select">
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->ID_producto }}" data-precio="{{ $producto->Precio_producto }}">
                                        {{ $producto->Nom_producto }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="cantidades[]" class="form-control cantidad" value="1" min="1"></td>
                        <td class="precio">0.00</td>
                        <td><input type="number" name="descuentos[]" class="form-control descuento" value="0" min="0"></td>
                        <td class="subtotal">0.00</td>
                        <td><button type="button" class="btn btn-danger remove-row">Eliminar</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary add-row">Añadir Producto</button>
            
            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" class="form-control" readonly>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar Venta</button>
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
