$(document).ready(function() {
    /* 
    LOGIN
     */

    $("body").on('click', '#signin', function() {
        var email = $('#email').val();
        var password = $('#password').val();

        if (email === '' || password === '') {
            $("p.error").text('Invalid Field Inputskk, Try Again!');
            return false;
        }

        $.ajax({
            type: "post",
            url: "ajax/userlog.php", //url of the page where php,mysql code
            data: {
                email: email,
                password: password,
                action: 'login'
            },
            dataType: 'html',
            beforeSend: function() {},
            success: function(data) {
                if (data === 'TRUE') {
                    window.location.href = 'menu.php';
                } else {
                    $("p.error").text('Invalid Field Inputs, Try Again!');
                }
            }
        });
    });

    /* 
    REGISTER
     */

    $("body").on('click', '#signup', function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var password = $('#password').val();
        var repassword = $('#repassword').val();
        var usertype = $('input[name=usertype]:checked', '#registerForm').val();
        var preference = $('input[name=preference]:checked', '#registerForm').val();

        if (name == '' || email == '' || address == '' || password == '' || repassword == '' || usertype == undefined || (usertype == '1' && preference == undefined)) {
            alert("Complete the Empty Fields!");
            return;
        }
        if (!validateEmail(email)) {
            alert("Invalid Email!");
            return;
        }
        if (password !== repassword) {
            alert("Password doesn't match!");
            return;
        }
        if (preference == undefined) {
            preference = null;
        }

        $.ajax({
            type: "post",
            url: "ajax/userlog.php", //url of the page where php,mysql code
            data: {
                name: name,
                email: email,
                address: address,
                password: password,
                repassword: repassword,
                usertype: usertype,
                preference: preference,
                action: 'register'
            },
            dataType: 'html',
            beforeSend: function() {

            },
            success: function(data) {
                if (data === 'EXISTS') {
                    $("p.error").text('Account with this email already exists!');
                    return;
                }
                if (data === 'TRUE') {
                    window.location.href = 'login.php';
                } else {
                    $("p.error").text('Invalid Field Inputs, Try Again!');
                }
            }
        });
    });

    $("body").on('click', '#triggerShow', function() {
        $("#pref").removeClass("hide");
    });

    $("body").on('click', '#triggerHide', function() {
        $("#pref").addClass("hide");
    });

    /* 
    ADDING NEW ITEM
     */

    $("body").on('click', '#newItem', function() {
        var name = $('#name').val();
        var price = $('#price').val();
        var description = $('#description').val();
        var preference = $('input[name=preference]:checked', '#newItemForm').val();

        if (name == '' || price == '' || description == '' || preference == undefined) {
            alert("Complete the Empty Fields!");
            return;
        }

        $.ajax({
            type: "post",
            url: "ajax/userlog.php", //url of the page where php,mysql code
            data: {
                name: name,
                price: price,
                description: description,
                preference: preference,
                action: 'newItem'
            },
            dataType: 'html',
            beforeSend: function() {},
            success: function(data) {
                if (data === 'TRUE') {
                    alert('Dish Successfully added to the Menu!');
                    window.location.href = 'menu.php';
                } else {
                    $("p.error").text('Invalid Field Inputs, Try Again!');
                }
            }
        });
    });

    /* 
    HANDLING ORDERS [RESTAURANT]
     */

    $("body").on('click', '#orderComplete', function() {
        var id = $(this).attr('data-id');

        $.ajax({
            type: "post",
            url: "ajax/userlog.php", //url of the page where php,mysql code
            data: {
                id: id,
                action: 'orderComplete'
            },
            dataType: 'html',
            beforeSend: function() {},
            success: function(data) {
                if (data === 'TRUE') {
                    location.reload();
                } else {
                    alert();
                }
            }
        });
    });

    /* 
    HANDLING ORDERS [CUSTOMER]
     */

    $("body").on('click', '#order', function() {
        var id = $(this).attr('data-id');
        var restaurantId = $(this).attr('data-restaurant');
        var confirmation = confirm("Are you sure you want to proceed with the order?");
        if (!confirmation) {
            return false;
        }

        $.ajax({
            type: "post",
            url: "ajax/userlog.php", //url of the page where php,mysql code
            data: {
                id: id,
                restaurantId: restaurantId,
                action: 'order'
            },
            dataType: 'html',
            beforeSend: function() {},
            success: function(data) {
                if (data === 'TRUE') {
                    $('#notification').removeClass('hide');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#notification p').text('Your Order Has Been Placed Successfully! It Will Be Delivered To Your Registered Address Within 30 Minutes');
                    setTimeout(function() {
                        $('#notification').addClass('hide');
                    }, 5000);
                } else {
                    $('#notification').removeClass('hide');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#notification p').text('There Seems To Be Some Issue In Processing Your Order, Please Try Again!');
                    setTimeout(function() {
                        $('#notification').addClass('hide');
                    }, 5000);
                }
            }
        });
    });

    /* 
    UTILITY FUNCTIONS
     */

    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }



});