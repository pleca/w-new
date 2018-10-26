<?php

namespace AppBundle\Utils;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiInterface extends Controller
{

    private $apiToken;
    private $api_key;
    private $check_api_key;
    private $pass_key;
    private $pass_iv;

    public function __construct()
    {
        global $kernel;
        $this->api_key = $kernel->getContainer()->getParameter('api_key');
        $this->check_api_key = $kernel->getContainer()->getParameter('check_api_key');
        $this->pass_key = $kernel->getContainer()->getParameter('api_data_encoder_pass');
        $this->pass_iv = $kernel->getContainer()->getParameter('api_data_encoder_iv');
    }

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function getApiToken()
    {
        return $this->apiToken;
    }

    public function checkApiKey($key)
    {
        if (array_key_exists($key, $this->api_key)) {
            $ip = $_SERVER['REMOTE_ADDR'];
            $get_ip = explode(";", $this->api_key[$key][0]);
        }

        if ($this->check_api_key == true) {
            if (array_key_exists($key, $this->api_key) && in_array($ip, $get_ip)) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return true;
        }
    }

    public function apiKeyError()
    {
        return array("status"=>"error", "API_KEY"=>"invalid or null", "IP"=>$_SERVER['REMOTE_ADDR']);
    }

    public function encryptUrlValue($data)
    {
        return $this->base64UrlEncode(openssl_encrypt($data, 'aes-256-cbc', $this->pass_key, true, $this->pass_iv));
    }

    public function decryptUrlValue($data)
    {
        return openssl_decrypt($this->base64UrlDecode($data), 'aes-256-cbc', $this->pass_key, true, $this->pass_iv);
    }

    public function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64UrlDecode($data) {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
