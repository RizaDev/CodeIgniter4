<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $KomikModel;

    public function __construct()
    {
        $this->KomikModel = new KomikModel();
    }

    public function index()
    {
        // dd($this->KomikModel->getKomik());
        $data = [
            'title' => 'WebSP | Daftar Komik',
            'komiks' => $this->KomikModel->getKomik()
        ];

        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");

        // foreach ($komik->getResultArray() as $row) {
        //     var_dump($row);
        // }

        return view('komik/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'WebSP | Detail Komik',
            'komik' => $this->KomikModel->getKomik($slug)
        ];

        //jika komik tidak ada di tabel
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("judul komik $slug tidak ditemukan");
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'WebSP | Tambah Komik',
            'validation' => \Config\Services::validation()
        ];


        return view('komik/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                ]
            ],
            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Pilih gambar sampul terlebih dahulu',
                    'max_size' => 'Ukuran file gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'file yang anda upload harus gambar',
                    'mime_in' => 'Yang Anda pilih bukan gambar'
                ]
            ]

        ])) {
            // $validation =  \Config\Services::validation();

            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }

        // Ambil gambar
        $fileGambar = $this->request->getFile('sampul');
        //Generate nama file gambar random
        $namaGambar = $fileGambar->getRandomName();
        //pindahkan file gambar ke folder img
        $fileGambar->move('img', $namaGambar);

        //save ke database 
        $this->KomikModel->save([
            'judul' => $this->request->getPost('judul'),
            'slug' => url_title($this->request->getPost('judul'), '-', true),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'sampul' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data komik berhasil ditambahkan!');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        //hapus gambar di folder img sesuai $id 
        $komik = $this->KomikModel->find($id);
        // unlink('img/' . $komik['sampul']);
        //hapus data ditabel sesuai id
        $this->KomikModel->delete($id);

        session()->setFlashdata('pesan', 'Data komik berhasil dihapus!');
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        // dd($this->KomikModel->getKomik($slug));
        $data = [
            'title' => 'WebSP | Edit Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->KomikModel->getKomik($slug)
        ];


        return view('komik/edit', $data);
    }

    public function update($id)
    {
        $komiklama = $this->KomikModel->getKomik($this->request->getPost('slug'));
        //jika judul tidak diubah dan sama dengan judul lama
        if ($komiklama['judul'] == $this->request->getPost('judul')) {
            $rules_judul = 'required';
        } else {
            //jika judul berbeda, maka wajib unik dari judul yang lainnya
            $rules_judul = 'required|is_unique[komik.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rules_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran file gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'file yang anda upload harus gambar',
                    'mime_in' => 'Yang Anda pilih bukan gambar'
                ]
            ]
        ])) {

            return redirect()->to('/komik/edit/' . $this->request->getPost('slug'))->withInput();
        }

        // Ambil gambar dari request
        $fileGambar = $this->request->getFile('sampul');
        //cek gambar, apakah user input gambar baru
        //jika user tdk input gambar baru
        //maka $fileGambar->getError() == 4
        if ($fileGambar->getError() == 4) {
            $namaSampul = $this->request->getPost('sampulLama');
        } else {
            //hapus gambar lama jika user input gambar baru
            unlink('img/' . $this->request->getPost('sampulLama'));
            //generate nama gambar baru secara random
            $namaSampul = $fileGambar->getRandomName();
            //tambahkan gambar baru ke folder img
            $fileGambar->move('img', $namaSampul);
        }



        //update ke database sesuai id
        $this->KomikModel->save([
            'judul' => $this->request->getPost('judul'),
            'id' => $id,
            'slug' => $this->request->getPost('slug'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data komik berhasil diubah!');

        return redirect()->to('/komik');
    }
}
