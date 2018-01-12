<?php

namespace Fatchip\CTPayment\CTPaymentMethodsIframe;

use Fatchip\CTPayment\CTAddress\CTAddress;
use Fatchip\CTPayment\CTPaymentMethodIframe;

class Klarna extends CTPaymentMethodIframe
{
    /**
     * Für Privatpersonen optional, für Unternehmen Pflicht, z.B. Kontaktperson für den Kauf.
     * Über diesen Parameter können Mitteilungen und wichtige Informationen an den Kunden
     * auf der Rechnung mitgegeben werden.
     *
     * @var string
     */
    protected $Reference;

    /**
     * Telefonnummer des Käufers. Pflicht, wenn der Parameter mobileNr nicht mitge-geben wird
     *
     * @var string
     */
    protected $Phone;

    //Billingaddress
    /**
     * Bei Privatperson Pflicht: Vorname des Kunden Unternehmen: Darf nicht übergeben werden!
     *
     * @var string
     */
    protected $bdFirstName;

    /**
     * Bei Privatperson Pflicht: Nachname Unternehmen: Name des Unternehmens
     *
     * @var string
     */
    protected $bdLastName;

    /**
     * Straßenname in der Rechnungsadresse
     *
     * @var string
     */
    protected $bdStreet;

    /**
     * Hausnummer in der Rechnungsadresse. Optional, wenn der Parameter bdCountryCode den Wert DEU oder NLD hat.
     * Andernfalls können die Straße und Hausnummer zusammen im Parameter bdStreet übergeben werden.
     *
     * @var string
     */
    protected $bdStreetNr;

    /**
     * Postleitzahl in der Rechnungsadresse
     *
     * @var string
     */
    protected $bdZip;


    /**
     * Stadt in der Rechnungsadresse
     *
     * @var string
     *
     */
    protected $bdCity;

    /**
     * Ländercode der Rechnungsadresse dreistellig gemäß ISO-3166-1.
     * Erlaubt sind derzeit Deutschland, Österreich, Niederlande, Dänemark, Schweden, Norwegen und Finnland.
     *
     * @var strung
     */
    protected $bdCountryCode;

    //Shippingaddress
    /**
     * Bei Privatperson Pflicht: Vorname des Kunden Unternehmen: Darf nicht übergeben werden!
     *
     * @var string
     */
    protected $sdFirstName;

    /**
     * Bei Privatperson Pflicht: Nachname Unternehmen: Name des Unternehmens
     *
     * @var string
     */
    protected $sdLastName;
    /**
     * @var string
     */
    protected $sdStreet; //

    /**
     * Hausnummer in der Lieferadresse. Optional, wenn der Parameter sdCount-ryCode den Wert DEU oder NLD hat.
     * Andernfalls können die Straße und Haus-nummer zusammen im Parameter sdStreet übergeben werden.
     *
     * @var string
     */
    protected $sdStreetNr;

    /**
     * Postleitzahl in der Lieferadresse
     *
     * @var string
     */
    protected $sdZip;

    /**
     * Ort in der Lieferadresse
     *
     * @var string
     */
    protected $sdCity;

    /**
     * Ländercode der Lieferadresse dreistellig gemäß ISO-3166-1.
     * rlaubt sind der-zeit Deutschland, Österreich, Niederlande, Dänemark, Schweden, Norwegen und Finnland.
     *
     * @var string
     */
    protected $sdCountryCode;

    /**
     * E-Mail-Adresse des Kunden
     *
     * @var string
     */
    protected $Email;

    /**
     * Mobiltelefonnummer des Kunden. Pflicht, wenn der Parameter phone nicht mit-gegeben wird
     *
     * @var string
     */
    protected $MobileNr;

    /**
     * Privatpersonen: Geburtsdatum im Format JJJJ-MM-TT Optional, wenn socialSecurityNumber vollständig übergeben wird.
     * Unternehmen: Darf nicht übergeben werden!
     *
     * @var datetime
     */
    protected $DateOfBirth;

