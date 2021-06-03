<?php

/**
 * Function koneksi digunakan untuk membuat koneksi ke database
 * dengan tablespace 'db_TokoParfum'
 * @return new mysqli digunakan untuk mengembalikan nilai object pada file mysql
 */

function koneksi()
{
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_database = "db_TokoParfum";
    try {
        return new mysqli($db_host, $db_user, $db_password, $db_database);
    } catch (Exception $e) {
        echo "Terjadi Kesalahan koneksi database";
    }
}

/**
 * function dd ini berfungsi untuk melihat/debug sebuah varianel dan menghentikan program
 * @param variabel $data berisi data yang ingin di debug
 */

function dd($data)
{
    echo '<pre>' . var_export($data, true) . '</pre>';
    die();
}
