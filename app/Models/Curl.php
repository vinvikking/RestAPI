<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curl {

	static function header() {
		return array(
			'Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjYyMWQxZWQ2ZjE2NGFmODM0NjY5YWZmMSIsInVzZXJfaWQiOiI0MDU2M2U4My05YmNhLTRiYmUtODE4Yi05OGZmZDljZmIwZjAiLCJzZXNzaW9uSWQiOiJiZDUxMmQ5OS1jN2U3LTQxNjktODcyNS0wOTczMzRlZmRmYTIiLCJlbWFpbEFkZHJlc3MiOiJnb3Jkb24uZ29zZXdpc2NoQHNwb3J0Y2x1YnN1cHBvcnQuY29tIiwiY3VzdG9tZXJfaWQiOiIqIiwicGFydG5lcl9pZCI6ImY0MzI1ZmQ0LTY5MTYtNDc4Zi05ZGJhLTk2ZDA0NTI5YTg2MSIsInJvbGUiOiJwYXJ0bmVyX2FkbWluIiwiaWF0IjoxNjQ5MzMzODkzLCJleHAiOjE2NDk5Mzg2OTN9.hw4mqYE1FtDAOuYbszCs1zEIBfA6CjkHRhYsrMZaeRy3rTxQmeJbSL_oWGL4q-UZnQbnnhQ6HkMmqzIopZqLvcbTDHqD0IJzClEdUor_hkjDJ4FOTW6UpEDvC8pSBhY1J3OdbcjupKB0Ji7zKS7o23YOCfwFojD18EwHLL2tjV41rNPDH4599r--wssV3GjocEPdmnYUIaGcxVwoart4L3-YjTwyz4as85iPKMwWQ0H7fhg8vEfydaqldB_lm_p_yZ_cMfvQzXw8BwYN3yGgkELA7JRzICCoLNY8czxUTToAlW1k1F2eTc3WYI9M4gH9TLJ6UjXiVcqUZCxyuFSygg',
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
