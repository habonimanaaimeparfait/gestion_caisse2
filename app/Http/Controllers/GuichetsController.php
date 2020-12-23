<?php

namespace App\Http\Controllers;

use App\Guichet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuichetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guichets = Guichet::all();
        return view('guichets.index', compact('guichets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guichets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guichet = new Guichet();
        $guichet->nomero_guichet = $request->nomero_guichet;
        $guichet->save();
        return redirect('guichets');
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
        $guichet = Guichet::find($id);
        return view('guichets.edit', compact('guichet'));
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
        $guichet =Guichet::find($id);
        $guichet->nomero_guichet = $request->get('nomero_guichet');
        $guichet->save();
        return redirect('guichets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guichet = Guichet::find($id);
    $guichet->delete();
    return redirect('guichets')->with("success", "Le guichet est supprimé !");
    }
}
