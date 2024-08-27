<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/*set_time_limit(0);*/
require($_SERVER['DOCUMENT_ROOT'] . '/simplehtmldom_1_9_1/simple_html_dom.php');
for ($id = 1; $id <= 2; $id++) {
    $url = "https://2ip.io/analytics/top-cms/bitrix/ru/?pageId=$id&orderBy=id&itemPerPage=100";
    /*debugFun(parse_url($url));*/
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

    $headers = [];
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
    $headers[] = 'Accept-Encoding: identity';
    $headers[] = 'Accept-Language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cache-Control: no-cache';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Host: ' . parse_url($url)['host'];
    $headers[] = 'Pragma: no-cache';
    $headers[] = 'Sec-Fetch-Dest: document';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: none';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36';
    /*debugFun($headers); die;*/

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    $html = str_get_html($result);
    $array = $html->find('table a');
    foreach ($array as $link) {
        debugFun(htmlspecialchars($link->href));
        /*file_put_contents("s.txt", $link->href . "\n", FILE_APPEND);*/
        $link->clear();
        unset($link);

    }

    $html->clear();
    unset($html);
}


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");