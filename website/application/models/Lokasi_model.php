<?php
class Lokasi_model extends CI_Model {

    public function get_all_lokasi() {
        $response = file_get_contents('http://localhost:8080/api/lokasi');
        return json_decode($response, true);
    }

    public function get_lokasi_by_id($id) {
        $response = file_get_contents('http://localhost:8080/api/lokasi/' . $id);
        return json_decode($response, true);
    }

    public function insert_lokasi($data) {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents('http://localhost:8080/api/lokasi', false, $context);
        return $result;
    }

    public function update_lokasi($id, $data) {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'PUT',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents('http://localhost:8080/api/lokasi/' . $id, false, $context);
        return $result;
    }

    public function delete_lokasi($id) {
        $options = array(
            'http' => array(
                'method'  => 'DELETE',
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents('http://localhost:8080/api/lokasi/' . $id, false, $context);
        return $result;
    }
}
?>
