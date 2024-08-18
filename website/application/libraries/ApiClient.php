<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiClient
{
    private $api_url_lokasi = 'http://localhost:8080/api/lokasi';
    private $api_url_proyek = 'http://localhost:8080/api/proyek';

    private function sendRequest($url, $method = 'GET', $data = null) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        
        if ($method == 'POST' || $method == 'PUT') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ));
        }
    
        $response = curl_exec($ch);
    
        // Check for cURL errors
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception("cURL Error: " . $error);
        }
        
        // Check HTTP response code
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code >= 400) {
            curl_close($ch);
            throw new Exception("HTTP Error: " . $http_code);
        }
        
        curl_close($ch);
    
        return $response; // Return the raw response
    }

    public function getLokasi() {
        return $this->sendRequest($this->api_url_lokasi);
    }

    public function getProyek() {
        return $this->sendRequest($this->api_url_proyek);
    }

    public function addLokasi($data) {
        return $this->sendRequest($this->api_url_lokasi, 'POST', $data);
    }

    public function addProyek($data) {
        return $this->sendRequest($this->api_url_proyek, 'POST', $data);
    }

    public function updateLokasi($id, $data) {
        return $this->sendRequest($this->api_url_lokasi . '/' . $id, 'PUT', $data);
    }

    public function updateProyek($id, $data) {
        return $this->sendRequest($this->api_url_proyek . '/' . $id, 'PUT', $data);
    }

    public function deleteLokasi($id) {
        return $this->sendRequest($this->api_url_lokasi . '/' . $id, 'DELETE');
    }

    public function deleteProyek($id) {
        return $this->sendRequest($this->api_url_proyek . '/' . $id, 'DELETE');
    }

    public function getLokasiById($id) {
        return $this->sendRequest($this->api_url_lokasi . '/' . $id);
    }

    public function getProyekById($id) {
        return $this->sendRequest($this->api_url_proyek . '/' . $id);
    }
}
