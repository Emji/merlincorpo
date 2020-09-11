<?php

namespace App\Http\Controllers;

use App\testimonies;
use Illuminate\Http\Request;

class TestimoniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoniess = testimonies::all();

        return view('admin.testimonies.index',compact('testimoniess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonies = new testimonies;
        $testimonies->testimonies=$request->testimonies;
        $testimonies->author=$request->author;
        $testimonies->save();

        return redirect()->route('temoignage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\testimonies  $testimonies
     * @return \Illuminate\Http\Response
     */
    public function show(testimonies $testimonies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\testimonies  $testimonies
     * @return \Illuminate\Http\Response
     */
    public function edit(testimonies $testimonies, $id)
    {
        $testimonies = testimonies::find($id);

        return view('admin.testimonies.edit',compact('testimonies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testimonies  $testimonies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, testimonies $testimonies,$id)
    {
        $testimonies = testimonies::find($id);

        

        $testimonies->testimonies = $request->testimonies;
        $testimonies->author = $request->author;
        $testimonies->save();

        return redirect()->route('temoignage.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\testimonies  $testimonies
     * @return \Illuminate\Http\Response
     */
    public function destroy(testimonies $testimonies,$id)
    {
        $testimonies = testimonies::find($id);
        $testimonies->delete();

        return redirect()->back();
    }
}
