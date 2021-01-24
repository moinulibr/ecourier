function curlSmsSend($mobile_no, $message)
{
    $message = urlencode($message);
    $url = "http://66.45.237.70/api.php?username=parcelex&password=22882532@&number=$mobile_no&message=$message";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Sample cURL Request');
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}




function HH_SENDING_SMS($number,$content)
{
    $url = "http://66.45.237.70/api.php";
    $data= array(
        'username'=>'parcelex',
        'password'=>'22882532@',
        'number'=>"$number",
        'message'=>"$content"
    );
    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);
    $p = explode("|",$smsresult);
    $sendstatus = $p[0];
    return true;    
}



order_id
$creating_branch_type_id
creating_branch_id
business_type_id
collected_amount
collection_status
