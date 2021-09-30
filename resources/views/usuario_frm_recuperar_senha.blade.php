@extends('layouts.app')
@section('conteudo')

{{-- Apresentação de erros --}}
@include('includes.erro')

    {{-- Formulario de Login --}}
    <div class="login-form">

        <div class="text">
            Recuperar Senha
        </div>

        <form method="POST" action="/executar_recuperar_senha">

            {{ csrf_field() }}

                    <div class="field">
                            <div class="fas fa-envelope"></div>
                            <input type="text" name="text_email" placeholder="Email">
                    </div>

                    <button type="submit">Recuperar senha</button>

                    <div class="link">

                        <a href="/">Voltar</a>

                    </div>

        </form>

    </div>

@endsection

