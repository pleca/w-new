<?php

namespace AppBundle\Domain\Docket;


use AppBundle\Domain\Foundation\Command\Command;

class Docket implements Command
{
    /**
     * Początek wokandy.
     */
    const DATE_START = 'DateStart';
    /**
     * Koniec wokandy.
     */
    const DATE_END = 'DateEnd';
    /**
     * Nazwa wokandy.
     */
    const DOCKET_NAME = 'DocketName';
    /**
     * Rodzaj wokandy.
     */
    const DOCKET_TYPE_ID = 'DocketTypeId';
    /**
     * Osoba prowadząca wokandę.
     */
    const DOCKET_OWNER_ID = 'DocketOwnerId';
    /**
     * Etap I Id.
     */
    const DOCKET_STAGE_ONE_ID = 'DocketStageOneId';
    /**
     * Etap II Id.
     */
    const DOCKET_STAGE_TWO_ID = 'DocketStageTwoId';
    /**
     * Etap wokandy Id.
     */
    const DOCKET_STAGE_ID = 'DocketStageId';
    /**
     * Sąd Id.
     */
    const DOCKET_COURT_ID = 'DocketCourtId';
    /**
     * Sala sądu.
     */
    const COURT_ROOM = 'CourtRoom';
    /**
     * Sygnatura Akt.
     */
    const ACT_SIGNATURE = 'ActSignature';
    /**
     * Sprawa Id.
     */
    const DOCKET_CASE_ID = 'DocketCaseId';
    /**
     * potwierdzony_termin.
     */
    const CONFIRMED_DATE = 'ConfirmedDate';
    /**
     * wyslano_dokumenty.
     */
    const DOCUMENTS_SENT = 'DocumentsSent';
    /**
     * otrzymano_notatke.
     */
    const NOTE_RECEIVED = 'NoteReceived';
    /**
     * substytut_forma_platnosci_id.
     */
    const PAYMENT_TYPE_ID = 'PaymentTypeId';
    /**
     * substytut_kwota.
     */
    const AMOUNT = 'Amount';
    /**
     * substytut_pomocnik.
     */
    const HELPER = 'Helper';
    /**
     * substytut_pomocnik_mail.
     */
    const HELPER_MAIL = 'HelperMail';
    /**
     * substytut_id.
     */
    const SUBSTITUTE_ID = 'SubstituteId';
    /**
     * potwierdzony_substytut.
     */
    const SUBSTITUTE_CONFIRMED = 'SubstituteConfirmed';
    /**
     * faktura_wplynela.
     */
    const INVOICE_RECEIVED = 'InvoiceReceived';
    /**
     * faktura_oplacona.
     */
    const INVOICE_PAID = 'InvoicePaid';
    /**
     * faktura_numer.
     */
    const INVOICE_NUMBER = 'InvoiceNumber';
    /**
     * usluga_wykonana.
     */
    const SERVICE_MADE = 'ServiceMade';
    /**
     * koszt_ponosi_votum.
     */
    const COSTS_BEAR_BY_VOTUM = 'CostsBearByVotum';
    /**
     * slownik_wokanda_klient_koszty_id.
     */
    const CLIENT_COSTS_ID = 'ClientCostsId';
    /**
     * sprawa_karna.
     */
    const CRIMINAL_CASE = 'CriminalCase';
    /**
     * dodatkowe_dane_do_fv.
     */
    const ADDITIONAL_INVOICE_DATA = 'AdditionalInvoiceData';
    /**
     * sprawa_trudna.
     */
    const DIFFICULT_CASE = 'DifficultCase';
    /**
     * substytut_komentarz.
     */
    const SUBSTITUTE_COMMENT = 'SubstituteComment';

    private $dateStart;
    private $dateEnd;
    private $docketName;
    private $docketTypeId;
    private $docketOwnerId;
    private $docketStageOneId;
    private $docketStageTwoId;
    private $docketStageId;
    private $docketCourtId;
    private $courtRoom;
    private $actSignature;
    private $docketCaseId;
    private $confirmedDate;
    private $documentsSent;
    private $noteReceived;
    private $paymentTypeId;
    private $amount;
    private $helper;
    private $helperMail;
    private $substituteId;
    private $substituteConfirmed;
    private $invoiceReceived;
    private $invoicePaid;
    private $invoiceNumber;
    private $serviceMade;
    private $costsBearByVotum;
    private $clientCostsId;
    private $criminalCase;
    private $additionalInvoiceData;
    private $difficultCase;
    private $substituteComment;

