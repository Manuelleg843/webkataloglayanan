<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyelenggaraLayananModel extends Model
{
    protected $table            = 'penyelenggara_layanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_penyelenggara_layanan_by_id($id)
    {
        return $this->where('id', $id)->first();
    }

    public function get_penyelenggara_layanan()
    {
        return $this->findAll();
    }

    public function get_nama_penyelenggara_layanan_by_id($id)
    {
        $penyelenggara_layanan = $this->get_penyelenggara_layanan_by_id($id);
        return $penyelenggara_layanan['nama'];
    }
}
