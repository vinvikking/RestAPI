<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    
   public function handle($request, Closure $next, ...$guards)
{
    //echo $request;
    if ($request->cookie('cookie-name')) {
        $request->headers->set('Authorization', 'Bearer ' . $request->cookie('cookie-name'));

    }

    $this->authenticate($request, $guards);

    return $next($request);
}


    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }  
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function getAuth()
    {
       
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://sports.studioautomated.com/api/v2/auth/login',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "username": "gordon.gosewisch@sportclubsupport.com",
            "password": "Sportclub22!"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Cookie: access_token=eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjYyMWQxZWQ2ZjE2NGFmODM0NjY5YWZmMSIsInVzZXJfaWQiOiI0MDU2M2U4My05YmNhLTRiYmUtODE4Yi05OGZmZDljZmIwZjAiLCJzZXNzaW9uSWQiOiJlNmMzMjUxNC03MzNhLTQxNzYtOTM4NC03ZGY3YzkyMWVlZDciLCJlbWFpbEFkZHJlc3MiOiJnb3Jkb24uZ29zZXdpc2NoQHNwb3J0Y2x1YnN1cHBvcnQuY29tIiwiY3VzdG9tZXJfaWQiOiIqIiwicGFydG5lcl9pZCI6ImY0MzI1ZmQ0LTY5MTYtNDc4Zi05ZGJhLTk2ZDA0NTI5YTg2MSIsInJvbGUiOiJwYXJ0bmVyX2FkbWluIiwiaWF0IjoxNjQ5NzAwODYwLCJleHAiOjE2NTAzMDU2NjB9.Dzc809zwkNnjXjQmqq7GwqIRxqGyX8eWj_4bmO7Dfm6ZAbpPVDgPMa7YrHFkOkGWaTUFUZYdw_y_T04ZZ_PEPfGc_XiDiHSkI4Kp_kTvzM7vODIvnlB-p8VcF2HDVQjBjA3eElARLu_Cy_VX8Q7C1khFpdV8gB1xEPHKhNZvNMASLLRYxnE62U1AaK7kCRbphKNxeBEAd4lPlw1TIcLCRY9tSY2DOKrm4smPpvAEZgk5kdbqwy47fKiVjvDWcjhH_WVO8TR8nuh9_X_NmpI44-uHATB9Q31OZsB7v75UzOmm7xOU9f0tDkPUTZtFSrHmZUpwIV4zUArVgIybnIfbgw'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
        
    }
}
