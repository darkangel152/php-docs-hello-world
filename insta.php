<?php
$username = 'loouuiissee25'; // Replace 'USERNAME' with the Instagram username you want to query

// Set up request URL
$request_url = 'https://i.instagram.com/api/v1/users/web_profile_info/?username=' . $username;

// Set up headers
$headers = array(
    'User-Agent: Instagram 76.0.0.15.395 Android (24/7.0; 640dpi; 1440x2560; samsung; SM-G930F; herolte; samsungexynos8890; en_US; 138226743)',
    'Origin: https://www.instagram.com',
    'Referer: https://www.instagram.com/'
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $request_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Decode JSON response
$data = json_decode($response, true);

// Extract the follower count
$follower_count = $data['data']['user']['edge_followed_by']['count'];

// Output the follower count
echo "Follower count: " . $follower_count;
?>