Chart.defaults.global.defaultFontFamily = 'yekan , aria';
Chart.defaults.global.legend.padding = 15;

$(function () {

    // Bar Chart
    var barctx = $("#barctx");
    var data = {
        labels: ["مهر", "آبان", "آذر", "دی", "بهمن", "اسفند", "فروردین"],
        datasets: [
            {
                label: "دیتاست اول",
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                data: [65, 59, 80, 81, 56, 55, 40]
            }
        ]
    };

    new Chart(barctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });



    /// Line Chart
    var linectx = $("#linectx");
    var myLineChart = Chart.Line(linectx, {
        type : 'line',
        data: {
            labels: ["فروردین", "اردیبهشت", "خرداد", "تیر ", "مرداد", "شهریور", "مهر"],
            datasets: [{
                label:  "دیتاست اول",
                data: [65, 59, 80, 81, 56, 55, 40],
                borderColor: 'rgba(0, 188, 212, 0.75)',
                backgroundColor: 'rgba(0, 188, 212, 0.3)',
                pointBorderColor: 'rgba(0, 188, 212, 0)',
                pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                pointBorderWidth: 1
            }, {
                label:  "دیتا ست دوم",
                data: [28, 48, 40, 19, 86, 27, 90],
                borderColor: 'rgba(233, 30, 99, 0.75)',
                backgroundColor: 'rgba(233, 30, 99, 0.3)',
                pointBorderColor: 'rgba(233, 30, 99, 0)',
                pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                pointBorderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: false

        }
    });

    // radar chart
    var radar_chart = document.getElementById('radar_chart');
    var radar_data = {
        labels: ["خوردن", "آشامیدن", "خوابیدن", "طراحی", "کد نویسی", "دویدن"],
        datasets: [
            {
                label: " دیتاست اول ",
                backgroundColor: "rgba(179,181,198,0.2)",
                borderColor: "rgba(179,181,198,1)",
                pointBackgroundColor: "rgba(179,181,198,1)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(179,181,198,1)",
                data: [65, 59, 90, 81, 56, 55, 40]
            },
            {
                label: " دیتا ست دوم ",
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                pointBackgroundColor: "rgba(255,99,132,1)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(255,99,132,1)",
                data: [28, 48, 40, 19, 96, 27, 100]
            }
        ]
    };
    new Chart(radar_chart,
    {
        type: 'radar',
        data: radar_data,
        options: {
            scale: {
                reverse: true,
                ticks: {
                    beginAtZero: true
                }
            }
        }
    });

    // Polar Area Chart
    var polar_area_chart = document.getElementById('polar_area_chart');
    var polar_area_char_data = {
        datasets: [{
            data: [
                11,
                16,
                7,
                3,
                14
            ],
            backgroundColor: [
                "#FF6384",
                "#4BC0C0",
                "#FFCE56",
                "#E7E9ED",
                "#36A2EB"
            ],
            label: ' دیتاست اولیه ' // for legend
        }],
        labels: [
            "قرمز",
            "سبز",
            "زرد",
            "خاکستری",
            "آبی"
        ]
    };
    new Chart(polar_area_chart, {
        data: polar_area_char_data,
        type: 'polarArea',
        options: {
            elements: {
                arc: {
                    borderColor: "#bdbdbd"
                }
            }
        }
    });
});