<?php /** @noinspection PhpUnused */

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
 * @subpackage CTPayment
 * @author     FATCHIP GmbH <support@fatchip.de>
 * @copyright  2018 Computop
 * @license    <http://www.gnu.org/licenses/> GNU Lesser General Public License
 * @link       https://www.computop.com
 */

namespace Fatchip\CTPayment;
/**
 * Class Blowfish
 * @package Fatchip\CTPayment
 */
class Blowfish
{
    /**
     * HändlerID, die von First Cash Solution vergeben wird. Dieser Parameter ist unverschlüsselt zu übergeben.
     *
     * @var string
     */
    protected $merchantID = '';
    /**
     * Blowfish password
     */
    protected $blowfishPassword = '';
    /**
     * HMAC Password
     *
     * @var string
     */
    protected $mac = '';

    /**
     * expand
     * @param $text
     * @return string
     */
    protected function expand($text)
    {
        while (strlen($text) % 8 != 0) {
            $text .= chr(0);
        }
        return $text;
    }

    /**
     * decrypt
     * @param $text
     * @return string
     */
    protected function openssl_decrypt($text)
    {
        /* @see https://stackoverflow.com/questions/54180458/why-are-mcrypt-and-openssl-encrypt-not-giving-the-same-results-for-blowfish-with/54190706#54190706
         * make sure decrypt works with all supported PHP Versions
         */

        $plain = openssl_decrypt($text, 'bf-ecb', $this->blowfishPassword, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING | OPENSSL_DONT_ZERO_PAD_KEY);
        return $plain;
    }

    /**
     * ctSplit
     * @param $arText
     * @param $sSplit
     * @return array
     */
    protected function ctSplit($arText, $sSplit)
    {
        $arr = [];
        foreach ($arText as $text) {
            $str = explode($sSplit, $text);
            $arr[$str[0]] = $str[1];
        }
        return $arr;
    }

    /**
     * encrypt
     * @param $text
     * @return string
     */
    protected function openssl_encrypt($text)
    {
        return openssl_encrypt($text, 'bf-ecb', $this->blowfishPassword, OPENSSL_RAW_DATA);
    }

    /**
     * Encrypt the passed text (any encoding) with Blowfish.
     *
     * @param string $plaintext
     * @param integer $len
     * @param string $password
     * @return bool|string
     */
    public function ctEncrypt($plaintext, $len, $password)
    {
        $len = mb_strlen($plaintext);

        if (mb_strlen($password) <= 0) {
            $password = ' ';
        }
        if (mb_strlen($plaintext) != $len) {
            return false;
        }
        $plaintext = $this->expand($plaintext);

        return bin2hex($this->openssl_encrypt($plaintext));
    }

    /**
     * Decrypt the passed HEX string with Blowfish.
     *
     * @param string $cipher
     * @param integer $len
     * @param string $password
     * @return bool|string
     */
    public function ctDecrypt($cipher, $len, $password)
    {
        if (mb_strlen($password) <= 0) {
            $password = ' ';
        }
        $ciphernew = hex2bin($cipher);
        if ($len > strlen($ciphernew)) {
            return false;
        }

        return mb_substr($this->openssl_decrypt($ciphernew), 0, $len);
    }

    /**
     * @param string $merchantId
     * @ignore <description>
     */
    public function setMerchantID($merchantId)
    {
        $this->merchantID = $merchantId;
    }

    /**
     * @return string
     * @ignore <description>
     */
    public function getMerchantID()
    {
        return $this->merchantID;
    }

    /**
     * @param mixed $blowfishPassword
     * @ignore <description>
     */
    public function setBlowfishPassword($blowfishPassword)
    {
        $this->blowfishPassword = $blowfishPassword;
    }

    /**
     * @return mixed
     * @ignore <description>
     */
    public function getBlowfishPassword()
    {
        return $this->blowfishPassword;
    }

    /**
     * @param string $mac
     * @ignore <description>
     */
    public function setMac($mac)
    {
        $this->mac = $mac;
    }

    /**
     * @return string
     * @ignore <description>
     */
    public function getMac()
    {
        return $this->mac;
    }
}
