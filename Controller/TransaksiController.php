<?php
class TransaksiController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek transaksi Model
     */

    public function __construct()
    {
        $this->model = new TransaksiModel();
    }
}
