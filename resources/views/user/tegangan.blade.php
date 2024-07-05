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
                                        <h5 class="card-title text-primary">Monitoring Tegangan</h5>
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
                                                        href="{{ route('admin_id_dmcr', $trf->id) }}">{{ $trf->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div id="periodeArusTeganganChart"></div> --}}
                                <div id="periodeChartTes"></div>
                                <p class="mt-2"> Monitoring Tegangan Sebelumnya</p>
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
                                        <h5 class="card-title text-primary">Tegangan R</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        {{-- <a href="{{ route('cetak_arusR') }}" class="btn btn-sm btn-outline-primary">Cetak
                                            Data</a> --}}
                                    </div>
                                </div>
                                <div id="arusRChart"></div>
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
                                        <h5 class="card-title text-primary">Tegangan S</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        {{-- <a href="{{ route('cetak_arusS') }}" class="btn btn-sm btn-outline-primary">Cetak
                                            Data</a> --}}
                                    </div>
                                </div>
                                <div id="arusSChart"></div>
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
                                        <h5 class="card-title text-primary">Tegangan T</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        {{-- <a href="{{ route('cetak_arusT') }}" class="btn btn-sm btn-outline-primary">Cetak
                                            Data</a> --}}
                                    </div>
                                </div>
                                <div id="arusTChart"></div>
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

        // var MQTTsubTopiczmpt = 'zmpt';
        var MQTTsubTopicarusR = '{{ $pilih_trafo->tegangan->topic_name_r }}';
        var MQTTsubTopicarusS = '{{ $pilih_trafo->tegangan->topic_name_s }}';
        var MQTTsubTopicarusT = '{{ $pilih_trafo->tegangan->topic_name_t }}';

        // var MQTTsubTopic1 = 'test/dht11/temp_c';
        // var MQTTsubTopic2 = 'test/dht11/humi';
        var MQTTusername = 'hivemq.webclient.1716793886740';
        var MQTTpassword = 'v>Km.sXx17<G8a!2HQwJ';

        var arusrData = "";
        var arussData = "";
        var arustData = "";
        // var timeLabels = []; // Array untuk menyimpan label Waktu


        // Fungsi untuk memperbarui grafik dengan data baru
        function updateArusRChart(newData) {
            // Perbarui series dalam konfigurasi grafik dengan data baru
            arusRChartConfig.series = [newData];
            // Render ulang grafik
            const arusRChart = new ApexCharts(arusChartR, arusRChartConfig);
            arusRChart.render();
        }
        // Fungsi untuk memperbarui grafik dengan data baru
        function updateArusSChart(newData) {
            // Perbarui series dalam konfigurasi grafik dengan data baru
            arusSChartConfig.series = [newData];
            // Render ulang grafik
            const arusSChart = new ApexCharts(arusChartS, arusSChartConfig);
            arusSChart.render();
        }
        // Fungsi untuk memperbarui grafik dengan data baru
        function updateArusTChart(newData) {
            // Perbarui series dalam konfigurasi grafik dengan data baru
            arusTChartConfig.series = [newData];
            // Render ulang grafik
            const arusTChart = new ApexCharts(arusChartT, arusTChartConfig);
            arusTChart.render();
        }

        let arusrDataArray = [];
        let arussDataArray = [];
        let arustDataArray = [];
        let addedDataR = false;
        let addedDataS = false;
        let addedDataT = false;

        let timeLabels = []; // Array untuk menyimpan label waktu
        console.log("asjdnaksjdn" + arusrDataArray);
        // Di dalam fungsi onMessageArrived, panggil fungsi updateArusChart dengan data baru
        function onMessageArrived(message) {
            let currentTime = new Date();
            let formattedTime = currentTime.toLocaleString();
            // console.log('Message arrived: ' + message.payloadString);
            console.log('Message arrived at ' + currentTime + ': ' + message.payloadString);
            if (message.destinationName == MQTTsubTopicarusR) {
                // Simpan data ke dalam variabel rData
                arusrData = message.payloadString;
                // function untuk menyimpan
                timeLabels.push(formattedTime); // Simpan waktu penerimaan data
                arusrDataArray.push(parseFloat(message.payloadString));
                addedDataR = true;

                // Perbarui grafik dengan data baru
                updateArusRChart(arusrData);
                updatePeriodeChart();
            } else if (message.destinationName == MQTTsubTopicarusS) {
                // Simpan data ke dalam variabel sData
                arussData = message.payloadString;
                timeLabels.push(formattedTime); // Simpan waktu penerimaan data
                arussDataArray.push(parseFloat(message.payloadString));
                addedDataS = true;
                // Perbarui grafik dengan data baru
                updateArusSChart(arussData);
                updatePeriodeChart();
            } else if (message.destinationName == MQTTsubTopicarusT) {
                // Simpan data ke dalam variabel TData
                arustData = message.payloadString;
                timeLabels.push(formattedTime); // Simpan waktu penerimaan data
                arustDataArray.push(parseFloat(message.payloadString));
                addedDataT = true;
                // Perbarui grafik dengan data baru
                updateArusTChart(arustData)
                updatePeriodeChart();
            }

            var trafo_id = window.location.href.split('/').pop();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            if (addedDataR && addedDataS && addedDataT) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('store_tegangan_primo') }}',
                    data: {
                        _token: csrfToken,
                        trafo_id: trafo_id,
                        topic_name_arus_r: MQTTsubTopicarusR,
                        topic_name_arus_s: MQTTsubTopicarusS,
                        topic_name_arus_t: MQTTsubTopicarusT,
                        arussDataS: arussDataArray.slice(-1)[0] || [], // Ambil data pada index akhir
                        arusrDataR: arusrDataArray.slice(-1)[0] || [], // Ambil data pada index akhir
                        arustDataT: arustDataArray.slice(-1)[0] || [], // Ambil data pada index akhir
                    },
                    success: function(response) {
                        addedDataR = false;
                        addedDataS = false;
                        addedDataT = false;
                        console.log(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        }

        let periodeChartTes = null;

        function updatePeriodeChart() {
            periodeChartTes.updateSeries([{
                    name: 'Tegangan R',
                    data: arusrDataArray
                },
                {
                    name: 'Tegangan S',
                    data: arussDataArray
                },
                {
                    name: 'Tegangan T',
                    data: arustDataArray
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
        axisColor = config.colors
            .axisColor;
        borderColor = config.colors.borderColor;

        // Periode Chart Arus
        const periodeChartTesEl = document.querySelector('#periodeChartTes'),
            periodeChartTesConfig = {
                series: [{
                        name: 'Tegangan R',
                        data: []
                    },
                    {
                        name: 'Tegangan S',
                        data: []
                    },
                    {
                        name: 'Tegangan T',
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
                colors: ['#fb8500', config.colors.primary, '#F000B8'], // Sesuaikan warna sesuai kebutuhan
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
            console.log("tes");
            console.log('Connected to broker');
            client.subscribe(MQTTsubTopicarusR);
            client.subscribe(MQTTsubTopicarusS);
            client.subscribe(MQTTsubTopicarusT);
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


        // Arus R Chart / Radial Chart 
        const arusChartR = document.querySelector('#arusRChart');
        const arusRChartConfig = {
            series: [arusrData],
            labels: ['Tegangan R'],
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
        // Arus S Chart / Radial Chart 
        const arusChartS = document.querySelector('#arusSChart');
        const arusSChartConfig = {
            series: [arussData],
            labels: ['Tegangan S'],
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
        // Arus S Chart / Radial Chart 
        const arusChartT = document.querySelector('#arusTChart');
        const arusTChartConfig = {
            series: [arustData],
            labels: ['Tegangan T'],
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


        // Arus R Chart / Radial Chart 
        if (typeof arusrEl !== undefined && arusChartR !== null) {
            const arusRChart = new ApexCharts(arusChartR, arusRChartConfig);
            arusRChart.render();
        }
        // Arus S Chart / Radial Chart 
        if (typeof arussEl !== undefined && arusChartS !== null) {
            const arusSChart = new ApexCharts(arusChartS, arusSChartConfig);
            arusSChart.render();
        }
        // Arus T Chart / Radial Chart 
        if (typeof arustEl !== undefined && arusChartT !== null) {
            const arusTChart = new ApexCharts(arusChartT, arusTChartConfig);
            arusTChart.render();
        }
    </script>
@endsection
