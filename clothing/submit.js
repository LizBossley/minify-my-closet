$(document).ready(function() {
    validateForm();
});

function submitForm() {
    var name = $("#name").val();
    var category = $("#category").val();
    var price = Math.round($("#price").val());
    var type = $('#type').val();
    var season = $("#season").val();
    var state = $("#state").val();
    var store = $("#store").val()
    var wearsCount = $("#wearsCount").val();
    var colors = $("input[name=color-select]:checked").map( function () {return this.value;}).get().join(",");

    // var size = $('[name=size]:checked').val();

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'name=' + name + '&category=' + category + '&price=' + price + '&type=' 
        + type + '&season=' + season + '&state=' + state + '&store=' + store + '&wearsCount=' + wearsCount + '&colors=' + colors;
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
                window.location.href="edit.php?id=" + result + "&view=1";
            }
        });
    }
    return false;
}

function validateForm() {
    $("#clothing-edit").validate({
            rules: {
                name: {
                    required: true
                },
                category: {
                    required: true,
                },
                price: {
                    number: true,
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                },
                category: {
                    required: "Please select a category.",
                },
                price: {
                    number: "Please enter a number.",
                }
            },
            submitHandler: function(form) {
                submitForm();
            }
        });
}
