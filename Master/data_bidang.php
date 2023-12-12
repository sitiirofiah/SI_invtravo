<?php

namespace Master;

use Config\Query_builder;

class data_bidang
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('data_bidang')->get()->resultArray();
        $res = '<a href="?target=data_bidang&act=tambah_data_bidang" class="btn btn-info btn-sm">tambah data_bidang</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>no</th>
                    <th>id_komentar</th>
                    <th>nama_lengkap</th>
                    <th>isi_komentar</th>
                    <th>id_berita</th>
                    <th>tanggal</th>
                    <th>jam</th>
                    <th>tampil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                <td width="10">' . $no . '</td>
                <td width="100">' . $r['id_komentar'] . '</td>
                <td>' . $r['nama_lengkap'] . '</td>
                <td>' . $r['isi_komentar'] . '</td>
                <td>' . $r['id_berita'] . '</td>
                <td>' . $r['tanggal'] . '</td>
                <td>' . $r['jam'] . '</td>
                <td>' . $r['tampil'] . '</td>
                <td width="150">
                    <a href="?target=data_bidang&act=edit_data_bidang&id=' . $r['id_komentar'] . '" class="btn btn-primary btn-sm">Edit</a>
                    <a href="?target=data_bidang&act=delete_data_bidang&id=' . $r['id_komentar'] . '" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=data_bidang" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=data_bidang&act=simpan_data_bidang">
            <div class="mb-3">
                <label for="id_komentar" class="form-label">id_komentar</label>
                <input type="text" class="form-control" id="id_komentar" name="id_komentar">
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">nama_lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="id_komentar">
            </div>
            <div class="mb-3">
                <label for="isi_komentar" class="form-label">isi_komentar</label>
                <input type="text" class="form-control" id="isi_komentar" name="isi_komentar">
            </div>
            <div class="mb-3">
                <label for="id_berita" class="form-label">id_berita</label>
                <input type="text" class="form-control" id="id_berita" name="id_berita">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">tanggal</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal">
            </div>
            <div class="mb-3">
                <label for="jam" class="form-label">jam</label>
                <input type="text" class="form-control" id="jam" name="jam">
            </div>
            <div class="mb-3">
                <label for="tampil" class="form-label">tampil</label>
                <input type="text" class="form-control" id="tampil" name="tampil">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan()
    {
        $id_komentar = $_POST['id_komentar'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $isi_komentar = $_POST['isi_komentar'];
        $id_berita = $_POST['id_berita'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $tampil = $_POST['tampil'];
        $data = array(
            'id_komentar' => $id_komentar,
            'nama_lengkap' => $nama_lengkap,
            'isi_komentar' => $isi_komentar,
            'id_berita' => $id_berita,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'tampil' => $tampil
        );
        return $this->db->table('data_bidang')->insert($data);
    }
    public function edit($id)
    {
        // get data data_bidang
        $r = $this->db->table('data_bidang')->where("id_komentar='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=data_bidang" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=data_bidang&act=update_data_bidang">
            <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_komentar'] . '">
            <div class="mb-3">
                <label for="id_komentar" class="form-label">id_komentar</label>
                <input type="text" class="form-control" id="id_komentar" name="id_komentar" value="' . $r['id_komentar'] . '">
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">nama_lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="' . $r['nama_lengkap'] . '">
            </div>
            <div class="mb-3">
                <label for="isi_komentar" class="form-label">isi_komentar</label>
                <input type="text" class="form-control" id="isi_komentar" name="isi_komentar" value="' . $r['isi_komentar'] . '">
            </div>
            <div class="mb-3">
                <label for="id_berita" class="form-label">id_berita</label>
                <input type="text" class="form-control" id="id_berita" name="id_berita" value="' . $r['id_berita'] . '">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">tanggal</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" value="' . $r['tanggal'] . '">
            </div>
            <div class="mb-3">
                <label for="jam" class="form-label">Jam</label>
                <input type="text" class="form-control" id="jam" name="jam" value="' . $r['jam'] . '">
            </div>
            <div class="mb-3">
                <label for="tampil" class="form-label">tampil</label>
                <input type="text" class="form-control" id="tampil" name="tampil" value="' . $r['tampil'] . '">
            </div>


            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>';
        return $res;
    }

    public function cekRadio($val, $val2)
    {
        if ($val == $val2) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $id_komentar = $_POST['id_komentar'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $isi_komentar = $_POST['isi_komentar'];
        $id_berita = $_POST['id_berita'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $tampil = $_POST['tampil'];

        $data = array(
            'id_komentar' => $id_komentar,
            'nama_lengkap' => $nama_lengkap,
            'isi_komentar' => $isi_komentar,
            'id_berita' => $id_berita,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'tampil'=> $tampil,
        );
        return $this->db->table('data_bidang')->where("id_komentar='$param'")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('data_bidang')->where("id_komentar='$id'")->delete();
    }
}
