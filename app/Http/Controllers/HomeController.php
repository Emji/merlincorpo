<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Image;
use App\photo;
use App\newsletter;
use App\client;
use App\session;
use App\Heure;
use Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos=photo::all();
        $heures=Heure::all();
        
        return view('welcome',compact('photos','heures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $reponse = $request;
        

        // $heures = Heure::all();
        // $heure = $heures->where('id',$request->heure)->first();
        // $heure->taken = true;
        // $heure->save();

        // $client = new client;

        // $client->name = $request->name;
        // $client->forname = $request->forname;
        // $client->mail = $request->mail;
        // $client->phone = $request->phone;
        // $client->heure_id = $heure->id;
        // $client->session_id = $session->id;
        // $client->save();


        // if($request->newsletter = true)
        //     {
        
        //     $collection = newsletter::all();
        
        //         if($collection->contains('mail',$request->mail)){

        //             //nothing happen

        //         }else
        //             {
        //                 $newsletter= new newsletter;
        //                 $newsletter->mail = $request->mail;
        //                 $newsletter->save();            
        //                 }
        
            
        //     }


        // return redirect()->back();


            
            return response()->json($reponse);


        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Form(){

        $heures = Heure::all();

        return response()->json($heures);
    }
}
