<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use Illuminate\Http\Request;

class CircleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circles = Circle::all();
        return $circles;
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
        $request->validate(['radio' => 'required']);
        $circle = new Circle();
        $circle->radius = $request->get('radio');
        $circle->area = (float) (pi() * pow($circle->radius, 2));
        $circle->perimeter = (float) (2 * pi() * $circle->radius);
        $circle->save();
        return $circle;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function show(Circle $circle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function edit(Circle $circle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['radio' => 'required']);
        $circle = Circle::find($id);
        if ($circle != null)
        {
            $circle->radius = $request->get('radio');
            $circle->area = (float) (pi() * pow($circle->radius, 2));
            $circle->perimeter = (float) (2 * pi() * $circle->radius);
            $circle->save();
            return $circle;
        }
        else
        {
            return response('no record found with id: ' . $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Circle  $circle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $circle = Circle::find($id);
        if ($circle != null)
        {
            $circle->delete();
            return response('success');
        }
        else
        {
            return response('no record found with id: ' . $id);
        }
    }
}
