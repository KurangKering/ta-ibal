<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DataMasterModel;
use App\Models\DeskripsiModel;

class PengujianController extends ResourceController
{


    public function __construct()
    {
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $dataMasterModel = new DataMasterModel();
        $dm = $dataMasterModel->findAll();

        $data_master = [];
        foreach ($dm as $k => $v) {
            $data_master[$v['tipe']][$v['jawaban']] = $v;
        }

        $data = [
            'data_master' => $data_master,
        ];
        echo view('pengujian/index', $data);
    }

    public function uji()
    {
        $post = $this->request->getPost();

        $where = [
            'status_atas' => $post['atas'],
            'status_tengah' => $post['tengah'],
            'status_bawah' => $post['bawah'],
        ];


        $deskripsiModel = new DeskripsiModel();
        $deskripsi = $deskripsiModel->where($where)->first();

        $html =  "<div class=\"text-center d-flex align-items-center justify-content-center\">
        <div class=\"\">
            <h1 class=\"text-center\">Kesimpulan</h1>
            <blockquote class=\"blockquote\">
                <p class=\"mb-0\">" . $deskripsi['keterangan'] . "</p>
            </blockquote>
            <button class=\"btn btn-sm btn-default\" onclick=\"location.href='" . base_url('pengujian/') . "'\">Lakukan Pengujian lagi ?</button>

        </div>
    </div>";

        return $this->response->setJSON(['success' => true, 'html' => $html]);
    }
}
