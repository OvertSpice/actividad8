<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\SuperheroeController;
use Illuminate\Support\Facades\Storage;

class SuperheroeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['superheroes']=Superheroe::paginate(5);
        return view('superheroe.index', $datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superheroe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosSuperheroe = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosSuperheroe['Foto'] = $request->file('Foto')->store('uploads','public');
        }

        superheroe::insert($datosSuperheroe);
        return response()->json($datosSuperheroe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function show(Superheroe $superheroe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superheroe=superheroe::findOrFail($id);
        return view('superheroe.edit', compact('superheroe') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosSuperheroe=request()->except('_token','_method');
        if($request->hasFile('Foto'))
        {
            $superheroe=superheroe::findOrFail($id);
            Storage::delete('public/'.$superheroe->Foto);
            $datosSuperheroe['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Superheroe::where('id','=',$id)->update($datosSuperheroe);

        $superheroe=superheroe::findOrFail($id);
        return view('superheroe/edit', compact('superheroe'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $superheroe=superheroe::findOrFail($id);

        if(Storage::delete('public/'.$superheroe->Foto))
        {
            superheroe::destroy($id);
        }
        return redirect('superheroe');
    }
}
