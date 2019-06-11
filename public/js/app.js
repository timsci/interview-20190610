$(document).ready(function () {
    $('#per_page').change(function () {
        let sort = $('#sort').val(),
            order = $('#order').val();

        window.location.replace(
            window.location.pathname + "?"
            + "sort=" + sort + "&"
            + "order=" + order + "&"
            + "per_page=" + $(this).val()
        );
    });

    $('.date').change(updateBirthday).keyup(updateBirthday);
    $('#delete').click(function (e) {
        e.preventDefault();

        if (confirm("Are you sure?")) {
            $('#delete_form').submit();
        }
    });

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
