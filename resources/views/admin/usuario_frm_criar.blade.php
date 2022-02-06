@extends('admin.layouts.app')

@section('conteudo')

{{-- Apresentação de erros --}}
@include('admin.includes.erro')

    {{-- Formulario de Login --}}
    <div class="login-form">

        <div class="text">
        LOGIN
        </div>

        <form method="POST" action="/registrar_usuario">
            {{ csrf_field() }}

                    <div class="field">
                            <div class="fas fa-user"></div>
                            <input type="text" name="text_usuario" placeholder="Usuário">
                    </div>

                    <div class="field">
                            <div class="fas fa-lock"></div>
                            <input type="password" name="text_senha" placeholder="Senha">
                    </div>

                    <div class="field">
                            <div class="fas fa-lock"></div>
                            <input type="password" name="text_repetir" placeholder="Repitir a senha">
                    </div>

                    <div class="field">
                            <div class="fas fa-envelope"></div>
                            <input type="text" name="text_email" placeholder="Email">
                    </div>

                    <button type="submit">Cadastrar</button>

                    <div class="link">

                        <a href="/">Voltar</a>

                    </div>

        </form>

    </div>

@endsection

