<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiClient extends CI_Model
{
    private $api_url_lokasi = 'http://localhost:8080/api/lokasi';
    private $api_url_proyek = 'http://localhost:8080/api/proyek';

    public function getLokasi()
    {
        $response = $this->sendRequest($this->api_url_lokasi);
        return json_decode($response, true); // Decode JSON menjadi array
    }

    public function getProyek()
    {
        $response = $this->sendRequest($this->api_url_proyek);
        return json_decode($response, true); // Decode JSON menjadi array
    }

    public function addLokasi($data)
    {
        return $this->sendRequest($this->api_url_lokasi, 'POST', $data);
    }

    public function addProyek($data)
    {
        return $this->sendRequest($this->api_url_proyek, 'POST', $data);
    }

    public function updateLokasi($id, $data)
    {
        return $this->sendRequest($this->api_url_lokasi . '/' . $id, 'PUT', $data);
    }

    public function updateProyek($id, $data)
    {
        return $this->sendRequest($this->api_url_proyek . '/' . $id, 'PUT', $data);
    }

    public function deleteLokasi($id)
    {
        return $this->sendRequest($this->api_url_lokasi . '/' . $id, 'DELETE');
    }

    public function deleteProyek($id)
    {
        return $this->sendRequest($this->api_url_proyek . '/' . $id, 'DELETE');
    }

    public function getLokasiById($id)
    {
        $response = $this->sendRequest($this->api_url_lokasi . '/' . $id);
        return json_decode($response, true);
    }

    public function getProyekById($id)
    {
        $response = $this->sendRequest($this->api_url_proyek . '/' . $id);
        return json_decode($response, true);
    }

    private function sendRequest($url, $method = 'GET', $data = null)
    {
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
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            throw new Exception("cURL Error: " . $error);
        }
        
        return $response;
    }
}


