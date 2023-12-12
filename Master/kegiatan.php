<?php

namespace Master;

use Config\Query_builder;

class kegiatan
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('kegiatan')->get()->resultArray();
        $res = '<a href="?target=kegiatan&act=kegiatan" class="btn btn-info btn-sm">kegiatan</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>id_berita</th>
                    <th>capaian</th>
                    <th>kategori</th>
                    <th>keterangan</th>
                    <th>image</th>
                    <th>created_at</th>
                    <th>username</th>
                    <th>create_by</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                <td width="10">' . $no . '</td>
                <td width="100">' . $r['id_berita'] . '</td>
                <td>' . $r['capaian'] . '</td>
                <td>' . $r['kategori'] . '</td>
                <td>' . $r['keterangan'] . '</td>
                <td>' . $r['image'] . '</td>
                <td>' . $r['created_at'] . '</td>
                <td>' . $r['username'] . '</td>
                <td>' . $r['create_by'] . '</td>
                <td width="150">
                    <a href="?target=kegiatan&act=edit_kegiatan&id=' . $r['id_berita'] . '" class="btn btn-primary btn-sm">Edit</a>
                    <a href="?target=kegiatan&act=delete_kegiatan&id=' . $r['id_berita'] . '" class="btn btn-danger btn-sm">Hapus</a>
                </td>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=kegiatan" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=kegiatan&act=simpan_kegiatan">
            <div class="mb-3">
                <label for="id_berita" class="form-label">id_berita</label>
                <input type="text" class="form-control" id="id_berita" name="id_berita">
            </div>
            <div class="mb-3">
                <label for="capaian" class="form-label">capaian</label>
                <input type="text" class="form-control" id="capaian" name="capaian">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">keterangan</label>
                <input type="date" class="form-control" id="keterangan" name="keterangan">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">created_at</label>
                <input type="text" class="form-control" id="created_at" name="created_at">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="create_by" class="form-label">create_by</label>
                <input type="text" class="form-control" id="create_by" name="create_by">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>';

        return $res;
    }

    public function simpan()
    {
        $id_berita = $_POST['id_berita'];
        $capaian = $_POST['capaian'];
        $kategori = $_POST['kategori'];
        $keterangan = $_POST['keterangan'];
        $image = $_POST['image'];
        $created_at = $_POST['created_at'];
        $username = $_POST['username'];
        $create_by = $_POST['create_by'];

        $data = array(
            'id_berita' => $id_berita,
            'capaian' => $capaian,
            'kategori' => $kategori,
            'keterangan' => $keterangan,
            'image' => $image,
            'created_at' => $created_at,
            'username' => $username,
            'create_by' => $create_by,
        );
        return $this->db->table('kegiatan')->insert($data);
    }
    public function edit($id)
    {
        // get data kegiatan
        $r = $this->db->table('kegiatan')->where("id_berita='$id'")->get()->rowArray();
        //cek radio

        $res = '<a href="?target=kegiatan" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=kegiatan&act=update_kegiatan">
            <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_berita'] . '">

            <div class="mb-3">
                <label for="id_berita" class="form-label">id_berita</label>
                <input type="text" class="form-control" id="id_berita" name="id_berita" value="' . $r['id_berita'] . '">
            </div>
            <div class="mb-3">
                <label for="capaian" class="form-label">capaian</label>
                <input type="text" class="form-control" id="capaian" name="capaian" value="' . $r['capaian'] . '">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="' . $r['kategori'] . '">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="' . $r['keterangan'] . '">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="text" class="form-control" id="image" name="image" value="' . $r['image'] . '">
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">created_at</label>
                <input type="text" class="form-control" id="created_at" name="created_at" value="' . $r['created_at'] . '">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" value="' . $r['username'] . '">
            </div>
            <div class="mb-3">
                <label for="create_by_pjg" class="form-label">create_by</label>
                <input type="text" class="form-control" id="create_by_pjg" name="create_by_pjg" value="' . $r['create_by_pjg'] . '">
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
        $id_berita = $_POST['id_berita'];
        $capaian = $_POST['capaian'];
        $kategori = $_POST['kategori'];
        $keterangan = $_POST['keterangan'];
        $image = $_POST['image'];
        $created_at = $_POST['created_at'];
        $username = $_POST['username'];
        $create_by = $_POST['create_by'];

        $data = array(
            'id_berita' => $id_berita,
            'capaian' => $capaian,
            'kategori' => $kategori,
            'keterangan' => $keterangan,
            'image' => $image,
            'created_at' => $created_at,
            'username' => $username,
            'create_by' => $create_by,
        );
        return $this->db->table('kegiatan')->where("id_berita='$param'")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('kegiatan')->where("id_berita='$id'")->delete();
    }
}
