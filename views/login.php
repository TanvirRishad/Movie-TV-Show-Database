<?php include 'templates/header.php'; ?>
<div class="container">
    <h2>Login</h2>
    <form id="loginForm" action="index.php?page=login" method="POST">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p><a href="index.php?page=signup">Sign up</a></p>
</div>
<?php include 'templates/footer.php'; ?>