<?php

namespace App\Http\Controllers;
use App;
use App\session;
use App\Heure;
use Illuminate\Http\Request;
use  App\Http\Requests\DateValidation;

class AdminSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = session::all();
        $session = $sessions->last();

        $heures=Heure::all();

        $reservation = $heures->where('taken',1)->count();

     
        return view('admin.session.index',compact('session','heures','reservation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DateValidation $request)
    {
        $validated = $request->validated();
        $session = new session;
        $session->date=$request->date;
        $session->save();

        $heures = heure::all();

        foreach($heures as $heure){
            $heure->taken = 0;
            $heure->save();
        }


        return redirect()->route('session.index');
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
        $session = session::find($id);
        return view('admin.session.edit',compact('session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DateValidation $request, $id)
    {
        $validated=$request->validated();

        $session = session::find($id);
        $session->date =$request->date;
        $session->save();
        return redirect()->route('session.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = session::find($id);
        $session->delete();

        return redirect()->route("session.index");
    }
}
