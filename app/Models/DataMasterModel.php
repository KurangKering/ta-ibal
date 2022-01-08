<?php

namespace App\Models;

use CodeIgniter\Model;
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\Codeigniter4Adapter;
use Tightenco\Collect\Support\Collection;

/**
 * This class describes a kata dasar model.
 */
class DataMasterModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'data_master';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id', 'tipe', 'jawaban', 'file'];

    // Dates
    protected $useTimestamps        = false;



    /**
     * Mendapatkan semua kata dasar yang ada di database.
     */
    public function getAll()
    {
        $dt = new Datatables(new Codeigniter4Adapter());
        $dt->query('select id, tipe, jawaban, file from data_master');

        $dt->add('action', function($q) {
            return '';
        });

        $dt->edit('file', function($q) {
            $link = base_url() . "/uploads/" . $q['file'];
            return "<a class=\"example-image-link\" href=\"".$link."\" data-lightbox=\"".$link."\"><img data-lightbox=\"image-1\"  class=\"image-dt\" src=\"" . $link . "\" alt=\"\">";
        });
        echo $dt->generate();
    }
}
