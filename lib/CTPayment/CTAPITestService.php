<?php
/**
 * The Computop Shopware Plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * The Computop Shopware Plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with Computop Shopware Plugin. If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5.6, 7.0 , 7.1
 *
 * @category   Payment
 * @package    FatchipCTPayment
 * @subpackage Bootstrap
 * @author     FATCHIP GmbH <support@fatchip.de>
 * @copyright  2018 Computop
 * @license    <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link       https://www.computop.com
 */

namespace Fatchip\CTPayment;

use Exception;
use Fatchip\FCSPayment\CTPaymentMethodsIframe\CreditCard;

/**
 * Class CTIdealIssuerService.
 *
 *  gets supported ideal financial institutes from the computop api
 *  as a fallback an array is returned
 */
class CTAPITestService extends Blowfish
{

    /**
     * CTIdealIssuerService constructor.
     *
     * @param $config array plugin configuration
     */
    public function __construct(
        $config
    )
    {
        $this->merchantID = $config['merchantID'];
        $this->blowfishPassword = $config['blowfishPassword'];
        $this->mac = $config['mac'];
    }

    /**
     * creates uri which will be used to download the issuers
     *
     * data fields are read from class props and encrypted
     *
     * @return string url
     * @see ctEncrypt()
     *
     * @see ctHMAC()
     */
    public function getURL()
    {
        $router = Shopware()->Front()->Router();
        mt_srand((double)microtime() * 1000000);
        $reqId = (string)mt_rand();
        $reqId .= date('yzGis');

        $testParams = array (
            'capture' => 'MANUAL',
            'msgVer' => '2.0',
            'billingAddress' => 'eyJjaXR5IjoiQmVybGluIiwiY291bnRyeSI6eyJjb3VudHJ5QTMiOiJERVUifSwiYWRkcmVzc0xpbmUxIjp7InN0cmVldCI6IkhhdXB0c3RyLiIsInN0cmVldE51bWJlciI6IjMifSwicG9zdGFsQ29kZSI6IjEwNzc5In0=',
            'shippingAddress' => 'eyJjaXR5IjoiQmVybGluIiwiY291bnRyeSI6eyJjb3VudHJ5QTMiOiJERVUifSwiYWRkcmVzc0xpbmUxIjp7InN0cmVldCI6IkhhdXB0c3RyLiIsInN0cmVldE51bWJlciI6IjMifSwicG9zdGFsQ29kZSI6IjEwNzc5In0=',
            'credentialOnFile' => 'eyJ0eXBlIjp7InVuc2NoZWR1bGVkIjoiQ0lUIn0sImluaXRpYWxQYXltZW50Ijp0cnVlfQ==',
            'Custom' => '',
            'amount' => 45995,
            'currency' => 'EUR',
            'language' => 'de',
            'userData' => 'U2hvcHdhcmUgVmVyc2lvbjogNS43LjE2IE1vZHVsIFZlcnNpb246ICUlVkVSU0lPTiUl',
            'urlSuccess' => $router->assemble(array('controller' => 'FatchipCTCreditCard', 'action' => 'success', 'forceSecure' => true, 'appendSession' => false)),
            'urlFailure' => $router->assemble(array('controller' => 'FatchipCTCreditCard', 'action' => 'success', 'forceSecure' => true, 'appendSession' => false)),
            'urlNotify' => $router->assemble(array('controller' => 'FatchipCTCreditCard', 'action' => 'success',   'forceSecure' => true, 'appendSession' => false)),
            'orderDesc' => 'Test:0000',
            'transID' => CreditCard::generateTransID(),
            'response' => 'encrypt',
            'reqID' => $reqId,
            'sdZip' => '10779',
            'EtiId' => 'Shopware Test',
        );

        $requestParams = [];
        foreach ($testParams as $key => $value) {
                $requestParams[] = "$key=" . $value;
        }

        $requestParams[] = "MAC=" . $this->ctHMAC($requestParams);

        $request = join('&', $requestParams);
        $len = mb_strlen($request);  // Length of the plain text string
        $data = $this->ctEncrypt($request, $len, $this->blowfishPassword);

        $url = 'https://www.computop-paygate.com/payssl.aspx';
        $url .=
            '?MerchantID=' . $this->merchantID .
            '&Len=' . $len .
            '&Data=' . $data;
        return $url;
    }

    /**
     * ctHMAC
     * @param $params
     * @return string
     */
    protected function ctHMAC($params)
    {
        $data = $params['payID'].'*'.$params['transID'].'*'.$this->merchantID.'*'.$params['amount'].'*'.$params['currency'];
        return hash_hmac("sha256", $data, $this->mac);
    }

    /**
     * calls computop api to get ideal financial institutes list
     *
     * @return bool
     */
    public function doAPITest()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->getUrl(),
        ));

        $resp = curl_exec($curl);

        if (FALSE === $resp) {
            throw new Exception(curl_error($curl), curl_errno($curl));
        }

        if (strpos($resp, 'Unexpected exception') !== false) {
            throw new Exception('Wrong Credentials');
            return false;
        } else {
            return true;
        }
        return false;
    }
}
