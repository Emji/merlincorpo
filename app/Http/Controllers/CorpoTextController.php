<?php

namespace App\Http\Controllers;

use App\CorpoText;
use Illuminate\Http\Request;

class CorpoTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corpotexts = CorpoText::all();

        return view('admin.corpo.index',compact('corpotexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.corpo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $textcorpo = new CorpoText;
        $textcorpo->texte_corpo = $request->texte_corpo;
        $textcorpo->prix_session = $request->prix_session;
        $textcorpo->save();

        return redirect()->route('textcorpo.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CorpoText  $corpoText
     * @return \Illuminate\Http\Response
     */
    public function show(CorpoText $corpoText)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CorpoText  $corpoText
     * @return \Illuminate\Http\Response
     */
    public function edit(CorpoText $corpoText, $id)
    {
        $corpoText = CorpoText::find($id);
        
        return view('admin.corpo.edit',compact('corpoText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CorpoText  $corpoText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorpoText $corpoText,$id)
    {   
        $textcorpo = CorpoText::find($id);

        

        $textcorpo->texte_corpo = $request->texte_corpo;
        $textcorpo->prix_session = $request->prix_session;
        $textcorpo->save();

        return redirect()->route('textcorpo.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CorpoText  $corpoText
     * @return \Illuminate\Http\Response
     */
    public function destroy(CorpoText $corpoText, $id)
    {
        
        $textcorpo = CorpoText::find($id);
        $textcorpo->delete();

        return redirect()->route('textcorpo.index');
    }
}
