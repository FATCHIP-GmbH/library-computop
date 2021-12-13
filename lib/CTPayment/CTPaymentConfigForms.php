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
 * @author     FATCHIP GmbH <support@fatchip.de>
 * @copyright  2018 Computop
 * @license    <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link       https://www.computop.com
 */

namespace Fatchip\CTPayment;
/**
 * Class CTPaymentConfigForms
 * @package Fatchip\CTPayment
 */
class CTPaymentConfigForms
{
    const formGeneralTextElements =
        [
            'merchantID' => [
                'name' => 'merchantID',
                'type' => 'text',
                'value' => '',
                'label' => 'MerchantID',
                'required' => true,
                'description' => '{s name="backend/FatchipCTPayment/merchantid_desc"}Ihre Merchant Id (Benutzername){/s}',
            ],
            'mac' => [
                'name' => 'mac',
                'type' => 'text',
                'value' => '',
                'label' => 'MAC',
                'required' => true,
                'description' => 'Ihr HMAC-Key',
            ],
            'blowfishPassword' => [
                'name' => 'blowfishPassword',
                'type' => 'text',
                'value' => '',
                'label' => 'Blowfish Password',
                'required' => true,
                'description' => 'Ihr Verschlüsselungs-Passwort',
            ],
            'prefixOrdernumber' => [
                'name' => 'prefixOrdernumber',
                'type' => 'text',
                'value' => '',
                'label' => 'Bestellnummer Präfix',
                'required' => false,
                'description' => 'Präfix für Bestellnummern. Sie können folgende Platzhalter verwenden: %transid% , %payid%, %xid%',
            ],
            'suffixOrdernumber' => [
                'name' => 'suffixOrdernumber',
                'type' => 'text',
                'value' => '',
                'label' => 'Bestellnummer Suffix',
                'required' => false,
                'description' => 'Suffix für Bestellnummern. Sie können folgende Platzhalter verwenden: %transid% , %payid%, %xid%',
            ],
        ];

