<?php

namespace App\Http\Controllers;
use App;
use App\photo;
use Image;
use Storage;
use App\Services\ImageResize;
use Illuminate\Http\Request;
use  App\Http\Requests\PhotoValidation;

class AdminPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(ImageResize $ImageResize)
    {
        $this->ImageResize = $ImageResize;
    }

    public function index()
    {
        $photo=photo::all();

       
        
        return view('admin.photo.index',compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoValidation $request)

    {

        if($validated = $request->validated()){;

        $photo = new photo;
        
        
        $photo->image=$this->ImageResize->PhotoStore($request->image);

        $photo->save();

      
        return redirect()->route('photo.index');
        }
        else{
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phot = photo::find($id);
        return view('admin.photo.edit',compact('phot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoValidation  $request, $id)
    {
       $validated = $request->validated();
       
        $photo = photo::find($id);

        $photo->image= $this->ImageResize->PhotoDelete($photo->image);
       
        $photo->image =$request->image;
        
        $photo->image=$this->ImageResize->PhotoStore($request->image);

        $photo->save();
        if ($photo->save()){
             
             return redirect()->route('photo.index');
         
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   
        
       $photo = photo::find($id);
        $this->ImageResize->PhotoDelete($photo->image);
         if ($photo->delete()){
             
             return redirect()->route('photo.index');
         }

         }
    
}
