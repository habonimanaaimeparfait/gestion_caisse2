<?php

namespace App\Http\Controllers;
use App\Categorie_compte;
use App\Compte;
use Illuminate\Http\Request;

class Categorie_comptesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $categorie_comptes = Categorie_compte::all();
        return view('categorie_comptes/index',
        ['categorie_comptes'=>$categorie_comptes]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categorie_comptes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom_categorie_compte' =>'required',
           
        ]);
        $categorie_compte= new Categorie_compte();
        $categorie_compte->nom_categorie_compte= $request->nom_categorie_compte;
       
    
        $categorie_compte->save();
        return redirect('categorie_comptes');
    
    }

    public function storecompte(Request $request){
    $request->validate([
        'categorie_compte_id' =>'required',
        
        'numero_compte' =>'required',
        'nom_compte' =>'required',
        'lieu_travail' =>'required',
        'nif' =>'required',
        'rc' =>'required',
        'solde' =>'required',
        'telephone' =>'required',
        'email' =>'required'

    ]);
    $compte= new Compte();
    $compte->categorie_compte_id= $request->categorie_compte_id;
   
    $compte->numero_compte= $request->numero_compte;
    $compte->nom_compte= $request->nom_compte;
    $compte->lieu_travail= $request->lieu_travail;
    $compte->nif= $request->nif;
    $compte->rc= $request->rc;
    $compte->solde= $request->solde;
    $compte->telephone= $request->telephone;
    $compte->email= $request->email;

    $compte->save();
    return $this->show($request->categorie_compte_id);
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
        $category_comptes = Categorie_compte::with(['comptes'])->find($id);
        return view('categorie_comptes.show',compact('category_comptes'));
    }

  


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie_compte $categorie_compte)
    {
        //
        $categorie_compte= Categorie_compte::find($categorie_compte->id);
    return view('categorie_comptes/edit', [
        'categorie_compte'=>$categorie_compte
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie_compte $categorie_compte)
    {
        //
        $categorie_compte->nom_categorie_compte= $request->nom_categorie_compte;
        
        $categorie_compte->save();
    
        return redirect('categorie_comptes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie_compte $categorie_compte)
    {
        # code...
    
        $categorie_compte= categorie_compte::find($categorie_compte->id);

       $categorie_compte->delete();
      return redirect('categorie_comptes');
    }
}
