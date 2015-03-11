$(document)
        .ready(function () {

            var
                    changeSides = function () {
                        $('.ui.shape')
                                .eq(0)
                                .shape('flip over')
                                .end()
                                .eq(1)
                                .shape('flip over')
                                .end()
                                .eq(2)
                                .shape('flip back')
                                .end()
                                .eq(3)
                                .shape('flip back')
                                .end()
                                ;
                    },
                    validationRules = {
                        firstName: {
                            identifier: 'firstname',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter an first name'
                                }
                            ]
                        },
                        lastName: {
                            identifier: 'lastname',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter an last name',
                                }
                            ]
                        },
                        username: {
                            identifier: 'username',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter an username'
                                }
                            ]
                        },
                        password: {
                            identifier: 'password',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter an password'
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
                                    prompt: 'Please enter an e-mail'
                                },
                                {
                                    type: 'email',
                                    prompt: 'Please enter a valid e-mail'
                                }
                            ]
                        }
                    }
            ;

            $('.ui.form')
                    .form(validationRules, {
                        inline: true
                    })
                    ;

            $('.ui.dropdown')
                    .dropdown({
                        on: 'hover'
                    })
                    ;

            $('.ui input')
                    .popup({
                        on: 'hover'
                    })
                    ;

            $('.ui i')
                    .popup({
                        on: 'hover'
                    })
                    ;

            $('.ui a.item').click(function () {
                $('.item').removeClass('active');
                $(this).addClass('active');
            });

            $('.masthead .information')
                    .transition('scale in')
                    ;
            setInterval(changeSides, 3000);
        })
        ;