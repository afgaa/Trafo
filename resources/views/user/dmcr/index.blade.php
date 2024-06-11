@extends('layouts.user.app1')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="card-title text-primary">Monitoring DMCR</h5>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                                id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                {{ $pilih_trafo ? $pilih_trafo->name : 'Pilih Trafo' }}
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                                @foreach ($data_trafo as $trf)
                                                    <a class="dropdown-item"
                                                        href="{{ route('id_dmcr', $trf->id) }}">{{ $trf->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div id="periodesuhutekananChart"></div> --}}
                                <div id="periodeChartTes"></div>
                                <p class="mt-2"> Monitoring DMCR Sebelumnya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 order-1">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="row d-flex justify-content-right">
                                    <div class="col-sm-8">
                                        <h5 class="card-title text-primary">Suhu</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        {{-- <a href="{{ route('cetak_suhu') }}" class="btn btn-sm btn-outline-primary">Cetak
                                            Data</a> --}}
                                    </div>
                                </div>
                                <div id="suhuChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4 order-3">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="row d-flex justify-content-right">
                                    <div class="col-sm-6">
                                        <h5 class="card-title text-primary">Tekanan</h5>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">Cetak Data</a>
                                    </div> --}}
                                </div>
                                <div id="tekananChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection()
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var MQTTbroker = 'bcac1e2848524450a94643bb8a6b57e6.s1.eu.hivemq.cloud';
        var MQTTport = 8884; // Port WebSocket SSL/TLS untuk HiveMQ Cloud
        var MQTTpath = "/mqtt"; // Path untuk koneksi WebSocket MQTT

        // var MQTTsubTopictekanan = 'tekanan';
        var MQTTsubTopictekanan = '{{ $pilih_trafo->tekanan->topic_name }}';

        var MQTTsubTopicsuhu = '{{ $pilih_trafo->suhu->topic_name }}';

        // var MQTTsubTopic1 = 'test/dht11/temp_c';
        // var MQTTsubTopic2 = 'test/dht11/humi';
        var MQTTusername = 'hivemq.webclient.1716793886740';
        var MQTTpassword = 'v>Km.sXx17<G8a!2HQwJ';

        var suhuData = "";
        var tekananData = "";


        // Fungsi untuk memperbarui grafik dengan data baru
        function updatesuhuChart(newData) {
            // Perbarui series dalam konfigurasi grafik dengan data baru
            suhuChartConfig.series = [newData];
            // Render ulang grafik
            const suhuChart = new ApexCharts(suhuChartEl, suhuChartConfig);
            suhuChart.render();
        }

        function updatetekananChart(newData) {
            // Perbarui series dalam konfigurasi grafik dengan data baru
            tekananChart1Config.series = [newData];
            // Render ulang grafik
            const tekananChart = new ApexCharts(tekananChart1El, tekananChart1Config);
            tekananChart.render();
        }

        let suhuDataArray = [];
        let tekananDataArray = [];
        let timeLabels = []; // Array untuk menyimpan label waktu

        // Di dalam fungsi onMessageArrived, panggil fungsi updatesuhuChart dengan data baru
        function onMessageArrived(message) {
            let currentTime = new Date();
            let formattedTime = currentTime.toLocaleString();
            // console.log('Message arrived: ' + message.payloadString);
            console.log('Message arrived at ' + currentTime + ': ' + message.payloadString);
            if (message.destinationName == MQTTsubTopicsuhu) {
                // Simpan data ke dalam variabel suhuData
                suhuData = message.payloadString;

                // function untuk menyimpan

                timeLabels.push(formattedTime); // Simpan waktu penerimaan data

                suhuDataArray.push(parseFloat(message.payloadString));
                // Perbarui grafik dengan data baru
                updatesuhuChart(suhuData);
                updatePeriodeChart();
            } else if (message.destinationName == MQTTsubTopictekanan) {
                // Simpan data ke dalam variabel tekananData
                tekananData = message.payloadString;

                timeLabels.push(formattedTime); // Simpan waktu penerimaan data

                tekananDataArray.push(parseFloat(message.payloadString));
                updatetekananChart(tekananData)
                updatePeriodeChart();
                // Jika Anda juga ingin memperbarui grafik untuk tekananData, tambahkan pemanggilan fungsi updatesuhuChart di sini
            }
            console.log([
                suhuDataArray,
                tekananDataArray
            ])
        }

        let periodeChartTes = null;

        function updatePeriodeChart() {
            periodeChartTes.updateSeries([{
                    name: 'suhu',
                    data: suhuDataArray
                },
                {
                    name: 'tekanan',
                    data: tekananDataArray
                }
            ]);
            periodeChartTes.updateOptions({
                xaxis: {
                    categories: timeLabels
                }
            });
        }

        let cardColor, headingColor, axisColor, shadeColor, borderColor;

        cardColor = config.colors.white;
        headingColor = config.colors.headingColor;
        axisColor = config.colors.axisColor;
        borderColor = config.colors.borderColor;

        // Periode Chart suhu dab tekanan
        const periodeChartTesEl = document.querySelector('#periodeChartTes'),
            periodeChartTesConfig = {
                series: [{
                        name: 'suhu',
                        data: []
                    },
                    {
                        name: 'tekanan',
                        data: []
                    },
                ],
                chart: {
                    height: 215,
                    parentHeightOffset: 0,
                    parentWidthOffset: 0,
                    toolbar: {
                        show: false
                    },
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },
                legend: {
                    show: true // Menampilkan legend untuk setiap seri
                },
                markers: {
                    size: 6,
                    colors: 'transparent',
                    strokeColors: 'transparent',
                    strokeWidth: 4,
                    discrete: [{
                        fillColor: config.colors.white,
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        strokeColor: config.colors.primary,
                        strokeWidth: 2,
                        size: 6,
                        radius: 8
                    }],
                    hover: {
                        size: 7
                    }
                },
                colors: ['#fb8500', config.colors.primary, ], // Sesuaikan warna sesuai kebutuhan
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: shadeColor,
                        shadeIntensity: 0.6,
                        opacityFrom: 0.5,
                        opacityTo: 0.25,
                        stops: [0, 95, 100]
                    }
                },
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 3,
                    padding: {
                        top: -20,
                        bottom: -8,
                        left: -10,
                        right: 8
                    }
                },
                xaxis: {
                    categories: [],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: true,
                        style: {
                            fontSize: '13px',
                            colors: axisColor
                        }
                    }
                },
                yaxis: [{
                        labels: {
                            show: false
                        },
                        min: 0, // Nilai minimum dari sumbu y
                        max: 250, // Nilai maksimum dari sumbu y
                        tickAmount: 5 // Jumlah tick pada sumbu y, sesuaikan sesuai kebutuhan
                    },
                    {
                        opposite: true,
                        labels: {
                            show: false
                        },
                        min: 0, // Nilai minimum dari sumbu y untuk sumbu y yang berlawanan
                        max: 250, // Nilai maksimum dari sumbu y untuk sumbu y yang berlawanan
                        tickAmount: 5 // Jumlah tick pada sumbu y yang berlawanan
                    }
                ]
            };

        if (typeof periodeChartTesEl !== undefined && periodeChartTesEl !== null) {
            periodeChartTes = new ApexCharts(periodeChartTesEl, periodeChartTesConfig);
            periodeChartTes.render();
        }


        function onConnect() {
            console.log('Connected to broker');
            client.subscribe(MQTTsubTopicsuhu);
            client.subscribe(MQTTsubTopictekanan);
        }

        function onConnectionLost(responseObject) {
            if (responseObject.errorCode !== 0) {
                console.log("onConnectionLost: " + responseObject.errorMessage);
            }
        }

        var client = new Paho.MQTT.Client(MQTTbroker, Number(MQTTport), "clientId");

        client.onMessageArrived = onMessageArrived;
        client.onConnectionLost = onConnectionLost;

        var options = {
            useSSL: true,
            userName: MQTTusername,
            password: MQTTpassword,
            onSuccess: onConnect,
            onFailure: function(message) {
                console.log("Connection failed: " + message.errorMessage);
            }
        };

        client.connect(options);

        function sendRelayCommand(topic, command) {
            var message = new Paho.MQTT.Message(String(command));
            message.destinationName = topic;
            client.send(message);
            console.log('Sent command: ' + command + ' to topic ' + topic);
        }


        // suhu Chart / Radial Chart 
        const suhuChartEl = document.querySelector('#suhuChart');
        const suhuChartConfig = {
            series: [suhuData],
            labels: ['suhu'],
            chart: {
                width: 400,
                height: 450,
                type: 'radialBar',
                offsetY: -20, // Offset untuk membuat setengah lingkaran
            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    strokeWidth: '8',
                    hollow: {
                        margin: 2,
                        size: '48%'
                    },
                    track: {
                        strokeWidth: '50%',
                        background: '#ddd'
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: 15,
                            color: '#697a8d',
                            fontSize: '15px',
                            fontWeight: '600',
                            fontFamily: 'Arial'
                        },
                        value: {
                            offsetY: -25,
                            color: '#697a8d',
                            fontSize: '32px',
                            fontWeight: '700',
                            fontFamily: 'Arial',
                            formatter: function(val) {
                                return val; // Mengembalikan nilai tanpa persentase
                            }
                        }
                    }
                }
            },
            fill: {
                type: 'solid',
                colors: ['#fb8500']
            },
            stroke: {
                lineCap: 'round'
            },
            grid: {
                padding: {
                    top: -10,
                    bottom: -15,
                    left: -10,
                    right: -10
                }
            },
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            }
        };

        if (typeof suhuEl !== undefined && suhuChartEl !== null) {
            const suhuChart = new ApexCharts(suhuChartEl, suhuChartConfig);
            suhuChart.render();
        }

        // tekanan Chart / Radial Chart 
        const tekananChart1El = document.querySelector('#tekananChart');
        const tekananChart1Config = {
            series: [tekananData],
            labels: ['tekanan'],
            chart: {
                width: 400,
                height: 450,
                type: 'radialBar',
                offsetY: -20, // Offset untuk membuat setengah lingkaran
            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    strokeWidth: '8',
                    hollow: {
                        margin: 2,
                        size: '48%'
                    },
                    track: {
                        strokeWidth: '50%',
                        background: '#ddd'
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: 15,
                            color: '#697a8d',
                            fontSize: '15px',
                            fontWeight: '600',
                            fontFamily: 'Arial'
                        },
                        value: {
                            offsetY: -25,
                            color: '#697a8d',
                            fontSize: '32px',
                            fontWeight: '700',
                            fontFamily: 'Arial',
                            formatter: function(val) {
                                return val; // Mengembalikan nilai tanpa persentase
                            }
                        }
                    },
                    min: 0, // Nilai minimum
                    max: 250 // Nilai maksimum
                }
            },
            fill: {
                type: 'solid',
                colors: [config.colors.primary]
            },
            stroke: {
                lineCap: 'round'
            },
            grid: {
                padding: {
                    top: -10,
                    bottom: -15,
                    left: -10,
                    right: -10
                }
            },
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            }
        };

        if (typeof tekananChart1El !== undefined && tekananChart1El !== null) {
            const tekananChart1 = new ApexCharts(tekananChart1El, tekananChart1Config);
            tekananChart1.render();
        }
    </script>
@endsection