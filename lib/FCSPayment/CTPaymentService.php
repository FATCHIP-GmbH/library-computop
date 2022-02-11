<?php /** @noinspection PhpUnused */

/**
 * The First Cash Solution Shopware Plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * The First Cash Solution Shopware Plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with First Cash Solution Shopware Plugin. If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5.6, 7 , 7.1
 *
 * @category  Payment
 * @package   First Cash Solution_Shopware5_Plugin
 * @author    FATCHIP GmbH <support@fatchip.de>
 * @copyright 2018 First Cash Solution
 * @license   <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link      https://www.computop.com
 */

namespace Fatchip\FCSPayment;

use Fatchip\FCSPayment\CTCrif\CRIF;
use Fatchip\FCSPayment\CTPaymentMethodsIframe\Sofort;


/**
 * Class CTPaymentService
 * @package Fatchip\FCSPayment
 */
class CTPaymentService extends Blowfish
{
    /**
     * CTPaymentService constructor
     * @param $config
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
     * @param $className
     * @param $config
     * @param null $ctOrder
     * @param null $urlSuccess
     * @param null $urlFailure
     * @param null $urlNotify
     * @param null $orderDesc
     * @param null $userData
     * @param null $eventToken
     * @param null $isFirm
     * @param null $klarnainvoice
     * @return CTPaymentMethodIframe
     */
    public function getIframePaymentClass($className, $config, $ctOrder = null, $urlSuccess = null, $urlFailure = null, $urlNotify = null, $orderDesc = null, $userData = null, $eventToken = null, $isFirm = null, $klarnainvoice = null)
    {
        //Lastschrift is an abstract class and cannot be instantiated directly
        if ($className == 'Lastschrift') {
            if ($config['lastschriftDienst'] == 'EVO') {
                $className = 'LastschriftEVO';
            } else if ($config['lastschriftDienst'] == 'DIREKT') {
                $className = 'LastschriftDirekt';
            } else if ($config['lastschriftDienst'] == 'INTERCARD') {
                $className = 'LastschriftInterCard';
            }
        }

        $class = 'Fatchip\\FCSPayment\\CTPaymentMethodsIframe\\' . $className;
        return new $class($config, $ctOrder, $urlSuccess, $urlFailure, $urlNotify, $orderDesc, $userData, $eventToken, $isFirm, $klarnainvoice);
    }

    /**
     * @param $className
     * @return CTPaymentMethod
     */
    public function getPaymentClass($className)
    {
        $class = 'Fatchip\\FCSPayment\\CTPaymentMethods\\' . $className;
        return new $class();
    }

    /**
     * @param $config
     * @param $order
     * @param $orderDesc
     * @param $userData
     * @return CRIF
     */
    public function getCRIFClass($config, $order, $orderDesc, $userData)
    {
        return new CRIF($config, $order, $orderDesc, $userData);
    }

    /**
     * @return CTPaymentConfigForms
     */
    public function getPaymentConfigForms()
    {
        return new CTPaymentConfigForms();
    }

    /**
     * @param array $rawRequest
     * @return CTResponse
     */
    public function getDecryptedResponse(array $rawRequest)
    {
        $decryptedRequest = $this->ctDecrypt($rawRequest['Data'], $rawRequest['Len'], $this->blowfishPassword);
        $requestArray = $this->ctSplit(explode('&', $decryptedRequest), '=');
        // uncomment below to inject schemeReferenceID into First Cash Solution Responses for testing
        // $requestArray['schemeReferenceID'] = 'schemeReferenceID_' . date('Y-m-d H-i-s');
        $response = new CTResponse($requestArray);
        return $response;
    }

    /**
     * returns an array of paymentMethods
     * @return array
     */
    public function getPaymentMethods()
    {
        return CTPaymentMethods::paymentMethods;
    }
}
