<?php

namespace AppBundle\Controller;

use AppBundle\Utils\ApiInterface;
use AppBundle\Utils\RestApiInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/Dictionary")
 */
class DictionaryController extends Controller
{
    /**
     * @Route("/GetCityList")
     */
    public function GetCityList(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * @Route("/UpdateCity/City/{city}")
     */
    public function UpdateCity(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * @Route("/CreateCity/")
     */
    public function CreateCity(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * @Route("/GetVoivodeshipList")
     */
    public function GetVoivodeshipList(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * @Route("/UpdateVoivodeship/Voivodeship/{city}")
     */
    public function UpdateVoivodeship(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * @Route("/CreateVoivodeship/")
     */
    public function CreateVoivodeship(Request $request)
    {
        return $this->apiConnector('....');
    }




    private function apiConnector($url, $response = true)
    {
        $restAPI = new RestApiInterface();
        $restAPI->setUrl($url);
        $restAPI->setApiKey($this->getParameter('rest_api_agent_key'));
        $restAPI->rawApiConnector();

        if (!$response) {
            return $restAPI->getHttpResponse();
        }

        if ($restAPI->getHttpCode() == 200) {
            $response = new Response();
            $response->headers->set('Access-Control-Allow-Origin', $this->getParameter('ajax_allow_domain'));
            $response->send();

            return new JsonResponse(json_decode($restAPI->getHttpResponse()));
        } else {
            $response = new Response();
            $response->headers->set('Access-Control-Allow-Origin', $this->getParameter('ajax_allow_domain'));
            $response->send();

            return new JsonResponse(array("error" => $restAPI->getHttpCode()));
        }
    }

    private function urlDecoder($data) {
        $decoder = new ApiInterface();
        return $decoder->decryptUrlValue($data);
    }
}
