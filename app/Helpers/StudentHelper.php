<?php
use App\Models\MSiswaModel;

function getTotalSiswa() {
    $siswaModel = new MSiswaModel();
    return $siswaModel->countAll();
}
