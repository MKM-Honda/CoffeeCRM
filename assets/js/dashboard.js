$(document).ready(function() {
    // var dashboardLineChart1 = document.getElementById('dashboardLineChart1').getContext("2d");
    // var dashboardLineChart2 = document.getElementById('dashboardLineChart2').getContext("2d");
    // var dashboardLineChart3 = document.getElementById('dashboardLineChart3dashboardLineChart2').getContext("2d");
    var dashboardLineChart4 = document.getElementById('dashboardLineChart4').getContext("2d");

    var dashboard2LineChart1 = document.getElementById('dashboard2LineChart1').getContext("2d");
    // var dashboard2LineChart2 = document.getElementById('dashboard2LineChart2').getContext("2d");
    // var dashboard2LineChart3 = document.getElementById('dashboard2LineChart3').getContext("2d");
    // var dashboard2LineChart4 = document.getElementById('dashboard2LineChart4').getContext("2d");

    var dashboardDoughnutChart1 = document.getElementById('dashboardDoughnutChart1').getContext("2d");
    var dashboardDoughnutChart2 = document.getElementById('dashboardDoughnutChart2').getContext("2d");
    var dashboardDoughnutChart3 = document.getElementById('dashboardDoughnutChart3').getContext("2d");
    var dashboardDoughnutChart4 = document.getElementById('dashboardDoughnutChart4').getContext("2d");
    


   


    var mydashboardLineChart4 = new Chart(dashboardLineChart4, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [
            {
                label: 'Team Booking',
                data: [7, 6, 5, 6, 5, 4, 5, 7, 4, 9, 6, 7],
                tension: 0.4,
                backgroundColor: '#48DEFF',
                borderColor: '#48DEFF',
                borderWidth: 2
              },
              {
                label: 'Target',
                data: [8, 7, 6, 7, 6, 5, 6, 8, 5, 10, 7, 8],
                tension: 0.4,
                backgroundColor: '#7854DE',
                borderColor: '#7854DE',
                borderDash: [10,5],
                borderWidth: 1
              }
          ]
        },
        options: {
            aspectRatio: 2,
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
                  display: true,
                  drawBorder: false,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderColor: '#F4F5F8',
                  color: '#F4F5F8',
                  borderWidth: 1
                },
                ticks: {
                   display: true,
              min: 0,
              max: 100,
              stepSize: 20
                }
              },
              xAxes: {
                grid: {
                  display: true,
                  drawBorder: true,
                  drawOnChartArea: false,
                  drawTicks: false,
                  borderColor: '#F4F5F8',
                  color: '#F4F5F8',
                  borderWidth: 1
                },
                ticks: {
                  display: true,
                  padding: 20,
                  font: {
                    family: "'Poppins', sans-serif",
                    color: '#565D70',
                    size: 12
                  }
                }
              },
            },
            plugins: {
              legend: {
                position: 'top',
                align: 'end',
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
            },
            elements: {
              point:{
                  radius: 0
              }
            },
            layout: {
              padding: {
                  top: 5,
                  left: 0,
                  bottom: 100
              }
            }
        }
    })

    var mydashboard2LineChart1 = new Chart(dashboard2LineChart1, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [
            {
              label: 'Team Pencairan',
              data: [5, 7, 5, 8, 6, 4, 3, 5, 7, 8, 7, 5],
              tension: 0.4,
              backgroundColor: '#48DEFF',
              borderColor: '#48DEFF',
              borderWidth: 2
            },
            {
              label: 'Target',
              data: [6, 8, 6, 9, 7, 5, 4, 6, 8, 9, 8, 6],
              tension: 0.4,
              backgroundColor: '#7854DE',
              borderColor: '#7854DE',
              borderDash: [10,5],
              borderWidth: 1
            }
          ]
        },
        options: {
            aspectRatio: 2,
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
                  display: true,
                  drawBorder: false,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderColor: '#F4F5F8',
                  color: '#F4F5F8',
                  borderWidth: 1
                },
                ticks: {
                  display: false
                }
              },
              xAxes: {
                grid: {
                  display: true,
                  drawBorder: true,
                  drawOnChartArea: false,
                  drawTicks: false,
                  borderColor: '#F4F5F8',
                  color: '#F4F5F8',
                  borderWidth: 1
                },
                ticks: {
                  display: true,
                  padding: 20,
                  font: {
                    family: "'Poppins', sans-serif",
                    color: '#565D70',
                    size: 12
                  }
                }
              },
            },
            plugins: {
              legend: {
                position: 'top',
                align: 'end',
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
            },
            elements: {
              point:{
                  radius: 0
              }
            },
            layout: {
              padding: {
                  top: 5,
                  left: 0,
                  bottom: 100
              }
            }
        }
      })
  
      // var mydashboard2LineChart2 = new Chart(dashboard2LineChart2, {
      //     type: 'line',
      //     data: {
      //       labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      //       datasets: [
      //         {
      //           label: 'Team Pencairan',
      //           data: [7, 6, 5, 6, 5, 4, 5, 7, 4, 9, 6, 7],
      //           tension: 0.4,
      //           backgroundColor: '#48DEFF',
      //           borderColor: '#48DEFF',
      //           borderWidth: 2
      //         },
      //         {
      //           label: 'Target',
      //           data: [8, 7, 6, 7, 6, 5, 6, 8, 5, 10, 7, 8],
      //           tension: 0.4,
      //           backgroundColor: '#7854DE',
      //           borderColor: '#7854DE',
      //           borderDash: [10,5],
      //           borderWidth: 1
      //         }
      //       ]
      //     },
      //     options: {
      //       aspectRatio: 2,
      //       tooltips: {
      //         intersect: false
      //       },
      //       hover: {
      //           mode: 'index',
      //           intersect: false
      //       },
      //       scales: {
      //         yAxes: {
      //           grid: {
      //             display: true,
      //             drawBorder: false,
      //             drawOnChartArea: true,
      //             drawTicks: false,
      //             borderColor: '#F4F5F8',
      //             color: '#F4F5F8',
      //             borderWidth: 1
      //           },
      //           ticks: {
      //             display: false
      //           }
      //         },
      //         xAxes: {
      //           grid: {
      //             display: true,
      //             drawBorder: true,
      //             drawOnChartArea: false,
      //             drawTicks: false,
      //             borderColor: '#F4F5F8',
      //             color: '#F4F5F8',
      //             borderWidth: 1
      //           },
      //           ticks: {
      //             display: true,
      //             padding: 20,
      //             font: {
      //               family: "'Poppins', sans-serif",
      //               color: '#565D70',
      //               size: 12
      //             }
      //           }
      //         },
      //       },
      //       plugins: {
      //         legend: {
      //           position: 'top',
      //           align: 'end',
      //           labels: {
      //             boxWidth: 12, 
      //             usePointStyle: true,
      //             pointStyle: 'rectRounded',
      //             color: '#565D70',
      //             padding: 22,
      //             font: {
      //               family: "'Poppins', sans-serif",
      //               size: 12
      //             }
      //           }
      //         }
      //       },
      //       elements: {
      //         point:{
      //             radius: 0
      //         }
      //       },
      //       layout: {
      //         padding: {
      //             top: 5,
      //             left: 0,
      //             bottom: 100
      //         }
      //       }
      //   }
      // })
  
      // var mydashboard2LineChart3 = new Chart(dashboard2LineChart3, {
      //     type: 'line',
      //     data: {
      //       labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      //       datasets: [
      //         {
      //           label: 'Team Pencairan',
      //           data: [5, 7, 5, 8, 6, 4, 3, 5, 7, 8, 7, 5],
      //           tension: 0.4,
      //           backgroundColor: '#48DEFF',
      //           borderColor: '#48DEFF',
      //           borderWidth: 2
      //         },
      //         {
      //           label: 'Target',
      //           data: [6, 8, 6, 9, 7, 5, 4, 6, 8, 9, 8, 6],
      //           tension: 0.4,
      //           backgroundColor: '#7854DE',
      //           borderColor: '#7854DE',
      //           borderDash: [10,5],
      //           borderWidth: 1
      //         }
      //       ]
      //     },
      //     options: {
      //       aspectRatio: 2,
      //       tooltips: {
      //         intersect: false
      //       },
      //       hover: {
      //           mode: 'index',
      //           intersect: false
      //       },
      //       scales: {
      //         yAxes: {
      //           grid: {
      //             display: true,
      //             drawBorder: false,
      //             drawOnChartArea: true,
      //             drawTicks: false,
      //             borderColor: '#F4F5F8',
      //             color: '#F4F5F8',
      //             borderWidth: 1
      //           },
      //           ticks: {
      //             display: false
      //           }
      //         },
      //         xAxes: {
      //           grid: {
      //             display: true,
      //             drawBorder: true,
      //             drawOnChartArea: false,
      //             drawTicks: false,
      //             borderColor: '#F4F5F8',
      //             color: '#F4F5F8',
      //             borderWidth: 1
      //           },
      //           ticks: {
      //             display: true,
      //             padding: 20,
      //             font: {
      //               family: "'Poppins', sans-serif",
      //               color: '#565D70',
      //               size: 12
      //             }
      //           }
      //         },
      //       },
      //       plugins: {
      //         legend: {
      //           position: 'top',
      //           align: 'end',
      //           labels: {
      //             boxWidth: 12, 
      //             usePointStyle: true,
      //             pointStyle: 'rectRounded',
      //             color: '#565D70',
      //             padding: 22,
      //             font: {
      //               family: "'Poppins', sans-serif",
      //               size: 12
      //             }
      //           }
      //         }
      //       },
      //       elements: {
      //         point:{
      //             radius: 0
      //         }
      //       },
      //       layout: {
      //         padding: {
      //             top: 5,
      //             left: 0,
      //             bottom: 100
      //         }
      //       }
      //     }
      // })
  
    //   var mydashboard2LineChart4 = new Chart(dashboard2LineChart4, {
    //       type: 'line',
    //       data: {
    //         labels: dateweek,
    //         datasets: [
    //           {
    //               label: 'Team Pencairan',
    //               data: cmo_prospek,
    //               tension: 0.4,
    //               backgroundColor: '#48DEFF',
    //               borderColor: '#48DEFF',
    //               borderWidth: 2
    //             },
    //             {
    //               label: 'Target',
    //               data: [8, 7, 6, 7, 6, 5, 6, 8, 5, 10, 7, 8],
    //               tension: 0.4,
    //               backgroundColor: '#7854DE',
    //               borderColor: '#7854DE',
    //               borderDash: [10,5],
    //               borderWidth: 1
    //             }
    //         ]
    //       },
    //       options: {
    //         aspectRatio: 2,
    //         tooltips: {
    //           intersect: false
    //         },
    //         hover: {
    //             mode: 'index',
    //             intersect: false
    //         },
    //         scales: {
    //           yAxes: {
    //             grid: {
    //               display: true,
    //               drawBorder: false,
    //               drawOnChartArea: true,
    //               drawTicks: false,
    //               borderColor: '#F4F5F8',
    //               color: '#F4F5F8',
    //               borderWidth: 1
    //             },
    //             ticks: {
    //               display: false
    //             }
    //           },
    //           xAxes: {
    //             grid: {
    //               display: true,
    //               drawBorder: true,
    //               drawOnChartArea: false,
    //               drawTicks: false,
    //               borderColor: '#F4F5F8',
    //               color: '#F4F5F8',
    //               borderWidth: 1
    //             },
    //             ticks: {
    //               display: true,
    //               padding: 20,
    //               font: {
    //                 family: "'Poppins', sans-serif",
    //                 color: '#565D70',
    //                 size: 12
    //               }
    //             }
    //           },
    //         },
    //         plugins: {
    //           legend: {
    //             position: 'top',
    //             align: 'end',
    //             labels: {
    //               boxWidth: 12, 
    //               usePointStyle: true,
    //               pointStyle: 'rectRounded',
    //               color: '#565D70',
    //               padding: 22,
    //               font: {
    //                 family: "'Poppins', sans-serif",
    //                 size: 12
    //               }
    //             }
    //           }
    //         },
    //         elements: {
    //           point:{
    //               radius: 0
    //           }
    //         },
    //         layout: {
    //           padding: {
    //               top: 5,
    //               left: 0,
    //               bottom: 100
    //           }
    //         }
    //     }
    // })

    var mydashboardDoughnutChart1 = new Chart(dashboardDoughnutChart1, {



        type: 'doughnut',
        data: {
          labels: product_label,
          datasets: [{
            label: '# Tipe Produk',
            data: product_data,
            tension: 0.4,
            backgroundColor: ['#FF937B', '#48DEFF', '#7854DE'],
            borderColor: false,
            borderWidth: 0
          }]
        },
        options: {
          aspectRatio: 1,
          cutout: 60,
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                boxWidth: 12, 
                usePointStyle: true,
                pointStyle: 'rectRounded',
                color: '#565D70',
                padding: 20,
                font: {
                  family: "'Poppins', sans-serif",
                  size: 12
                }
              }
            }
          },
          layout: {
              padding: {
                  right: 10,
                  left: 10
              }
          }
        }
    })

    var mydashboardDoughnutChart2 = new Chart(dashboardDoughnutChart2, {
        type: 'doughnut',
        data: {
          labels: location_label,
          datasets: [{
            label: '# Sumber',
            data: location_data,
            tension: 0.4,
            backgroundColor: ['#FF937B', '#48DEFF', '#7854DE', '#D767FF','#FF937B', '#48DEFF'],
            borderColor: false,
            borderWidth: 0
          }]
        },
        options: {
          aspectRatio: 1,
          cutout: 60,
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                boxWidth: 12, 
                usePointStyle: true,
                pointStyle: 'rectRounded',
                color: '#565D70',
                padding: 20,
                font: {
                  family: "'Poppins', sans-serif",
                  size: 12
                }
              }
            }
          },
          layout: {
              padding: {
                  right: 10,
                  left: 10
              }
          }
        }
    })

    var mydashboardDoughnutChart3 = new Chart(dashboardDoughnutChart3, {
        type: 'doughnut',
        data: {
          labels: ['ACC', 'PENDING'],
          datasets: [{
            data: survey_data,
            tension: 0.4,
            backgroundColor: ['#FF937B', '#7854DE'],
            borderColor: false,
            borderWidth: 0
          }]
        },
        options: {
          aspectRatio: 1,
          cutout: 60,
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                boxWidth: 12, 
                usePointStyle: true,
                pointStyle: 'rectRounded',
                color: '#565D70',
                padding: 20,
                font: {
                  family: "'Poppins', sans-serif",
                  size: 12
                }
              }
            }
          },
          layout: {
              padding: {
                  right: 10,
                  left: 10
              }
          }
        }
    })

    var mydashboardDoughnutChart4 = new Chart(dashboardDoughnutChart4, {
        type: 'doughnut',
        data: {
          labels: ['Menetap', 'Menurun'],
          datasets: [{
            data: interest_data,
            tension: 0.4,
            backgroundColor: ['#FF937B', '#7854DE'],
            borderColor: false,
            borderWidth: 0
          }]
        },
        options: {
          aspectRatio: 1.1,
          cutout: 65,
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                boxWidth: 12, 
                usePointStyle: true,
                pointStyle: 'rectRounded',
                color: '#565D70',
                padding: 20,
                font: {
                  family: "'Poppins', sans-serif",
                  size: 12
                }
              }
            }
          },
          layout: {
              padding: {
                  right: 10,
                  left: 10
              }
          }
        }
    })
})