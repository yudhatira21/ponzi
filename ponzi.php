<?php
include 'curl.php';




function register() {
	$date = date('Y-md');
	$tgl = explode('-', $date);
	$fake_name = curl('https://fakenametool.net/generator/random/id_ID/indonesia', null, null, false);
	preg_match_all('/<td>(.*?)<\/td>/s', $fake_name, $result);
	$name = $result[1][0];
	$user = explode(' ', $name);
	$alamat = $result[1][2];
	$base = ['0878', '0813', '0838', '0851', '0853'];
	$rand_base = array_rand($base);
	$number = $base[$rand_base].number(7);
	$domain = ['carpin.org', 'novaemail.com'];
	$rand = array_rand($domain);
	$email = str_replace(' ', '', strtolower($name)).number(2).'@'.$domain[$rand];
	$username = explode('@', $email);
	$password = random(8);

	$url = 'https://pabriksuper.com/login_register.html';

	$headers = [
		'Host: pabriksuper.com',
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/118.0',
		'Accept: application/json, text/javascript, */*; q=0.01',
		'Accept-Language: en-US,en;q=0.5',
		'Accept-Encoding: gzip, deflate',
		'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
		'X-Requested-With: XMLHttpRequest',
		'Origin: https://pabriksuper.com',
		'Connection: close',
		'Referer: https://pabriksuper.com/login_register.html?c=3TI2G0',
		'Sec-Fetch-Dest: empty',
		'Sec-Fetch-Mode: cors',
		'Sec-Fetch-Site: same-origin',
	];

	$page = curl($url, 'POST', 'mobile_prefix=+62&mobile='.$number.'&password='.$password.'&password1='.$password.'&invitation=3TI2G0', $headers, false);


	if (stripos($page, 'login berhasil')) {
		echo "Success\n";
	} else {
		echo "proxy die\n";
	}
}

while(true) {
	register();
}

