<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DataMasterModel;
use CodeIgniter\Files\File;

class DataMasterController extends ResourceController
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
        return view('data-master/index');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $id = $this->request->getGet('id');
        $model = new DataMasterModel();
        $data = $model->find($id);

        $response = [
            'success' => true,
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
        $model = new DataMasterModel();
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
        } else {
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
        $this->request->setHeader('Accept', 'application/json');

        $model = new DataMasterModel();

        $post = [
            'tipe' => $this->request->getPost('tipe'),
            'jawaban' => $this->request->getPost('jawaban'),
        ];
        $img = $this->request->getFile('file');

        $response = [];
        $status_upload = false;

        if ($img->isValid()) {
            $name = '';
            if (!$img->hasMoved()) {

                $newName = $img->getRandomName();
                $img->move(ROOTPATH . 'public/uploads', $newName);

                $name = $img->getName();
                $status_upload = true;
            } else {
                $data = ['errors' => 'The file has already been moved.'];
            }

            $post['file'] = $name;
        }
        $insert_data = $model->insert($post);

        $response['success'] = true;

        return $response;
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new DataMasterModel();
        $id = $this->request->getPost('id');

        $post = [
            'tipe' => $this->request->getPost('tipe'),
            'jawaban' => $this->request->getPost('jawaban'),
        ];

        $img = $this->request->getFile('file');

        $response = [];
        $status_upload = false;

        if ($img->isValid()) {
            $name = '';
            if (!$img->hasMoved()) {

                $newName = $img->getRandomName();
                $img->move(ROOTPATH . 'public/uploads', $newName);

                $name = $img->getName();
                $status_upload = true;
            } else {
                $data = ['errors' => 'The file has already been moved.'];
            }

            $post['file'] = $name;
        }

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

        $model = new DataMasterModel();
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
