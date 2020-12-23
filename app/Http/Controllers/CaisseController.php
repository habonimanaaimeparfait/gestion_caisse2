<?php

namespace App\Http\Controllers;
use App\Caisse;
use App\Guichet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $caisses = DB::table('caisses')
         ->join('guichets','caisses.guichet_id','guichets.id')
         ->select('guichets.*','caisses.*')
          ->get();
          $guichets = Guichet::all();
          return view('caisses.index',[
              'caisses'=>$caisses,
              'guichets'=>$guichets,
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $guichets = Guichet::all();
       return view('caisses.create',[
           'guichets'=>$guichets
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'numero_caisse' => 'required',
            'solde' => 'required',
            'guichet_id' => 'required',
            
            ]);

        $caisse= new caisse();
       
        $caisse->numero_caisse = $request->numero_caisse;
        $caisse->solde= $request->solde;
        $caisse->guichet_id = $request->guichet_id ;
        $caisse->save();
        return redirect('caisses')->with('status', 'La Validation a ete faite avec succes');
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
    public function edit( $caisse)
    {
          # code...
    $guichets= Guichet::all();
    $caisse= Caisse::find($caisse);
    return view('caisses/edit', [
    'caisse'=>$caisse,
    'guichets'=>$guichets,
        ]);
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
        $request->validate([
            
            'numero_caisse' => 'required',
            'solde' => 'required',
            'guichet_id' => 'required',
            
            ]);

        $caisse= new caisse();
       
        $caisse->numero_caisse = $request->numero_caisse;       
        $caisse->solde= $request->solde;
        $caisse->guichet_id = $request->guichet_id ;
        $caisse->save();
        return redirect('caisses')->with('status', 'La Validation a ete faite avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caisse = Caisse::find($id);
        $caisse->delete();
        return \redirect('caisses')->with('status','La caisse a ete supprime avec Succees!!!');
    }
}
