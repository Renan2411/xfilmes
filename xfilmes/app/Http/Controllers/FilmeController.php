<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\Filme;
use Illuminate\Support\Facades\Auth;


class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::check()) {
        $filmes = Filme::all();
        return view('filmes.index', compact('filmes'));
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
        $generos = Genero::all(['id','genero']);
        return view('filmes.create', compact('generos'));
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
        'titulo'=>'required',
        'ano'=>'required',
        'genero'=>'required'
      ]);

       $filme = new Filmes([
         'titulo'=>$request->get('titulo'),
         'ano'=>$request->get('ano'),
         'duracao'=>$request->get('duracao'),
         'ci'=>$request->get('ci'),
         'genero_id'=>$request->get('genero')
       ]);
       $filme->save();
       return redirect('/filmes')->with('success', 'Filme Adicionado!');
     }else{
      return view('welcome')->with('failure','FAÇA LOGIN');
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
       $filme = Filmes::find($id);
       $generos = Generos::all(['id','genero']);
       return view('filmes.edit', compact('filme','generos')); 
     }else{
      return view('welcome')->with('failure','FAÇA LOGIN');
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
        'titulo',
        'ano',
        'duracao',
        'ci',
        'tipo'
      ]);

       $filme = Filmes::find($id);
       $filme->titulo = $request->get('titulo');
       $filme->ano = $request->get('ano');
       $filme->duracao = $request->get('duracao');
       $filme->ci  = $request->get('ci');
       $filme->genero_id = $request->get('genero');

       $filme->save();

       return redirect('/filmes')->with('sucess', 'Filme Atualizado');
     }else{
      return view('welcome')->with('failure','FAÇA LOGIN');
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
       $filme = Filmes::find($id);
       $filme->delete();
       return redirect('/filmes')->with('success', 'Filme Deletado!');
     }else{
      return view('welcome')->with('failure','FAÇA LOGIN');
    }
    
  }
}
