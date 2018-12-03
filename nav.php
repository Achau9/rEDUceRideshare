<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="resources/images/logo.png" id="logo">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php" style="color:lightgreen; font-size:1.5em;"><strong>rEDUce</strong></a>
            </li>

        </ul>
        <?php if (isset($_SESSION['username'])) : ?>
        <span style="color:lightgreen;">Welcome <strong>
                <?php echo $_SESSION['username']; ?></strong> &ensp; </span>
        <?php echo "<a class='btn btn-outline-warning' href='profile.php?user=".$_SESSION['username']."'> View Profile </a> <span>&ensp;</span>"; ?>
        <a class="btn btn-outline-danger" href="index.php?logout=1">Logout</a>
        <?php else: ?>
        <a class="btn btn-outline-success" href="login.php">Login</a>
        <span> &ensp; </span>
        <a class="btn btn-outline-success" href="register.php">Signup</a>
        <?php endif ?>
    </div>
</nav>