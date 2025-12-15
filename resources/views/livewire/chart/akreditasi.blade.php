<div class="grafik-akreditasi__container">
    {{-- <select wire:model.live="year">
        @for ($i = 2020; $i <= 2027; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select> --}}
    <div style="display: flex; gap: 1em; justify-content: space-between;">
        <div class="grafik-akreditasi__item">
            <h3 class="item__title">Pie Akreditasi Program Studi</h3>
            <x-chart id="pie_akreditasi" height="220px" width="360px" type="pie" :labels="$chartData['labels']" :data="$chartData['data']" :colors="$chartData['colors']" title="Jumlah Program Studi"/>            
        </div>
        <div class="grafik-akreditasi__item">
            <h3 class="item__title">Grafik Akreditasi Program Studi</h3>
            <x-chart id="bar_akreditasi" height="220px" width="520px" type="bar" :labels="$chartData['labels']" :data="$chartData['data']" :colors="$chartData['colors']" title="Jumlah Program Studi"/>            
        </div>
    </div>
    <div x-data="akreditasiTabs(@js($program_studis))" x-init="init()" class="grafik-akreditasi__tab">
        <div class="tab__menu">
            <template x-for="(tab, index) in tabs" :key="index">
                <button :class="active === index ? 'active' : ''" @click="active = index" x-text="tab.upps"></button>
            </template>
        </div>
        <div x-show="tabs.length > 0" class="tab__content">
            <h2 x-text="tabs[active].upps" class="content__title"></h2>
            <div style="display: flex; width: 100%; padding: 1em">
                <table>
                    <thead>
                        <tr>
                            <th>Program Studi</th>
                            <th>Akreditasi</th>
                            <th>Masa Berlaku</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="row in tabs[active].prodis" :key="row.id">
                            <tr>
                                <td x-text="row.nama"></td>
                                <td x-text="row.akreditasi" width="200px" align="center"></td>
                                <td x-text="row.masa" width="150px" align="center"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    function akreditasiTabs(data) {
        return {
            active: 0,
            tabs: [],
            init() {
                let grouped = {};

                data.forEach(item => {
                    if (!grouped[item.fakultas]) {
                        grouped[item.fakultas] = [];
                    }

                    let start = new Date(item.tanggal_berlaku);
                    let end = new Date(item.tanggal_berakhir);
                    let masa = 'Expired';

                    if (end > new Date()) {
                        let diffYears = end.getFullYear() - start.getFullYear();
                        let diffMonths = end.getMonth() - start.getMonth();
                        if (diffMonths < 0) {
                            diffYears--;
                            diffMonths += 12;
                        }
                        masa = `${diffYears} Tahun ${diffMonths} Bulan`;
                    }

                    grouped[item.fakultas].push({
                        id: item.id,
                        nama: item.nama,
                        akreditasi: item.gelar,
                        masa: masa
                    });
                });

                this.tabs = Object.keys(grouped).map(fakultas => ({
                    upps: `${fakultas}`,
                    prodis: grouped[fakultas]
                }));
            }
        }
    }
    </script>
</div>