@extends('layouts.app')

@section('content')

 <a href="{{ route('admin.products.create') }}" class="btn btn-outline-success btn-lg mt-4 mb-4">Criar Produto</a>

 <table class="table table-striped ">
    <thead>
        <tr class="bg-dark text-white">
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>R$ {{ number_format($p->price, 2, ',', '.') }}</td>
                <td>{{ $p->store->name }}</td>
                <td>
                   <div class="btn-group">
                        <a href="{{ route('admin.products.edit', ['product' => $p->id]) }}" class="btn btn-primary">EDITAR</a>
                        <form action="{{ route('admin.products.destroy', ['product' => $p->id]) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">REMOVER</button>
                        </form>
                   </div>
                </td>
            </tr>
            @endforeach
    </tbody>
 </table>

    {{ $products->links() }}

@endsection