    public function getDateStart()
    {
        return $this->dateStart;
    }

    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }

    public function getDocketName()
    {
        return $this->docketName;
    }

    public function setDocketName($docketName)
    {
        $this->docketName = $docketName;
    }

    public function getDocketTypeId()
    {
        return $this->docketTypeId;
    }

    public function setDocketTypeId($docketTypeId)
    {
        $this->docketTypeId = $docketTypeId;
    }

    public function getDocketOwnerId()
    {
        return $this->docketOwnerId;
    }

    public function setDocketOwnerId($docketOwnerId)
    {
        $this->docketOwnerId = $docketOwnerId;
    }

    public function getDocketStageOneId()
    {
        return $this->docketStageOneId;
    }

    public function setDocketStageOneId($docketStageOneId)
    {
        $this->docketStageOneId = $docketStageOneId;
    }

    public function getDocketStageTwoId()
    {
        return $this->docketStageTwoId;
    }

    public function setDocketStageTwoId($docketStageTwoId)
    {
        $this->docketStageTwoId = $docketStageTwoId;
    }

    public function getDocketStageId()
    {
        return $this->docketStageId;
    }

    public function setDocketStageId($docketStageId)
    {
        $this->docketStageId = $docketStageId;
    }

    public function getDocketCourtId()
    {
        return $this->docketCourtId;
    }

    public function setDocketCourtId($docketCourtId)
    {
        $this->docketCourtId = $docketCourtId;
    }

    public function getCourtRoom()
    {
        return $this->courtRoom;
    }

    public function setCourtRoom($courtRoom)
    {
        $this->courtRoom = $courtRoom;
    }

    public function getActSignature()
    {
        return $this->actSignature;
    }

    public function setActSignature($actSignature)
    {
        $this->actSignature = $actSignature;
    }

    public function getDocketCaseId()
    {
        return $this->docketCaseId;
    }

    public function setDocketCaseId($docketCaseId)
    {
        $this->docketCaseId = $docketCaseId;
    }

    public function getConfirmedDate()
    {
        return $this->confirmedDate;
    }

    public function setConfirmedDate($confirmedDate)
    {
        $this->confirmedDate = $confirmedDate;
    }

    public function getDocumentsSent()
    {
        return $this->documentsSent;
    }

    public function setDocumentsSent($documentsSent)
    {
        $this->documentsSent = $documentsSent;
    }

    public function getNoteReceived()
    {
        return $this->noteReceived;
    }

    public function setNoteReceived($noteReceived)
    {
        $this->noteReceived = $noteReceived;
    }

    public function getPaymentTypeId()
    {
        return $this->paymentTypeId;
    }

    public function setPaymentTypeId($paymentTypeId)
    {
        $this->paymentTypeId = $paymentTypeId;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getHelper()
    {
        return $this->helper;
    }

    public function setHelper($helper)
    {
        $this->helper = $helper;
    }

    public function getHelperMail()
    {
        return $this->helperMail;
    }

    public function setHelperMail($helperMail)
    {
        $this->helperMail = $helperMail;
    }

    public function getSubstituteId()
    {
        return $this->substituteId;
    }

    public function setSubstituteId($substituteId)
    {
        $this->substituteId = $substituteId;
    }

    public function getSubstituteConfirmed()
    {
        return $this->substituteConfirmed;
    }

    public function setSubstituteConfirmed($substituteConfirmed)
    {
        $this->substituteConfirmed = $substituteConfirmed;
    }

    public function getInvoiceReceived()
    {
        return $this->invoiceReceived;
    }

    public function setInvoiceReceived($invoiceReceived)
    {
        $this->invoiceReceived = $invoiceReceived;
    }

    public function getInvoicePaid()
    {
        return $this->invoicePaid;
    }

    public function setInvoicePaid($invoicePaid)
    {
        $this->invoicePaid = $invoicePaid;
    }

    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    public function getServiceMade()
    {
        return $this->serviceMade;
    }

    public function setServiceMade($serviceMade)
    {
        $this->serviceMade = $serviceMade;
    }

    public function getCostsBearByVotum()
    {
        return $this->costsBearByVotum;
    }

    public function setCostsBearByVotum($costsBearByVotum)
    {
        $this->costsBearByVotum = $costsBearByVotum;
    }

    public function getClientCostsId()
    {
        return $this->clientCostsId;
    }

    public function setClientCostsId($clientCostsId)
    {
        $this->clientCostsId = $clientCostsId;
    }

    public function getCriminalCase()
    {
        return $this->criminalCase;
    }

    public function setCriminalCase($criminalCase)
    {
        $this->criminalCase = $criminalCase;
    }

    public function getAdditionalInvoiceData()
    {
        return $this->additionalInvoiceData;
    }

    public function setAdditionalInvoiceData($additionalInvoiceData)
    {
        $this->additionalInvoiceData = $additionalInvoiceData;
    }

    public function getDifficultCase()
    {
        return $this->difficultCase;
    }

    public function setDifficultCase($difficultCase)
    {
        $this->difficultCase = $difficultCase;
    }

    public function getSubstituteComment()
    {
        return $this->substituteComment;
    }

    public function setSubstituteComment($substituteComment)
    {
        $this->substituteComment = $substituteComment;
    }


}