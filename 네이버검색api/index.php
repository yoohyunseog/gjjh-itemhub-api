<?php
$client_id = "8Is5YrAO6QkzBSXiwPSV";
$client_secret = "2TbpRTesu8";
$encText = urlencode("네이버오픈API");
$url = "https://openapi.naver.com/v1/search/blog.xml?query=".$encText; // json 결과
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
echo "status_code:".$status_code."
";
curl_close ($ch);
if($status_code == 200) {
	echo $response;
} else {
	echo "Error 내용:".$response;
}
?>