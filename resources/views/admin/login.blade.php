@extends('admin.layouts.app')

@section('conteudo')

        {{-- Apresentação de erros --}}
        @include('admin.includes.erro')

        {{-- Formulario de Login --}}
        <div class="login-form">

            <div class="text">
               LOGIN
            </div>

            <form method="POST" action="/logar_usuario">
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
                <input type="password" name="text_repetir" placeholder="Repetir a senha">
               </div>

               <div class="field">
                <div class="fas fa-envelope"></div>
                    <input type="text" name="text_email" placeholder="Email">
                </div>

               <button type="submit">LOGIN</button>

               <div class="link">
                <a href="/recuperar_senha">Recuperar Senha</a>
               </div>

               <div class="link">
                  <a href="/cadastro_usuario">Registrar</a>
               </div>
            </form>
         </div>










@endsection

