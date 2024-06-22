<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\sparepartsStoreRequest;
use App\Http\Requests\sparepartsUpdateRequest;
use App\Models\spareparts;

class sparepartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_Spareparts = spareparts::paginate(3);
        return view('spareparts.index', compact('all_Spareparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spareparts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(sparepartsStoreRequest $request)
    {
        $path = $request ->image->store('public/spareparts');
        spareparts::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path
        
        ]);
        return redirect ()-> route('spareparts.index')->with('message','udah kesimpen brader');
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
        $sparepartsCol = spareparts::find($id);
        return view('spareparts.edit', compact('sparepartsCol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(sparepartsUpdateRequest $request, $id)
    {
       


        $spareparts_update = spareparts::find($id);
        $spareparts_update->fill($request->input());
        $spareparts_update->name = $request->name;
        $spareparts_update->description = $request->description;
        $spareparts_update->price = $request->price;
     
        $spareparts_update->save();

        return redirect()->route('spareparts.index')->with('message','udah ke-update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        spareparts::find($id)->delete();
        return redirect()->route('spareparts.index')->with('message','Sudah terhapus');
    }
}
