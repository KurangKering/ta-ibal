<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DeskripsiModel;

class DeskripsiController extends BaseController
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
        return view('deskripsi/index');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
    	$id = $this->request->getGet('id');
        $model = new DeskripsiModel();
        $data = $model->find($id);

        $response = [
            'success'=> true,
            'data' => $data,
        ];

        return $this->response->setJSON($response);

    }

    /**
     * Return data kata dasar.
     *
     * @return JSON datatables
     */
    public function show_all()
    {   
        $model = new DeskripsiModel();
        $dt = $model->getAll();
        echo $dt;
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create_or_update()
    {
        $id = $this->request->getPost('id');

        $response = ['success' => false];

        if ($id) {
            $response = $this->update();
        } 
        else {
            $response = $this->create();
        }

        return $this->response->setJSON($response);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new DeskripsiModel();

        $post = [
            'status_atas' => $this->request->getPost('status_atas'),
            'status_tengah' => $this->request->getPost('status_tengah'),
            'status_bawah' => $this->request->getPost('status_bawah'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $insert_data = $model->insert($post);

        if ($insert_data) {
            $response['success'] = true;
        }

        return $response;
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new DeskripsiModel();
        $id = $this->request->getPost('id');
    
        $post = [
            'status_atas' => $this->request->getPost('status_atas'),
            'status_tengah' => $this->request->getPost('status_tengah'),
            'status_bawah' => $this->request->getPost('status_bawah'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $update_status = $model->update($id, $post);

        if ($update_status) {
            $response['success'] = true;
        }

        return $response;
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $id = $this->request->getGet('id');

        $model = new DeskripsiModel();
        $delete_data = $model->delete($id);

        $response = [
            'success' => false,
        ];

        if ($delete_data) {
            $response['success'] = true;
        }

        return $this->response->setJSON($response);
    }
}
