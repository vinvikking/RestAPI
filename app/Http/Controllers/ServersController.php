<?php

namespace App\Http\Controllers;

use App\Models\Servers;
use Illuminate\Http\Request;

class ServersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = $this->jsonToObject();
        return view('servers.index')->with('servers',json_decode($servers, true));
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
     * @param  \App\Models\Cameras  $cameras
     * @return \Illuminate\Http\Response
     */
    public function jsonToObject()
    {
               $curl = curl_init();

                  curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://api.sports.studioautomated.com/api/v3/core/servers',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'GET',
                  CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjYyMWQxZWQ2ZjE2NGFmODM0NjY5YWZmMSIsImVtYWlsQWRkcmVzcyI6ImdvcmRvbi5nb3Nld2lzY2hAc3BvcnRjbHVic3VwcG9ydC5jb20iLCJjdXN0b21lcl9pZCI6IioiLCJwYXJ0bmVyX2lkIjoiZjQzMjVmZDQtNjkxNi00NzhmLTlkYmEtOTZkMDQ1MjlhODYxIiwicm9sZSI6InBhcnRuZXJfYWRtaW4iLCJpYXQiOjE2NDc5ODAyMDcsImV4cCI6MTY0ODU4NTAwN30.ixDMXdVWcFw7NuP4BhzYxnbo5U9tEiB24EyCixIVaxKPBScQ6gnNrR04USkpWghKix2EEPzKXhFiix3HX3a5VOllBJ5jx4WvWWfHZvNw2Of32gFAMWIMk24D0KpRN7ngFbqxdFqv2V0mMRw2OjIKmky3e9i5ZHECxd4fdgVkQZOiUAr2pSky6JFly2RsjW9AfEZOMMaMLJheGPKwtvfor01zfn7PyuYuq5EzaxQ4cz55jFJSCG9nUQ9G1X3UPRzdagK7VlPZAEJt1jk0RH0EpEWT_DhdAlxdZnqI1ovEUfXJb562l_oaWKKW9-oti_r1mLiPBi319CU_o4dKVkS7gg'
                  ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
        return $response;
            }
}
