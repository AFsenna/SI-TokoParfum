<?php
class KategoriController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek kategori Model
     */

    public function __construct()
    {
        $this->model = new KategoriModel();
    }
}
