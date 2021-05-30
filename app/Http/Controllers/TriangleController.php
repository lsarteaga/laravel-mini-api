<?php

namespace App\Http\Controllers;

use App\Models\Triangle;
use Illuminate\Http\Request;

class TriangleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $triangles = Triangle::all();
        return $triangles;
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
            'base' => 'required',
            'altura' => 'required'
        ]);
        $triangle = new Triangle();
        $triangle->base = $request->get('base');
        $triangle->height = $request->get('altura');
        $triangle->area = (float) (($triangle->base * $triangle->height) / 2);
        $triangle->perimeter = (float) ($triangle->base * 3);
        $triangle->save();
        return $triangle;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Triangle  $triangle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $triangle = Triangle::find($id);
        if ($triangle != null)
        {
            return $triangle;
        }
        else
        {
            return response('no record found with id: ' . $id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Triangle  $triangle
     * @return \Illuminate\Http\Response
     */
    public function edit(Triangle $triangle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Triangle  $triangle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'base' => 'required',
            'altura' => 'required'
        ]);
        $triangle = Triangle::find($id);
        if ($triangle != null)
        {
            $triangle->base = $request->get('base');
            $triangle->height = $request->get('altura');
            $triangle->area = (float) ($triangle->base * $triangle->height) / 2;
            $triangle->perimeter = (float) ($triangle->base * 3);
            $triangle->save();
            return $triangle;
        }
        else
        {
            return response('no record found with id: ' . $id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Triangle  $triangle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $triangle = Triangle::find($id);
        if ($triangle != null)
        {
            $triangle->delete();
            return response('success');
        }
        else
        {
            return response('no record found with id: ' . $id);
        }

    }
}
