<?php

Namespace App\Http\Controllers;
use App\Compte;
use App\Caisse;
use App\Caisse_detail;


 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\DB;
 
class Caisse_detailsController extends Controller{

public function index()
{
    # code... 
    $comptes= Compte::all();
    $caisses= Caisse::all();
    $caisse_details = DB::table('caisse_details')
                 ->join('comptes','caisse_details.compte_id','comptes.id')
                 ->join('caisses','caisse_details.caisse_id','caisses.id')
                 ->select('comptes.*','caisses.*','caisse_details.*')
                 ->get();
    return view('caisse_details/index',
    ['caisse_details'=>$caisse_details,
    'comptes'=>$comptes,
    'caisses'=>$caisses,
    ]);

}

public function create()

{
 $comptes = Compte::all();
 $caisses = Caisse::all();
 

    # code...
    return view('caisse_details/create',
   ['comptes'=>$comptes,'caisses'=>$caisses]);
   
}

public function store(Request $request)
{
    # code...
    //validation

    $request->validate([
        'compte_id' =>'required',
        'caisse_id' =>'required',
        'type' =>'required',
        'somme' =>'required',
        'libelle' =>'required'
        
       
    ]);
    $caisse_detail= new Caisse_detail();
    $caisse_detail->compte_id= $request->compte_id;
   
    $caisse_detail->caisse_id= $request->caisse_id;
    $caisse_detail->type= $request->type;
    $caisse_detail->somme= $request->somme;
    $caisse_detail->libelle= $request->libelle;
    
    $caisse_detail->save();
    return redirect('caisse_details');

}

public function show($id)
{
    //
    $caisse_details =caisse_detail::all();
    return view('caisse_detail/show',['caisse_detail'=>$caisse_details]);
}



//dependency injection
public function edit(Caisse_detail $caisse_detail)
{
    # code...
    $comptes= Compte::all();
    $caisses= Caisse::all();
     
    $caisse_detail= Caisse_detail::find($caisse_detail->id);
    return view('caisse_details/edit', [
     'caisse_detail'=>$caisse_detail,
        'comptes'=>$comptes,
        'caisses'=>$caisses,
       

    ]);
}

public function update(Request $request, caisse_detail $caisse_detail)

{
    $request->validate([
        'compte_id' =>'required',
        'caisse_id' =>'required',
        'type' =>'required',
        'somme' =>'required',
        'libelle' =>'required'
        
       
    ]);
    $caisse_detail= new Caisse_detail();
    $caisse_detail->compte_id= $request->compte_id;
   
    $caisse_detail->caisse_id= $request->caisse_id;
    $caisse_detail->type= $request->type;
    $caisse_detail->somme= $request->somme;
    $caisse_detail->libelle= $request->libelle;
    
    $caisse_detail->save();
    return redirect('caisse_details');

}

public function destroy(caisse_detail $caisse_detail)
{
    # code...

    $caisse_detail= caisse_detail::find($caisse_detail->id);
    
  $caisse_detail->delete();
  return redirect('caisse_details');
}


}