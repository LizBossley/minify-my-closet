$(document).ready(function() {
    validateForm();
});

function submitForm() {
    console.log("i'm being called (submit form)");
    var name = $("#name").val();
    var category = $("#category").val();

    // var size = $('[name=size]:checked').val();

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'name=' + name + '&category=' + category;
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
    console.log("vally in the house");
    $("#clothing-edit").validate({
            rules: {
                name: {
                    required: true
                },
                category: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                },
                category: {
                    required: "Please select a category.",
                }
            },
            submitHandler: function(form) {
                submitForm();
            }
        });
}
