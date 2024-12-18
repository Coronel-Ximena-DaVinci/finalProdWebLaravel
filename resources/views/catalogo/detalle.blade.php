<x-app-layout>
    <div class="card bg-white">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5 p-5">
                    <img class="img-fluid" src="{{ $producto->imageUrl }}" />
                </div>
                <div class="col-sm-4">
                    <h4>
                        {{ $producto->name }}
                    </h4>

                    <p class="mb-1 text-decoration-line-through">$ {{ $producto->price * 1.25 }}</p>
                    <h2 class="fw-light">$ {{ $producto->price }}</h2>
                    <p class="mb-1">O 6 cuotas de $ {{ sprintf('%0.2f', $producto->price * 0.25 - 0.01) }}</p>
                    <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                        data-bs-target="#modal-medios-pago"><small>Ver los medios de pago</small></a>
                    <p class="mt-3 mb-0">
                        <b> Lo que tenés que saber de este producto: </b>
                    </p>
                    <p style='white-space: pre-line'>{{ $producto->description }}</p>
                </div>
                <div class="col-sm-3">
                    {!! Form::open(['class' => 'form-inline', 'route' => ['carrito.store', $producto->id]]) !!}
                    @if ($producto->stock)
                        <p class="fw-semibold text-success">Llega gratis el próximo lunes</p>
                        <p class="fw-semibold">Stock disponible</p>
                        <div class="d-md-flex gap-4 mb-2 align-items-center">
                            <label for="quantity" class="text-end">
                                Cantidad:
                            </label>
                            {!! Form::number('quantity', 1, ['id' => 'quantity', 'max' => $producto->stock, 'class' => 'form-control']) !!}
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-primary">Agregar al carrito </button>
                        </div>
                    @else
                        <p class="fw-semibold text-danger">Sin stock disponible</p>
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-medios-pago" tabindex="-1" aria-labelledby="modal-medios-pago-label"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-4" id="modal-medios-pago-label">Medios de pago para este producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Dinero disponible en Mercado Pago</h4>
                    <p>
                        Al finalizar tu compra, pagás con el dinero disponible en tu cuenta.
                        Podés ingresar dinero a Mercado Pago por Cuentas vinculadas,
                        transferencia bancaria o en efectivo.
                    </p>
                    <hr />
                    <h4>Tarjetas de crédito</h4>
                    <p>Hasta 12 cuotas con interés con Visa y Mastercard</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
