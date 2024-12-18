<x-app-layout>
    <div class='row'>
        <div class="col-md-8">
            @forelse($order->orderItems as $orderItem)
                <div class="card bg-white card-item mb-2">
                    <div class='card-body p-3'>
                        <div class="d-flex gap-3 align-items-center justify-content-between">
                            <div class="d-flex gap-3 align-items-center">
                                <div>
                                    <img src="{{ $orderItem->product->imageUrl }}" class="img-fluid" width="100" />
                                </div>
                                <div>
                                    <a href="{{ route('catalogo.show', $orderItem->product_id) }}"
                                        class="text-black fw-semibold text-decoration-none">{{ $orderItem->product->name }}</a>
                                    {!! Form::open(['method' => 'POST', 'route' => ['carrito.delete', $orderItem->product_id]]) !!}
                                    <button type="submit"
                                        class="btn btn-link btn-delete-item btn-sm text-decoration-none">Eliminar</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div>
                                {!! Form::model($orderItem, ['method' => 'POST', 'route' => ['carrito.update', $orderItem->product_id]]) !!}
                                <div style="max-width: 100px;">
                                    {!! Form::number('quantity', null, [
                                        'class' => 'form-control',
                                        'min' => '1',
                                        'max' => $orderItem->product->stock,
                                    ]) !!}
                                </div>
                                <button type="submit"
                                    class="btn btn-link btn-delete-item btn-sm text-decoration-none">Actualizar</button>
                                {!! Form::close() !!}
                            </div>
                            <div>
                                <h5 class="fw-normal">
                                    ${{ number_format($orderItem->product->price * $orderItem->quantity) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card bg-white">
                    <div class='card-body p-5'>
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <div class="d-flex gap-3">
                                <div class="">
                                    <i class="fa-solid fa-shopping-cart fa-3x"></i>
                                </div>
                                <div class="">
                                    <h6>Agregar productos</h6>
                                    <p class="mb-0">Sumá productos para realizar una compra.</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('catalogo.index') }}" class="text-decoration-none">
                                    Agregar productos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="col-md-4">
            @if ($order->orderItems->count())
                <div class="card">
                    <div class='card-header bg-white pt-3'>
                        <h6>Resumen de compra</h6>
                    </div>
                    <div class='card-body'>
                        <div class="d-flex justify-content-between">
                            <p>Productos ({{ $order->orderItems->sum('quantity') }})</p>
                            <p>${{ number_format($order->orderItems->sum('total')) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Envíos ({{ $order->orderItems->count() }})</p>
                            <p class="fw-bold text-success">GRATIS</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>${{ number_format($order->orderItems->sum('total')) }}</h5>
                        </div>
                        @if (Auth::user()->location)
                            <h6>Enviar a:</h6>
                            <div class="d-flex justify-content-between">
                                <p>
                                    <small>{{ Auth::user()->location }}</small>
                                </p>
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Cambiar</a>
                            </div>
                            {!! Form::open(['method' => 'POST', 'route' => ['carrito.purchase']]) !!}
                            <div class="d-grid py-2">
                                <button type="submit" class="btn btn-primary">
                                    Finalizar compra
                                </button>
                            </div>
                            {!! Form::close() !!}
                        @else
                            <h6 class="text-danger">No hay domicilio de entrega</h6>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-danger">Fijar domicilio
                                    de entrega</a>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="card text-black-50">
                    <div class='card-header bg-white pt-3'>
                        <h6>Resumen de compra</h6>
                    </div>
                    <div class='card-body'>
                        <p>Aquí verás los importes de tu compra una vez que agregues productos.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script></script>
</x-app-layout>
