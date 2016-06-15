$(document).ready(function() {
    validateForm();
});

function submitForm() {
    console.log("i'm being called (submit form)");
    var name = $("#name").val();
    var faction = $("#faction").val();
    var game = 0; //default warmachine
    if (faction > 7) {
        game = 1; //else set to hordes
    }
    var size = $('[name=size]:checked').val();

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'name=' + name + '&faction=' + faction + '&game=' + game + '&size=' + size;
    if (name == '' || faction == '') {
        alert("Please Fill All Fields");
    } else {
        // AJAX Code To Submit Form.
        $.ajax({
            type: "POST",
            url: "ajaxsubmit.php",
            data: dataString,
            cache: false,
            success: function(result) {
                alert(result);
            }
        });
    }
    return false;
}

function validateForm() {
    console.log("vally in the house");
    $("#card-edit").validate({
            rules: {
                name: {
                    required: true
                },
                faction: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                },
                faction: {
                    required: "Please select a faction.",
                }
            },
            submitHandler: function(form) {
                submitForm();
            }
        });
}
