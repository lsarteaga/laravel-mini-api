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
        $request->validate([
           'lado' => 'required'
        ]);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Square  $square
     * @return \Illuminate\Http\Response
     */
    public function edit(Square $square)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Square  $square
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['lado' => 'required']);
        $square = Square::find($id);
        if ($square != null)
        {
            $square->side = $request->get('lado');
            $square->area = (float) ($square->side * $square->side);
            $square->perimeter = (float) 4 * $square->side;
            $square->update();
            return $square;
        }
        else
        {
            return response('no record found with id: ' . $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Square  $square
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $square = Square::find($id);
        if ($square != null)
        {
            $square->delete();
            return response('success');
        }
        else
        {
            return response('no record found with id: ' . $id);
        }
    }
}
