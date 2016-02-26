<?php
include '_includes/utils.php';
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
            <!-- table-listing is a custom CSS class in main.css -->
            <table class="table table-striped table-listing">
                <thead>
                    <tr>
                        <th>
                            Cover Image
                        </th>
                        
                        <th>
                            Book Title
                        </th>
                        
                        <th>
                            Author
                        </th>
                        
                        <th>
                            Publisher
                        </th>
                        
                        <th>
                            Price
                        </th>
                        
                        <th>
                            Year Published
                        </th>
                        
                        <th>
                            Genre
                        </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php populate(); ?>
                </tbody>
            </table>
        </div>
        
        <?php
            include '_includes/footer.php';
        ?>
    </body>
</html>
