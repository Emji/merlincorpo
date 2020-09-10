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
        $testimonies = testimonies::all();

        return view('admin.testimonies.index',compact('testimonies'));
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
    public function edit(testimonies $testimonies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testimonies  $testimonies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, testimonies $testimonies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\testimonies  $testimonies
     * @return \Illuminate\Http\Response
     */
    public function destroy(testimonies $testimonies)
    {
        //
    }
}
