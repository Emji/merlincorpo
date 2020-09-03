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

use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos= photo::all();
        $heures= Heure::all();
        $allSession = session::all();
        $session = session::NextSession();
       
        return view('welcome',compact('photos','heures','session'));
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
    public function store(Request $request,Heure $heures,session $allSession)
    {   

        $heures=Heure::all();
        $heure = $heures->where('id',$request->heure_id)->first();
        $heure->taken = true;
        $heure->save();
        

        $allSession = session::all();
        $session = $allSession->last();
       

        $client = new client;

        $client->name = $request->name;
        $client->forname = $request->forname;
        $client->mail = $request->mail;
        $client->phone = $request->phone;
        $client->heure_id = $heure->id;
        $client->session_id = $session->id;
        $client->save();


        if($request->newsletter = true)
            {
        
            $collection = newsletter::all();
        
                if($collection->contains('mail',$request->mail)){

                    //nothing happen

                }else
                    {
                        $newsletter= new newsletter;
                        $newsletter->mail = $request->mail;
                        $newsletter->save(); 
                        $data=array(
                            'mail'=>$request->mailnewsletter,
                            );

                            Mail::send('mails.ConfirmationRegisteredNewsletter',$data, function ($message) use($data)
                            {
                            
                                $message->from('j59b4e434f2-8a85cb@inbox.mailtrap.io');
                                $message->to('j59b4e434f2-8a85cb@inbox.mailtrap.io');
                            });           
                        }
        
            }

          
            $data=array(
                'mail'=>$request->mail,
                'name'=>$request->name,
                'forname'=>$request->forname,
                'date'=>$session->date,
                'heure'=>$heure->heure,

            );
      
            Mail::send('mails.ConfirmationMail',$data, function ($message) use($data)
            {
               
                $message->from('j59b4e434f2-8a85cb@inbox.mailtrap.io');
                $message->to('j59b4e434f2-8a85cb@inbox.mailtrap.io');
                // $message->to($data['mail']);
                $message->setBody($data);

        
            });

        

            
            return response()->json();


        
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
        $isFull = Heure::IsFull();
       
        $session = session::NextSession();

        return response()->json([$heures,$isFull,$session]);
    }

    public function RegisterNewsletter(Request $request){

        

        $allNewsletter = newsletter::all();
        if($allNewsletter->contains('mail',$request->mailnewsletter)){

            $AlreadyRegistered="Vous êtes deja inscrit à la newsletter";

            return response()->json($AlreadyRegistered);

        }else{
        $mail = $request->mailnewsletter;
        $newsletter = new newsletter;
        $newsletter->mail = $mail;
        $newsletter->save();

        $data=array(
            'mail'=>$request->mailnewsletter,
            );

            Mail::send('mails.ConfirmationRegisteredNewsletter',$data, function ($message) use($data)
            {
               
                $message->from('j59b4e434f2-8a85cb@inbox.mailtrap.io');
                $message->to('j59b4e434f2-8a85cb@inbox.mailtrap.io');
            });
            $Registered = "Vous vous êtes bien inscrit à la newsletter";
        return response()->json($Registered);

        }
    }
}
