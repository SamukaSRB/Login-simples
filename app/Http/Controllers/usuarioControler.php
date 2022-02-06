<?php

namespace App\Http\Controllers;
use App\classe;
use App\usuarios;
use Illuminate\Http\Request;
use App\classe\geradorNumerico;
use App\Mail\emailRecuperarSenha;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class usuarioControler extends Controller
{

    public function index(){
       return view('admin.login');
    }
    public function login(){
        return view('admin.usuario_frm_criar');
    }
    public function registarUsuario(Request $request){

        $this->validate($request,[
        'text_usuario'=> 'required|between:3,30|alpha_num',
        'text_senha'=>'required|between:6,15',
        'text_repetir'=>'required|same:text_senha',
        'text_email'=>'required|email',
         ]);

        $dados = new usuarios;

        $dados->usuario = $request->text_usuario;
        $dados->senha = Hash::make($request->text_senha);
        $dados->email = $request->text_email;
        $dados->save();
        return redirect('/');
    }
    public function logar(Request $request){

         $this->validate($request,[
        'text_usuario'=> 'required|between:3,30|alpha_num',
        'text_senha'=>'required|between:6,15',
        'text_repetir'=>'required|same:text_senha',
        'text_email'=>'required|email',
         ]);

        $dados = usuarios::where('usuario',$request->text_usuario)->first();

        if(isset($dados)==0){
            $erros_bd = ['O usuário não existe'];
            return view('admin.login',compact('erros_bd'));
        }
        if(!Hash::check($request->text_senha, $dados->senha)){
            $erros_bd = ['A senha está incorreta'];
            return view('login',compact('erros_bd'));
        }
        Session::put('login','sim');
        Session::put('usuario',$dados->usuario);
         return redirect('/dashboard');


    }
    public function Logout(){
        //Logout da sessao
        //Destruir a sessão e redirecionar a pagina inicial

        Session::flush();
        return redirect('/');
    }
    public function recuperarSenha(){
        return view('admin.usuario_frm_recuperar_senha');
    }
    public function executarRecuperarSenha(Request $request){

        $this->validate($request,[
              'text_email'=>'required|email',
             ]);

             //vai buscar  o usuario  que contém  a conta do email indicada

             $usuario = usuarios::where('email',$request->text_email)->get();

             if($usuario->count() == 0){
                 $erros_bd = ['O usuário não está associado a nenhuma conta de email'];
                    return view('usuario_frm_recuperar_senha', compact('erros_bd'));
             }
             //Atualizar a senha do usuario para nova senha
             $usuario = $usuario->first();
             //Cria uma nova senha aleatorio
             $nova_senha = geradorNumerico::criarCodigo();
             $usuario->senha = Hash::make($nova_senha);
             $usuario->save();

             /*
             ----1 - ter usuario  com email valido
             -----2 - verificar o email inserido corresponde ao usuario
             -----3 - sistema cria senha aleatori
             -----3.a  registrar atualização da senha na base de dados
             4 - envia email  com a nova  senha para  o email do usuario

$2y$10$vPr65FLo2M4p.y9vAQV70uA2Vioo2tuYwr5C7mFjPXydqPJ6COQji

             */
                        //Refa\er aula 82 Enviar o emal para o usuario com a nova senha
             Mail::to($usuario->email)->send(new emailRecuperarSenha($nova_senha));

            //Apresentar uma view informando que foi enviado uma nova senha para o email
             return redirect('/usuario_email_enviado');

    }
    public function emailEnviado(){
        return view('admin.usuario_email_enviado');
    }


}
