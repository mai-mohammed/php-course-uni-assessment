const userPart = $('.user-part');

$.ajax(
    {
        url: 'api/v1/is-logged',
        type: 'GET',
        error: () => {
            userPart.html(`<a href="./login.html" class="login-button">Login</a>
            <a href = "./signup.html" class="signup-button" > Signup</a>`);
        },
        success: (response) => {
            userPart.html(`<i class="fa-light fa-circle-user"></i>
                            <span class="user-name">${response.token.name}</span>`)
        }
    }
);