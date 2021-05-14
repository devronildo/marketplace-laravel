@extends('layouts.front')


@section('content')

    <div class="row">
         <div class="col-12">
              <h2>Meus Recebidos</h2>
              <hr>
         </div>

         <div class="col-12">
            <div class="accordion" id="accordionExample">
              @forelse($userOrders as $key => $order)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                Pedido n°: {{ $order->reference }}
                            </button>
                        </h2>
                        </div>

                        <div id="collapse{{$key}}" class="collapse @if($key == 0) show @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">

                              <ul>
                                  @php $items = unserialize($order->items); @endphp

                                  @foreach($items as $item)
                                      <li>{{ $item['name'] }} | R$ {{number_format($item['price'] * $item['amount'], 2, ',', '.')}}</li>
                                    <br/>
                                    Quantidade pedida: {{ $item['amount'] }}
                                  @endforeach
                              </ul>

                        </div>
                    </div>
                </div>
                 @empty
                   <div class="alert alert-warning">Nenhum pedido recebido!</div>
               @endforelse

            </div>

             <div class="col-12">
                 <hr>
                 {{$userOrders->links()}}
             </div>
         </div>
    </div>


@endsection
