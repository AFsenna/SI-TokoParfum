<?php
class AuthController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek auth Model
     */

    public function __construct()
    {
        $this->model = new AuthModel();
    }
}
