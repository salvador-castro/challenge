<?php

namespace App\Http\Controllers;

use App\Models\Red;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Red);
        $redes = Red::all();
        return view('redes.index', compact('redes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Red);
        return view('redes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Red);
        try {
            $red= Red::create([
               'name' => $request->name,
               'description' => $request->description,
               'message' => $request->message,
               'url' => Str::random(10),
            ]);
            flash("Guardado Correctamente.")
            ->success()->important();
            
            return redirect()->route('redes.edit', $red);
        }
        catch(\Exception $ex)
        {
            flash("Error: {$ex->getMessage()}")->error()->important();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function show(Red $red)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function edit(Red $red)
    {
        $this->authorize('update', $red);
        return view('redes.edit', compact('red'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Red $red)
    {
        $this->authorize('update', $red);
        try {
            $red->update([
               'name' => $request->name,
               'description' => $request->description,
               'message' => $request->message,
               'status' => $request->status,
            ]);
            flash("Actualizado Correctamente.")
            ->success()->important();
            
            return back();
        }
        catch(\Exception $ex)
        {
            flash("Error: {$ex->getMessage()}")->error()->important();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Red  $red
     * @return \Illuminate\Http\Response
     */
    public function destroy(Red $red)
    {
        //
    }
}
