document.addEventListener('DOMContentLoaded', function () {
    const signInForm = document.getElementById('signInForm');
    const signUpForm = document.getElementById('signUpForm');

    
    window.switchToSignUp = function () {
        signInForm.classList.add('hidden');
        signUpForm.classList.remove('hidden');
    };

    
    window.switchToSignIn = function () {
        signUpForm.classList.add('hidden');
        signInForm.classList.remove('hidden');
    };


    signInForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const email = document.getElementById('signin-email').value;
        const password = document.getElementById('signin-password').value;

        const storedUser = localStorage.getItem(email);
        if (storedUser) {
            const userData = JSON.parse(storedUser);
            if (userData.password === password) {
                alert('Signed in successfully!');
            
            } else {
                alert('Incorrect password.');
            }
        } else {
            alert('User does not exist.');
        }
    });


    signUpForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const email = document.getElementById('signup-email').value;
        const password = document.getElementById('signup-password').value;
        const confirmPassword = document.getElementById('signup-confirm-password').value;

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            return;
        }

        if (localStorage.getItem(email)) {
            alert('User already exists.');
            return;
        }

        const userData = {
            email,
            password
        };

        localStorage.setItem(email, JSON.stringify(userData));
        alert('Account created successfully! Please sign in.');
        switchToSignIn();
    });
});
