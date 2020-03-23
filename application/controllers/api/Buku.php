<?php 

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require (APPPATH . '/libraries/REST_Controller.php');

class Buku extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model', 'buku');
        // menggunakan method model -> buku_model dapat di aliaskan menjadi buku
    }

    public function index_get()
    {
        $id = $this->get('id_buku');
        // deklarasikan dulu id -> ke kolom id_buku
        if($id===null) {
            $buku = $this->buku->getBook();
            // jika parameter tidak diisi maka tampilkan semua
        } else {
            $buku = $this->buku->getBook($id);
            // jika parameter diisi dengan id maka tampilkan data spesifik
        }

        if($buku){
            // jika buku yang dicari ditemukan maka respon
            $this->response([
                'status' => true,
                'data' => $buku
            ], REST_Controller::HTTP_OK); 
            
        } else {
            // jika tidak ditemukan
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }

    }

    public function index_delete()
    {
        $id = $this->delete('id_buku');

        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'please insert the right ID'
            ], REST_Controller::HTTP_BAD_REQUEST); 

        } else {
            if($this->buku->deleteBook($id) > 0) {
                // ok
                $this->response([
                    'status' => true,
                    'id' => $id, 
                    'message' => 'Delete success'
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                // where id not found
                $this->response([
                    'status' => false,
                    'message' => 'Unknown ID'
                ], REST_Controller::HTTP_BAD_REQUEST); 
            }
        }
    }

    public function index_post()
    {
        $data = [
            'judul_buku' => $this->post('judul_buku'),
            'jenis_buku' => $this->post('jenis_buku'),
            'nama_pengarang' => $this->post('nama_pengarang'),
            'jml_halaman' => $this->post('jml_halaman')
        ];

        if($this->buku->createBook($data)>0) {
            $this->response([
                'status' => true,                
                'message' => 'Success Insert the new Books'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to insert new books!'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }
    }

    public function index_put()
    {
        $id = $this->put('id_buku');
        $data = [
            'judul_buku' => $this->put('judul_buku'),
            'jenis_buku' => $this->put('jenis_buku'),
            'nama_pengarang' => $this->put('nama_pengarang'),
            'jml_halaman' => $this->put('jml_halaman')
        ];

        if($this->buku->updateBook($data, $id)>0) {
            $this->response([
                'status' => true,                
                'message' => 'Success update the Books'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to Update books!'
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }
    }
}