    /**
     * Privatpersonen: Geschlecht <f> für weiblich, <m> für männlich.
     * Pflichtparame-ter, wenn der bdCountryCode den Wert DEU, AUT oder NLD hat.
     * Optional, wenn socialSecurityNumber vollständig übergeben wird. Unternehmen: Darf nicht übergeben werden!
     *
     * @var string
     */
    protected $Gender;

    /**
     * Privatpersonen: Teil der Sozialversicherungsnummer.
     * Nicht in DE, AT und NL. Pflichtfeld in SE, FI, DK mit 4stelligem Wert (NNNN).
     * Pflichtfeld in NO mit 5stelli-gem Wert (NNNNN). Kann auch vollständig 10- oder 11stellig in folgenden Formaten
     * übergeben werden. In diesem Fall müssen die Parameter dateOfBirth und gender nicht mehr mit übergeben werden.
     * SE: YYMMDD-NNNN FI: DDMMYY-NNNN DK: DDMMYYNNNN NO: DDMMYYNNNNN Unternehmen: Handelsregisternummer
     *
     * @var string
     */
    protected $SocialSecurityNumber;

    /**
     * Jahresgehalt. Nur in DK Pflicht (Betrag in Öre), sonst optional
     *
     * @var int
     */
    protected $AnnualSalary;

    /**
     * IP-Adresse des Kunden im Format IPv4 oder IPv6
     *
     * @var string
     */
    protected $IPAddr;

    /**
     * <F> für Firmen, <P> für Personen
     *
     * @var string
     */
    protected $CompanyOrPerson;

    /**
     * Aktionscode legt Rechnungs- oder Finanzierungskauf fest.
     * <-1> ist Rechnungskauf.
     * Werte für Finanzkauf  von Laufzeiten und Monatsraten abhängig, die zwischen Klarna und Händler vereinbart wurden.
     *
     * @var int
     */
    protected $KlarnaAction;

    /**
     * Kennzeichnung der Rechnung:
     * <0> keine Kennung (Standard),
     * <2> Testrechnung,
     * <4> Postversand,
     * <8> Versand per E-Mail,
     * <16> Teilaktivierung der Rechnung,
     * <512> telefonische Transaktion,
     * <1024> PIN-Versand an Kunden
     *
     * @var string
     */
    protected $InvoiceFlag = '-1';


    public function __construct(
        $config,
        $order,
        $urlNotify,
        $orderDesc,
        $userData,
        $isCompany,
        $billingAddress,
        $shippingAddress,
        $email,
        $phone,
        $mobileNr,
        $dateOfBirth,
        $gender,
        $isFirm,
        $klarnaAction
    ) {
        parent::__construct($config, $order);
        $this->setUrlNotify($urlNotify);
        $this->setOrderDesc($orderDesc);
        $this->setUserData($userData);
        $this->setShippingAddress($shippingAddress, $isCompany);
        $this->setBillingAddress($billingAddress, $isCompany);
        $this->setEmail($email);
        $this->setIPAddr($_SERVER['REMOTE_ADDR']);
        $this->setPhone($phone);
        $this->setMobileNr($mobileNr);
        $this->setDateOfBirth($dateOfBirth);
        $this->setGender($gender);
        if ($isFirm) {
            $this->setCompanyOrPerson('F');
        } else {
            $this->setCompanyOrPerson('P');
        }
        $this->setKlarnaAction($klarnaAction);
        $this->setMandatoryFields(array('MerchantID', 'TransID', 'Amount', 'Currency', 'orderDesc',
            'bdStreet', 'bdZip', 'bdCity', 'bdCountryCode', 'sdStreet', 'sdZip', 'sdCity', 'sdCountryCode',
            'email', 'iPAddr', 'companyOrPerson', 'klarnaAction', 'invoiceFlag'));
    }

    /**
     * @param int $annualSalary
     */
    public function setAnnualSalary($annualSalary)
    {
        $this->AnnualSalary = $annualSalary;
    }

