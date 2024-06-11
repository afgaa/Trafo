/**
 * Dashboard Analytics
 */

'use strict';

(function () {
  let cardColor, headingColor, axisColor, shadeColor, borderColor;

  cardColor = config.colors.white;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;

  // Growth Chart - Radial Bar Chart
  // --------------------------------------------------------------------
  const growthChartEl = document.querySelector('#growthChart'),
    growthChartOptions = {
      series: [78],
      labels: ['Growth'],
      chart: {
        height: 240,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          size: 150,
          offsetY: 10,
          startAngle: -150,
          endAngle: 150,
          hollow: {
            size: '55%'
          },
          track: {
            background: cardColor,
            strokeWidth: '100%'
          },
          dataLabels: {
            name: {
              offsetY: 15,
              color: headingColor,
              fontSize: '15px',
              fontWeight: '600',
              fontFamily: 'Public Sans'
            },
            value: {
              offsetY: -25,
              color: headingColor,
              fontSize: '22px',
              fontWeight: '500',
              fontFamily: 'Public Sans'
            }
          }
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          shadeIntensity: 0.5,
          gradientToColors: [config.colors.primary],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 0.6,
          stops: [30, 70, 100]
        }
      },
      stroke: {
        dashArray: 5
      },
      grid: {
        padding: {
          top: -35,
          bottom: -10
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
  if (typeof growthChartEl !== undefined && growthChartEl !== null) {
    const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
    growthChart.render();
  }

  // Periode Chart Arus dab Tegangan
  const periodeChartEl = document.querySelector('#periodeChart'),
    periodeChartConfig = {
      series: [
        {
          name: 'Arus',
          data: [24, 21, 30, 22, 42, 26, 35, 29]
        },
        {
          name: 'Tegangan',
          data: [20, 30, 32, 23, 30, 40, 37, 20]
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
        discrete: [
          {
            fillColor: config.colors.white,
            seriesIndex: 0,
            dataPointIndex: 7,
            strokeColor: config.colors.primary,
            strokeWidth: 2,
            size: 6,
            radius: 8
          }
        ],
        hover: {
          size: 7
        }
      },
      colors: ['#fb8500', config.colors.primary,],// Sesuaikan warna sesuai kebutuhan
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
        categories: ['', 'Jan', 'Feb', 'Mar', 'Apr', 'summm', 'Jun', 'Jul'],
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
      yaxis: [
        {
          labels: {
            show: false
          },
          min: 10,
          max: 50,
          tickAmount: 4
        },
        {
          opposite: true,
          labels: {
            show: false
          },
          min: 10,
          max: 50,
          tickAmount: 4
        }
      ]
    };
  
  if (typeof periodeChartEl !== undefined && periodeChartEl !== null) {
    const periodeChart = new ApexCharts(periodeChartEl, periodeChartConfig);
    periodeChart.render();
  }

  // Periode Suhu dan Tekanan 
  const periode1ChartEl = document.querySelector('#periode1Chart'),
  periode1ChartConfig = {
    series: [
      {
        name: 'Suhu',
        data: [24, 21, 30, 22, 42, 26, 35, 29]
      },
      {
        name: 'Tekanan',
        data: [20, 30, 32, 23, 30, 40, 37, 20]
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
      discrete: [
        {
          fillColor: config.colors.white,
          seriesIndex: 0,
          dataPointIndex: 7,
          strokeColor: config.colors.primary,
          strokeWidth: 2,
          size: 6,
          radius: 8
        }
      ],
      hover: {
        size: 7
      }
    },
    colors: [config.colors.primary, '#386641'],// Sesuaikan warna sesuai kebutuhan
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
      categories: ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
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
    yaxis: [
      {
        labels: {
          show: false
        },
        min: 10,
        max: 50,
        tickAmount: 4
      },
      {
        opposite: true,
        labels: {
          show: false
        },
        min: 10,
        max: 50,
        tickAmount: 4
      }
    ]
  };

  if (typeof periode1ChartEl !== undefined && periode1ChartEl !== null) {
    const periode1Chart = new ApexCharts(periode1ChartEl, periode1ChartConfig);
    periode1Chart.render();
  }


  // Lingkaran Chart - Radial Chart
  // --------------------------------------------------------------------
  const lingkaranEl = document.querySelector('#lingkaranChart'),
    lingkaranConfig = {
      series: [65],
      chart: {
        width: 200,
        height: 200,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          startAngle: 0,
          endAngle: 360,
          strokeWidth: '8',
          hollow: {
            margin: 2,
            size: '45%'
          },
          track: {
            strokeWidth: '50%',
            background: borderColor
          },
          dataLabels: {
            show: true,
            name: {
              show: false
            },
            value: {
              formatter: function (val) {
                return '$' + parseInt(val);
              },
              offsetY: 5,
              color: '#697a8d',
              fontSize: '13px',
              show: true
            }
          }
        }
      },
      fill: {
        type: 'solid',
        colors: config.colors.primary
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
  if (typeof lingkaranEl !== undefined && lingkaranEl !== null) {
    const lingkarans = new ApexCharts(lingkaranEl, lingkaranConfig);
    lingkarans.render();
  }

   // Arus Chart / Radial Chart 
   const arusChartEl = document.querySelector('#arusChart');
   const arusChartConfig = {
       series: [76],
       labels: ['Arus'],
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
                   size: '45%'
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
                       fontFamily: 'Arial'
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

   if (typeof arusEl !== undefined && arusChartEl !== null) {
       const arusChart = new ApexCharts(arusChartEl, arusChartConfig);
       arusChart.render();
   }

  // Suhu Chart / Radial Chart 
    const suhuChartEl = document.querySelector('#suhuChart');
    const suhuChartConfig = {
        series: [45],
        labels: ['Suhu'],
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
                    size: '45%'
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
                        fontFamily: 'Arial'
                    }
                }
            }
        },
        fill: {
            type: 'solid',
            colors: ['#006d77']
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

  // Tegangan Chart / Radial Chart 
    const teganganChart1El = document.querySelector('#teganganChart');
    const teganganChart1Config = {
        series: [50],
        labels: ['Tegangan'],
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
                    size: '45%'
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
                        fontFamily: 'Arial'
                    }
                }
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

    if (typeof teganganChart1El !== undefined && teganganChart1El !== null) {
        const teganganChart1 = new ApexCharts(teganganChart1El, teganganChart1Config);
        teganganChart1.render();
    }

    // Tekanan Chart / Radial Chart 
    const tekananChart1El = document.querySelector('#tekananChart');
    const tekananChart1Config = {
        series: [13],
        labels: ['Tekanan'],
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
                    size: '45%'
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
                        fontFamily: 'Arial'
                    }
                }
            }
        },
        fill: {
            type: 'solid',
            colors: ['#386641']
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

})();
