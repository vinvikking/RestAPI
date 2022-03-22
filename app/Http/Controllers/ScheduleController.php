<?php

namespace App\Http\Controllers;


use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //     $response = $client->request('GET', '/api/user?api_token='.$token);


    //     $page = $request->query('page', 0);
    //     $limit =  $request->query('limit', 10);
    //     $recordings = Recording::skip($page*$limit)->take($limit)->get();

    //     $jsonData = ['status' => 'SUCCESS', 'recordings' => []];

    // foreach ($recordings as $recording){

    //     $jsonData ['recording'][] = [
    //         'id' => $recording->id,
    //         'name' => $recording->name,
    //         'sku' => $recording->sku,
    //         'price' => $recording->price,
    //         'category_id' => $product->category->id,
    //     ];
    // }

    //    return response()->json($jsonData);
       return view('schedule.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $client->request('POST', '/api/user', [
        'headers' => [
        'Accept' => 'application/json',
                ],
        'form_params' => [
        'api_token' => $token,
             ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
