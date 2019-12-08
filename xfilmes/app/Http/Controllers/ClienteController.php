<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $clientes = Cliente::all();

            return view('clientes.index', compact('clientes'));
        }else{
            return redirect('/home')->with('failure','FAÇA LOGIN');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('clientes.create');

        }else{
            return redirect('/home')->with('failure','FAÇA LOGIN');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'nome'=>'required',
                'email'=>'required',
                'telefone'=>'required',
                'cpf'=>'required'
            ]);

            $cliente = new Cliente([
               'nome'=>$request->get('nome'),
               'email'=>$request->get('email'),
               'telefone'=>$request->get('telefone'),
               'cpf'=>$request->get('cpf'),
           ]);
            $cliente->save();
            return redirect('/clientes')->with('success', 'Cliente Cadastrado!');
        }else{
            return redirect('/home')->with('failure','FAÇA LOGIN');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $cliente = Cliente::find($id);
            return view('clientes.edit', compact('cliente'));
        }else{
            return redirect('/home')->with('failure','FAÇA LOGIN');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $request->validate([
                'nome',
                'email',
                'cpf',
                'telefone'
            ]);

            $cliente = Cliente::find($id);
            $cliente->nome = $request->get('nome');
            $cliente->email = $request->get('email');
            $cliente->cpf = $request->get('cpf');
            $cliente->telefone = $request->get('telefone');

            $cliente->save();

            return redirect('/clientes')->with('sucess', 'Cliente Atualizado');
        }else{
            return redirect('/home')->with('failure','FAÇA LOGIN');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $cliente = Cliente::find($id);
            $cliente->delete();

            return redirect('/clientes')->with('success', 'Cliente Deletado!');
        }else{
            return redirect('/home')->with('failure','FAÇA LOGIN');
        }
    }
}
