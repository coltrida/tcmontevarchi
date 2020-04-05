<?php

namespace App\Http\Controllers;

use App\Http\Requests\SociRequest;
use App\Http\Resources\SociResource;
use App\Models\Socio;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SociController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SociResource::collection(Socio::latest()->paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SociRequest $request)
    {
        $socio = Socio::create($request->all());
        return response($socio, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function show(Socio $socio)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function update(SociRequest $request, Socio $soci)
    {
        $soci->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socio $soci)
    {
        $soci->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
