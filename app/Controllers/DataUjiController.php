<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DataUjiModel;

class DataUjiController extends ResourceController
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
        return view('data-uji/index');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $id = $this->request->getGet('id');
        $model = new DataUjiModel();
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
        $model = new DataUjiModel();
        $dt = $model->getAll();
        echo $dt;
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
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
        $model = new DataUjiModel();
        $kata = $this->request->getPost('kata');
        $kata_pakar = $this->request->getPost('kata_pakar');

        $data = [

            'kata' => $kata,
            'kata_pakar' => $kata_pakar
        ];

        $insert_data = $model->insert($data);

        if ($insert_data) {
            $response['success'] = true;
        }

        return $response;
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new DataUjiModel();
        $id = $this->request->getPost('id');
        $kata = $this->request->getPost('kata');
        $kata_pakar = $this->request->getPost('kata_pakar');

        $data = [
            'kata' => $kata,
            'kata_pakar' => $kata_pakar,
        ];


        $update_status = $model->update($id, $data);

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

        $model = new DataUjiModel();
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
