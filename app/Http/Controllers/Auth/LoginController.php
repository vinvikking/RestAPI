<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->getAuth();
        $this->middleware('guest')->except('logout');
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
          CURLOPT_HEADER => 1,
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
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
      


        list($headers, $content) = explode("\r\n\r\n", $response, 2);

        $fullheader = "";
        foreach (explode("\r\n",$headers) as $hdr) $fullheader .= $hdr;

        $access_token = explode(";", explode("access_token=", $fullheader)[1])[0];

        setcookie('access_token', $access_token);
        setcookie('access_token', $access_token, 0, "", ".sports.studioautomated.com");

        
    }
}
