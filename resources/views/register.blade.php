@extends('layout')
@section('titulo', 'REGISTER')
@section('estilo')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-image: url('{{asset('blake-wisz-Xn5FbEM9564-unsplash.jpg')}}'); 
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
@endsection

@section('conteudo')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">Cadastro</div>
                    <div class="card-body flex-column align-items-center  ">
                        <!-- Formulário de Registro -->
                        <form method="POST" action="cadastro">
                            @csrf
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
                            </div>
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                            </div>
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmação de Senha" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Registrar</button>
                        </form>
                        <span><a href="#">Termos</a></span>
                        <div class="mt-3">
                            <p>Já tem uma conta? <a href="{{route('login')}}">Entrar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
