<?php
class PegawaiController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek pegawai Model
     */

    public function __construct()
    {
        $this->model = new PegawaiModel();
    }
}
