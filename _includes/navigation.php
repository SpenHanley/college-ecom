<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Jim's Books</a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
            </ul>
            
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <?php if (!Auth::check()) {?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login_form.php">Login</a></li>
                <li><a href="#">Register</a></li>
            </ul>
            <?php
            } else {
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
                <li><a href="dash.php">Dashboard</a></li>
            </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>