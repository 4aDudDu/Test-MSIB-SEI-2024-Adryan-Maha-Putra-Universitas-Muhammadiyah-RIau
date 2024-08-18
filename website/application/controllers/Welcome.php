<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    private $api_url_lokasi = 'http://localhost:8080/api/lokasi';
    private $api_url_proyek = 'http://localhost:8080/api/proyek';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ApiClient'); 
        $this->load->helper('url');
    }

    public function index()
    {
        try {
            $lokasiJson = $this->apiclient->getLokasi();
            $proyekJson = $this->apiclient->getProyek();

            $data['lokasi'] = json_decode($lokasiJson, true);
            $data['proyek'] = json_decode($proyekJson, true);

            // Check if JSON decoding was successful
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Error decoding JSON: ' . json_last_error_msg());
            }

            // Debug output (optional)
            // echo '<pre>'; print_r($data); echo '</pre>';

        } catch (Exception $e) {
            show_error($e->getMessage(), 500);
            return; // Stop further execution
        }

        // Load the view with the data
        $this->load->view('welcome_message', $data);
    }

    public function tambah_lokasi()
    {
        if ($this->input->post()) {
            $data = array(
                'namaLokasi' => $this->input->post('namaLokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota')
            );
            try {
                $this->apiclient->addLokasi($data);
            } catch (Exception $e) {
                show_error($e->getMessage(), 500);
            }
            redirect('/');
        } else {
            $this->load->view('lokasi/form_tambah_lokasi'); // Load add location form
        }
    }

    public function tambah_proyek()
    {
        if ($this->input->post()) {
            $data = array(
                'namaProyek' => $this->input->post('namaProyek'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            try {
                $this->apiclient->addProyek($data);
            } catch (Exception $e) {
                show_error($e->getMessage(), 500);
            }
            redirect('/');
        } else {
            $this->load->view('proyek/form_tambah_proyek'); // Load add project form
        }
    }

    public function edit_lokasi($id)
    {
        if ($this->input->post()) {
            $data = array(
                'namaLokasi' => $this->input->post('namaLokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota')
            );
            try {
                $this->apiclient->updateLokasi($id, $data);
            } catch (Exception $e) {
                show_error($e->getMessage(), 500);
            }
            redirect('/');
        } else {
            // Fetch location by ID and pass to the view
            $data['lokasi'] = json_decode($this->apiclient->getLokasiById($id), true);
            $this->load->view('lokasi/form_edit_lokasi', $data); // Load edit location form
        }
    }

    public function edit_proyek($id)
    {
        if ($this->input->post()) {
            $data = array(
                'namaProyek' => $this->input->post('namaProyek'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            try {
                $this->apiclient->updateProyek($id, $data);
            } catch (Exception $e) {
                show_error($e->getMessage(), 500);
            }
            redirect('/');
        } else {
            // Fetch project by ID and pass to the view
            $data['proyek'] = json_decode($this->apiclient->getProyekById($id), true);
            $this->load->view('proyek/form_edit_proyek', $data); // Load edit project form
        }
    }

    public function hapus_lokasi($id)
    {
        try {
            $this->apiclient->deleteLokasi($id);
        } catch (Exception $e) {
            show_error($e->getMessage(), 500);
        }
        redirect('/');
    }

    public function hapus_proyek($id)
    {
        try {
            $this->apiclient->deleteProyek($id);
        } catch (Exception $e) {
            show_error($e->getMessage(), 500);
        }
        redirect('/');
    }
}
