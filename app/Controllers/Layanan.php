<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyelenggaraLayananModel;
use App\Models\ReviewStandarLayananModel;
use App\Models\StandarLayananModel;
use CodeIgniter\HTTP\ResponseInterface;

class Layanan extends BaseController
{
    protected $standarLayananModel;
    protected $penyelenggaraLayananModel;
    protected $reviewStandarLayananModel;

    public function __construct()
    {
        $this->standarLayananModel = new StandarLayananModel();
        $this->penyelenggaraLayananModel = new PenyelenggaraLayananModel();
        $this->reviewStandarLayananModel = new ReviewStandarLayananModel();
    }
    public function index()
    {
        //
    }

    public function manajemen_layanan()
    {
        // 

        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(1, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        if ($keyword = $this->request->getVar('search')) {
            # code...
            if (session()->get('role_id') == 1) {
                $standar_layanan = $this->standarLayananModel->groupStart()->like('nama_layanan', $keyword)->orLike('produk_layanan', $keyword)->groupEnd()->findAll();
            } else {
                $standar_layanan = $this->standarLayananModel->where('penyelenggara_layanan_id', session()->get('penyelenggara_layanan_id'))->groupStart()->like('nama_layanan', $keyword)->orLike('produk_layanan', $keyword)->groupEnd()->findAll();
            }
        } else {
            if (session()->get('role_id') == 1) {
                $standar_layanan = $this->standarLayananModel->get_standar_layanan();
            } else {
                $standar_layanan = $this->standarLayananModel->get_standar_layanan_where_penyelenggara_layanan_id(session()->get('penyelenggara_layanan_id'));
            }
        }


        // $standar_layanan = $this->standarLayananModel->get_standar_layanan();

        foreach ($standar_layanan as $key => $value) {
            $standar_layanan[$key]['penyelenggara_layanan'] = $this->penyelenggaraLayananModel->get_nama_penyelenggara_layanan_by_id($value['penyelenggara_layanan_id']);
        }

        $data = [
            'tajuk' => 'Manajemen Layanan',
            'standar_layanan' => $standar_layanan,
            'keyword' => $keyword,
        ];

        return view('layanan/manajemen_layanan', $data);
    }

    public function manajemen_persetujuan()
    {
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(2, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        if ($keyword = $this->request->getVar('search')) {
            # code...
            $standar_layanan = $this->standarLayananModel->where('status', 0)->groupStart()->like('nama_layanan', $keyword)->orLike('produk_layanan', $keyword)->groupEnd()->findAll();
        } else {
            $standar_layanan = $this->standarLayananModel->get_standar_layanan_where_status('0');
        }

        foreach ($standar_layanan as $key => $value) {
            $standar_layanan[$key]['penyelenggara_layanan'] = $this->penyelenggaraLayananModel->get_nama_penyelenggara_layanan_by_id($value['penyelenggara_layanan_id']);
        }

        $data = [
            'tajuk' => 'Persetujuan Layanan',
            'standar_layanan' => $standar_layanan,
            'keyword' => $keyword,
        ];

        return view('layanan/manajemen_persetujuan', $data);
    }

    public function detail_layanan($id)
    {
        // 
        $data = [
            'tajuk' => '',
            'standar_layanan' => $this->standarLayananModel->get_standar_layanan_by_id($id),
        ];

        if (!$data['standar_layanan']) {
            return view('layanan/missing_layanan');
        }

        if (session()->get('nama')) {
            return view('layanan/detail_layanan', $data);
        }

        return view('pages/detail_layanan', $data);
    }

    public function create_layanan()
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(1, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'tajuk' => 'Pengajuan Layanan',
            'validation' => \Config\Services::validation(),
        ];

        if (session()->get('role_id') == 1) {
            $data['penyelenggara_layanan'] = $this->penyelenggaraLayananModel->get_penyelenggara_layanan();
        } else {
            $data['penyelenggara_layanan'] = $this->penyelenggaraLayananModel->get_penyelenggara_layanan_by_id(session()->get('penyelenggara_layanan_id'));
        }

        return view('layanan/create_layanan', $data);
    }

    public function edit_layanan($id)
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(1, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        if (!$this->standarLayananModel->get_standar_layanan_by_id($id)) {
            return redirect()->to('/manajemen_layanan');
        }

        $data = [
            'tajuk' => 'Manajemen Layanan',
            'validation' => \Config\Services::validation(),
            'standar_layanan' => $this->standarLayananModel->get_standar_layanan_by_id($id),
        ];

        return view('layanan/edit_layanan', $data);
    }

    public function save()
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(1, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        if (session()->get('role_id') == 1) {
            $validation_rules = 'required';
        } else {
            $validation_rules = 'permit_empty';
        }

        if (!$this->validate([
            'nama_layanan' => [
                'rules' => 'required|is_unique[standar_layanan.nama_layanan]',
                'errors' => [
                    'required' => 'Nama layanan wajib diisi',
                    'is_unique' => 'Nama layanan sudah digunakan',
                ],
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ],
            ],
            'penyelenggara_layanan_id' => $validation_rules,
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('form_data', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->back();
        }

        if ($this->request->getFile('gambar')->isValid()) {
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('layanan_images', $namaGambar);
        } else {
            $namaGambar = 'default.jpg';
        }

        $standar_layanan = $this->request->getVar();

        if (!isset($standar_layanan['penyelenggara_layanan_id'])) {
            $standar_layanan['penyelenggara_layanan_id'] = session()->get('penyelenggara_layanan_id');
        }

        $this->standarLayananModel->save(
            [
                'nama_layanan' => $standar_layanan['nama_layanan'],
                'persyaratan' => $standar_layanan['persyaratan'],
                'sistem_mekanisme_dan_prosedur' => $standar_layanan['sistem_mekanisme_dan_prosedur'],
                'jangka_waktu_pelayanan' => $standar_layanan['jangka_waktu_pelayanan'],
                'biaya_tarif' => $standar_layanan['biaya_tarif'],
                'produk_layanan' => $standar_layanan['produk_layanan'],
                'penanganan_pengaduan_saran_masukan' => $standar_layanan['penanganan_pengaduan_saran_masukan'],
                'dasar_hukum' => $standar_layanan['dasar_hukum'],
                'sarana_prasarana_fasilitas' => $standar_layanan['sarana_prasarana_fasilitas'],
                'kopetensi_pelaksana' => $standar_layanan['kopetensi_pelaksana'],
                'pengawasan_internal' => $standar_layanan['pengawasan_internal'],
                'jumlah_pelaksana' => $standar_layanan['jumlah_pelaksana'],
                'jaminan_pelayanan' => $standar_layanan['jaminan_pelayanan'],
                'jaminan_keamanan_keselamatan_pelayanan' => $standar_layanan['jaminan_keamanan_keselamatan_pelayanan'],
                'evaluasi_kinerja_pelaksana' => $standar_layanan['evaluasi_kinerja_pelaksana'],
                'link' => $standar_layanan['link'],
                'penyelenggara_layanan_id' => $standar_layanan['penyelenggara_layanan_id'],
                'gambar' => $namaGambar,
            ]
        );

        session()->setFlashdata('pesan', 'Layanan berhasil diajukan');

        return redirect()->to('/manajemen_layanan');
    }

    public function update($id)
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(1, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        // cek nama layanan
        $layananLama = $this->standarLayananModel->get_standar_layanan_by_id($id)['nama_layanan'];
        if ($layananLama == $this->request->getVar('nama_layanan')) {
            $rule_nama_layanan = 'required';
        } else {
            $rule_nama_layanan = 'required|is_unique[standar_layanan.nama_layanan]';
        }

        if (!$this->validate([
            'nama_layanan' => [
                'rules' => $rule_nama_layanan,
                'errors' => [
                    'required' => 'Nama layanan wajib diisi',
                    'is_unique' => 'Nama layanan sudah digunakan',
                ],
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ],
            ],
        ])) {

            $validation = \Config\Services::validation();

            session()->setFlashdata('form_data', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->back();
        }

        if ($this->request->getFile('gambar')->isValid()) {
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('layanan_images', $namaGambar);

            if ($this->standarLayananModel->get_standar_layanan_by_id($id)['gambar'] != 'default.jpg') {
                unlink('layanan_images/' . $this->standarLayananModel->get_standar_layanan_by_id($id)['gambar']);
            }
        } else {
            $namaGambar = $this->standarLayananModel->get_standar_layanan_by_id($id)['gambar'];
        }

        $standar_layanan = $this->request->getVar();

        $this->standarLayananModel->save(
            [
                'id' => $id,
                'nama_layanan' => $standar_layanan['nama_layanan'],
                'persyaratan' => $standar_layanan['persyaratan'],
                'sistem_mekanisme_dan_prosedur' => $standar_layanan['sistem_mekanisme_dan_prosedur'],
                'jangka_waktu_pelayanan' => $standar_layanan['jangka_waktu_pelayanan'],
                'biaya_tarif' => $standar_layanan['biaya_tarif'],
                'produk_layanan' => $standar_layanan['produk_layanan'],
                'penanganan_pengaduan_saran_masukan' => $standar_layanan['penanganan_pengaduan_saran_masukan'],
                'dasar_hukum' => $standar_layanan['dasar_hukum'],
                'sarana_prasarana_fasilitas' => $standar_layanan['sarana_prasarana_fasilitas'],
                'kopetensi_pelaksana' => $standar_layanan['kopetensi_pelaksana'],
                'pengawasan_internal' => $standar_layanan['pengawasan_internal'],
                'jumlah_pelaksana' => $standar_layanan['jumlah_pelaksana'],
                'jaminan_pelayanan' => $standar_layanan['jaminan_pelayanan'],
                'jaminan_keamanan_keselamatan_pelayanan' => $standar_layanan['jaminan_keamanan_keselamatan_pelayanan'],
                'evaluasi_kinerja_pelaksana' => $standar_layanan['evaluasi_kinerja_pelaksana'],
                'link' => $standar_layanan['link'],
                'gambar' => $namaGambar,
            ]
        );

        if ($this->standarLayananModel->get_standar_layanan_by_id($id)['status'] == 2) {
            # code...
            $this->standarLayananModel->save(
                [
                    'id' => $id,
                    'status' => 0,
                ]
            );
        }

        session()->setFlashdata('pesan', 'Layanan berhasil diubah');

        return redirect()->to('/manajemen_layanan');
    }

    public function delete($id)
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(1, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        if ($this->standarLayananModel->get_standar_layanan_by_id($id)['gambar'] != 'default.jpg') {
            unlink('layanan_images/' . $this->standarLayananModel->get_standar_layanan_by_id($id)['gambar']);
        }

        $this->standarLayananModel->delete($id);

        session()->setFlashdata('pesan', 'Layanan berhasil dihapus');

        return redirect()->to('/manajemen_layanan');
    }

    public function approve($id)
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(2, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $this->request->getVar();
        $this->standarLayananModel->save(
            [
                'id' => $id,
                'status' => 1,
            ]
        );

        $this->reviewStandarLayananModel->where('standar_layanan_id', $id)->delete();

        session()->setFlashdata('pesan', 'Layanan berhasil disetujui');

        return redirect()->to('/manajemen_persetujuan');
    }

    public function review($id)
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(2, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'tajuk' => 'Review Layanan',
            'standar_layanan' => $this->standarLayananModel->get_standar_layanan_by_id($id),
        ];

        return view('layanan/review_layanan', $data);
    }

    public function save_review($id)
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(2, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        if (!$this->validate([
            'format' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Format layanan wajib diisi',
                ],
            ],
            'alur' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alur layanan wajib diisi',
                ],
            ],
            'catatan' => [
                'rules' => 'permit_empty',
            ],
            'komentar' => [
                'rules' => 'permit_empty',
            ],
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('form_data', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());

            return redirect()->back();
        }

        $review = $this->request->getVar();

        $this->reviewStandarLayananModel->save(
            [
                'standar_layanan_id' => $id,
                'format' => $review['format'],
                'alur' => $review['alur'],
                'catatan' => $review['catatan'],
                'komentar' => $review['komentar'],
            ]
        );

        $this->standarLayananModel->save(
            [
                'id' => $id,
                'status' => 2,
            ]
        );

        session()->setFlashdata('pesan', 'Review perbaikan layanan berhasil dikirim');

        return redirect()->to('/manajemen_persetujuan');
    }

