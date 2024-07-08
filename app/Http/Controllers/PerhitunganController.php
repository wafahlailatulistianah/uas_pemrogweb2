<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();

        $bobot = $this->ambilBobot();
        $kriteria = ['C1', 'C2', 'C3', 'C4', 'C5'];

        $pembagi = $this->hitungPembagi($alternatifs, $kriteria);
        $ternormalisasi = $this->normalisasiData($alternatifs, $kriteria, $pembagi);
        $terbobot = $this->pemberianBobot($ternormalisasi, $kriteria, $bobot);

        list($solusiIdealPositif, $solusiIdealNegatif) = $this->cariSolusiIdeal($terbobot, $kriteria);
        $jarakPemisah = $this->hitungJarakPemisah($terbobot, $kriteria, $solusiIdealPositif, $solusiIdealNegatif);

        $nilaiPreferensi = $this->hitungNilaiPreferensi($jarakPemisah);
        $hasilPeringkat = $this->peringkatHasil($nilaiPreferensi, $alternatifs, $jarakPemisah);

        return view('perhitungan.index', compact('alternatifs', 'ternormalisasi', 'terbobot', 'solusiIdealPositif', 'solusiIdealNegatif', 'jarakPemisah', 'hasilPeringkat', 'pembagi'));
    }

    private function ambilBobot()
    {
        return [
            'C1' => 5,
            'C2' => 5,
            'C3' => 4,
            'C4' => 3,
            'C5' => 5,
        ];
    }

    private function hitungPembagi($alternatifs, $kriteria)
    {
        $pembagi = [];
        foreach ($kriteria as $krit) {
            $pembagi[$krit] = sqrt($alternatifs->sum(function($item) use ($krit) {
                return pow($item[$krit], 2);
            }));
        }
        return $pembagi;
    }

    private function normalisasiData($alternatifs, $kriteria, $pembagi)
    {
        $ternormalisasi = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriteria as $krit) {
                $ternormalisasi[$alt->id][$krit] = $alt[$krit] / $pembagi[$krit];
            }
        }
        return $ternormalisasi;
    }

    private function pemberianBobot($ternormalisasi, $kriteria, $bobot)
    {
        $terbobot = [];
        foreach ($ternormalisasi as $id => $nilai) {
            foreach ($nilai as $krit => $value) {
                $terbobot[$id][$krit] = $value * $bobot[$krit];
            }
        }
        return $terbobot;
    }

    private function cariSolusiIdeal($terbobot, $kriteria)
    {
        $solusiIdealPositif = [];
        $solusiIdealNegatif = [];

        foreach ($kriteria as $krit) {
            if (in_array($krit, ['C1', 'C2', 'C3', 'C4'])) {
                $solusiIdealPositif[$krit] = min(array_column($terbobot, $krit));
                $solusiIdealNegatif[$krit] = max(array_column($terbobot, $krit));
            } else {
                $solusiIdealPositif[$krit] = max(array_column($terbobot, $krit));
                $solusiIdealNegatif[$krit] = min(array_column($terbobot, $krit));
            }
        }
        return [$solusiIdealPositif, $solusiIdealNegatif];
    }

    private function hitungJarakPemisah($terbobot, $kriteria, $solusiIdealPositif, $solusiIdealNegatif)
    {
        $jarakPemisah = [];
        foreach ($terbobot as $id => $nilai) {
            $dPositif = 0;
            $dNegatif = 0;
            foreach ($kriteria as $krit) {
                $dPositif += pow($nilai[$krit] - $solusiIdealPositif[$krit], 2);
                $dNegatif += pow($nilai[$krit] - $solusiIdealNegatif[$krit], 2);
            }
            $jarakPemisah[$id]['dPositif'] = sqrt($dPositif);
            $jarakPemisah[$id]['dNegatif'] = sqrt($dNegatif);
        }
        return $jarakPemisah;
    }

    private function hitungNilaiPreferensi($jarakPemisah)
    {
        $nilaiPreferensi = [];
        foreach ($jarakPemisah as $id => $jarak) {
            $v = $jarak['dNegatif'] / ($jarak['dPositif'] + $jarak['dNegatif']);
            $nilaiPreferensi[$id] = $v;
        }
        return $nilaiPreferensi;
    }

    private function peringkatHasil($nilaiPreferensi, $alternatifs, $jarakPemisah)
    {
        arsort($nilaiPreferensi);
        $hasilPeringkat = [];
        $peringkat = 1;
        foreach ($nilaiPreferensi as $id => $v) {
            $hasilPeringkat[$id] = [
                'peringkat' => $peringkat,
                'merek' => $alternatifs->find($id)->merek,
                'nilaiPreferensi' => $v,
                'dPositif' => $jarakPemisah[$id]['dPositif'],
                'dNegatif' => $jarakPemisah[$id]['dNegatif'],
            ];
            $peringkat++;
        }
        return $hasilPeringkat;
    }
}
