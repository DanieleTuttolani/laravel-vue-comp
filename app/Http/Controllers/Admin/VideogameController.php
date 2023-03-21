<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Mail;
use App\Models\Videogame;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewRelese;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames = Videogame::all();

        return view("admin.videogames.index", compact("videogames"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $videogame = new Videogame();
        return view("admin.videogames.create", compact("videogame"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $videogame = new Videogame();
        $videogame->fill($data);
        $videogame->available = isset($data['available']);
        $videogame->description = $data["description"];
        $videogame->save();
        Mail::to('daniele@email.it')->send(new NewRelese());

        return redirect()->route('admin.videogames.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        return view("admin.videogames.show", compact("videogame"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        $videogames = Videogame::all();
        $videogame->pluck("id")->toArray();
        return view("admin.videogames.edit", compact("videogame"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $data = $request->all();
        $data["available"] = isset($data["available"]) ? 1 : 0;
        $videogame->description = $data["description"];


        $videogame->update($data);
        $videogame->save();
        return redirect()->route("admin.videogames.index", $videogame->id);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        $videogame->delete();
        return redirect()->route("admin.videogames.index");
    }
}