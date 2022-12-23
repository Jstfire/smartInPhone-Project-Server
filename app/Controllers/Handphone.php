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
        return $this->respond($data['handphones']);
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
        $filePP = $this->request->getFile('phone_photo');
        $fileName = $this->request->getVar('name').".png";
        $filePP->move('phone_photo', $fileName);
        $data = [
            'phone_photo'  => $fileName,
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
        // $registered = $modelHP->insert($data);
        $modelHP->save($data);
        $response = [
            'status'   => 200,
            'info' => 'Berhasil Add HP!'
        ];
        return $this->respond($response);
        // $this->respondCreated($registered);
        // return $this->respondCreated($registered);
        // // return $this->respondCreated($response);
    }

    public function showPhonePhoto($filename)
    {
        $filepath = "/phone_photo/".$filename;
        if(file_exists($filepath)){
            $mime = mime_content_type($filepath); //<-- detect file type
            header('Content-Length: '.filesize($filepath)); //<-- sends filesize header
            header("Content-Type: $mime"); //<-- send mime-type header
            header('Content-Disposition: inline; filename="'.$filepath.'";'); //<-- sends filename header
            readfile($filepath); //<--reads and outputs the file onto the output buffer
            exit(); // or die()
        } else {
            return $this->failNotFound('Foto HP tidak ditemukan.');
        }
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
        $data = [
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
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'info' => 'Berhasil Update HP!'
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
        $data = $modelHP->where('id', $id)->first();
        // var_dump($data);
        if ($data) {
            if ($data['phone_photo'] != 'phone_default.png') {
                $filePP = FCPATH."phone_photo/".$data['phone_photo'];
                unlink($filePP);
            }
            $modelHP->delete($id);
            $response = [
                'status'   => 200,
                'info' => 'Berhasil Hapus HP!'
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}
