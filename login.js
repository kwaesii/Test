$(document).ready(() => {
    $("#login-button").click((e) => {
        const email = $("#email").val().trim();
        const password = $("#password").val().trim();

        if (email === "" || password === "") {
            alert("Please fill in all fields.");
            return;
        }

        $.ajax({
            url: "login_process.php",
            method: "POST",
            data: { email: email, password: password },
        }).done((response) => {
            if (response === "success") {
                window.location.href = "la3_dashboard.php";
            } else {
                alert("Invalid email or password for admin.");
            }
        }).fail(() => {
            alert("Error connecting to server.");
        });
    });
});
