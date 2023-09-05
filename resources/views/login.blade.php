@extends('layout')
@section('titulo', 'LOGIN')
@section('estilo')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="{{asset('css/styles.css')}}" rel="stylesheet">
@endsection

@section('conteudo')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card " >
                <div class="card-header bg-success text-white">Bem-vindo ao Recorda Facil</div>
                <div class="card-body flex-column align-items-center  ">
                    <!-- Formulário de Login -->
                    <form method="POST" action="entrar">
                        @csrf
                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Entrar</button>
                    </form>
                    <div class="mt-3">
                        <p>Não tem uma conta? <a href="{{route('register')}}">Regista aqui!</a></p>
                    </div>
                </div>
                              

            </div>
        </div>
    </div>
</div>
@endsection