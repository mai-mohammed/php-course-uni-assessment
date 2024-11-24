const loginForm = $('.login-form');
const email = $("input[name='email']")[0];
const password = $("input[name='password']")[0];
const emailHelperText = $('.email-helper-text');
const passwordHelperText = $('.password-helper-text');
loginForm.submit((e) => {
    e.preventDefault();
})

const login = (data) => {
    emailHelperText.css({ "visibility": "hidden" });
    passwordHelperText.css({ "visibility": "hidden" });
    // $.ajax(
    //     {
    //         url: 'api/v1/login',
    //         type: 'POST',
    //         data,
    //         error: (response) => {
    //             if (response.status !== 401) {
    //                 emailHelperText.text(response.responseJSON.error);
    //                 emailHelperText.css({ "visibility": "visible" });
    //             } else {
    //                 passwordHelperText.text(response.responseJSON.error);
    //                 passwordHelperText.css({ "visibility": "visible" });
    //             }
    //         },
    //         success: (response) => {
    //             location.href = '/index.html';
    //         }
    //     }
    // );
}

loginForm.validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
        }
    },
    messages: {
        name: "* Please enter your name",
        email: "* Please enter a valid email address",
        password: {
            required: "* Please provide a password",
        }
    },
    submitHandler: function (form) {
        login({ email: email.value, password: password.value });
    }
});