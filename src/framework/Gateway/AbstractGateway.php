<?php

namespace Framework\Gateway;

use Dotenv\Dotenv;

abstract class AbstractGateway
{

    protected $endPoint = '';

    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__ . '/../../../');
        $dotenv->load();
        $this->endPoint = getenv('API_PATH');
    }

    private function get($function, array $data)
    {
        $curl = curl_init();
        $this->endPoint = $this->endPoint . $function . ".xml";

        $this->createRequestURL($data);
        var_dump($this->endPoint);

        curl_setopt($curl, CURLOPT_URL, $this->endPoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    protected function getAPIResponse($function, $data)
    {
        $xml_string = $this->get($function, $data);
        $json = $this->parseXMLtoJSON($xml_string);

        return json_decode($json, TRUE);
    }

    private function parseXMLtoJSON($xml_string)
    {
        $xml = simplexml_load_string($xml_string);
        $json = json_encode($xml);

        return $json;
    }

    private function createRequestURL($data)
    {
        if (!empty($data)) {
            $this->endPoint = $this->endPoint . "?";

            foreach ($data as $parameter => $value) {
                $this->endPoint = $this->endPoint . "&" . $parameter . "=" . $value;
            }
        }
    }
}