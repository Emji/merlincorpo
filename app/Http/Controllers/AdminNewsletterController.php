<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\newsletter;
use App\User;
use Illuminate\Support\Facades\Mail;


class AdminNewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users=User::all();
        $newsletters = newsletter::all();
        $newslettersCount = $newsletters->count();
        return view('admin.newsletter.index', compact('newsletters','newslettersCount','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $NewsletterText = $request->newsletter;

        $newsletters = newsletter::all();
        

        foreach ($newsletters as $newslett){

            $mail = $newslett->mail;
           
            $data = array(
            'mail'=> $mail,
            'text'=>$NewsletterText,
        );
        Mail::send('mails.newsletterblade',$data, function ($message) use($data)
                {
                            
                    $message->from('j59b4e434f2-8a85cb@inbox.mailtrap.io');
                    $message->to($data['mail']);
                    $message->setBody($data['text']);
                }); 

        }

        return redirect()->route('newsletter.index');
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
        $newsletter = newsletter::find($id);
        $newsletter->delete();

        return redirect()->back();
    }
}
