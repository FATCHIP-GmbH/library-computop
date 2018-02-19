<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 14.12.17
 * Time: 15:58
 */

namespace Fatchip\CTPayment\CTController\CTControllerIframe;

use Fatchip\CTPayment\CTController\CTControllerIframe;
use Fatchip\CTPayment\CTResponse\CTResponse;

class CTControllerPrzelewy24 extends CTControllerIframe
{
    public function createResponse($data, $len)
    {
        $this->setData($data);
        $this->setLen($len);
        $plaintext = $this->ctDecrypt($data, $len, $this->getBlowfishPassword());
        $arr = array();
        parse_str($plaintext, $arr);
        $response = new CTResponse($arr);
        $this->setResponse($response);
        return $response;
    }
}
