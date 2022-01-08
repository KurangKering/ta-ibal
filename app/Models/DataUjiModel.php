<?php

namespace App\Models;

use CodeIgniter\Model;
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\Codeigniter4Adapter;

class DataUjiModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'data_uji';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id','jawaban_atas', 'jawaban_tengah', 'jawaban_bawah', 'file_atas', 'file_tengah', 'file_bawah'];


// Dates
    protected $useTimestamps        = false;


    /**
    * Mendapatkan semua data uji yang ada di database.
    */
    public function getAll()
    {
        $dt = new Datatables(new Codeigniter4Adapter());
        $dt->query('select id, jawaban_atas, jawaban_tengah, jawaban_bawah, file_atas, file_tengah, file_bawah from data_uji');

        $dt->add('action', function($q) {
            return '';
        });
        echo $dt->generate();
    }


}
