const signUpForm = $('.signup-form');
const name = $("input[name='name']")[0];
const email = $("input[name='email']")[0];
const password = $("input[name='password']")[0];
const passwordRepeat = $("input[name='passwordRepeat']")[0];

// ------------------ handle signup form validation -------------------
const sendData = (data) => {
    // $.post('/api/v1/register', data, (response) => {
    //     console.log(response);
    // });
}

signUpForm.validate({
    rules: {
        name: "required",
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
            minlength: 6
        },
        password_confirm: {
            equalTo: "#password"
        }
    },
    messages: {
        name: "* Please enter your name",
        email: "* Please enter a valid email address",
        password: {
            required: "* Please provide a password",
            minlength: "* Your password must be at least 6 characters long"
        },
        password_confirm: {
            required: "* Please confirm your password."
        }
    },
    submitHandler: function (form) {
        sendData({ name: name.value, email: email.value, password: password.value });
        location.href = '/client/public/login.html';
    }
});
