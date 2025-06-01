<?php include 'templates/header.php'; ?>
<div class="container">
    <h2>Sign Up</h2>
    <form id="signupForm" action="index.php?page=signup" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    <p><a href="index.php?page=login">Login</a></p>
</div>
<?php include 'templates/footer.php'; ?>