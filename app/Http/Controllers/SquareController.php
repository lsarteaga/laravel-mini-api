<?php

namespace App\Http\Controllers;

use App\Models\Square;
use Illuminate\Http\Request;

class SquareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $squares = Square::all();
        return $squares;
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
        $square = new Square();
        $square->side = $request->get('lado');
        $square->area = (float) ($square->side * $square->side);
        $square->perimeter = (float) 4 * $square->side;
        $square->save();
        return $square;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Square  $square
     * @return \Illuminate\Http\Response
     */
    public function show(Square $square)
    {
        return $square;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Square  $square
     * @return \Illuminate\Http\Response
     */
    public function edit(Square $square)
    {
        return $square;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Square  $square
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $square = Square::find($request->get('id'));
        $square->side = $request->get('lado');
        $square->area = (float) ($square->side * $square->side);
        $square->perimeter = (float) 4 * $square->side;
        $square->update();
        return $square;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Square  $square
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $square = Square::find($request->get('id'));
        $square->delete();
        return ['process' => 'ok'];
    }
}
