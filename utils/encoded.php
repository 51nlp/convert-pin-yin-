<?php
namespace utils;
class Encoded
{
    private $encodedTypeIn = null;
    private $encodedTypeOut = null;

    public function __construct($encodedTypeOut = 'UTF-8', $encodedTypeIn = array('UTF-8', 'ASCII', 'GBK',
        'GB2312', 'GB18030', 'BIG5', 'JIS', 'eucjp-win', 'sjis-win', 'EUC-JP'))
    {
        $this->encodedTypeIn = $encodedTypeIn;
        $this->encodedTypeOut = $encodedTypeOut;
    }

    private function _setEncodedTypeOut($encodedTypeOut)
    {
        if (!empty($encodedTypeOut)) {
            $this->encodedTypeOut = $encodedTypeOut;
        }
    }

    public function array_iconv($data, $encodedTypeOut = null)
    {
        $this->_setEncodedTypeOut($encodedTypeOut);
        $encoded = mb_detect_encoding($data, $this->encodedTypeIn);//自动判断编码
        if (!is_array($data)) {
            return mb_convert_encoding($data, $this->encodedTypeOut, $this->encodedTypeIn);
        } else {
            foreach ($data as $key => $val) {
                if (is_array($val)) {
                    $data[$key] = array_iconv($val, $this->encodedTypeOut);
                } else {
                    $data[$key] = mb_convert_encoding($data, $this->encodedTypeOut,
                        $this->encodedTypeIn);
                }
            }

            return $data;
        }
    }

    public function computingEncoded($data, $isHexPrefix = false, $encodedTypeOut = null,
        $returnType = 'array', $isSign = false, $sign = '_')
    {
        $this->_setEncodedTypeOut($encodedTypeOut);
        $encodedData = array();
        switch ($this->encodedTypeOut) {
            case 'UTF-8':
                $encodedData = $this->_getEncodedByUTF8($data, $isHexPrefix);
                break;
            case 'GBK':
            case 'GB2312':
                $encodedData = $this->_getEncodedByGB($data, $isHexPrefix);
                break;
            case 'GB18030':
                $encodedData = $this->_getEncodedByGB18030($data, $isHexPrefix);
                break;
            case 'BIG5':
                $encodedData = $this->_getEncodedByBIG5($data, $isHexPrefix);
                break;
            default:
                break;
        }
        return $returnType === 'array' ? $encodedData : $this->_formatData($encodedData);
    }

    private function _formatData($encodedData, $isSign, $sign)
    {
        $stringData = '';
        $count = count($encodedData) - 1;
        foreach ($encodedData as $index => $data) {
            if ($index === $count) {
                $stringData .= $data;
            } else {
                if ($isSign) {
                    $stringData .= $data . $sign;
                } else {
                    $stringData .= $data;
                }
            }
        }
        $encodedData = $stringData;

        return $encodedData;
    }

    private function _getEncodedByUTF8($data, $isHexPrefix)
    {
        mb_internal_encoding($this->encodedTypeOut);
        $hexData = array();
        $count = mb_strlen($data);
        for ($i=0; $i < $count; $i++) {
            $hex = bin2hex(mb_substr($data, $i, 1));
            if ($isHexPrefix) {
                $hex = '0x' . $hex;
            }
            $hexData[$i] = $hex;
        }
        return $hexData;
    }

    private function _getEncodedByGB($data, $isHexPrefix)
    {
        mb_internal_encoding($this->encodedTypeOut);
        $hexData = array();
        $count = mb_strlen($data);
        for ($i=0; $i < $count; $i++) {
            $hex = bin2hex(mb_substr($data, $i, 1));
            if ($isHexPrefix) {
                $hex = '0x' . $hex;
            }
            $hexData[$i] = $hex;
        }
        return $hexData;
    }

    private function _getEncodedByGB18030($data, $isHexPrefix)
    {
        mb_internal_encoding($this->encodedTypeOut);
        $hexData = array();
        $count = mb_strlen($data);
        for ($i=0; $i < $count; $i++) {
            $hex = bin2hex(mb_substr($data, $i, 1));
            if ($isHexPrefix) {
                $hex = '0x' . $hex;
            }
            $hexData[$i] = $hex;
        }
        return $hexData;
    }

    private function _getEncodedByBIG5($data, $isHexPrefix)
    {
        mb_internal_encoding($this->encodedTypeOut);
        $hexData = array();
        $count = mb_strlen($data);
        for ($i=0; $i < $count; $i++) {
            $hex = bin2hex(mb_substr($data, $i, 1));
            if ($isHexPrefix) {
                $hex = '0x' . $hex;
            }
            $hexData[$i] = $hex;
        }
        return $hexData;
    }

}
