$(document).ready(function () {
    $('.date').change(updateBirthday).keyup(updateBirthday);

    function updateBirthday() {
        let month = $('#birthday_month').val(),
            day = $('#birthday_day').val(),
            year = $('#birthday_year').val(),
            date = "";

        if (month && day && year) {
            date = year.padStart(4, "0")
                + "-" + month.padStart(2, "0")
                + "-" + day.padStart(2, "0");
        }

        $('#birthday').val(date);
    }
});
