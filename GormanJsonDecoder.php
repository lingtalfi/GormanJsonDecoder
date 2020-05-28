<?php


namespace Ling\GormanJsonDecoder;


/**
 * The GormanJsonDecoder class.
 */
class GormanJsonDecoder
{


    /**
     * Returns a prepared GormanEncodedData instance.
     *
     * @param array $arr
     * @param array $callbackKeys
     * @return GormanEncodedData
     */
    public static function encode(array $arr, array $callbackKeys = []): GormanEncodedData
    {
        $data = new GormanEncodedData();
        $data->setPhpArray($arr);
        $data->setCallbackKeys($callbackKeys);
        return $data;
    }

}