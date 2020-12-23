<?php

Namespace App\Http\Controllers;
use App\Compte;
use App\Categorie_compte;


 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\DB;
 
class ComptesController extends Controller{

public function index()
{
    # code... 
    $categorie_comptes= Categorie_compte::all();
    $comptes = DB::table('comptes')
                 ->join('categorie_comptes','comptes.categorie_compte_id','categorie_comptes.id')
                
                 ->select('categorie_comptes.*','comptes.*')
                 ->get();
    return view('comptes/index',
    ['comptes'=>$comptes,
    'categorie_comptes'=>$categorie_comptes
    ]);

}

public function create()

{
 $categorie_comptes = Categorie_compte::all();

 

    # code...
    return view('comptes/create',
   ['categorie_comptes'=>$categorie_comptes]);
   
}

public function store(Request $request)
{
    # code...
    //validation

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
    return redirect('comptes');

}

public function show($id)
{
    //
    $comptes = compte::all();
    return view('comptes/show',['comptes'=>$comptes]);
}



//dependency injection
public function edit(Compte $compte)
{
    # code...
    $categorie_comptes= Categorie_compte::all();
   
     
    $compte= Compte::find($compte->id);
    return view('comptes/edit', [
     'compte'=>$compte,
        'categorie_comptes'=>$categorie_comptes,
       

    ]);
}

public function update(Request $request, compte $compte)

{
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
    return redirect('comptes');
   
}

public function destroy(compte $compte)
{
    # code...

    $compte= compte::find($compte->id);
  $compte->delete();
  return redirect('comptes');
}


}