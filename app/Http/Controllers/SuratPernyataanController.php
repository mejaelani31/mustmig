<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratPernyataanController extends Controller
{
    public function index()
    {
        return view('surat-pernyataans.index');
    }
}
