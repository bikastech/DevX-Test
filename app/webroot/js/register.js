    $(document).ready(function () {

        $("#UserAddForm").validate({
            rules: {
                phone: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    email: true
                },
                password: {
                    minlength: 6
                },
                c_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                c_password: {
                    equalTo: "Password and Confirm Password must match"
                }
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            }
        });

        

        // Adding validation rules to each form element
        $('.form-control').each(function () {
            var fieldName = $(this).attr('id');

            // Set specific rules for password
            if (fieldName === 'password' || fieldName === 'c_password') {
                $(this).rules('add', {
                    required: true,
                    minlength: 6,
                    // other rules for password...
                });
            } else if (fieldName === 'phone') {
                $(this).rules('add', {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    // other rules for password...
                });
            } else {
                // Set common rules for other fields
                $(this).rules('add', {
                    required: true,
                    minlength: 3,
                    // other common rules...
                });
            }
        });
    });