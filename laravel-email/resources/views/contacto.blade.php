@extends('layouts')

@section('title')
Entra em Contacto
@endsection


@section('content')
<div class="container">

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form method="POST" action="{{ route('form.contact.post') }}">

        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Endereço de E-mail:</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@dominio.pt" required autofocus>
            <small id="emailHelp" class="form-text text-muted">O endereço de email não é inserido em nenhuma base de dados</small>
        </div>

        <div class="form-group">
            <label for="comment">Mensagem:</label>
            <textarea name="msg" class="form-control" rows="5" id="comment" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar Mensagem</button>

    </form>

</div>
@endsection