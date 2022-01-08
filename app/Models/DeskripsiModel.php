<?php

namespace App\Models;

use CodeIgniter\Model;
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\Codeigniter4Adapter;
use Tightenco\Collect\Support\Collection;

/**
 * This class describes a kata dasar model.
 */
class DeskripsiModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'deskripsi';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id','status_atas', 'status_tengah', 'status_bawah', 'keterangan'];

    // Dates
    protected $useTimestamps        = false;



    /**
     * Mendapatkan semua kata dasar yang ada di database.
     */
    public function getAll()
    {
        $dt = new Datatables(new Codeigniter4Adapter());
        $dt->query('select id, status_atas, status_tengah, status_bawah, keterangan from deskripsi');

        $dt->add('action', function($q) {
            return '';
        });
        echo $dt->generate();
    }
}
