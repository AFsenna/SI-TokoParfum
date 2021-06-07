<?php
class PembeliController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek pembeli Model
     */

    public function __construct()
    {
        $this->model = new PembeliModel();
    }
}