    /**
     * @return int
     */
    public function getAnnualSalary()
    {
        return $this->AnnualSalary;
    }

    /**
     * @param string $companyOrPerson
     */
    public function setCompanyOrPerson($companyOrPerson)
    {
        $this->CompanyOrPerson = $companyOrPerson;
    }

    /**
     * @return string
     */
    public function getCompanyOrPerson()
    {
        return $this->CompanyOrPerson;
    }

    /**
     * @param \Fatchip\CTPayment\CTPaymentMethodsIframe\datetime $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->DateOfBirth = $dateOfBirth;
    }

    /**
     * @return \Fatchip\CTPayment\CTPaymentMethodsIframe\datetime
     */
    public function getDateOfBirth()
    {
        return $this->DateOfBirth;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->Email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->Gender = $gender;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->Gender;
    }

    /**
     * @param string $iPAddr
     */
    public function setIPAddr($iPAddr)
    {
        $this->IPAddr = $iPAddr;
    }

    /**
     * @return string
     */
    public function getIPAddr()
    {
        return $this->IPAddr;
    }

    /**
     * @param string $invoiceFlag
     */
    public function setInvoiceFlag($invoiceFlag)
    {
        $this->InvoiceFlag = $invoiceFlag;
    }

    /**
     * @return string
     */
    public function getInvoiceFlag()
    {
        return $this->InvoiceFlag;
    }

    /**
     * @param int $klarnaAction
     */
    public function setKlarnaAction($klarnaAction)
    {
        $this->KlarnaAction = $klarnaAction;
    }

    /**
     * @return int
     */
    public function getKlarnaAction()
    {
        return $this->KlarnaAction;
    }

    /**
     * @param string $mobileNr
     */
    public function setMobileNr($mobileNr)
    {
        $this->MobileNr = $mobileNr;
    }

    /**
     * @return string
     */
    public function getMobileNr()
    {
        return $this->MobileNr;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->Phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->Reference = $reference;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->Reference;
    }

    /**
     * @param string $socialSecurityNumber
     */
    public function setSocialSecurityNumber($socialSecurityNumber)
    {
        $this->SocialSecurityNumber = $socialSecurityNumber;
    }

    /**
     * @return string
     */
    public function getSocialSecurityNumber()
    {
        return $this->SocialSecurityNumber;
    }

    /**
     * @param \Fatchip\CTPayment\CTPaymentMethodsIframe\strung $bdCountryCode
     */
    public function setBdCountryCode($bdCountryCode)
    {
        $this->bdCountryCode = $bdCountryCode;
    }

    /**
     * @return \Fatchip\CTPayment\CTPaymentMethodsIframe\strung
     */
    public function getBdCountryCode()
    {
        return $this->bdCountryCode;
    }

    /**
     * @param string $bdFirstName
     */
    public function setBdFirstName($bdFirstName)
    {
        $this->bdFirstName = $bdFirstName;
    }

    /**
     * @return string
     */
    public function getBdFirstName()
    {
        return $this->bdFirstName;
    }

    /**
     * @param string $bdLastName
     */
    public function setBdLastName($bdLastName)
    {
        $this->bdLastName = $bdLastName;
    }

    /**
     * @return string
     */
    public function getBdLastName()
    {
        return $this->bdLastName;
    }

    /**
     * @param string $bdStreet
     */
    public function setBdStreet($bdStreet)
    {
        $this->bdStreet = $bdStreet;
    }

    /**
     * @return string
     */
    public function getBdStreet()
    {
        return $this->bdStreet;
    }

    /**
     * @param string $bdStreetNr
     */
    public function setBdStreetNr($bdStreetNr)
    {
        $this->bdStreetNr = $bdStreetNr;
    }

    /**
     * @return string
     */
    public function getBdStreetNr()
    {
        return $this->bdStreetNr;
    }

    /**
     * @param string $bdZip
     */
    public function setBdZip($bdZip)
    {
        $this->bdZip = $bdZip;
    }

