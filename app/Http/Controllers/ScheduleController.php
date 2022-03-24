<?php

namespace App\Http\Controllers;


use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Curl;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $schedule = $this->listRecordings();
       $customers = $this->listCustomers();
      

       return view('schedule.index')
        ->with('schedule', $schedule)
        ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servers = $this->listServers();
        return view('schedule.create')->with('servers', $servers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $push = [
            "server_id" => $request->server_id,
            "status" => "pending",
            "title" => $request->title,
            "schedule" => [
                "start_time" => $request->start . ":00",
                "end_time" => $request->end . ":00",
            ],
            "type_settings" => [
                "sport" => $request->sport,
                "views" => [[
                    "camera_id" => $request->camera,
                    "camera_name" => "main",
                    "enable_audio" => true,
                    "enable_ocr" => true,
                    "mode" => "broadcast",
                    "quality" => "high",
                    "url" => $request->url
                ]],
            ],
        ];

        echo json_encode($push) . "\n\n";

        Curl::post('https://api.sports.studioautomated.com/api/v3/scheduler/recordings', $push);

        //echo json_encode($result);



      //return json_encode($request->getContent());
    }



    // {
    //     "parent_id": "432b9f88-2685-47b2-ba14-71c68a2c26ad",
    //     "schedule": {
    //       "end": 42,
    //       "end_time": "2021-11-12T10:15:34",
    //       "start": 42,
    //       "start_time": "2021-11-12T10:15:34"
    //     },
    //     "server_id": "432b9f88-2685-47b2-ba14-71c68a2c26ad",
    //     "status": "pending",
    //     "title": "abc",
    //     "type_settings": {
    //       "sport": "icehockey",
    //       "views": [
    //         {
    //           "camera_id": "432b9f88-2685-47b2-ba14-71c68a2c26ad",
    //           "camera_name": "abc",
    //           "enable_audio": true,
    //           "enable_ocr": true,
    //           "mode": "static",
    //           "quality": "high",
    //           "url": "rtmp://url.to.stream"
    //         }
    //       ]
    //     }
    //   }

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

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cameras  $cameras
     * @return \Illuminate\Http\Response
     */
    public function listRecordings()
    {
        $recordings = Curl::get('https://api.sports.studioautomated.com/api/v3/scheduler/recordings');
        return $recordings;
    }
      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cameras  $cameras
     * @return \Illuminate\Http\Response
     */
    public function listServers()
    {
        $test = Curl::get('https://api.sports.studioautomated.com/api/v3/core/servers'); 
        return $test;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cameras  $cameras
     * @return \Illuminate\Http\Response
     */
    public function listCustomers()
    {
        $recordings = Curl::get('https://api.sports.studioautomated.com/api/v3/core/customers');
        return $recordings;
    }
}
