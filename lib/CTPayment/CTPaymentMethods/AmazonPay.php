<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

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
 * @subpackage CTPaymentMethods
 * @author     FATCHIP GmbH <support@fatchip.de>
 * @copyright  2018 Computop
 * @license    <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link       https://www.computop.com
 */
namespace Fatchip\CTPayment\CTPaymentMethods;

use Fatchip\CTPayment\CTPaymentMethod;

/**
 * Class AmazonPay
 * @package Fatchip\CTPayment\CTPaymentMethods
 */
class AmazonPay extends CTPaymentMethod
{
    const paymentClass = 'AmazonPay';

    /**
     * returns PaymentURL
     * @return string
     */
    public function getCTPaymentURL()
    {
        return 'https://www.computop-paygate.com/AmazonAPA.aspx';
    }

    /**
     * sets and returns request parameters for amazon
     * "LOGON" api call
     *
     * @param $transID
     * @param $accessToken
     * @param $tokenType
     * @param $expiry
     * @param $scope
     * @param $countryCode
     * @param $urlNotify
     * @return array
     */
    public function getAmazonLGNParams($transID, $accessToken, $tokenType, $expiry, $scope, $countryCode, $urlNotify)
    {
        $params = [
            'merchantID' => $this->merchantID,
            'transID' => $transID,
            'CountryCode' => $countryCode,
            'URLNotify' => $urlNotify,
            'AccessToken' => $accessToken,
            'TokenType' => $tokenType,
            'Expiry' => $expiry,
            'Scope' => $scope,
            'EventToken' => 'LGN',
        ];

        return $params;
    }

    /**
     * sets and returns request parameters for amazon
     * "Set Order Details" api call
     *
     * @param $payID
     * @param $transID
     * @param $amount
     * @param $currency
     * @param $orderDesc
     * @param $referenceID
     * @return array
     */
    public function getAmazonSODParams($payID, $transID, $amount, $currency, $orderDesc, $referenceID)
    {
        $params = [
            'payID' => $payID,
            'merchantID' => $this->merchantID,
            'transID' => $transID,
            'amount' => $amount,
            'currency' => $currency,
            'OrderDesc' => $orderDesc,
            'OrderReferenceID' => $referenceID,
            'EventToken' => 'SOD',
        ];

        return $params;
    }

    /**
     * sets and returns request parameters for amazon
     * "Get Order Details" api call
     *
     * @param $payID
     * @param $orderDesc
     * @param $referenceID
     * @return array
     */
    public function getAmazonGODParams($payID, $orderDesc, $referenceID)
    {
        $params = [
            'payID' => $payID,
            'merchantID' => $this->merchantID,
            'OrderDesc' => $orderDesc,
            'OrderReferenceID' => $referenceID,
            'EventToken' => 'GOD',
        ];

        return $params;
    }

    /**
     * sets and returns request parameters for amazon
     * "Set Order Details and Confirm Order" api call
     *
     * @param $payID
     * @param $transID
     * @param $amount
     * @param $currency
     * @param $orderDesc
     * @param $referenceID
     * @return array
     */
    public function getAmazonSCOParams($payID, $transID, $amount, $currency, $orderDesc, $referenceID)
    {
        $router = Shopware()->Front()->Router();
        $successurl = $router->assemble(array('controller' => 'FatchipCTAmazon', 'action' => 'gateway',
            'forceSecure' => true, 'appendSession' => false));
        $errorurl = $router->assemble(array('controller' => 'checkout', 'action' => 'cart',
            'amznLogout' => true, 'forceSecure' => true, 'appendSession' => false, 'amznError' => 'SCO'));

        $params = [
            'payID' => $payID,
            'merchantID' => $this->merchantID,
            'transID' => $transID,
            'amount' => $amount,
            'currency' => $currency,
            'OrderDesc' => $orderDesc,
            'OrderReferenceID' => $referenceID,
            'URLSuccess' => $successurl,
            'URLFailure' => $errorurl,
            'EventToken' => 'SCO',
        ];

        return $params;
    }

    /**
     * sets and returns request parameters for amazon
     * "ATH" api call
     *
     * @param $payID
     * @param $transID
     * @param $amount
     * @param $currency
     * @param $referenceID
     * @param $orderDesc
     * @return array
     */
    public function getAmazonATHParams($payID, $transID, $amount, $currency, $referenceID, $orderDesc)
    {
        $params = [
            'payID' => $payID,
            'merchantID' => $this->merchantID,
            'transID' => $transID,
            'amount' => $amount,
            'currency' => $currency,
            'OrderDesc' => $orderDesc,
            'OrderReferenceID' => $referenceID,
            'EventToken' => 'ATH',
            'Capture' => $this->config['amazonCaptureType'],
        ];

        return $params;
    }
}
