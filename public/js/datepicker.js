$(function() {

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0");
    var yyyy = today.getFullYear();

    var todayDate = yyyy + "-" + mm + "-" + dd;
    var nowDate = new Date(todayDate);
    nowDate.setDate(nowDate.getDate() + 8);
    var d = nowDate.getDate();
    var m = nowDate.getMonth() + 1;
    var y = nowDate.getFullYear();

    var todayFormattedDate = y + "-"+ m + "-" + d;

    var expireDate = new Date(todayDate);
    expireDate.setFullYear(expireDate.getFullYear() + 1);
    expireDate.setDate(expireDate.getDate() - 1);
    var expiredDate =
        expireDate.toLocaleString("en", { year: "numeric" }) +
        "-" +
        expireDate.toLocaleString("en", { month: "numeric" }) +
        "-" +
        expireDate.toLocaleString("en", { day: "numeric" });

    const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    // $(".xdsoft_highlighted_default")
    //         .attr({
    //             "date-toggle": "tooltip",
    //             title: "This date is fully scheduled."
    //         })
    //         .tooltip({ show: { effect: "blind", duration: 800 } });

    

    function find_duplicate_in_array(arra1) {
        var object = {};
        var result = [];

        arra1.forEach(function(item) {
            if (!object[item]) object[item] = 0;
            object[item] += 1;
        });

        for (var prop in object) {
            if (object[prop] >= 5) {
                result.push(prop);
            }
        }

        return result;
    }

    let occupiedDates = find_duplicate_in_array(dates);


    $(".datepicker").datetimepicker({
        timepicker: false,
        inline: true,
        monthChangeSpinner: true,
        initTime: true,
        format: "Y-m-d",
        highlightedDates: occupiedDates,
        disabledDates: occupiedDates,
        formatDate: "Y-m-d",
        minDate: todayFormattedDate,
        maxDate: expiredDate,
        onGenerate: function(){
            $(".xdsoft_highlighted_default")
            .attr({
                "data-toggle": "tooltip",
                "data-placement": "bottom",
                title: "This date is fully scheduled."
            })

            $(".xdsoft_highlighted_default > div")
            .attr({
                "data-toggle": "tooltip",
                "data-placement": "bottom",
                title: "This date is fully scheduled."
            })
        },
        onSelectDate: function(current_time, input) {
            let d = new Date(input.val());
            let date =
                monthNames[d.getMonth()] +
                " " +
                d.getDate() +
                ", " +
                d.getFullYear();
            $("#date-val").html(date);
            $(".datepicker").val(input.val());
        },
        todayButton: false
    });

    $(".timepicker1").datetimepicker({
        ampm: true,
        datepicker: false,
        inline: true,
        scrollTime: true,
        weeks: false,
        formatTime: "g:i A",
        format: "g:i A",
        minTime: "8:00",
        maxTime: "23:00",
        onSelectTime: function(current_time, input) {
            let time =
                current_time.getHours() +
                3 +
                ":" +
                current_time.getMinutes() +
                "0";
            $(".timepicker2").datetimepicker({ minTime: time });
            $("#time1-val").html(input.val());
        },
        validateOnBlur: false
    });

    $(".timepicker2").datetimepicker({
        ampm: true,
        datepicker: false,
        scrollTime: true,
        inline: true,
        scrollTime: true,
        weeks: false,
        formatTime: "g:i A",
        format: "g:i A",
        minTime: "8:00",
        maxTime: "23:00",
        onSelectTime: function(current_time, input) {
            $("#time2-val").html(input.val());
        },
        validateOnBlur: false
    });

    $("#reservation-form").on("submit", function() {
        var date = $(".datepicker").val();
        var start = $(".timepicker1").val();
        var end = $(".timepicker2").val();
        if ((start == null || start == "", end == null || end == "")) {
            $(".error").html("Please select Time first!");
            // $(".error i").attr("class", "fa fa-exclamation-circle");
            return false;
        }
        if (date == null || date == "") {
            $(".error").html("Please select Date first!");
            return false;
        } else {
            return true;
        }
    });
});
