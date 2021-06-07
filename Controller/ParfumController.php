<?php
class ParfumController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek parfum Model
     */

    public function __construct()
    {
        $this->model = new ParfumModel();
    }
}
