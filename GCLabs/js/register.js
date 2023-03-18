
$(document).ready(function() {
    $("#save").click(function() {
    var name = $("#name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var cpass = $("#cpass").val();
    if (name == '' || email == '' || password == '' || cpass == '') {
    alert("Please fill all fields...!!!!!!");
    } else if ((password.length) < 8) {
    alert("Password should atleast 8 character in length...!!!!!!");
    } else if (password != cpass) {
    alert("Your passwords don't match. Try again?");
    } else {
    $.post("php/register.php", {
    name1: name,
    email1: email,
    password1: password
    }, (data) => {
            if (data == 'You have Successfully Registered.....') {
                
            }
            alert(data);
        });
    }
    });
    });