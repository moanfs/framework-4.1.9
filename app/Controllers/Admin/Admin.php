<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->produk = new ProdukModel();
        if (session()->get('role') != "admin") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        return view("admin/index");
    }

    public function create()
    {
        $data = [
            'validation' => \config\Services::validation(),

        ];
        return view("admin/create", $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'required',
                'errors' => [
                    'required' => 'nama harus diisi'
                ]
            ],
            'alamat' => [
                'required',
                'errors' => [
                    'required' => 'alamat harus diisi'
                ]
            ],
            'keterangan' => [
                'required',
                'errors' => [
                    'required' => 'keterangan harus diisi'
                ]
            ],
            'kota' => [
                'required',
                'errors' => [
                    'required' => 'kota harus diisi'
                ]
            ],
            'zip' => [
                'required',
                'errors' => [
                    'required' => 'zip harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|ext_in[foto,png,jpg,jpeg]|max_size[foto,5048]',
                'errors' => [
                    'uploaded' => 'foto harus ada',
                    'ext_in' => 'gambar harus png, jpg, jpeg',
                    'max_size' => 'max Size 5 MB',
                ]
                // |ext_in[model,sav]
            ],
            'jenis' => [
                'required',
                'errors' => [
                    'required' => 'type must be selected'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $name = $this->request->getFile('foto');
        $name->move('assest/foto');
        $namafoto = $name->getName();
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $keterangan = $this->request->getVar('keterangan');
        $kota = $this->request->getVar('kota');
        $jenis = $this->request->getVar('jenis');
        $zip = $this->request->getVar('zip');

        $this->produk->save([
            'foto' => $namafoto,
            'nama' => $nama,
            'alamat' => $alamat,
            'keterangan' => $keterangan,
            'kota' => $kota,
            'jenis' => $jenis,
            'zip' => $zip,

        ]);

        session()->setFlashdata('seccess', 'upload successful');

        return redirect()->to(base_url('Admin/admin/create'));
    }
    public function table()
    {
        $data['produk'] = $this->produk->findAll();
        return view('admin/tabel', $data);
    }
    public function show($id_produk = null)
    {
        $valid = $this->produk->where('id_produk', $id_produk)->first();
        $data['produk'] = $valid;
        return view("admin/show", $data);
    }
}
