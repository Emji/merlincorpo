<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use App\Heure;
use App\session;
use  App\Http\Requests\SendMessageToClientValidation;

use Illuminate\Support\Facades\Mail;


class AdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = session::paginate(1);
        $clients = client::all();
        $heures = Heure::all();

        return view ('admin.client.index',compact('sessions','clients','heures'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
        $client = client::find($id);
        return view('admin.client.show',compact('client'));
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
        $client = client::find($id);
        
        if($client->hasPaid){
        $client->hasPaid = 0;
        $client->save();
            
        }else{
            $client->hasPaid = 1;
            $client->save();
        }

    

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::find($id);
        $heures = Heure::all();
        $heure = $heures->where('id',$client->heure_id)->first();
        $heure->taken = false;
        $heure->save();
        $client->delete();
        
        return redirect()->back();
        
    }
    public function SendMailToClient(SendMessageToClientValidation $request){

            $validated = $request->validated();

            $id= $request->id;
            $client = client::find($id);
            $MailTo = $client->mail;
            $lettre = $request->message;
            $data=array(
                            
                            'lettre'=>$lettre,
                            'mail'=>$request->mail,
                            'name'=>$client->name,
                            'forname'=>$client->forname,


                            );

                            Mail::send('mails.SendMailToClient',$data, function ($message) use($data)
                            {
                            
                                $message->from('j59b4e434f2-8a85cb@inbox.mailtrap.io');
                                $message->to('j59b4e434f2-8a85cb@inbox.mailtrap.io');
                                $message->setBody($data);
                            }); 
                            // $data['mail']

            return redirect()->route('client.index');
           
    }

    public function hasPaid(Request $request, $id){

       

    }


}
