<?php

namespace App\Livewire\Chart;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class Akreditasi extends Component
{
    public $akreditasis;
    public $program_studis;
    public $year;
    public $chartData = [];

    public function mount()
    {
        $this->year = now()->year;
        $this->chartData = $this->buildAkreditasiCountPerYear($this->akreditasis, (int)$this->year);
    }

    public function updatedYear()
    {
        $this->chartData = $this->buildAkreditasiCountPerYear($this->akreditasis, (int)$this->year);
    }

    private function buildAkreditasiCountPerYear($akreditasis, int $year): array
    {
        $colorMap = [
            'Unggul'              => '#1e3a8a',
            'A'                   => '#2563eb',
            'Baik Sekali'         => '#0ea5e9',
            'B'                   => '#22c55e',
            'Baik'                => '#fde047',
            'C'                   => '#facc15',
            'Tidak Terakreditasi' => '#f87171',
        ];

        $akreditasi = [];

        if ($akreditasis->has($year)) {
            $programs = $akreditasis->get($year);

            foreach ($programs as $item) {
                if (isset($item['program_studi']) && is_array($item['program_studi'])) {
                    foreach ($item['program_studi'] as $prodi) {
                        $start = Carbon::parse($prodi['tanggal_berlaku'])->year;
                        $end   = Carbon::parse($prodi['tanggal_berakhir'])->year;

                        if ($start <= $year && $end >= $year) {
                            $akreditasi[$item['akreditasi']] = ($akreditasi[$item['akreditasi']] ?? 0) + 1;
                        }
                    }
                }
            }
        }

        return [
            'labels' => array_keys($akreditasi),
            'data'   => array_values($akreditasi),
            'colors' => array_map(fn($k) => $colorMap[$k] ?? '#999', array_keys($akreditasi))
        ];
    }

    public function render()
    {
        return view('livewire.chart.akreditasi', [
            'akreditasis' => $this->akreditasis,
            'program_studis' => $this->program_studis
        ]);
    }
}
