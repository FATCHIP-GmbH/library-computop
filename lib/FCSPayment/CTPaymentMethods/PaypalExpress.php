<?php
/** @noinspection PhpUnused */

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
 * PHP version 5.6, 7.0 , 7.1
 *
 * @category   Payment
 * @package    FatchipFCSPayment
 * @subpackage CTPaymentMethods
 * @author     FATCHIP GmbH <support@fatchip.de>
 * @copyright  2018 First Cash Solution
 * @license    <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link       https://www.computop.com
 */
namespace Fatchip\FCSPayment\CTPaymentMethods;

use Fatchip\FCSPayment\CTPaymentMethod;

/**
 * Class PaypalExpress
 * @package Fatchip\FCSPayment\CTPaymentMethods
 */
class PaypalExpress extends CTPaymentMethod
{
    const paymentClass = 'PaypalExpress';

    /**
     * returns PaymentURL
     * @return string
     */
    public function getCTPaymentURL()
    {
        return 'https://www.computop-paygate.com/paypalComplete.aspx';
    }

    /**
     * @param $payID
     * @param $transID
     * @param $amount
     * @param $currency
     * @return array
     */
    public function getPaypalExpressCompleteParams($payID, $transID, $amount, $currency)
    {
        $params = [
            'PayID' => $payID,
            'MerchantID' => $this->merchantID,
            'TransID' => $transID,
            'Amount' => $amount,
            'Currency' => $currency,
        ];

        return $params;
    }
}
