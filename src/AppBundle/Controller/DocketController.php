<?php

namespace AppBundle\Controller;

use AppBundle\Utils\ApiInterface;
use AppBundle\Utils\RestApiInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Domain\Docket\;

/**
 * Wokandy
 *
 * @Route("/Docket")
 */
class DocketController extends Controller
{
//todo: akcje do tworzenia nowej wokandy
    /**
     * Nowa Wokanda - Formularz. Odbieram dane formularza.
     *
     * @Route("/createDocket")
     */
    public function createDocket(Request $request)
    {
        $docket = new Docket();
        $docket->setActSignature($request->get(Docket::ACT_SIGNATURE) ?? '');
        $docket->setAdditionalInvoiceData($request->get(Docket::ADDITIONAL_INVOICE_DATA) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
        $docket->set($request->get(Docket::) ?? '');
$dana=0;



        return $this->apiConnector('....');
    }






//todo: 5 akcji na podstawie pól dropdown DO WYŚWIETLENIA formularza "Dodaj Wokandę"

    /**
     * Nowa Wokanda - Formularz
     * pole: "Etap I"
     * DropdownList
     * stara baza: slownik_wokanda_etap
     *
     * @Route("/GetStageOneList")
     */
    public function GetStageOneList(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * Nowa Wokanda - Formularz
     * pole: "Rodzaj"
     * DropdownList
     * stara baza: slownik_wokanda_rodzaj
     *
     * @Route("/GetDocketTypeList")
     */
    public function GetDocketTypeList(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * Nowa Wokanda - Formularz
     * pole: "Etap II"
     * DropdownList
     * stara baza: slownik_wokanda_etap_2
     *
     * @Route("/GetStageTwoList")
     */
    public function GetStageTwoList(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * Nowa Wokanda - Formularz
     * pole: "Osoba z Wokand"
     * DropdownList
     * stara baza: uzytkownik_id_uzytkownik_uprawnienia_id
     *
     * Lista użytkowników uprawnionych. Pobierane z tabeli ManyToOne, gdzie uzytkownik_uprawnienia_id = 33
     *
     * @Route("/GetUserDocketList")
     */
    public function GetUserDocketList(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * Nowa Wokanda - Formularz
     * pole: "Etap Sprawy"
     * DropdownList
     * stara baza: slownik_wokanda_etap_sprawy
     *
     * @Route("/GetDocketStageList")
     */
    public function GetDocketStageList(Request $request)
    {
        return $this->apiConnector('....');
    }


    /**
     * @Route("/GetCourtList")
     */
    public function GetCourtList(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * @Route("/GetCourtCategories")
     */
    public function GetCourtCategories(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * @Route("/GetCourtListForCourtType/CourtType/{courtType}")
     */
    public function GetCourtListForCourtType(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * @Route("/UpdateCourt/CourtType/{courtType}")
     */
    public function UpdateCourt(Request $request)
    {
        return $this->apiConnector('....');
    }

    /**
     * @Route("/CreateCourt/CourtType/{courtType}")
     */
    public function CreateCourt(Request $request)
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

    private function urlDecoder($data)
    {
        $decoder = new ApiInterface();

        return $decoder->decryptUrlValue($data);
    }
}
