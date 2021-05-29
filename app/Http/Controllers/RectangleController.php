<?php

namespace App\Http\Controllers;

use App\Models\Rectangle;
use Illuminate\Http\Request;

class RectangleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rectangles = Rectangle::all();
        return $rectangles;
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
            'lado1' => 'required',
            'lado2' => 'required'
        ]);
        $rectangle = new Rectangle();
        $rectangle->lenght = $request->get('lado1');
        $rectangle->width = $request->get('lado2');
        $rectangle->area = (float) ($rectangle->lenght * $rectangle->width);
        $rectangle->perimeter = (float) ((2 * $rectangle->lenght) + (2 * $rectangle->width));
        $rectangle->save();
        return $rectangle;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rectangle  $rectangle
     * @return \Illuminate\Http\Response
     */
    public function show(Rectangle $rectangle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rectangle  $rectangle
     * @return \Illuminate\Http\Response
     */
    public function edit(Rectangle $rectangle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rectangle  $rectangle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lado1' => 'required',
            'lado2' => 'required'
        ]);
        $rectangle = Rectangle::find($id);
        if ($rectangle != null)
        {
            $rectangle->lenght = $request->get('lado1');
            $rectangle->width = $request->get('lado2');
            $rectangle->area = (float) ($rectangle->lenght * $rectangle->width);
            $rectangle->perimeter = (float) ((2 * $rectangle->lenght) + (2 * $rectangle->width));
            $rectangle->save();
            return $rectangle;
        }
        else
        {
            return response('no record found with id: ' . $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rectangle  $rectangle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rectangle = Rectangle::find($id);
        if ($rectangle != null)
        {
            $rectangle->delete();
            return response('success');
        }
        else
        {
            return response('no record found with id: ' . $id);
        }
    }
}
