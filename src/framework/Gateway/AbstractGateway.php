<?php

namespace Framework\Gateway;

abstract class AbstractGateway
{

    protected $endPoint = '';

    public function __construct()
    {
        \Dotenv::load( __DIR__ .'/../../../');
        $this->endPoint = getenv('API_PATH');
    }

    public function get($function ,array $data)
    {
        $curl = curl_init();
        $this->endPoint = $this->endPoint . $function .".xml";

        if(!empty($data)){
            $this->endPoint = $this->endPoint . "?";

            foreach($data as $parameter => $value)
            {
                $this->endPoint = $this->endPoint . "&" . $parameter . "=" . $value;
            }
        }

        curl_setopt($curl, CURLOPT_URL, $this->endPoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}