<?php

class ApiClient
{
    protected $endpoint;

    public function __construct($endpoint) {
        $this->endpoint = $endpoint;
    }

    /**
     * Make a GET request
     */
    public function get($method, $params = array()) {
        // build the parameters
        $query = array("method" => $method);
        $query = array_merge($query, $params);
        $url = $this->endpoint . "?" . http_build_query($query);
        $response = file_get_contents($url);
        if(false !== $response) {
            $data = json_decode($response, true);
            return $data;
        } else {
            throw new Exception("API Request Failed");
        } 
    }
}
