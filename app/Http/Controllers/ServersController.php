<?php

namespace App\Http\Controllers;

use App\Models\Servers;
use Illuminate\Http\Request;
use App\Models\Curl;

class ServersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = $this->listServers();
        return view('servers.index')->with('servers',$servers);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servers  $servers
     * @return \Illuminate\Http\Response
     */
    public function show(Servers $servers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servers  $servers
     * @return \Illuminate\Http\Response
     */
    public function edit(Servers $servers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servers  $servers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servers $servers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servers  $servers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servers $servers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function listServers()
    {
       // $recordings = Curl::get('https://api.sports.studioautomated.com/api/v3/scheduler/overlays/' . request()->route('id'));
        $servers = Curl::get('https://api.sports.studioautomated.com/api/v3/core/servers');
       
        return $servers;
    }
}
