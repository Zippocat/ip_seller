<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 05.03.15
 * Time: 22:44
 */
class YandexCW
{
    public static $api_key = 'cw.1.1.20140624T105425Z.6296e916e9dd38cd.56067834f7992c29cc9a57eedfbc86752dd50ed2';
    const check_data_url = 'http://cleanweb-api.yandex.ru/1.0/check-spam';
    const get_captcha_url = 'http://cleanweb-api.yandex.ru/1.0/get-captcha';
    const check_captcha_url = 'http://cleanweb-api.yandex.ru/1.0/check-captcha';
    static private function xml_query($url, $parameters = array(), $post = false)
    {
        if (!isset($parameters['key'])) $parameters['key'] = self::$api_key;
        $parameters_query = http_build_query($parameters);
        if ($post)
        {
            $http_options = array(
                'http' => array(
                    'method' => 'POST',
                    'content' => $parameters_query
                )
            );
            $context = stream_context_create($http_options);
            $contents = file_get_contents($url, false, $context);
        }
        else
            $contents = file_get_contents($url . '?' . $parameters_query);
        if (!$contents)
            return false;
        $xml_data = new SimpleXMLElement($contents);
        return $xml_data;
    }
    static public function get_captcha($id = null)
    {
        $response = self::xml_query(self::get_captcha_url, array('id' => $id, 'type' => 'lite'));
        if (!$response || !isset($response->captcha))
            return false;
        return array('captcha_id' => $response->captcha, 'captcha_url' => $response->url);
    }
    static public function check_captcha($captcha_id, $captcha_value, $id = null)
    {
        $parameters = array(
            'captcha' => $captcha_id,
            'value' => $captcha_value,
            'id' => $id
        );
        $response = self::xml_query(self::check_captcha_url, $parameters);
        return isset($response->ok);
    }
    static public function is_spam($message_data, $return_full_data = false)
    {
        if (!isset($message_data['ip'])) $ip = $_SERVER['REMOTE_ADDR'];
        $response = self::xml_query(self::check_data_url, $message_data, true);
        $spam_detected = (isset($response->text['spam-flag']) && $response->text['spam-flag'] == 'yes');
        if (!$return_full_data) return $spam_detected;
        return array(
            'detected' => $spam_detected,
            'request_id' => (isset($response->id)) ? $response->id : null,
            'spam_links' => (isset($response->links)) ? $response->links : array()
        );
    }
}