<?php 

use GuzzleHttp\Client;

class Buku_model extends CI_Model
{
    public function getBook($id=null)
    {

        // if($id ===null){
        //     return $this->db->get('buku')->result_array();
        // } else {
        //     return $this->db->get_where('buku', ['id_buku' => $id])->result_array();
        //     // tampilkan select * from buku where id_buku = $id
        // }
        

        $client = new Client();
        $response = $client->request('GET', 'http://localhost/perpus-restapi/api/buku');
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];

    }

    public function deleteBook($id) 
    {
        $this->db->delete('buku', ['id_buku' => $id]);
        return $this->db->affected_rows();
    }

    public function createBook($data) 
    {
       $this->db->insert('buku', $data) ;
       return $this->db->affected_rows();
    }

    public function updateBook($data, $id)
    {
        $this->db->update('buku', $data, ['id_buku' => $id]);
        return $this->db->affected_rows();
    }
}