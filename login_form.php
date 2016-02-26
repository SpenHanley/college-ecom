<?php
include '_includes/utils.php';
if (Auth::check()) {
    header('Location: dash.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Jim's Books</title>
        <meta charset="utf-8">
        
        <?php include '_includes/bootstrap_header.php'; ?>
        <link rel="stylesheet" href="assets/style/main.css">
    </head>
    <body>
        <?php include '_includes/navigation.php'; ?>
        
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-center">Jim's Books</h1>
                    <p class="lead text-center">Login</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="well">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="un" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="pw" id="password" class="form-control">
                            </div>
                            <a class="btn btn-default">Recover Account</a>
                            <button class="btn btn-primary pull-right" type="submit">Login</button>
                        </form>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Security Notice
                        </div>
                        
                        <div class="panel-body">
                            <p>Do not login at Starbucks.</p>
                            <p>Also do not login with someone behind you. Check over your shoulder.</p>
                            <p>Do not login with Internet Explorer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