    /**
     * @return string
     */
    public function getBdZip()
    {
        return $this->bdZip;
    }



    /**
     * @param string $sdCity
     */
    public function setSdCity($sdCity)
    {
        $this->sdCity = $sdCity;
    }

    /**
     * @return string
     */
    public function getSdCity()
    {
        return $this->sdCity;
    }

    /**
     * @param string $sdCountryCode
     */
    public function setSdCountryCode($sdCountryCode)
    {
        $this->sdCountryCode = $sdCountryCode;
    }

    /**
     * @return string
     */
    public function getSdCountryCode()
    {
        return $this->sdCountryCode;
    }

    /**
     * @param string $sdFirstName
     */
    public function setSdFirstName($sdFirstName)
    {
        $this->sdFirstName = $sdFirstName;
    }

    /**
     * @return string
     */
    public function getSdFirstName()
    {
        return $this->sdFirstName;
    }

    /**
     * @param string $sdLastName
     */
    public function setSdLastName($sdLastName)
    {
        $this->sdLastName = $sdLastName;
    }

    /**
     * @return string
     */
    public function getSdLastName()
    {
        return $this->sdLastName;
    }

    /**
     * @param string $sdStreet
     */
    public function setSdStreet($sdStreet)
    {
        $this->sdStreet = $sdStreet;
    }

    /**
     * @return string
     */
    public function getSdStreet()
    {
        return $this->sdStreet;
    }

    /**
     * @param string $sdStreetNr
     */
    public function setSdStreetNr($sdStreetNr)
    {
        $this->sdStreetNr = $sdStreetNr;
    }

    /**
     * @return string
     */
    public function getSdStreetNr()
    {
        return $this->sdStreetNr;
    }

    /**
     * @param string $sdZip
     */
    public function setSdZip($sdZip)
    {
        $this->sdZip = $sdZip;
    }

    /**
     * @return string
     */
    public function getSdZip()
    {
        return $this->sdZip;
    }

    /**
     * @param string $bdCity
     */
    public function setBdCity($bdCity)
    {
        $this->bdCity = $bdCity;
    }

    /**
     * @return string
     */
    public function getBdCity()
    {
        return $this->bdCity;
    }




    public function setShippingAddress($shippingAddress, $isCompany = false)
    {
        if (!$isCompany) {
            $this->setSdFirstName($shippingAddress->getFirstName());
        }
        $this->setSdLastName($shippingAddress->getLastName());
        $this->setSdStreet($shippingAddress->getStreet());
        $this->setSdStreetNr($shippingAddress->getStreetNr());
        $this->setSdZip($shippingAddress->getZip());
        $this->setSdCity($shippingAddress->getCity());
        $this->setSdCountryCode($shippingAddress->getCountryCode());
    }


    public function setBillingAddress($billingAddress, $isCompany = false)
    {
        //for companies, first name must be empty
        if (!$isCompany) {
            $this->setBDFirstName($billingAddress->getFirstName());
        }
        $this->setBdLastName($billingAddress->getLastName());
        $this->setBdStreet($billingAddress->getStreet());
        $this->setBdStreetNr($billingAddress->getStreetNr());
        $this->setBdZip($billingAddress->getZip());
        $this->setBdCity($billingAddress->getCity());
        $this->setBdCountryCode($billingAddress->getCountryCode());
    }


    public function getCTPaymentURL()
    {
        return 'https://www.computop-paygate.com/Klarna.aspx';
    }

    public function getCTRefundURL()
    {
        return 'https://www.computop-paygate.com/credit.aspx';
    }

    public function getSettingsDefinitions()
    {
        return null;
    }


    /**
     * Zusätzlich können Sie per E-Mail eine Rechnung an den Endkunden versenden. Dazu rufen Sie fol-gende URL auf:
     * https://www.computop-paygate.com/KlarnaEmail.aspx
     *
     * @param $merchantID
     * @param $payID
     */
    public function sendEmailWithInvoice($merchantID, $payID)
    {
        //TODO: implementieren
    }
}
