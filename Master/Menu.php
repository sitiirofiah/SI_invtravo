<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/utsku/index.php?target=";
        $data = [
            array('Text' => 'Home', 'Link' => $base . 'home'),
            array('Text' => 'data_bidang', 'Link' => $base . 'data_bidang'),
            array('Text' => 'kegiatan', 'Link' => $base . 'kegiatan'),
            array('Text' => 'user', 'Link' => $base . 'user'),
        ];
        return $data;
    }
}
