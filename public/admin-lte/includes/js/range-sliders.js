$("#range_01").ionRangeSlider();

$("#range_02").ionRangeSlider({
    min:100,
    max:1000,
    from:500
});

$("#range_03").ionRangeSlider({
    type: "double",
    grid: true,
    min:-1000,
    max:1000,
    from:-500,
    to: 800,
    suffix : "%"

});

$("#range_04").ionRangeSlider({
    grid: true,
    from: 5,
    values: [
        "فروردین", "اردیبهشت",
        "خرداد", "تیر",
        "مرداد", "شهریور",
        "مهر", "آبان",
        "آذر", "دی",
        "بهمن" ,"اسفند"
    ]
});