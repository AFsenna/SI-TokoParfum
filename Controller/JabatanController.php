<?php
class JabatanController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek jabatan Model
     */

    public function __construct()
    {
        $this->model = new JabatanModel();
    }
}
