<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
{{--
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}

    <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 md:grid-cols-2 md:gap-8 mx-auto max-w-7xl sm:px-6 lg:px-8 py-12">
            {{-- Bar Mobil --}}
            <div class="col-span-2 w-full overflow-hidden md:w-full lg:w-full">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="my-4 panel">
                        <div id="BarChartMobil"></div>
                    </div>
                </div>
            </div>
            {{-- Pie Merek --}}
            <div class="w-full overflow-hidden md:w-full lg:w-full">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="my-4 panel">
                        <div id="PieChartMerek"></div>
                    </div>
                </div>
            </div>
            {{-- pie Jenis --}}
            <div class="w-full overflow-hidden md:w-full lg:w-full">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="my-4 panel">
                        <div id="PieChartType"></div>
                    </div>
                </div>
            </div>
            {{-- Bar Merek --}}
            {{-- <div class="w-full overflow-hidden md:w-full lg:w-full">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="my-4 panel">
                        <div id="BarMerek"></div>
                    </div>
                </div>
            </div> --}}
            {{-- Nar Tipe --}}
            {{-- <div class="w-full overflow-hidden md:w-full lg:w-full">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="my-4 panel">
                        <div id="BarType"></div>
                    </div>
                </div>
            </div> --}}
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

        credits: {
            enabled: false
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
            foreach ($nTypes as $nType) {
                $data = '[' . implode(', ', $nType['data']) . ']';
                echo "{ name: '" . $nType['type'] . "', data: " . $data . '},';
            }
            ?>
        ]
    });

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

        credits: {
            enabled: false
        },

        tooltip: {
            formatter: function() {
                return '<b>'+ this.point.name +'</b>: '+ this.point.y ;
            }
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
                    format: '<b>{point.name}</b>: {this.point.y} {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Merek Mobil',
            colorByPoint: true,
            data: [

                <?php
                foreach ($pMereks as $pMerek) {
                    echo "{name:'" . $pMerek['name'] . "',y:" . $pMerek['data'] . ',},';
                }
                ?>

            ]
        }]
    });

    Highcharts.chart('PieChartType', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Pie Chart Tipe Mobil'
        },

        credits: {
            enabled: false
        },

        tooltip: {
            formatter: function() {
                return '<b>'+ this.point.name +'</b>: '+ this.point.y ;
            }
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
            name: 'Tipe Mobil',
            colorByPoint: true,
            data: [

                <?php
                foreach ($pTypes as $Types) {
                    echo "{name:'" . $Types['name'] . "',y:" . $Types['data'] . ',},';
                }
                ?>

            ]
        }]
    });

    {{-- Highcharts.chart('BarMerek', {
        title: {
            text: 'Bar Chart Merek Mobil'
        },
        subtitle: {
            text: 'Berdasarkan Laba Bersih'
        },
        xAxis: {
            categories: {!! json_encode($sName) !!}
        },
        series: [{
            type: 'column',
            colorByPoint: true,
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
            showInLegend: false
        }]
    });

    Highcharts.chart('BarType', {
        title: {
            text: 'Bar Chart Tipe Mobil'
        },
        subtitle: {
            text: 'Berdasarkan Laba Bersih'
        },
        xAxis: {
            categories: {!! json_encode($typesName) !!}
        },
        series: [{
            type: 'column',
            colorByPoint: true,
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
            showInLegend: false
        }]
    }); --}}

</script>
