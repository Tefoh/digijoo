$(function () {
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'line_chart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
            { year: '2008', value: 20 },
            { year: '2009', value: 10 },
            { year: '2010', value: 5 },
            { year: '2011', value: 5 },
            { year: '2012', value: 20 }
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['مقدار']
    });

    Morris.Bar({
        element: "bar_chart",
        data: [{
            x: '2011 Q1',
            y: 3,
            z: 2,
            a: 3
        }, {
            x: '2011 Q2',
            y: 2,
            z: null,
            a: 1
        }, {
            x: '2011 Q3',
            y: 0,
            z: 2,
            a: 4
        }, {
            x: '2011 Q4',
            y: 2,
            z: 4,
            a: 3
        }],
        xkey: 'x',
        ykeys: ['y', 'z', 'a'],
        labels: ['سال', 'مقدار پیشرفت', 'فروش ها'],
        barColors: ['#e91e63', '#ff9800', '#00bcd4'],
        gridTextFamily:'yekan'
    });


    Morris.Area({
        element: "area_chart",
        gridTextFamily:'yekan',
        data: [{
            period: '2010 Q1',
            iphone: 2666,
            ipad: null,
            itouch: 2647
        }, {
            period: '2010 Q2',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
        }, {
            period: '2010 Q3',
            iphone: 4912,
            ipad: 1969,
            itouch: 2501
        }, {
            period: '2010 Q4',
            iphone: 3767,
            ipad: 3597,
            itouch: 5689
        }, {
            period: '2011 Q1',
            iphone: 6810,
            ipad: 1914,
            itouch: 2293
        }, {
            period: '2011 Q2',
            iphone: 5670,
            ipad: 4293,
            itouch: 1881
        }, {
            period: '2011 Q3',
            iphone: 4820,
            ipad: 3795,
            itouch: 1588
        }, {
            period: '2011 Q4',
            iphone: 15073,
            ipad: 5967,
            itouch: 5175
        }, {
            period: '2012 Q1',
            iphone: 10687,
            ipad: 4460,
            itouch: 2028
        }, {
            period: '2012 Q2',
            iphone: 8432,
            ipad: 5713,
            itouch: 1791
        }],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['آی فون', 'آی پد', 'آی پد تاچ'],
        pointSize: 2,
        hideHover: 'auto',
        lineColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)']
    });


    Morris.Donut({
            element: "donut_chart",
            gridTextFamily : "yekan",
            data: [{
                label: 'مربا',
                value: 25
            }, {
                label: 'یخ زده',
                value: 40
            }, {
                label: 'فرنی',
                value: 25
            }, {
                label: 'شکر',
                value: 10
            }],
            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
            formatter: function (y) {
                return Persian_Number(y + '%');
            }

        }
    );
});