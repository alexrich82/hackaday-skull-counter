<?php
// Considerate Skull Count Widget
// This code returns skullcount for a hackaday project so you can brag about it on an external website 
// It's considerate because it only bothers the hackaday API if a certain amount of time has passed

// enter your api key
$api_key = "";

// enter your project id, you can find it in the url of your project
$project_id = "5602";

// minimum time to wait between API requests (seconds)
$cache_expiration = 120; 

// path to the cache file
$cache_file = "cache.csv";

// this line of code just puts cache file into an array
$cache = explode(",", file_get_contents($cache_file));
$cached_time = $cache[0]; // unix timestamp of last API request
$cached_skulls = $cache[1]; // skullcount from last API request

// if expiration time has passed, make a get request to the hackaday API
if((time()-$cache_expiration) > $cached_time) {
  
  // get json data from api
  $data = json_decode(file_get_contents("https://api.hackaday.io/v1/projects/".$project_id."?api_key=".$api_key),true);
  
  // return number of skulls, this will be fresh data
  print($data['skulls']);
  
  // store time and skulls in the cache file
  file_put_contents($cache_file,time().",".$data['skulls']);
  
} else { 

  // return cached value for number of skulls
  print($cached_skulls);
  
}

?>