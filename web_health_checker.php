<?php
//targets of health check
$urls = array(
	//'SiteName' => 'http://example.com/site/uri',
);

$status = 0;
$errorMsg = '';
$curlUserAgent = 'WebHealthChecker version/0.1';

foreach ($urls as $siteName => $siteUrl) {
	$ch = curl_init($siteUrl);
	curl_setopt($ch,CURLOPT_USERAGENT,$curlUserAgent);
	if (curl_exec($ch)) {

		if ($info = curl_getinfo($ch)) {
			if (preg_match('/^[45]/', $info['http_code'])) {
				$status++;
				$errorMsg .= "{$siteName}({$siteUrl}) response status is {$info['http_code']}.\n";
			}
		}

	} else {
		$status++;
		$errorMsg .= "{$siteName}({$siteUrl}) is not accessible.\n";
	}
}
if (strlen($errorMsg)) {
	fputs(STDERR,$errorMsg);
}
exit($status);
