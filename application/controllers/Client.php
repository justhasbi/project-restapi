<?php 

class Client extends CI_Controller {
    private $_client;
    function __construct() {
        parent::__construct();
    }

    function index() {
        $client = new GuzzleHttp\Client();

        $response = $client->request('GET', 'http://localhost/perpus-restapi/api/buku');

        $data['data'] = json_decode($response->getBody()->getContents());
        $this->load-view('admin/list', $data);
    }


    public function add() {
        $this->load->view('admin/add');
    }


    public function create() {
        $client = new GuzzleHttp\Client();

        $response = $client->request('POST', 'http://localhost/perpus-restapi/api/buku', [
            'form_params' => [
                'judul_buku' => $this->input->post('judul_buku'),
                'jenis_buku' => $this->input->post('jenis_buku'),
                'nama_pengarang' => $this->input->post('nama_pengarang'),
                'jml_halaman' => $this->input->post('jml_halaman')
            ]
        ]);
        return redirect(base_url('client'), 'refresh');
    }

    public function edit($id) {
        $client = new GuzzleHttp\Client();

        $response = $client->request('GET', 'http://localhost/perpus-restapi/api/buku', [
            'query' => [
                'id_buku' => $id
            ]
        ]);

        $data['data'] = json_decode($response->getBody()->getContents())[0];

        $this->load->view('admin/edit', $data);
    }

    public function update() {
        $client = new GuzzleHtt\Client();

        $response = $client->request('PUT', 'http://localhost/perpus-restapi/api/buku', [
            'json' => [
                'judul_buku' => $this->input->post('judul_buku'),
                'jenis_buku' => $this->input->post('jenis_buku'),
                'nama_pengarang' => $this->input->post('nama_pengarang'),
                'jml_halaman' => $this->input->post('jml_halaman')
            ]
        ]);

        return redirect(base_url('client'), 'refresh');
    }

    function delete($id) {
        $client = new GuzzleHttp\Client();

        $response = $client->request('DELETE', 'http://localhost/perpus-restapi/api/buku', [
            'form_params' => [
                'id_buku' => $id
            ]
        ]);
        return redirect(base_url('client'), 'refresh');
    }
}
