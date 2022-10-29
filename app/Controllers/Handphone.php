<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\HandphoneModel;

class Handphone extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $modelHP = new HandphoneModel();
        $data['handphones'] = $modelHP->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }


    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $modelHP = new HandphoneModel();
        $data = $modelHP->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
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
    public function create()
    {
        $modelHP = new HandPhoneModel();
        $data = [
            'phone_photo'  => $this->request->getVar('phone_photo'),
            'name' => $this->request->getVar('name'),
            'network'  => $this->request->getVar('network'),
            'launch'  => $this->request->getVar('launch'),
            'body'  => $this->request->getVar('body'),
            'display'  => $this->request->getVar('display'),
            'platform'  => $this->request->getVar('platform'),
            'memory'  => $this->request->getVar('memory'),
            'maincam'  => $this->request->getVar('maincam'),
            'selfcam'  => $this->request->getVar('selfcam'),
            'sound'  => $this->request->getVar('sound'),
            'comms'  => $this->request->getVar('comms'),
            'features'  => $this->request->getVar('features'),
            'battery'  => $this->request->getVar('battery'),
            'tests'  => $this->request->getVar('tests'),
        ];
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data HP berhasil ditambahkan.'
            ]
        ];
        $registered = $modelHP->insert($data);
        $this->respondCreated($registered);
        return $this->respondCreated($registered);
        // return $this->respondCreated($response);
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
        $model = new HandphoneModel();
        $model->update($id, $this->request->getRawInput());
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $modelHP = new HandphoneModel();
        $data = $modelHP->where('id', $id)->delete($id);
        if ($data) {
            $modelHP->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}
