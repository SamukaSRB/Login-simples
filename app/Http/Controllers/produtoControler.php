<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class produtoControler extends Controller
{

    public function index()
    {
     //verifica se a sessao está ativa
     if(!Session::has('login')){
        return redirect('/');
    }
    $user =Db::table('usuarios')->first();
     return view('produto.admin',compact('user'));
    }

    public function show(){
    //verifica se a sessao está ativa
    if(!Session::has('login')){
        return redirect('/');
    }
    $product = DB::table('products')->get();
     return view('produto.index',compact('product'));
    }

    public function create(){
            //verifica se a sessao está ativa
        if(!Session::has('login')){
            return redirect('/');
        }
        return view ('produto.create');
    }

    public function store(Request $request){
        //verifica se a sessao está ativa
        if(!Session::has('login')){
            return redirect('/');
        }

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if($image){
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success= $image->move($upload_path,$image_full_name);
            $data['logo'] = $image_url;
            $product = DB::table('products')->insert($data);
            return redirect()->route('product.show')->with('success','Product Created Successfully');

        }

    }

    public function edit($id){
           //verifica se a sessao está ativa
           if(!Session::has('login')){
            return redirect('/');
        }

        $product = DB::table('products')->where('id',$id)->first();
         return view('produto.edit',compact('product'));
    }


    public function update(Request $request,$id){
           //verifica se a sessao está ativa
           if(!Session::has('login')){
            return redirect('/');
        }

       // $oldlogo = $request->old_logo;
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;
        $image = $request->file('logo');

        if($image){
           // unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success= $image->move($upload_path,$image_full_name);
            $data['logo'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);
            return redirect()->route('product.show')->with('success','Produto alterado com sucesso');

        }
    }

    public function delete($id){
        $data = DB::table('products')->where('id',$id)->first();
        $image = $data->logo;
        //unlink($image);
        $product = DB::table('products')->where('id',$id)->delete();
        return redirect()->route('product.show')->with('success','Produto deletado com sucesso');
    }

}
