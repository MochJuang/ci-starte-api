<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


function getservice(
    $metode = 'GET',
    $uri = '',
    
    $params = '',
    $body = []
    ) {
    $ci = &get_instance();
    $header = [];
    if ($ci->session->has_userdata('token-absen')) {
        $header['token'] = $ci->session->userdata('token-absen');
    }

    $body['headers'] = $header;
    try {
        $client = new GuzzleHttp\Client([
            'base_uri' => SERVICE_URL_LOCAL,
            'verify'          => false,
        ]);
        $request = $client->request($metode, $uri . $params, $body);
        $response = $request->getBody();
        return json_decode($response);
    }catch (RequestException $e) {
        $data = (string) $e->getResponse()->getBody();
        return json_decode($data);
    }
}