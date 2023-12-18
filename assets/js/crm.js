$(document).ready(function() {
    var crmTopChart1 = document.getElementById('crmTopChart1').getContext("2d");
    var gradient1 = crmTopChart1.createLinearGradient(0, 0, 0, 400);
    gradient1.addColorStop(0, 'rgba(87, 94, 255, 0.61)');
    gradient1.addColorStop(0.5, 'rgba(87, 94, 255, 0)');

    var crmTopChart2 = document.getElementById('crmTopChart2').getContext("2d");
    var gradient2 = crmTopChart2.createLinearGradient(0, 0, 0, 400);
    gradient2.addColorStop(0, 'rgba(72, 222, 255, 0.61)');
    gradient2.addColorStop(0.5, 'rgba(72, 222, 255, 0)');

    var crmTopChart3 = document.getElementById('crmTopChart3').getContext("2d");
    var gradient3 = crmTopChart3.createLinearGradient(0, 0, 0, 400);
    gradient3.addColorStop(0, 'rgba(255, 147, 123, 0.61)');
    gradient3.addColorStop(0.5, 'rgba(255, 147, 123, 0)');

    var hasilCrmChart1 = document.getElementById('hasilCrmChart1').getContext("2d");
    var hasilCrmChart2 = document.getElementById('hasilCrmChart2').getContext("2d");
    var hasilCrmChart3 = document.getElementById('hasilCrmChart3').getContext("2d");

    var myhasiCrmChart1 = new Chart(hasilCrmChart1, {
      type: 'doughnut',
      data: {
        labels: ['Terkirim', 'Gagal'],
        datasets: [{
          label: '# of Votes',
          data: [6, 4],
          tension: 0.4,
          backgroundColor: ['#7854DE', '#FF937B'],
          borderColor: false,
          borderWidth: 0
        }]
      },
      options: {
        aspectRatio: 0.6,
        cutout: 70,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              boxWidth: 12, 
              usePointStyle: true,
              pointStyle: 'rectRounded',
              color: '#565D70',
              padding: 22,
              font: {
                family: "'Poppins', sans-serif",
                size: 12
              }
            }
          }
        }
      }
    })

    var myhasilCrmChart2 = new Chart(hasilCrmChart2, {
      type: 'doughnut',
      data: {
        labels: ['Terkirim', 'Gagal'],
        datasets: [{
          label: '# of Votes',
          data: [5, 5],
          tension: 0.4,
          backgroundColor: ['#7854DE', '#FF937B'],
          borderColor: false,
          borderWidth: 0
        }]
      },
      options: {
        aspectRatio: 0.6,
        cutout: 70,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              boxWidth: 12, 
              usePointStyle: true,
              pointStyle: 'rectRounded',
              color: '#565D70',
              padding: 22,
              font: {
                family: "'Poppins', sans-serif",
                size: 12
              }
            }
          }
        }
      }
    })

    var myhasilCrmChart3 = new Chart(hasilCrmChart3, {
      type: 'doughnut',
      data: {
        labels: ['Terkirim', 'Gagal'],
        datasets: [{
          label: '# of Votes',
          data: [4, 6],
          tension: 0.4,
          backgroundColor: ['#7854DE', '#FF937B'],
          borderColor: false,
          borderWidth: 0
        }]
      },
      options: {
        aspectRatio: 0.6,
        cutout: 70,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              boxWidth: 12, 
              usePointStyle: true,
              pointStyle: 'rectRounded',
              color: '#565D70',
              padding: 22,
              font: {
                family: "'Poppins', sans-serif",
                size: 12
              }
            }
          }
        }
      }
    })

    var myCrmTopChart1 = new Chart(crmTopChart1, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [4, 6, 4, 5, 5, 3],
                tension: 0.4,
                backgroundColor: gradient1,
                borderColor: [
                    '#7854DE',
                    '#7854DE',
                    '#7854DE',
                    '#7854DE',
                    '#7854DE',
                    '#7854DE'
                ],
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            tooltips: {
                intersect: false
            },
            hover: {
                mode: 'index',
                intersect: false
            },
            scales: {
                yAxes: {
                grid: {
                    display: false,
                    drawBorder: false,
                    drawOnChartArea: false,
                    drawTicks: false
                },
                ticks: {
                    display: false
                }
                },
                xAxes: {
                grid: {
                    display: false,
                    drawBorder: false,
                    drawOnChartArea: false,
                    drawTicks: false
                },
                ticks: {
                    display: false
                }
                },
            },
            plugins: {
                legend: {
                display: false
                }
            },
            elements: {
                point:{
                    radius: 0
                }
            },
            layout: {
                padding: {
                    top: 10,
                    left: 0
                }
            }
        }
    });

    var myCrmTopChart2 = new Chart(crmTopChart2, {
      type: 'line',
      data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
              label: '# of Votes',
              data: [4, 6, 4, 5, 5, 3],
              tension: 0.4,
              backgroundColor: gradient2,
              borderColor: [
                  '#48DEFF',
                  '#48DEFF',
                  '#48DEFF',
                  '#48DEFF',
                  '#48DEFF',
                  '#48DEFF'
              ],
              borderWidth: 2,
              fill: true
          }]
      },
      options: {
        tooltips: {
            intersect: false
        },
        hover: {
            mode: 'index',
            intersect: false
        },
        scales: {
            yAxes: {
            grid: {
                display: false,
                drawBorder: false,
                drawOnChartArea: false,
                drawTicks: false
            },
            ticks: {
                display: false
            }
            },
            xAxes: {
            grid: {
                display: false,
                drawBorder: false,
                drawOnChartArea: false,
                drawTicks: false
            },
            ticks: {
                display: false
            }
            },
        },
        plugins: {
            legend: {
            display: false
            }
        },
        elements: {
            point:{
                radius: 0
            }
        },
        layout: {
            padding: {
                top: 10,
                left: 0
            }
        }
      }
    });

    var myCrmTopChart3 = new Chart(crmTopChart3, {
      type: 'line',
      data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
              label: '# of Votes',
              data: [4, 6, 4, 5, 5, 3],
              tension: 0.4,
              backgroundColor: gradient3,
              borderColor: [
                  '#FF937B',
                  '#FF937B',
                  '#FF937B',
                  '#FF937B',
                  '#FF937B',
                  '#FF937B'
              ],
              borderWidth: 2,
              fill: true
          }]
      },
      options: {
        tooltips: {
            intersect: false
        },
        hover: {
            mode: 'index',
            intersect: false
        },
        scales: {
            yAxes: {
            grid: {
                display: false,
                drawBorder: false,
                drawOnChartArea: false,
                drawTicks: false
            },
            ticks: {
                display: false
            }
            },
            xAxes: {
            grid: {
                display: false,
                drawBorder: false,
                drawOnChartArea: false,
                drawTicks: false
            },
            ticks: {
                display: false
            }
            },
        },
        plugins: {
            legend: {
            display: false
            }
        },
        elements: {
            point:{
                radius: 0
            }
        },
        layout: {
            padding: {
                top: 10,
                left: 0
            }
        }
      }
    });
})