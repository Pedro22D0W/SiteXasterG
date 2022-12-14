@extends('layouts.app')

@section('title', 'Perfil: ' . Auth::user()->name)

@section('content')

@guest 
<h1>Você não está logado. Faça o login <a href="/">aqui</a></h1>
@else
@if(Auth::user()->acesso != 'Secretaria')
<div class="col-md10 offset-md-1">
    <div class="row">
        
        <div id="image-container" class="col-md-4">
            <img src="/img/avatares/{{ Auth::user()->image }}.png" alt="">
        </div>

        <div id="info-container" class="col-md-6">
            <h1>{{ Auth::user()->name }}</h1>
            <h3>Email: {{ Auth::user()->email }}</</h3>
            <h3>CPF: {{ Auth::user()->cpf }}</</h3>
            <h3>Endereço: {{ Auth::user()->endereco }}</</h3>
            <h3>Ultimo login: {{ Auth::user()->ultimo_login }}</</h3>

            @if(Auth::user()->acesso == 'Aluno' || Auth::user()->acesso == 'Admin')
                @if(Auth::user()->movie == 'nothing')
                    <h3>Filme: O filme ainda não foi escolhido.</h3>
                @else
                    <h3>Filme: {{ Auth::user()->movie }}</h3>
                @endif
            @endif

            <div class="buttons-container">
                <a href="/users/edit/{{Auth::user()->id}}" class="btn btn-primary"><ion-icon name="pencil-outline"></ion-icon> Editar</a>
            @if(Auth::user()->acesso == 'Admin')
                <form action="/users/{{ Auth::user()->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                </form>
            @endif
            </div>
        </div>

    </div>
</div>
@endif
@endguest

@endsection
