<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curl {

	static function header() {
		return array(
			'Authorization: Bearer ' . $_COOKIE["access_token"],
			'Content-Type: application/json'
		);
	}

	static function get($url, $data = []) {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => Curl::header(),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response, true);
	}

	static function getRaw($url, $data = []) {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => Curl::header(),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}

	static function post($url, $body) {
		
				
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($body),
			CURLOPT_HTTPHEADER => Curl::header(),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		return json_decode($response);

	}


	static function delete($url, $body) {
		
				
		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		// 	CURLOPT_URL => $url,
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_ENCODING => '',
		// 	CURLOPT_MAXREDIRS => 10,
		// 	CURLOPT_TIMEOUT => 0,
		// 	CURLOPT_FOLLOWLOCATION => true,
		// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	CURLOPT_CUSTOMREQUEST => 'DELETE',
		// 	CURLOPT_POSTFIELDS => json_encode($body),
		// 	CURLOPT_HTTPHEADER => Curl::header(),
		// ));

		// $response = curl_exec($curl);

		// curl_close($curl);

		return redirect('/home');

	}

}
