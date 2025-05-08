<?php
$username = 'loouuiissee25'; // Replace 'USERNAME' with the Instagram username you want to query

// Set up request URL
$request_url = 'https://i.instagram.com/api/v1/users/web_profile_info/?username=' . $username;

// Set up headers
$headers = array(
    'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 12_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 105.0.0.11.118 (iPhone11,8; iOS 12_3_1; en_US; en-US; scale=2.00; 828x1792; 165586599)',
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