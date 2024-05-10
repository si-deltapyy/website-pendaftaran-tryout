<?php

$curl = curl_init();

$name = $_GET['name'];
$password = $_GET['pass'];
$userName = $_GET['user'];

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.fonnte.com/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
'target' => '6285742770972',
'message' => '
Halo, '.$name.' !!

Terima Kasih telah mendaftar di Try Out SNBT GABUS yang diadakan oleh GENIUS UNS. Kami lampirkan Username dan Password anda.

Username : '.$userName.'
Password : '.$password.'

Mohon disimpan dengan baik.
Jika ada kendala bisa hubungi admin di uns.id/Admin-Gabus.

Regrads, Gabus 2024
', 
'countryCode' => '62', //optional
),
  CURLOPT_HTTPHEADER => array(
    'Authorization: +wzY5Hh1Q5GCt#KF7tkP' //change TOKEN to your actual token
  ),
));

$response = curl_exec($curl);
if (curl_errno($curl)) {
  $error_msg = curl_error($curl);
}
curl_close($curl);

if (isset($error_msg)) {
 echo $error_msg;
}
echo $response;
echo '<script>window.location="confirm.html"</script>';