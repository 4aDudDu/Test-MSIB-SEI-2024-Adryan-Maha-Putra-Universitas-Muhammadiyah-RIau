<?php
class Proyek_model extends CI_Model {

    public function get_all_proyek() {
        $response = file_get_contents('http://localhost:8080/api/proyek');
        return json_decode($response, true);
    }

    public function get_proyek_by_id($id) {
        $response = file_get_contents('http://localhost:8080/api/proyek/' . $id);
        return json_decode($response, true);
    }

    public function insert_proyek($data) {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents('http://localhost:8080/api/proyek', false, $context);
        return $result;
    }

    public function update_proyek($id, $data) {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'PUT',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents('http://localhost:8080/api/proyek/' . $id, false, $context);
        return $result;
    }

    public function delete_proyek($id) {
        $options = array(
            'http' => array(
                'method'  => 'DELETE',
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents('http://localhost:8080/api/proyek/' . $id, false, $context);
        return $result;
    }
}
?>
