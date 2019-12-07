<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Genero;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
         $generos = Genero::all();
         return view('generos.index', compact('generos'));
     }else{
        return view('welcome')->with('failure','FAÇA LOGIN');
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
         return view('generos.create');
     }else{
        return view('welcome')->with('failure','FAÇA LOGIN');
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
            'genero'=>'required'
        ]);

         $generos = new Genero([
           'genero'=>$request->get('genero')
       ]);
         $generos->save();
         return redirect('/generos')->with('success', 'Genero Adicionado!');
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
        if (Auth::check()) {

        }else{
            return view('welcome')->with('failure','FAÇA LOGIN');
        }
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
            $generos = Genero::find($id);
            $generos->delete();
            return redirect('/generos')->with('success', 'Filme Deletado!');
        }else{
            return view('welcome')->with('failure','FAÇA LOGIN');
        }
    }
}
