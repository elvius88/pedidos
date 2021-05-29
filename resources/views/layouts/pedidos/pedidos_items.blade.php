<div class="pedido-items">
    @forelse($data as $pedido)
        <div class="pedido-item"
             style="background-color: {{ ($pedido['TipoPedido'] == "pick" ? '#F49E11':($pedido['TipoPedido'] == "Pedidos"?'#898989':'#28a745'))}}">
            <div class="row">
                <div class="col-5 font-weight-bold"><label> {{ $pedido['NroPedido'] }}</label></div>
                <div class="col-7"> {{ $pedido['ClienteNombre'] }}</div>
            </div>
            <div class="row">
                <div class="col-5 font-weight-bold">{{ date('d/m/Y', strtotime($pedido['FechaPedido'])) }}</div>
                <div class="col-7 font-weight-bold">{{ date('H:i:s', strtotime($pedido['HoraPedido'])) }}</div>
            </div>
            <div class="row mt-2">
                @forelse($pedido['Producto'] as $producto)
                    <div class="col-12 mt-3">
                        <div class="col-2 d-inline-block float-left p-0"> {{ $producto['ProductoCant'] }}</div>
                        <div class="col-5 d-inline-block float-left p-0"> {{ $producto['ProductoDescrip'] }}</div>
                        <div class="col-5 d-inline-block float-left p-0"> {{ $producto['CambioDescrip'] }}</div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="col-4 d-inline-block float-left p-0"> {{ $producto['ProductoNota'] }}</div>
                        <div class="col-8 d-inline-block float-right p-0">
                            @forelse($producto['Agregado'] as $agregado)
                                <div class="col-12 p-0">
                                    <div class="col-3 d-inline-block float-left"> {{ $agregado['AgregadoCant'] }}</div>
                                    <div class="col-9 d-inline-block float-left text-wrap"> {{ $agregado['AgregadoDescrip'] }}</div>
                                </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <span>Sin productos</span>
                    </div>
                @endforelse
            </div>
            <div class="row mt-2">
                <div class="col-12"><div class="font-weight-bold float-right">{{ $pedido['PedidosEstado'] == "P" ? "PENDIENTE" : "LISTO" }}</div></div>
            </div>
        </div>
    @empty

    @endforelse
</div>
