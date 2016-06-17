$(document).ready(function() {
    validateForm();
});

function submitForm() {
    var name = $("#name").val();
    var category = $("#category").val();
    var season = $("#season").val();

    // var size = $('[name=size]:checked').val();

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'name=' + name + '&category=' + category + '&season=' + season;
    if (name == '' || category == '') {
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
    $("#outfit-edit").validate({
            rules: {
                name: {
                    required: true
                },
            },
            messages: {
                name: {
                    required: "Please enter your name",
                },
            },
            submitHandler: function(form) {
                submitForm();
            }
        });
}
