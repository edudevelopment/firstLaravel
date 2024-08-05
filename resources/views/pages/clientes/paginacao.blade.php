@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cliente</h1>
    </div>

    <div>
        <form action="{{ route('cliente.index') }}">
            <input type="text" name="pesquisar" placeholder="Digite o nome">
            <button> Pesquisar </button>
            <a type="button" href="{{ route('cadastrar.cliente') }}" class="btn btn-success float-end"> Incluir Cliente</a>
        </form>
        <div class="table-responsive small mt-4">
          @if ($findCliente->isEmpty())
              <p> Não existe dados.</p>
          @else
            <table class="table table-striped table-sm">
               <thead>
                 <tr>
                   <th>Nome</th>
                   <th>Email</th>
                   <th>Endereço</th>
                   <th>CEP</th>
                   <th>CPF</th>
                   <th>Ações</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($findCliente as $cliente)
                <tr>
                    <td>{{ $cliente->name }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->cep }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td> 
                        <a href="{{ route('atualizar.cliente', $cliente->id) }}" class="btn btn-light btn-sm">
                          Editar
                        </a>
                        
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="deletarRegistroPaginacao( '{{ route('cliente.delete') }}',
                         {{ $cliente->id }} )" class="btn btn-danger btn-sm">
                         Excluir
                        </a>
                    </td>
                  </tr>
                @endforeach
               </tbody>
             </table>
           </div>
           @endif
    </div>
@endsection