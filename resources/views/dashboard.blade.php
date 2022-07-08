<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="my-4 panel">
                    <div id="BarChartMobil"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="my-4 panel">
                    <div id="PieChartMerek"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    Highcharts.chart('BarChartMobil', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data Mobil Sewaan'
        },
        subtitle: {
            text: 'Berdasarkan Merek dan Jenis'
        },
        xAxis: {
            categories: {!! json_encode($mereksName) !!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Mobil'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },

        series: [

            <?php
                foreach($nTypes as $nType){
                    $data = "[" . implode(", ", $nType['data']) . "]";
                    echo "{ name: '" . $nType['type'] . "', data: " . $data . "},";
                }
            ?>
        ]
    });
</script>

<script>
    Highcharts.chart('PieChartMerek', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Pie Chart Merek Mobil'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Merek Mobil',
            colorByPoint: true,
            data: [

                <?php
                    foreach($pMereks as $pMerek){
                        echo "{name:'" . $pMerek['name'] . "',y:" . $pMerek['data'] . ",},";
                    }
                ?>

                ]
        }]
    });
</script>
