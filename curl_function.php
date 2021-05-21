<?php
 
function login($url){
    $cookie_file =  "/tmp/cookies.txt";
    $login = curl_init(); // Initialize a new session and return a cURL handle
    curl_setopt($login, CURLOPT_COOKIEJAR, realpath($cookie_file)); // Set cookies and store it in specific path
    curl_setopt($login, CURLOPT_COOKIEFILE, realpath($cookie_file)); // File name to read cookies from
    curl_setopt($login, CURLOPT_TIMEOUT, 40000);  // Used to set the MAX ececution tiem for Curl.
    curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE); // Is used to set the Returntransfer enable for Curl to display data from api. False is default value
    curl_setopt($login, CURLOPT_URL, $url);// Target URL, Rest Api endpoints
    curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // Is used to set browseragent for Curl
    curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE); // true to follow any "Location: " header that the server sends as part of the HTTP header
    curl_setopt($login, CURLOPT_POST, TRUE); // Post Request
    ob_start();// Turn on output buffering
    return curl_exec ($login); //  finished setting all the options and ready do it/ execute i
    ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering
    curl_close ($login); // Closes the Curl session, then frees up the associated memory.
    unset($login);    //destroys the specified variables
}                  
 
function grab_page($site){
    $cookie_file =  "/tmp/cookies.txt";
    $ch = curl_init(); // Initialize a new session and return a cURL handle
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Is used to set the Returntransfer enable for Curl to display data from api. False is default value
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // Is used to set browseragent for Curl
    curl_setopt($ch, CURLOPT_TIMEOUT, 40); // Used to set the MAX ececution tiem for Curl.
    curl_setopt($ch, CURLOPT_COOKIEFILE, realpath($cookie_file)); // File name to read cookies from
    curl_setopt($ch, CURLOPT_URL, $site); // Target URL, Rest Api endpoints
    ob_start(); // Turn on output buffering
    return curl_exec ($ch); //  finished setting all the options and ready do it/ execute it.
    ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering
    curl_close ($ch); // Closes the Curl session, then frees up the associated memory.
}
 
function post_data($site,$data, $headers){
    $cookie_file =  "/tmp/cookies.txt";
    $datapost = curl_init(); // Initialize a new session and return a cURL handle
    curl_setopt($datapost, CURLOPT_URL, $site);// Target URL, Rest Api endpoints
    curl_setopt($datapost, CURLOPT_TIMEOUT, 40000); // Used to set the MAX ececution tiem for Curl.
    curl_setopt($datapost, CURLOPT_HEADER, TRUE);
    curl_setopt($datapost, CURLOPT_HTTPHEADER, $headers); // Http headers
    curl_setopt($datapost, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // Is used to set browseragent for Curl
    curl_setopt($datapost, CURLOPT_POST, TRUE);
    curl_setopt($datapost, CURLOPT_POSTFIELDS, $data);
    curl_setopt($datapost, CURLOPT_COOKIEFILE, realpath($cookie_file));
    ob_start();
    return curl_exec ($datapost);
    ob_end_clean();
    curl_close ($datapost);
    unset($datapost);    
}
function update_data($site, $data){
    // User data to send using HTTP PUT method in curl
    // $data = array('name'=>'New Robin User','salary'=>'62000', 'age' => '34');
    $cookie_file =  "/tmp/cookies.txt";
    $data_json = json_encode($data); // Data should be passed as json format
    $update = curl_init();// curl initiate
    curl_setopt($update, CURLOPT_URL, $site);// Target URL, Rest Api endpoints
    curl_setopt($update, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
    curl_setopt($update, CURLOPT_CUSTOMREQUEST, 'PUT');// SET Method as a PUT
    curl_setopt($update, CURLOPT_POSTFIELDS,$data_json);// Pass user data in POST command
    curl_setopt($update, CURLOPT_RETURNTRANSFER, true);  // Is used to set the Returntransfer enable for Curl to display data from api. False is default value
    curl_setopt($update, CURLOPT_COOKIEFILE, realpath($cookie_file)); // File name to read cookies from
    ob_start(); // Turn on output buffering
    return curl_exec ($update); //  finished setting all the options and ready do it/ execute it.
    ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering
    curl_close($update); //// Close curl
}
?>