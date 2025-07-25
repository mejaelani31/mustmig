<?php

namespace App\Livewire;

use App\Models\SuratPernyataan;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SuratPernyataanCrud extends Component
{
    use WithFileUploads;

    public $suratId;
    public $id_pelanggan;
    public $nama_pelanggan;
    public $alamat_pelanggan;
    public $tarif_pelanggan = 'R';
    public $daya_pelanggan = 900;
    public $tanggal_ttd;
    public $nama_ttd;
    public $alamat_ttd;
    public $nik_ttd;
    public $nohp_ttd;
    public $file_ttd;

    public $showingModal = false;
    public $confirmingDeletion = false;
    public $deleteId;

    protected $rules = [
        'id_pelanggan' => 'required|integer',
        'nama_pelanggan' => 'required|string',
        'alamat_pelanggan' => 'nullable|string',
        'tarif_pelanggan' => 'required|string',
        'daya_pelanggan' => 'required|integer',
        'tanggal_ttd' => 'nullable|date',
        'nama_ttd' => 'required|string',
        'alamat_ttd' => 'nullable|string',
        'nik_ttd' => 'required|string',
        'nohp_ttd' => 'required|string',
        'file_ttd' => 'nullable|file|mimes:pdf',
    ];

    public function render()
    {
        return view('livewire.surat-pernyataan-crud', [
            'items' => SuratPernyataan::latest()->get(),
        ]);
    }

    public function create()
    {
        $this->resetForm();
        $this->showingModal = true;
    }

    public function edit(SuratPernyataan $surat)
    {
        $this->suratId = $surat->id;
        $this->id_pelanggan = $surat->id_pelanggan;
        $this->nama_pelanggan = $surat->nama_pelanggan;
        $this->alamat_pelanggan = $surat->alamat_pelanggan;
        $this->tarif_pelanggan = $surat->tarif_pelanggan;
        $this->daya_pelanggan = $surat->daya_pelanggan;
        $this->tanggal_ttd = $surat->tanggal_ttd;
        $this->nama_ttd = $surat->nama_ttd;
        $this->alamat_ttd = $surat->alamat_ttd;
        $this->nik_ttd = $surat->nik_ttd;
        $this->nohp_ttd = $surat->nohp_ttd;
        $this->file_ttd = null;

        $this->showingModal = true;
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->file_ttd) {
            $data['file_ttd'] = $this->file_ttd->store('surat', 'public');
        }

        SuratPernyataan::updateOrCreate(['id' => $this->suratId], $data);

        $this->showingModal = false;
        $this->resetForm();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        $surat = SuratPernyataan::find($this->deleteId);
        if ($surat) {
            if ($surat->file_ttd) {
                Storage::disk('public')->delete($surat->file_ttd);
            }
            $surat->delete();
        }

        $this->confirmingDeletion = false;
    }

    private function resetForm()
    {
        $this->reset(['suratId', 'id_pelanggan', 'nama_pelanggan', 'alamat_pelanggan', 'tarif_pelanggan', 'daya_pelanggan', 'tanggal_ttd', 'nama_ttd', 'alamat_ttd', 'nik_ttd', 'nohp_ttd', 'file_ttd']);
        $this->tarif_pelanggan = 'R';
        $this->daya_pelanggan = 900;
    }
}
