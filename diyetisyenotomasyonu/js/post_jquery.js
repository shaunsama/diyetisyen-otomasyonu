$(document).ready(function() {

    $('.close-login-alert').on('click', function() {
        $('.alert').addClass("d-none");
        var newUrl = "http://localhost/diyetisyenotomasyonu/login";
        history.replaceState(null, null, newUrl);
    });

    $('.close-register-alert').on('click', function() {
        $('.alert').addClass("d-none");
        var newUrl = "http://localhost/diyetisyenotomasyonu/register";
        history.replaceState(null, null, newUrl);
    });


    $('.close-settings-alert').on('click', function() {
        $('.alert').addClass("d-none");
        var newUrl = "http://localhost/diyetisyenotomasyonu/ayarlar";
        history.replaceState(null, null, newUrl);
    });

    $('.close-home-alert').on('click', function() {
        $('.alert').addClass("d-none");
        var newUrl = "http://localhost/diyetisyenotomasyonu/anasayfa";
        history.replaceState(null, null, newUrl);
    });

    //  Arama İşlemi //
    $(document).ready(function() {
        $("#myInput").on("input", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable .students").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });

    /*
        $(function() {
            $(".dropdown").on("click", function(e) {
                $(".content-wrapper").addClass("overlay");
                e.stopPropagation();
            });
            $(document).on("click", function(e) {
                if ($(e.target).is(".dropdown") === false) {
                    $(".content-wrapper").removeClass("overlay");
                }
            });
        });*/
    //  Arama İşlemi //

    document.getElementById('danisan_telefon').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '' + x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
    });


    /* Hesap Bilgileri Güncelle Start */



    /* Hesap Bilgileri Güncelle End */

});


function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}