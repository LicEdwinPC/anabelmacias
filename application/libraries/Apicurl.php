<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Apicurl
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function curlPost($url = '', $data, $is_json_request = false)
    {
        $curl = curl_init();
        $final_url =  $url;
        $parametros = is_array($data) && !$is_json_request  ? http_build_query($data) : json_encode($data);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $final_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_HEADER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $parametros,
        ));
        $body = curl_exec($curl);
        // extract header
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($body, 0, $headerSize);
        $header = @$this->getHeaders($header);

        // extract body
        $body = substr($body, $headerSize);
        curl_close($curl);

        if ($httpcode == 400 && isset($header) && count($header) > 0) {
            return [
                'status_code' => $httpcode,
                'data' => $header['X-Message']
            ];
        }

        return $body;
    }
    public function curlGet($url = '', $data, $is_json_request = false)
    {
        $curl = curl_init();
        $final_url =  $url;

        $parametros = is_array($data) && !$is_json_request  ? http_build_query($data) : json_encode($data);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $final_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_HEADER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => $parametros,
        ));
        $body = curl_exec($curl);
        // extract header
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($body, 0, $headerSize);
        $header = @$this->getHeaders($header);

        // extract body
        $body = substr($body, $headerSize);
        curl_close($curl);

        if ($httpcode == 400 && isset($header) && count($header) > 0) {
            return [
                'status_code' => $httpcode,
                'data' => $header['X-Message']
            ];
        }

        return $body;
    }
    function getHeaders($respHeaders)
    {
        $headers = array();
        $headerText = substr($respHeaders, 0, strpos($respHeaders, "\r\n\r\n"));


        foreach (explode("\r\n", $headerText) as $i => $line) {
            if ($i === 0) {
                $headers['http_code'] = $line;
            } else {
                list($key, $value) = explode(': ', $line);
                if ($key == 'X-Message') {
                    $headers[$key] = $value;
                }
            }
        }

        return $headers;
    }

  
}

/* End of file CurlLibrary.php */
