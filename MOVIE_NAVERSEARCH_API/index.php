<?php
$client_id = "7FUKSo7d5tcRU2rOz3NQ";
$client_secret = "dp68Zkdtlb";
$encText = urlencode("영화");
$url = "https://openapi.naver.com/v1/search/movie.json?genre=15&yearfrom=2015&yearto=2017&country=JP&query=".$encText; // json 결과
//  $url = "https://openapi.naver.com/v1/search/blog.xml?query=".$encText; // xml 결과
$is_post = false;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, $is_post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = array();
$headers[] = "X-Naver-Client-Id: ".$client_id;
$headers[] = "X-Naver-Client-Secret: ".$client_secret;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);                            
$response = curl_exec ($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo "status_code:".$status_code.'br'."
";
curl_close ($ch);
if($status_code == 200) {
	echo $response;
} else {
	echo "Error 내용:".$response;
}
?>