    public function review_pengajuan()
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(1, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        if ($keyword = $this->request->getVar('search')) {
            if (session()->get('role_id') == 1) {
                $standar_layanan = $this->standarLayananModel->where('status', 2)->groupStart()->like('nama_layanan', $keyword)->orLike('produk_layanan', $keyword)->groupEnd()->findAll();
            } else {
                $standar_layanan = $this->standarLayananModel->where('status', 2)->where('penyelenggara_layanan_id', session()->get('penyelenggara_layanan_id'))->groupStart()->like('nama_layanan', $keyword)->orLike('produk_layanan', $keyword)->groupEnd()->findAll();
            }
        } else {
            if (session()->get('role_id') == 1) {
                $standar_layanan = $this->standarLayananModel->where('status', 2)->findAll();
            } else {
                $standar_layanan = $this->standarLayananModel->where('status', 2)->where('penyelenggara_layanan_id', session()->get('penyelenggara_layanan_id'))->findAll();
            }
        }

        foreach ($standar_layanan as $key => $value) {
            $standar_layanan[$key]['penyelenggara_layanan'] = $this->penyelenggaraLayananModel->get_nama_penyelenggara_layanan_by_id($value['penyelenggara_layanan_id']);
        }
        // dd($standar_layanan);

        $data = [
            'tajuk' => 'Review Pengajuan',
            'standar_layanan' => $standar_layanan,
            'keyword' => $keyword,
        ];

        return view('layanan/review_pengajuan', $data);
    }

    public function detail_review($id)
    {
        // 
        if (!session()->get('email')) {
            return redirect()->to('/login');
        }

        if (!in_array(1, session()->get('permission'))) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'tajuk' => 'Detail Review',
            'standar_layanan' => $this->standarLayananModel->get_standar_layanan_by_id($id),
            'review_standar_layanan' => $this->reviewStandarLayananModel->get_all_review_standar_layanan_by_id($id),
        ];

        return view('layanan/detail_review', $data);
    }
}
