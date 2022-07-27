<?php
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

/**
 * Class CTPaymentAttributes
 * @package Fatchip\FCSPayment
 */
class CTPaymentAttributes
{
    /**
     * @var array
     */
    const orderAttributes = [

        'status' => [
            'type' => 'VARCHAR(255)',
        ],
        'transid' => [
            'type' => 'VARCHAR(255)',
        ],
        'payid' => [
            'type' => 'VARCHAR(255)',
        ],
        'xid' => [
            'type' => 'VARCHAR(255)',
        ],
        'klarnainvno' => [
            'type' => 'VARCHAR(30)',
        ],
        'shipcaptured' => [
            'type' => 'float',
            'additionalInfo' =>
                ['label' => 'Versandkosten bisher eingezogen:',
                    'helpText' => '',
                    'displayInBackend' => true,
                ]
        ],
        'shipdebit' => [
            'type' => 'float',
            'additionalInfo' =>
                ['label' => 'Versandkosten bisher gutgeschrieben:',
                    'helpText' => '',
                    'displayInBackend' => true,
                ]
        ],
        'kreditkartepseudonummer' => [
            'type' => 'VARCHAR(20)',
        ],
        'kreditkartebrand' => [
            'type' => 'VARCHAR(25)',
        ],
        'kreditkarteexpiry' => [
            'type' => 'VARCHAR(6)',
        ],
        'paypalbillingagreementid' => [
            'type' => 'VARCHAR(19)',
        ],
        'lastschriftmandateid' => [
            'type' => 'VARCHAR(40)',
        ],
        'lastschriftdos' => [
            'type' => 'VARCHAR(10)',
        ],
        'kreditkarteschemereferenceid' => [
            'type' => 'VARCHAR(255)',
        ],
        'kreditkartecardholdername' => [
            'type' => 'VARCHAR(255)',
        ],
    ];

    /**
     * @var array
     */
    const orderDetailsAttributes = [

        'paymentstatus' => [
            'type' => 'VARCHAR(255)',
        ],
        'shipmentdate' => [
            'type' => 'DATE',
        ],
        'captured' => [
            'type' => 'float',
        ],
        'debit' => [
            'type' => 'float',
        ]
    ];

    /**
     * $attributeName => [ 'type' => 'MYSQL_TYPE']
     * @var array
     */
    const userAddressAttributes = [

        'crifresult' => [
            'type' => 'VARCHAR(255)',
        ],
        'crifdate' => [
            'type' => 'DATE',
        ],
        'crifstatus' => [
            'type' => 'float',
        ],
        'crifdescription' => [
            'type' => 'VARCHAR(255)',
        ]
    ];

    const userAttributes = [
        'SocialSecurityNumber' => [
            'type' => 'VARCHAR(12)',
        ],
        'AnnualSalary' => [
            'type' => 'float',
        ],
        'lastschriftbank' => [
            'type' => 'VARCHAR(20)'
        ],
        'lastschriftaccowner' => [
            'type' => 'VARCHAR(50)'
        ],
        'lastschriftiban' => [
            'type' => 'VARCHAR(50)'
        ],
        'afterpayinstallmentiban' => [
            'type' => 'VARCHAR(50)'
        ],
        'creditcardinitialpaymentsuccess' => [
            'type' => 'TINYINT(1)'
        ],

    ];
}
