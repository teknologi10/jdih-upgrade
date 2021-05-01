<?php 

function curl_post($url, $variabel, $header) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "https://satudata.kulonprogokab.go.id/stpdku_api/".$url);
	curl_setopt($ch, CURLOPT_POST, 1);

	// if (!empty($variabel)) {
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $variabel);
	// }

	if (!empty($variabel)) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, 
	         http_build_query($variabel));
	}

	

	if (!empty($header)) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	}

	// Receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec($ch);

	if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200) {
		return $server_output;
	} else {
		// return curl_getinfo($ch, CURLINFO_HTTP_CODE);
		return $server_output;
	}

}

function curl_get($url) {
	$ch = curl_init();

	$query_string = "";
	if (!empty($variabel)) {
		$query_string = "?".http_build_query($variabel);
	}

	curl_setopt($ch, CURLOPT_URL, "https://satudata.kulonprogokab.go.id/stpdku_api/".$url.$query_string);
	// curl_setopt($ch, CURLOPT_POST, 1);
	if (!empty($header)) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	}

	
	// Receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec($ch);

	if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200) {
		return $server_output;
	} else {
		$curl_error = curl_error($ch);
		$curl_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		log_message('info', curl_error($ch));
		return $server_output;
	}

}