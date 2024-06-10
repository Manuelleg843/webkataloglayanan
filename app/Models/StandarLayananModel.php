<?php

namespace App\Models;

use CodeIgniter\Model;

class StandarLayananModel extends Model
{
    protected $table            = 'standar_layanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_layanan', 'persyaratan', 'sistem_mekanisme_dan_prosedur', 'jangka_waktu_pelayanan', 'biaya_tarif', 'produk_layanan', 'penanganan_pengaduan_saran_masukan', 'dasar_hukum', 'sarana_prasarana_fasilitas', 'kopetensi_pelaksana', 'pengawasan_internal', 'jumlah_pelaksana', 'jaminan_pelayanan', 'jaminan_keamanan_keselamatan_pelayanan', 'evaluasi_kinerja_pelaksana', 'link', 'penyelenggara_layanan_id', 'gambar', 'status'
    ];


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

    public function get_standar_layanan_by_id($id)
    {
        return $this->where('id', $id)->first();
    }

    public function get_standar_layanan()
    {
        return $this->findAll();
    }

    public function get_standar_layanan_where_status($status)
    {
        return $this->where('status', $status)->findAll();
    }

    public function get_standar_layanan_where_penyelenggara_layanan_id($penyelenggara_layanan_id)
    {
        return $this->where('penyelenggara_layanan_id', $penyelenggara_layanan_id)->findAll();
    }
}
