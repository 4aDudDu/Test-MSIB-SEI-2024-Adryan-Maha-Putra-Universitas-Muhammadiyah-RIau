<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {
    private $api_url = 'http://localhost:8080/api/proyek';

    public function index() {
        $response = $this->curl->simple_get($this->api_url);
        $data['proyek'] = json_decode($response, true);
        $this->load->view('proyek/index', $data);
    }

    public function create() {
        $response = $this->curl->simple_get('http://localhost:8080/api/lokasi');
        $data['lokasi_list'] = json_decode($response, true);

        if ($this->input->post()) {
            $data = array(
                'nama_proyek' => $this->input->post('nama_proyek'),
                'client' => $this->input->post('client'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai'),
                'pimpinan_proyek' => $this->input->post('pimpinan_proyek'),
                'lokasi' => $this->input->post('lokasi')
            );
            $this->curl->simple_post($this->api_url, $data);
            redirect('proyek');
        }
        $this->load->view('proyek/form', $data);
    }

    public function edit($id) {
        $response = $this->curl->simple_get($this->api_url.'/'.$id);
        $data['proyek'] = json_decode($response, true);

        $response_lokasi = $this->curl->simple_get('http://localhost:8080/api/lokasi');
        $data['lokasi_list'] = json_decode($response_lokasi, true);

        if ($this->input->post()) {
            $data_update = array(
                'nama_proyek' => $this->input->post('nama_proyek'),
                'client' => $this->input->post('client'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai'),
                'pimpinan_proyek' => $this->input->post('pimpinan_proyek'),
                'lokasi' => $this->input->post('lokasi')
            );
            $this->curl->simple_put($this->api_url.'/'.$id, $data_update);
            redirect('proyek');
        }
        $this->load->view('proyek/form', $data);
    }

    public function delete($id) {
        $this->curl->simple_delete($this->api_url.'/'.$id);
        redirect('proyek');
    }
}

?>
