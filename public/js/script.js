document.getElementById('signupForm')?.addEventListener('submit', function(e) {
    let username = document.querySelector('input[name="username"]').value;
    let email = document.querySelector('input[name="email"]').value;
    let password = document.querySelector('input[name="password"]').value;

    if (username.length < 3) {
        alert('Username must be at least 3 characters.');
        e.preventDefault();
    }
    if (!email.includes('@')) {
        alert('Please enter a valid email.');
        e.preventDefault();
    }
    if (password.length < 6) {
        alert('Password must be at least 6 characters.');
        e.preventDefault();
    }
});

document.getElementById('loginForm')?.addEventListener('submit', function(e) {
    let email = document.querySelector('input[name="email"]').value;
    let password = document.querySelector('input[name="password"]').value;

    if (!email.includes('@')) {
        alert('Please enter a valid email.');
        e.preventDefault();
    }
    if (password.length < 6) {
        alert('Password must be at least 6 characters.');
        e.preventDefault();
    }
});