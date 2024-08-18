<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
    private $api_url = 'http://localhost:8080/api/lokasi';

    public function index() {
        $response = $this->curl->simple_get($this->api_url);
        $data['lokasi'] = json_decode($response, true);
        $this->load->view('lokasi/index', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $data = array(
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
            );
            $this->curl->simple_post($this->api_url, $data);
            redirect('lokasi');
        }
        $this->load->view('lokasi/form');
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
            );
            $this->curl->simple_put($this->api_url.'/'.$id, $data);
            redirect('lokasi');
        }
        $response = $this->curl->simple_get($this->api_url.'/'.$id);
        $data['lokasi'] = json_decode($response, true);
        $this->load->view('lokasi/form', $data);
    }

    public function delete($id) {
        $this->curl->simple_delete($this->api_url.'/'.$id);
        redirect('lokasi');
    }
}

?>
