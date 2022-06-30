"use strict";

// Class definition
var KTWidgets = function () {
    // Chart widgets based on Apexcharts. For more info check the official documentation:  https://apexcharts.com/
    var initWidget2 = function() {
        var element = document.getElementById("kt_chart_widget_2_chart");
        var height = parseInt(KTUtil.css(element, 'height'));

        if (!element) {
            return;
        }

        var options = {
            labels: ["Total Members"],
            series: [74],
            chart: {
                fontFamily: 'inherit',
                height: height,
                type: 'radialBar',
                offsetY: 0
            },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,

                    hollow: {
                        margin: 0,
                        size: "70%"
                    },
                    dataLabels: {
                        showOn: "always",
                        name: {
                            show: true,
                            fontSize: "13px",
                            fontWeight: "700",
                            offsetY: -5,
                            color: KTUtil.getCssVariableValue('--bs-gray-500')
                        },
                        value: {
                            color: KTUtil.getCssVariableValue('--bs-gray-700'),
                            fontSize: "30px",
                            fontWeight: "700",
                            offsetY: -40,
                            show: true
                        }
                    },
                    track: {
                        background: KTUtil.getCssVariableValue('--bs-light-primary'),
                        strokeWidth: '100%'
                    }
                }
            },
            colors: [KTUtil.getCssVariableValue('--bs-primary')],
            stroke: {
                lineCap: "round",
            }            
        };

        var chart = new ApexCharts(element, options);
        chart.render();
    }      
    
    var initWidget11 = function() {
        var btn = document.querySelector('#kt_widget_11_load_more_btn');
        var widget5 = document.querySelector('#kt_widget_11');

        if (btn) {
            btn.addEventListener('click', function(e){
                e.preventDefault();
                btn.setAttribute('data-kt-indicator', 'on');

                setTimeout(function() {
                    btn.removeAttribute('data-kt-indicator');
                    widget5.classList.remove('d-none');         
                    btn.classList.add('d-none');         
                    
                    KTUtil.scrollTo(widget5, 200);
                }, 2000);                
            });
        }                 
    }

    var initWidget12 = function(tabSelector, chartSelector, data, initByDefault) {
        var element = document.querySelector(chartSelector);
        var height = parseInt(KTUtil.css(element, 'height'));
        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color'); 

        if (!element) {
            return;
        }

        var options = {
            series: [{
                name: 'Profit',
                data: data
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'bar',
                width: '100%',
                height: height,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ['30%'],
                    borderRadius: 4
                },
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                crosshairs: {
                    show: false
                },
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: KTUtil.getCssVariableValue('--bs-gray-400'),
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                crosshairs: {
                    show: false
                },
                labels: {
                    style: {
                        colors: KTUtil.getCssVariableValue('--bs-gray-400'),
                        fontSize: '12px'
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            fill: {
                opacity: 1
            },            
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function (val) {
                        return "$" + val + "k"
                    }
                }
            },
            colors: [KTUtil.getCssVariableValue('--bs-primary')],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            }
        };

        var chart = new ApexCharts(element, options);

        var init = false;
        var tab = document.querySelector(tabSelector);
        
        if (initByDefault === true) {            
            setTimeout(function() {
                chart.render();
                init = true;
            }, 500);
        }        

        tab.addEventListener('shown.bs.tab', function (event) {
            if (init == false) {
                chart.render();
                init = true;
            }
        })
    } 

    var initWidget17 = function() {
        var charts = document.querySelectorAll('.widget-17-chart');

        [].slice.call(charts).map(function(element) {
            var height = parseInt(KTUtil.css(element, 'height'));

            if ( !element ) {
                return;
            }

            var color = element.getAttribute('data-kt-chart-color');

            var labelColor = KTUtil.getCssVariableValue('--bs-' + 'gray-800');
            var strokeColor = KTUtil.getCssVariableValue('--bs-' + 'gray-300');
            var baseColor = KTUtil.getCssVariableValue('--bs-' + color);
            var lightColor = KTUtil.getCssVariableValue('--bs-light-' + color );

            var options = {
                series: [{
                    name: 'Net Profit',
                    data: [30, 30, 60, 25, 25, 40]
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'area',
                    height: height,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                plotOptions: {},
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 1
                },
                fill1: {
                    type: 'gradient',
                    opacity: 1,
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 0.5,
                        gradientToColors: undefined,
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 0.375,
                        stops: [25, 50, 100],
                        colorStops: []
                    }
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [baseColor]
                },
                xaxis: {
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    },
                    crosshairs: {
                        show: false,
                        position: 'front',
                        stroke: {
                            color: strokeColor,
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    min: 0,
                    max: 65,
                    labels: {
                        show: false,
                        style: {
                            colors: labelColor,
                            fontSize: '12px'
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function (val) {
                            return "$" + val + " thousands"
                        }
                    }
                },
                colors: [lightColor],
                markers: {
                    colors: [lightColor],
                    strokeColor: [baseColor],
                    strokeWidth: 3
                }
            };

            var chart = new ApexCharts(element, options);
            chart.render();
        });        
    }

    // Follow button
    var initUserFollowButton = function() {
        var follow = document.querySelector('#kt_user_follow_button');

        if (follow) {
            follow.addEventListener('click', function(e){
                // Prevent default action 
                e.preventDefault();
                
                // Show indicator
                follow.setAttribute('data-kt-indicator', 'on');
                
                // Disable button to avoid multiple click 
				follow.disabled = true;

                // Check button state
                if (follow.classList.contains("btn-success")) {
                     setTimeout(function() {
                        follow.removeAttribute('data-kt-indicator');
                        follow.classList.remove("btn-success");
                        follow.classList.add("btn-light");
                        follow.querySelector(".svg-icon").classList.add("d-none");
                        follow.querySelector(".indicator-label").innerHTML = 'Follow';
				        follow.disabled = false;
                    }, 1500);   
                } else {
                     setTimeout(function() {
                        follow.removeAttribute('data-kt-indicator');
                        follow.classList.add("btn-success");
                        follow.classList.remove("btn-light");
                        follow.querySelector(".svg-icon").classList.remove("d-none");
                        follow.querySelector(".indicator-label").innerHTML = 'Following';
                        follow.disabled = false;
                    }, 1000);   
                }        
            });
        }                 
    }

    // Dark mode toggler
    var initDarkModeToggle = function() {
        var toggle = document.querySelector('#kt_user_menu_dark_mode_toggle');
        
        if (toggle) {
            toggle.addEventListener('click', function() {
                window.location.href = this.getAttribute('data-kt-url');
            });
        }
    }
     
    // Public methods
    return {
        init: function () {
            initWidget2();              
            initWidget11();
            initWidget12('#kt_charts_widget_12_tab_1', '#kt_chart_widget_12_chart_1', [30, 40, 30, 25, 40, 45, 30, 20, 40, 25, 20, 30], true); 
            initWidget12('#kt_charts_widget_12_tab_2', '#kt_chart_widget_12_chart_2', [25, 30, 25, 45, 30, 40, 30, 25, 40, 20, 25, 30], false);
            initWidget17();

            initUserFollowButton();
                        
            // Dark mode
            initDarkModeToggle();   
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTWidgets.init();
});