    const formGeneralSelectElements =
        [
            'debuglog' => [
                'name' => 'debuglog',
                'type' => 'select',
                'value' => 'inactive',
                'label' => 'Debug Protokoll',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['inactive', [
                            'de_DE' => 'keine Protokollierung',
                            'en_GB' => 'disable logging',
                            'fr_FR' => 'disable logging',
                        ]],
                        ['active', [
                            'de_DE' => 'Protokollierung',
                            'en_GB' => 'enable logging',
                            'fr_FR' => 'enable logging',
                        ]],
                    ],
                'description' => 'Erzeugt eine Log Datei <FatchipCTPayment_.log> mit Debug Ausgaben im Shopware Protokollverzeichnis.<BR>',
           ],
        ];

    const formCreditCardSelectElements =
        [
            'creditCardMode' => [
                'name' => 'creditCardMode',
                'type' => 'select',
                'value' => 'IFrame',
                'label' => 'Kreditkarte - Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['IFRAME', 'IFrame'],
                        ['SILENT', 'Silent Mode'],
                    ],
                'description' => '<b>IFrame</b>: Kreditkartendaten werden nach klick auf "Zahlungsplichtig bestellen" in ein IFrame eingegeben<BR>
                                  <b>Silent Mode</b>: Kreditkartendaten werden auf der Seite "Zahlungsart wählen" eingegeben.<BR>'
            ],
            'creditCardTestMode' => [
                'name' => 'creditCardTestMode',
                'type' => 'select',
                'value' => 1,
                'label' => 'Kreditkarte - Test-Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                [
                    [0, [
                        'de_DE' => 'inaktiv',
                        'en_GB' => 'disabled',
                        'fr_FR' => 'disabled',
                    ]],
                    [1, [
                        'de_DE' => 'aktiv',
                        'en_GB' => 'enabled',
                        'fr_FR' => 'enabled',
                    ]],
                ],
            ],
            'creditCardSilentModeBrandsVisa' => [
                'name' => 'creditCardSilentModeBrandsVisa',
                'type' => 'select',
                'value' => 1,
                'label' => 'Kreditkarte - Visa (Silent Mode)',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        [0, [
                            'de_DE' => 'inaktiv',
                            'en_GB' => 'disabled',
                            'fr_FR' => 'disabled',
                        ]],
                        [1, [
                            'de_DE' => 'aktiv',
                            'en_GB' => 'enabled',
                            'fr_FR' => 'enabled',
                        ]],
                    ],
            ],
            'creditCardSilentModeBrandsMaster' => [
                'name' => 'creditCardSilentModeBrandsMaster',
                'type' => 'select',
                'value' => 1,
                'label' => 'Kreditkarte - MasterCard (Silent Mode)',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        [0, [
                            'de_DE' => 'inaktiv',
                            'en_GB' => 'disabled',
                            'fr_FR' => 'disabled',
                        ]],
                        [1, [
                            'de_DE' => 'aktiv',
                            'en_GB' => 'enabled',
                            'fr_FR' => 'enabled',
                        ]],
                    ],
            ],
            'creditCardSilentModeBrandsAmex' => [
                'name' => 'creditCardSilentModeBrandsAmex',
                'type' => 'select',
                'value' => 1,
                'label' => 'Kreditkarte - American Express (Silent Mode)',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        [0, [
                            'de_DE' => 'inaktiv',
                            'en_GB' => 'disabled',
                            'fr_FR' => 'disabled',
                        ]],
                        [1, [
                            'de_DE' => 'aktiv',
                            'en_GB' => 'enabled',
                            'fr_FR' => 'enabled',
                        ]],
                    ],
            ],
            'creditCardCaption' => [
                'name' => 'creditCardCaption',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Kreditkarte - Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatic',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manual',
                        ]],
                    ],
                'description' => '<b>AUTO</b>: Reservierte Beträge werden sofort automatisch eingezogen.<BR>
                                  <b>MANUAL</b>: Geldeinzüge werden von Ihnen manuell im Shopbackend durchgeführt.',
            ],
            'creditCardAcquirer' => [
                'name' => 'creditCardAcquirer',
                'type' => 'select',
                'value' => 'GICC',
                'label' => 'Kreditkarte - Acquirer',
                'required' => 'true',
                'editable' => false,
                'store' =>
                    [
                        ['GICC', 'GICC'],
                        ['CAPN', 'CAPN'],
                        ['Omnipay', 'Omnipay'],
                    ],
                'description' => '<b>GICC</b>: Concardis, B+S Card Service, EVO Payments, American Express, Elavon, SIX Payment Service<BR>
                                  <b>CAPN</b>: American Express<BR>
                                  <b>Omnipay</b>: EMS payment solutions, Global Payments, Paysquare',
            ],
            'creditCardAccVerify' => [
                'name' => 'creditCardAccVerify',
                'type' => 'select',
                'value' => 0,
                'label' => 'Kreditkarte - Kontoverifizierung anfordern ',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        [0, [
                            'de_DE' => 'inaktiv',
                            'en_GB' => 'disabled',
                            'fr_FR' => 'disabled',
                        ]],
                        [1, [
                            'de_DE' => 'aktiv',
                            'en_GB' => 'enabled',
                            'fr_FR' => 'enabled',
                        ]],
                    ],
                'description' => 'Indikator für Anforderung einer Kontoverifizierung (alias Nullwert-Authorisierung). <BR>
                                  Bei einer angeforderten Kontoverifizierung ist der übermittelte Betrag optional und <BR>
                                  wird für die tatsächliche Zahlungstransaktion ignoriert (z.B. Autorisierung).',
            ],
        ];

    const formCreditCardNumberElements =
        [
        ];

    const formCreditCardTextElements =
        [
            'creditCardTemplate' => [
                'name' => 'creditCardTemplate',
                'type' => 'text',
                'value' => 'ct_responsive_ch',
                'label' => 'Kreditkarte - Template Name',
                'required' => false,
                'description' => 'Name der XSLT-Datei mit Ihrem individuellen Layout für das Bezahlformular. Wenn Sie das neugestaltete und abwärtskompatible Computop-Template nutzen möchten, übergeben Sie den Templatenamen „ct_compatible“. Wenn Sie das Responsive Computop-Template für mobile Endgeräte nutzen möchten, übergeben Sie den Templatenamen „ct_responsive“ oder "ct_responsive_ch".',
            ],
        ];

    const formIdealSelectElements =
        [
            'idealDirektOderUeberSofort' => [
                'name' => 'idealDirektOderUeberSofort',
                'type' => 'select',
                'value' => 'DIREKT',
                'label' => 'iDEAL - Dienst',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['DIREKT', 'iDEAL Direkt'],
                        ['PPRO', 'via PPRO'],
                    ],
                'description' => 'Ideal Zahlungen können direkt über Ideal oder über PPRO abgewickelt werden',
            ],
        ];


    const formLastschriftSelectElements =
        [
            'lastschriftDienst' => [
                'name' => 'lastschriftDienst',
                'type' => 'select',
                'value' => 'DIREKT',
                'label' => 'Lastschrift - Dienst',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['DIREKT', [
                            'de_DE' => 'Direktanbindung',
                            'en_GB' => 'direct',
                            'fr_FR' => 'direct',
                        ]],
                        ['EVO', [
                            'de_DE' => 'EVO Payments',
                            'en_GB' => 'EVO Payments',
                            'fr_FR' => 'EVO Payments',
                        ]],
                        ['INTERCARD', [
                            'de_DE' => 'Intercard',
                            'en_GB' => 'Intercard',
                            'fr_FR' => 'Intercard',
                        ]],
                    ],
                'description' => 'Lastschrift Zahlungen können direkt, über EVO oder über INTERCARD abgewickelt werden.',
            ],
            'lastschriftCaption' => [
                'name' => 'lastschriftCaption',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Lastschrift - Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatic',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manual',
                        ]],
                    ],
                'description' => '<b>AUTO</b>: Reservierte Beträge werden sofort automatisch eingezogen.<BR>
                            <b>MANUAL</b>: Geldeinzüge werden von Ihnen manuell im Shopbackend durchgeführt.',
            ],
            'lastschriftAnon' => [
                'name' => 'lastschriftAnon',
                'type' => 'select',
                'value' => 'Aus',
                'label' => 'Iban anonymisieren',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['Aus', [
                            'de_DE' => 'Aus',
                            'en_GB' => 'off',
                            'fr_FR' => 'off',
                        ]],
                        ['An', [
                            'de_DE' => 'An',
                            'en_GB' => 'an',
                            'fr_FR' => 'on',
                        ]],
                    ],
                'description' => 'Stellt im Checkout und im Mein Konto Bereich die Iban anonymisiert dar',
            ],
        ];

    const formLastschriftNumberElements =
        [
        ];

    const formPayDirektTextElements =
        [
            'payDirektShopApiKey' => [
                'name' => 'payDirektShopApiKey',
                'type' => 'text',
                'value' => '',
                'label' => 'Paydirekt - Shop Api Key',
                'required' => false,
                'description' => 'Ihr Paydirekt Api Schlüssel',
            ],
        ];

    const formPayDirektSelectElements =
        [
            'payDirektCaption' => [
                'name' => 'payDirektCaption',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Paydirekt - Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatic',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manual',
                        ]],
                    ],
                'description' => '<b>AUTO</b>: Reservierte Beträge werden sofort automatisch eingezogen.<BR>
                                  <b>MANUAL</b>: Geldeinzüge werden von Ihnen manuell im Shopbackend durchgeführt.',
            ],
        ];

    const formPayDirektNumberElements =
        [
        ];

    const formPayPalSelectElements =
        [
            'paypalCaption' => [
                'name' => 'paypalCaption',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Paypal - Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatic',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manual',
                        ]],
                    ],
                'description' => 'bestimmt, ob der angefragte Betrag sofort oder erst später eingezogen wird. <br>
                                  <b>Wichtig:<br>Bitte kontaktieren Sie den Computop Support für Manual, um die unterschiedlichen Einsatzmöglichkeiten abzuklären.</b>',
            ],
            'paypalSetOrderStatus' => [
                'name' => 'paypalSetOrderStatus',
                'type' => 'select',
                'value' => 'Aus',
                'label' => 'Paypal - Bestellstatus bei Capture',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['Aus', [
                            'de_DE' => 'Aus',
                            'en_GB' => 'off',
                            'fr_FR' => 'off',
                        ]],
                        ['An', [
                            'de_DE' => 'An',
                            'en_GB' => 'an',
                            'fr_FR' => 'on',
                        ]],
                    ],
                'description' => 'Wenn diese Option An ist, dann wird der Bestellstatus bei Paypal Bestellungen,<br>bei denen der Capture fehlschlägt, auf "Klärung notwendig" gesetzt"  <br>',
            ],
        ];

    const formAmazonTextElements =
        [
            'amazonSellerId' => [
                'name' => 'amazonSellerId',
                'type' => 'text',
                'value' => '',
                'label' => 'AmazonPay - SellerId',
                'required' => false,
                'description' => 'Ihre Amazonpay SellerId',
            ],
            'amazonClientId' => [
                'name' => 'amazonClientId',
                'type' => 'text',
                'value' => '',
                'label' => 'AmazonPay - ClientId',
                'required' => false,
                'description' => 'Ihre Amazonpay ClientId',
            ],

        ];

    const formAmazonSelectElements =
        [
            'amazonLiveMode' => [
                'name' => 'amazonLiveMode',
                'type' => 'select',
                'value' => 'Test',
                'label' => 'Amazon Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['Live', 'Live'],
                        ['Test', 'Test'],
                    ],
                'description' => 'AmazonPay im Live oder Testmodus benutzen',
            ],
            'amazonCaptureType' => [
                'name' => 'amazonCaptureType',
                'type' => 'select',
                'value' => 'AUTO',
                'label' => 'Amazon Capture Modus',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['AUTO', [
                            'de_DE' => 'Automatisch',
                            'en_GB' => 'automatic',
                            'fr_FR' => 'automatic',
                        ]],
                        ['MANUAL', [
                            'de_DE' => 'Manuell',
                            'en_GB' => 'manual',
                            'fr_FR' => 'manual',
                        ]],
                    ],
                'description' => '<b>Automatisch</b>: Reservierte Beträge werden automatisch eingezogen.<BR>
                                  <b>Manuell</b>: Geldeinzüge werden von Ihnen manuell im Shopbackend durchgeführt.',
            ],
            'amazonButtonType' => [
                'name' => 'amazonButtonType',
                'type' => 'select',
                'value' => 'PwA',
                'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_TYPE_PARAMETER" target="_blank">AmazonPay - Button Typ</a>',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['PwA', 'Amazon Pay (Default)'],
                        ['Pay', 'Pay'],
                        ['A', 'A'],
                        ['LwA', 'LwA'],
                        ['Login', 'Login'],
                    ],
                'description' => 'Typ des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Typ"',
            ],
            'amazonButtonColor' => [
                'name' => 'amazonButtonColor',
                'type' => 'select',
                'value' => 'Gold',
                'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_COLOR_PARAMETER" target="_blank">AmazonPay - Button Farbe</a>',
                'required' => 'true',
                'editable' => false,
                'store' =>
                    [
                        ['Gold', 'Gold'],
                        ['LightGray', 'LightGray'],
                        ['DarkGray', 'DarkGray'],
                    ],
                'description' => 'Farbe des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Farbe"',
            ],
            'amazonButtonSize' => [
                'name' => 'amazonButtonSize',
                'type' => 'select',
                'value' => 'medium',
                'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_SIZE_PARAMETER" target="_blank">AmazonPay - Button Größe</a>',
                'required' => 'true',
                'editable' => false,
                'store' =>
                    [
                        ['small', [
                            'de_DE' => 'klein',
                            'en_GB' => 'small',
                            'fr_FR' => 'small',
                        ]],
                        ['medium', [
                            'de_DE' => 'mittel',
                            'en_GB' => 'medium',
                            'fr_FR' => 'medium',
                        ]],
                    ],
                'description' => 'Größe des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Größe"',
            ],
        ];

    const formBonitaetElements =
        [
            'bonitaetusereturnaddress' => [
                'name' => 'bonitaetusereturnaddress',
                'type' => 'boolean',
                'value' => false,
                'label' => 'Bonitätsprüfung - Zurückgelieferte Adressdaten verwenden',
                'required' => false,
                'description' => 'Ersetzt die Rechnungsaddresse mit u.U. korrigierten Adressen aus der Bonitätsprüfung',
            ],
            'bonitaetinvalidateafterdays' => [
                'name' => 'bonitaetinvalidateafterdays',
                'type' => 'number',
                'value' => '30',
                'label' => 'Bonitätsprüfung - Gültigkeit der Bonitätsprüfung in Tagen',
                'required' => false,
                'description' => 'Stellen Sie hier ein, wie lange ein bereits durchgeführte Bontitätsprüfung gültig bleibt',
            ],
        ];

    const formBonitaetSelectElements =
        [
            'crifmethod' => [
                'name' => 'crifmethod',
                'type' => 'select',
                'value' => 'inactive',
                'label' => 'CRIF Bonitätsprüfung',
                'required' => false,
                'editable' => false,
                'store' =>
                    [
                        ['inactive', [
                            'de_DE' => 'Inaktiv',
                            'en_GB' => 'inactive',
                            'fr_FR' => 'inactive',
                        ]],
                        ['QuickCheck', [
                            'de_DE' => 'QuickCheck',
                            'en_GB' => 'quick check',
                            'fr_FR' => 'quick check',
                        ]],
                        ['CreditCheck', [
                            'de_DE' => 'Kredit Check',
                            'en_GB' => 'Creditcard check',
                            'fr_FR' => 'CreditCheck',
                        ]],
                    ],
                'description' => 'führt eine Bonitätsprüfung aus, bevor ein Benutzer Zahlarten auswählen kann.<BR>
                                  Erstellen Sie unter "Einstellungen->Riskmanagement" Regeln mit den Bedingungen<BR>
                                  "Computop Risikoampel IST <Farbe>"<BR>und<BR>
                                  "Computop Risikoampel IST NICHT <Farbe>"<BR>',
            ],
        ];

    const formKlarnaTextElements =
        [
            'klarnaaction' => [
                'name' => 'klarnaaction',
                'type' => 'text',
                'value' => '',
                'label' => 'Klarna Aktionscode',
                'required' => false,
                'description' => 'Der Wert ist von Laufzeiten und Monatsraten abhängig, die Sie mit Klarna vereinbart haben. Dieser Wert kann per Subshop unterschiedlich sein.',
            ],
            'klarnaaccount' => [
                'name' => 'klarnaaccount',
                'type' => 'text',
                'value' => '',
                'label' => 'Klarna Konto',
                'required' => false,
                'description' => 'Das zu benutzende Klarna Konto. <br/><br/>
    
            <b>Die verfügbaren Klarna-Zahlungsarten in Abhängigkeit von der Konfiguration bei Klarna </b><br/>
            Wenn <u>Klarna PayNow</u> aktiviert ist, dann können <u>Klarna Lastschrift</u> und <u>Klarna Sofort</u> nicht aktiviert werden<br/>
    
            Wenn <u>Klarna Lastschrift</u> und/oder <u>Klarna Sofort</u> aktiv ist, dann kann <u>Klarna PayNow</u> nicht aktiviert werden',
            ],
        ];

    const formTranslations =
        [
            'de_DE' => [
                'merchantID' => [
                    'label' => 'MerchantID',
                    'description' => 'Ihre MerchantID',
                ],
                'mac' => [
                    'label' => 'MAC',
                    'description' => 'Ihr HMAC-Key',
                ],
                'blowfishPassword' => [
                    'label' => 'Blowfish Password',
                    'description' => 'Ihr Verschlüsselungs-Passwort',
                ],
                'prefixOrdernumber' => [
                    'label' => 'Bestellnummer Präfix',
                    'description' => 'Präfix für Bestellnummern. Sie können folgende Platzhalter verwenden: %transid% , %payid%, %xid%',
                ],
                'suffixOrdernumber' => [
                    'label' => 'Bestellnummer Suffix',
                    'description' => 'Suffix für Bestellnummern. Sie können folgende Platzhalter verwenden: %transid% , %payid%, %xid%',
                ],
                'debuglog' => [
                    'label' => 'Debug Protokoll',
                    'description' => 'Erzeugt eine Log Datei <FatchipCTPayment_.log> mit Debug Ausgaben im Shopware Protokollverzeichnis',
                ],
                'creditCardMode' => [
                    'label' => 'Kreditkarte - Modus',
                    'description' => '<b>IFrame</b>: Kreditkartendaten werden nach klick auf "Zahlungsplichtig bestellen" in ein IFrame eingegeben<BR>
                                  <b>Silent Mode</b>: Kreditkartendaten werden auf der Seite "Zahlungsart wählen" eingegeben.<BR>',
                ],
                'creditCardTestMode' => [
                    'label' => 'Kreditkarte - Test-Modus',
                    'description' => '<b>IFrame</b>: Kreditkartendaten werden nach klick auf "Zahlungsplichtig bestellen" in ein IFrame eingegeben<BR>
                                  <b>Silent Mode</b>: Kreditkartendaten werden auf der Seite "Zahlungsart wählen" eingegeben.<BR>',
                ],
                'creditCardSilentModeBrandsVisa' => [
                    'label' => 'Kreditkarte - Visa (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsMaster' => [
                    'label' => 'Kreditkarte - MasterCard (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsAmex' => [
                    'label' => 'Kreditkarte - American Express (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardCaption' => [
                    'label' => 'Kreditkarte - Capture Modus',
                    'description' => '<b>AUTO</b>: Reservierte Beträge werden sofort automatisch eingezogen.<BR>
                                  <b>MANUAL</b>: Geldeinzüge werden von Ihnen manuell im Shopbackend durchgeführt.',
                ],
                'creditCardAcquirer' => [
                    'label' => 'Kreditkarte - Acquirer',
                    'description' => '<b>GICC</b>: Concardis, B+S Card Service, EVO Payments, American Express, Elavon, SIX Payment Service<BR>
                                  <b>CAPN</b>: American Express<BR>
                                  <b>Omnipay</b>: EMS payment solutions, Global Payments, Paysquare',
                ],
                'creditCardAccVerify' => [
                    'label' => 'Kreditkarte - Kontoverifizierung anfordern ',
                    'description' => 'Indikator für Anforderung einer Kontoverifizierung (alias Nullwert-Authorisierung). <BR>
                                  Bei einer angeforderten Kontoverifizierung ist der übermittelte Betrag optional und <BR>
                                  wird für die tatsächliche Zahlungstransaktion ignoriert (z.B. Autorisierung).',
                ],
                'creditCardTemplate' => [
                    'label' => 'Kreditkarte - Template Name',
                    'description' => 'Name der XSLT-Datei mit Ihrem individuellen Layout für das Bezahlformular. Wenn Sie das neugestaltete und abwärtskompatible Computop-Template nutzen möchten, übergeben Sie den Templatenamen „ct_compatible“. Wenn Sie das Responsive Computop-Template für mobile Endgeräte nutzen möchten, übergeben Sie den Templatenamen „ct_responsive“ oder "ct_responsive_ch".',
                ],
                'idealDirektOderUeberSofort' => [
                    'label' => 'iDEAL - Dienst',
                    'description' => 'Ideal Zahlungen können direkt über Ideal oder über PPRO abgewickelt werden',
                ],
                'lastschriftDienst' => [
                    'label' => 'Lastschrift - Dienst',
                    'description' => 'Lastschrift Zahlungen können direkt, über EVO oder über INTERCARD abgewickelt werden.',
                ],
                'lastschriftCaption' => [
                    'label' => 'Lastschrift - Capture Modus',
                    'description' => '<b>AUTO</b>: Reservierte Beträge werden sofort automatisch eingezogen.<BR>
                            <b>MANUAL</b>: Geldeinzüge werden von Ihnen manuell im Shopbackend durchgeführt.',
                ],
                'lastschriftAnon' => [
                    'label' => 'Iban anonymisieren',
                    'description' => 'Stellt im Checkout und im Mein Konto Bereich die Iban anonymisiert dar',
                ],
                'payDirektShopApiKey' => [
                    'label' => 'Paydirekt - Shop Api Key',
                    'description' => 'Ihr Paydirekt Api Schlüssel',
                ],
                'payDirektCaption' => [
                    'label' => 'Paydirekt - Capture Modus',
                    'description' => '<b>AUTO</b>: Reservierte Beträge werden sofort automatisch eingezogen.<BR>
                                  <b>MANUAL</b>: Geldeinzüge werden von Ihnen manuell im Shopbackend durchgeführt.',
                ],
                'paypalCaption' => [
                    'label' => 'Paypal - Capture Modus',
                    'description' => 'bestimmt, ob der angefragte Betrag sofort oder erst später eingezogen wird. <br>
                                  <b>Wichtig:<br>Bitte kontaktieren Sie den Computop Support für Manual, um die unterschiedlichen Einsatzmöglichkeiten abzuklären.</b>',
                ],
                'paypalSetOrderStatus' => [
                    'label' => 'Paypal - Bestellstatus bei Capture',
                    'description' => 'Wenn diese Option An ist, dann wird der Bestellstatus bei Paypal Bestellungen,<br>bei denen der Capture fehlschlägt, auf "Klärung notwendig" gesetzt"  <br>',
                ],
                'amazonSellerId' => [
                    'label' => 'AmazonPay - SellerId',
                    'description' => 'Ihre Amazonpay SellerId',
                ],
                'amazonClientId' => [
                    'label' => 'AmazonPay - ClientId',
                    'description' => 'Ihre Amazonpay ClientId',
                ],
                'amazonLiveMode' => [
                    'label' => 'Amazon Modus',
                    'description' => 'AmazonPay im Live oder Testmodus benutzen',
                ],
                'amazonCaptureType' => [
                    'label' => 'Amazon Capture Modus',
                    'description' => '<b>Automatisch</b>: Reservierte Beträge werden automatisch eingezogen.<BR>
                                  <b>Manuell</b>: Geldeinzüge werden von Ihnen manuell im Shopbackend durchgeführt.',
                ],
                'amazonButtonType' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_TYPE_PARAMETER" target="_blank">AmazonPay - Button Typ</a>',
                    'description' => 'Typ des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Typ"',
                ],
                'amazonButtonColor' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_COLOR_PARAMETER" target="_blank">AmazonPay - Button Farbe</a>',
                    'description' => 'Farbe des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Farbe"',
                ],
                'amazonButtonSize' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_SIZE_PARAMETER" target="_blank">AmazonPay - Button Größe</a>',
                    'description' => 'Größe des Amazon Buttons<BR>
                                  Das Aussehen der verschiedenen Buttons.<BR>
                                  Klicken Sie links auf den Link "AmazonPay - Button Größe"',
                ],
                'bonitaetusereturnaddress' => [
                    'label' => 'Bonitätsprüfung - Zurückgelieferte Adressdaten verwenden',
                    'description' => 'Ersetzt die Rechnungsaddresse mit u.U. korrigierten Adressen aus der Bonitätsprüfung',
                ],
                'bonitaetinvalidateafterdays' => [
                    'label' => 'Bonitätsprüfung - Gültigkeit der Bonitätsprüfung in Tagen',
                    'description' => 'Stellen Sie hier ein, wie lange ein bereits durchgeführte Bontitätsprüfung gültig bleibt',
                ],
                'crifmethod' => [
                    'label' => 'CRIF Bonitätsprüfung',
                    'description' => 'führt eine Bonitätsprüfung aus, bevor ein Benutzer Zahlarten auswählen kann.<BR>
                                  Erstellen Sie unter "Einstellungen->Riskmanagement" Regeln mit den Bedingungen<BR>
                                  "Computop Risikoampel IST <Farbe>"<BR>und<BR>
                                  "Computop Risikoampel IST NICHT <Farbe>"<BR>',
                ],
                'klarnaaction' => [
                    'label' => 'Klarna Aktionscode',
                    'description' => 'Der Wert ist von Laufzeiten und Monatsraten abhängig, die Sie mit Klarna vereinbart haben. Dieser Wert kann per Subshop unterschiedlich sein.',
                ],
                'klarnaaccount' => [
                    'label' => 'Klarna Konto',
                    'description' => 'Das zu benutzende Klarna Konto. <br/><br/>
                                    <b>Die verfügbaren Klarna-Zahlungsarten in Abhängigkeit von der Konfiguration bei Klarna </b><BR>
                                    Wenn <u>Klarna PayNow</u> aktiviert ist, dann können <u>Klarna Lastschrift</u> und <u>Klarna Sofort</u> nicht aktiviert werden<BR>
                                    Wenn <u>Klarna Lastschrift</u> und/oder <u>Klarna Sofort</u> aktiv ist, dann kann <u>Klarna PayNow</u> nicht aktiviert werden',
                ],
            ],
            'en_GB' => [
                'merchantID' => [
                    'label' => 'MerchantID',
                    'description' => 'Your MerchantID',
                ],
                'mac' => [
                    'label' => 'MAC',
                    'description' => 'Your HMAC-Key',
                ],
                'blowfishPassword' => [
                    'label' => 'Blowfish Password',
                    'description' => 'Your blowfish password',
                ],
                'prefixOrdernumber' => [
                    'label' => 'Ordernumber prefix',
                    'description' => 'Prefix for ordernumbers. You can use the following placeholders: %transid% , %payid%, %xid%',
                ],
                'suffixOrdernumber' => [
                    'label' => 'Ordernumber suffix',
                    'description' => 'Suffix for ordernumbers. You can use the following placeholders: %transid% , %payid%, %xid%',
                ],
                'debuglog' => [
                    'label' => 'Debug protocol',
                    'description' => 'Creates a log file <FatchipCTPayment_.log> with debugging output on the shopware log folder',
                ],
                'creditCardMode' => [
                    'label' => 'Creditcard - Mode',
                    'description' => '<b>IFrame</b>: The creditcard form will be displayed after clicking "confirm payment" in an iframe<BR>
                                  <b>Silent Mode</b>: The creditcard form will be displayed on the "select payments" page.<BR>',
                ],
                'creditCardTestMode' => [
                    'label' => 'Creditcard - Testmode',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsVisa' => [
                    'label' => 'Creditcard - Visa (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsMaster' => [
                    'label' => 'Creditcard - MasterCard (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsAmex' => [
                    'label' => 'Creditcard - American Express (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardCaption' => [
                    'label' => 'Creditcard - Capture Mode',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'creditCardAcquirer' => [
                    'label' => 'Creditcard - Acquirer',
                    'description' => '<b>GICC</b>: Concardis, B+S Card Service, EVO Payments, American Express, Elavon, SIX Payment Service<BR>
                                  <b>CAPN</b>: American Express<BR>
                                  <b>Omnipay</b>: EMS payment solutions, Global Payments, Paysquare',
                ],
                'creditCardAccVerify' => [
                    'label' => 'Creditcard - Account verification',
                    'description' => 'Indicator for an account verification request (alias Null-Auth).<BR>
                                  By using an account verification request the amount is optional and<BR>
                                  will be ignored for the real payment (E.g. authorization).',
                ],
                'creditCardTemplate' => [
                    'label' => 'Creditcard - Template name',
                    'description' => 'Name of the XSLT-file with your individual payment form layout. If you want to use the new an backward compatible computop template, please use the template name „ct_compatible“. If you want to use the responsive computop template for mobile devices, please use the template name „ct_compatible“ or "ct_responsive_ch".',
                ],
                'idealDirektOderUeberSofort' => [
                    'label' => 'iDEAL - Service',
                    'description' => 'iDEAL payments can be handled by using direct (Sofort) or PPRO.',
                ],
                'lastschriftDienst' => [
                    'label' => 'Direct debit - Service',
                    'description' => 'Direct debit payments can be handled by using direct, EVO or INTERCARD',
                ],
                'lastschriftCaption' => [
                    'label' => 'Direct debit - Capture Mode',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'lastschriftAnon' => [
                    'label' => 'Anonymize IBAN',
                    'description' => 'The customers IBAN will be displayed anonymized in checkout and on the my accoutn page',
                ],
                'payDirektShopApiKey' => [
                    'label' => 'Paydirekt - Shop Api Key',
                    'description' => 'Your Paydirekt Api Key',
                ],
                'payDirektCaption' => [
                    'label' => 'Paydirekt - Capture Modus',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'paypalCaption' => [
                    'label' => 'Paypal - Capture Modus',
                    'description' => 'capture reserverd amounts now or manually later. <br>
                                  <b>Important:<br>Please contact the computop customer support before using the manual setting to clarify possible use cases .</b>',
                ],
                'paypalSetOrderStatus' => [
                    'label' => 'Paypal - Order status on captures',
                    'description' => 'If this option is enabled, the orderstatus of failed paypal captures will be set to "review necessary"<br>',
                ],
                'amazonSellerId' => [
                    'label' => 'AmazonPay - SellerId',
                    'description' => 'Your Amazonpay SellerId',
                ],
                'amazonClientId' => [
                    'label' => 'AmazonPay - ClientId',
                    'description' => 'Your Amazonpay ClientId',
                ],
                'amazonLiveMode' => [
                    'label' => 'Amazon Modus',
                    'description' => 'Use AmazonPay in live or test mode',
                ],
                'amazonCaptureType' => [
                    'label' => 'Amazon Capture Mode',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'amazonButtonType' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_TYPE_PARAMETER" target="_blank">AmazonPay - Button Type</a>',
                    'description' => 'Type of the Amazon button<BR>
                                  The look of the different buttons.<BR>
                                  Please click on the left link "AmazonPay - Button Type"',
                ],
                'amazonButtonColor' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_COLOR_PARAMETER" target="_blank">AmazonPay - Button Color</a>',
                    'description' => 'Color of the Amazon button<BR>
                                  The look of the different button.<BR>
                                  Please click on the left link "AmazonPay - Button Color"',
                ],
                'amazonButtonSize' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_SIZE_PARAMETER" target="_blank">AmazonPay - Button Size</a>',
                    'description' => 'Size of the amazon button<BR>
                                  The look of the different button.<BR>
                                  Please click on the left link "AmazonPay - Button Size"',
                ],
                'bonitaetusereturnaddress' => [
                    'label' => 'Credit check  - Use customer addresses from credit check response',
                    'description' => 'Replaces the customers addresses with the addresses from the credit check response',
                ],
                'bonitaetinvalidateafterdays' => [
                    'label' => 'Credit check - Validity of the credit check in days',
                    'description' => 'Set how many days a credit check stays valid for a customer befor re-cehecking',
                ],
                'crifmethod' => [
                    'label' => 'CRIF Credit check',
                    'description' => 'checks credit worthiness before displaying possible payments.<BR>
                                  Create your own rules in "Riskmanagement" with the conditions <BR>
                                  "Computop Traffic light IS <Color>"<BR>and<BR>
                                  "Computop Traffic light IST NOT <Color>"<BR>',
                ],
                'klarnaaction' => [
                    'label' => 'Klarna action code',
                    'description' => 'This value depends on durations and monthly rates term you arranged with Klarna. This value can be different for each subshop.',
                ],
                'klarnaaccount' => [
                    'label' => 'Klarna Account',
                    'description' => 'Your Klarna account. <br/><br/>
                                    <b>Available Klarna Payments depending on your Klarna account configuration</b><BR>
                                    If <u>Klarna PayNow</u> is active, you cant activate <u>Klarna Direct debit</u> und <u>Klarna Sofort</u><BR>
                                    if <u>Klarna Direct debit</u> and/or <u>Klarna Sofort</u> are active, then <u>Klarna PayNow</u> can not be activated',
                ],
            ],
            'fr_FR' => [
                'merchantID' => [
                    'label' => 'MerchantID',
                    'description' => 'Votre MerchantID',
                ],
                'mac' => [
                    'label' => 'MAC',
                    'description' => 'Votre HMAC-Key',
                ],
                'blowfishPassword' => [
                    'label' => 'Blowfish Password',
                    'description' => 'Votre blowfish mot de passe',
                ],
                'prefixOrdernumber' => [
                    'label' => 'Ordernumber prefix',
                    'description' => 'Prefix for ordernumbers. You can use the following placeholders: %transid% , %payid%, %xid%',
                ],
                'suffixOrdernumber' => [
                    'label' => 'Ordernumber suffix',
                    'description' => 'Suffix for ordernumbers. You can use the following placeholders: %transid% , %payid%, %xid%',
                ],
                'debuglog' => [
                    'label' => 'Debug protocol',
                    'description' => 'Creates a log file <FatchipCTPayment_.log> with debugging output on the shopware log folder',
                ],
                'creditCardMode' => [
                    'label' => 'Creditcard - Mode',
                    'description' => '<b>IFrame</b>: The creditcard form will be displayed after clicking "confirm payment" in an iframe<BR>
                                  <b>Silent Mode</b>: The creditcard form will be displayed on the "select payments" page.<BR>',
                ],
                'creditCardTestMode' => [
                    'label' => 'Creditcard - Testmode',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsVisa' => [
                    'label' => 'Creditcard - Visa (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsMaster' => [
                    'label' => 'Creditcard - MasterCard (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardSilentModeBrandsAmex' => [
                    'label' => 'Creditcard - American Express (Silent Mode)',
                    // 'description' => '',
                ],
                'creditCardCaption' => [
                    'label' => 'Creditcard - Capture Mode',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'creditCardAcquirer' => [
                    'label' => 'Creditcard - Acquirer',
                    'description' => '<b>GICC</b>: Concardis, B+S Card Service, EVO Payments, American Express, Elavon, SIX Payment Service<BR>
                                  <b>CAPN</b>: American Express<BR>
                                  <b>Omnipay</b>: EMS payment solutions, Global Payments, Paysquare',
                ],
                'creditCardAccVerify' => [
                    'label' => 'Creditcard - Account verification',
                    'description' => 'Indicator for an account verification request (alias Null-Auth).<BR>
                                  By using an account verification request the amount is optional and<BR>
                                  will be ignored for the real payment (E.g. authorization).',
                ],
                'creditCardTemplate' => [
                    'label' => 'Creditcard - Template name',
                    'description' => 'Name of the XSLT-file with your individual payment form layout. If you want to use the new an backward compatible computop template, please use the template name „ct_compatible“. If you want to use the responsive computop template for mobile devices, please use the template name „ct_compatible“ or "ct_responsive_ch".',
                ],
                'idealDirektOderUeberSofort' => [
                    'label' => 'iDEAL - Service',
                    'description' => 'iDEAL payments can be handled by using direct (Sofort) or PPRO.',
                ],
                'lastschriftDienst' => [
                    'label' => 'Direct debit - Service',
                    'description' => 'Direct debit payments can be handled by using direct, EVO or INTERCARD',
                ],
                'lastschriftCaption' => [
                    'label' => 'Direct debit - Capture Mode',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'lastschriftAnon' => [
                    'label' => 'Anonymize IBAN',
                    'description' => 'The customers IBAN will be displayed anonymized in checkout and on the my accoutn page',
                ],
                'payDirektShopApiKey' => [
                    'label' => 'Paydirekt - Shop Api Key',
                    'description' => 'Your Paydirekt Api Key',
                ],
                'payDirektCaption' => [
                    'label' => 'Paydirekt - Capture Modus',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'paypalCaption' => [
                    'label' => 'Paypal - Capture Modus',
                    'description' => 'capture reserverd amounts now or manually later. <br>
                                  <b>Important:<br>Please contact the computop customer support before using the manual setting to clarify possible use cases .</b>',
                ],
                'paypalSetOrderStatus' => [
                    'label' => 'Paypal - Order status on captures',
                    'description' => 'If this option is enabled, the orderstatus of failed paypal captures will be set to "review necessary"<br>',
                ],
                'amazonSellerId' => [
                    'label' => 'AmazonPay - SellerId',
                    'description' => 'Your Amazonpay SellerId',
                ],
                'amazonClientId' => [
                    'label' => 'AmazonPay - ClientId',
                    'description' => 'Your Amazonpay ClientId',
                ],
                'amazonLiveMode' => [
                    'label' => 'Amazon Modus',
                    'description' => 'Use AmazonPay in live or test mode',
                ],
                'amazonCaptureType' => [
                    'label' => 'Amazon Capture Mode',
                    'description' => '<b>AUTO</b>: Reserved amounts will be captured automatically.<BR>
                                  <b>MANUAL</b>: Reserverd amounts have to be captured manuelly in the shop backend.',
                ],
                'amazonButtonType' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_TYPE_PARAMETER" target="_blank">AmazonPay - Button Type</a>',
                    'description' => 'Type of the Amazon button<BR>
                                  The look of the different buttons.<BR>
                                  Please click on the left link "AmazonPay - Button Type"',
                ],
                'amazonButtonColor' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_COLOR_PARAMETER" target="_blank">AmazonPay - Button Color</a>',
                    'description' => 'Color of the Amazon button<BR>
                                  The look of the different button.<BR>
                                  Please click on the left link "AmazonPay - Button Color"',
                ],
                'amazonButtonSize' => [
                    'label' => '<a href="https://pay.amazon.com/de/developer/documentation/lpwa/201952050#ENTER_SIZE_PARAMETER" target="_blank">AmazonPay - Button Size</a>',
                    'description' => 'Size of the amazon button<BR>
                                  The look of the different button.<BR>
                                  Please click on the left link "AmazonPay - Button Size"',
                ],
                'bonitaetusereturnaddress' => [
                    'label' => 'Credit check  - Use customer addresses from credit check response',
                    'description' => 'Replaces the customers addresses with the addresses from the credit check response',
                ],
                'bonitaetinvalidateafterdays' => [
                    'label' => 'Credit check - Validity of the credit check in days',
                    'description' => 'Set how many days a credit check stays valid for a customer befor re-cehecking',
                ],
                'crifmethod' => [
                    'label' => 'CRIF Credit check',
                    'description' => 'checks credit worthiness before displaying possible payments.<BR>
                                  Create your own rules in "Riskmanagement" with the conditions <BR>
                                  "Computop Traffic light IS <Color>"<BR>and<BR>
                                  "Computop Traffic light IST NOT <Color>"<BR>',
                ],
                'klarnaaction' => [
                    'label' => 'Klarna action code',
                    'description' => 'This value depends on durations and monthly rates term you arranged with Klarna. This value can be different for each subshop.',
                ],
                'klarnaaccount' => [
                    'label' => 'Klarna Account',
                    'description' => 'Your Klarna account. <br/><br/>
                                    <b>Available Klarna Payments depending on your Klarna account configuration</b><BR>
                                    If <u>Klarna PayNow</u> is active, you cant activate <u>Klarna Direct debit</u> und <u>Klarna Sofort</u><BR>
                                    if <u>Klarna Direct debit</u> and/or <u>Klarna Sofort</u> are active, then <u>Klarna PayNow</u> can not be activated',
                ],
            ],
        ];
}
