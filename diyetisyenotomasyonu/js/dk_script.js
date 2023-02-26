    var passwordone = document.getElementById('passwordone');
    var passwordtwo = document.getElementById('passwordtwo');
    var showPassword = document.getElementById('showPassword');

    showPassword.addEventListener('click', function() {
        if (passwordone.type == "text") {
            passwordone.type = "password";
            passwordtwo.type = "password";
            showPassword.classList.remove("uil-eye");
            showPassword.classList.add("uil-eye-slash")
        } else {
            passwordone.type = "text";
            passwordtwo.type = "text";
            showPassword.classList.add("uil-eye");
            showPassword.classList.remove("uil-eye-slash")
        }

    })
    /*
    var btn_show = document.getElementById('btn_show');
    var doktor_sifre = document.getElementById('doktor_sifre');

    btn_show.addEventListener('click', function() {
        if (doktor_sifre.type == "text") {
            doktor_sifre.type = "password";
            btn_show.classList.remove("uil-eye");
            btn_show.classList.add("uil-eye-slash")
        } else {
            doktor_sifre.type = "text";
            btn_show.classList.add("uil-eye");
            btn_show.classList.remove("uil-eye-slash")
        }

    })*/