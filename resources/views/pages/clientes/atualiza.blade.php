@extends('index')

@section('content')
<form class="form" method="POST" action="{{ route('atualizar.cliente', $findCliente->id) }}">
  @csrf
  @method('PUT')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar um produto</h1>
    </div>

    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input value=" {{ isset($findCliente->name) ? $findCliente->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" aria-describedby="emailHelp" name="name">
      @if ($errors->has('name'))
          <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
        
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input value=" {{ isset($findCliente->email) ? $findCliente->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" name="email">
      @if ($errors->has('email'))
          <div class="invalid-feedback"> {{ $errors->first('email') }} </div>
        
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label">CEP</label>
      <input id="cep" value=" {{ isset($findCliente->cep) ? $findCliente->cep : old('cep') }}" class="form-control @error('cep') is-invalid @enderror" name="cep">
      @if ($errors->has('cep'))
          <div class="invalid-feedback"> {{ $errors->first('cep') }} </div>
        
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label">Endereço</label>
      <input id="logradouro" value=" {{ isset($findCliente->endereco) ? $findCliente->endereco : old('endereco') }}" class="form-control @error('endereco') is-invalid @enderror" name="endereco">
      @if ($errors->has('endereco'))
          <div class="invalid-feedback"> {{ $errors->first('endereco') }} </div>
        
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label">Nascimento</label>
      <input value=" {{ isset($findCliente->nascimento) ? $findCliente->nascimento : old('nascimento') }}" class="form-control @error('nascimento') is-invalid @enderror" aria-describedby="emailHelp" name="nascimento">
      @if ($errors->has('nascimento'))
          <div class="invalid-feedback"> {{ $errors->first('nascimento') }} </div>
        
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label">CPF</label>
      <input value=" {{ isset($findCliente->cpf) ? $findCliente->cpf : old('cpf') }}" class="form-control @error('cpf') is-invalid @enderror" aria-describedby="emailHelp" name="cpf">
      @if ($errors->has('cpf'))
          <div class="invalid-feedback"> {{ $errors->first('cpf') }} </div>
        
      @endif
    </div>
      <button type="submit" class="btn btn-primary">Gravar</button>
  </form>
@endsection