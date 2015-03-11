$(function() {
    $('a.item').click(function() {
        $('.item').removeClass('active');
        $(this).addClass('active');
    });
    
    var validasiForm = {
        firstName: {
            identifier: 'firstname',
            rules: [
                {
                    type: 'empty',
                    prompt: 'Please enter your first name'
                }
            ]
        },
        lastName: {
            identifier: 'lastname',
            rules: [
                {
                    type: 'empty',
                    prompt: 'Please enter your last name'
                }
            ]
        },
        username: {
            identifier: 'username',
            rules: [
                {
                    type: 'empty',
                    prompt: 'Please enter a username'
                }
            ]
        },
        password: {
            identifier: 'password',
            rules: [
                {
                    type: 'empty',
                    prompt: 'Please enter a password'
                },
                {
                    type: 'length[6]',
                    prompt: 'Your password must be at length 6 character'
                }
            ]
        },
        email: {
            identifier: 'email',
            rules: [
                {
                    type: 'empty',
                    prompt: 'Please enter a username'
                }
            ]
        }
    };

    $('.ui.form').form(validasiForm, {
        inline: true,
            onSuccess: function() {
            $('.modal').modal('show');
        }
    });

});