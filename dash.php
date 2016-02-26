<?php
error_reporting(E_ALL);
include "_includes/utils.php";

if (!Auth::check())
{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <?php
            include '_includes/bootstrap_header.php';
        ?>
        <link rel="stylesheet" href="assets/style/main.css">
    </head>
    <body onload="show_add()">
        <?php include '_includes/navigation.php'; ?>
        <div class="container">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active" onclick="toggle(this); show_add()">
                    <a href="#">Add Book</a>
                </li>
                <li role="presentation" onclick="toggle(this); show_list()">
                    <a href="#">List</a>
                </li>
                <li role="presentation" onclick="toggle(this); show_update()">
                    <a href="#">Update</a>
                </li>
                <li role="presentation" onclick="">
                    
                </li>
            </ul>
                <!--<button class="btn btn-default" type="button" onclick="change('add')">Add</button>-->
                <!--<button class="btn btn-default" type="button" onclick="change('list')">List</button>-->
                <!--<button class="btn btn-default" type="button" onclick="change('update')">Update</button>-->
            <div id="wrapper_add" >
                <form>
                    <div class="form-group">
                        <label for="isbn" >ISBN No.</label>
                        <input type="text" class="form-control" name="isbn" id="isbn">
                    </div>
                    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    
                    <div class="form-group">
                        <label for="author">Author</label>
                        <select name="author" id="author" onchange="show_extra(this, 'new_au')" class="form-control">
                            <?php
                                populate_options('author');
                            ?>
                            <option value="new">Other</option>
                        </select>
                        
                        <input type="text" class="form-control hidden" name="author" id="new_au">
                    </div>
                    
                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <select name="publisher" onchange="show_extra(this, 'new_pub')" class="form-control">
                            <?php
                                populate_options('publisher');
                            ?>
                            <option value="new">Other</option>
                        </select>
                        <input type="text" class="form-control hidden" name="publisher" id="new_pub">
                    </div>
                    
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select name="genre" onchange="show_extra(this, 'new_gen')" class="form-control">
                            <?php
                                populate_options('genre');
                            ?>
                            <option value="new">Other</option>
                        </select>
                        <input type="text" class="form-control hidden" name="genre" id="new_gen">
                    </div>
                    
                    <div class="form-group">
                        <label for="year">Year Published</label>
                        <input type="date" class="form-control" name="year" id="year">
                    </div>
                    
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" step="0.01" name="price" id="price">
                    </div>
                    
                    <div class="form-group">
                        <label for="cover">Cover Image <span class="glyphicon glyphicon-upload"></span></label>
                        <input type="file" name="img" id="cover" class="hidden" accept="image/*">
                    </div>
                </form>
            </div>
            
            <div id="wrapper_list">
                <table class="table table-striped table-listing">
                    <thead>
                        <tr>
                            <th>
                                Cover Image
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
        
        
            <div id="wrapper_update">
                <form>
                    <div class="form-group">
                        <label for="isbn" >ISBN No.</label>
                        <input type="text" class="form-control" name="isbn" id="isbn">
                    </div>
                    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    
                    <div class="form-group">
                        <label for="author">Author</label>
                        <select name="author" id="author" onchange="show_extra(this, 'new_au')" class="form-control">
                            <?php
                                populate_options('author');
                            ?>
                            <option value="new">Other</option>
                        </select>
                        
                        <input type="text" class="form-control hidden" name="author" id="new_au">
                    </div>
                    
                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <select name="publisher" onchange="show_extra(this, 'new_pub')" class="form-control">
                            <?php
                                populate_options('publisher');
                            ?>
                            <option value="new">Other</option>
                        </select>
                        <input type="text" class="form-control hidden" name="publisher" id="new_pub">
                    </div>
                    
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select name="genre" onchange="show_extra(this, 'new_gen')" class="form-control">
                            <?php
                                populate_options('genre');
                            ?>
                            <option value="new">Other</option>
                        </select>
                        <input type="text" class="form-control hidden" name="genre" id="new_gen">
                    </div>
                    
                    <div class="form-group">
                        <label for="year">Year Published</label>
                        <input type="date" class="form-control" name="year" id="year">
                    </div>
                    
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" step="0.01" name="price" id="price">
                    </div>
                    
                    <div class="form-group">
                        <label for="cover">Cover Image <span class="glyphicon glyphicon-upload"></span></label>
                        <input type="file" name="img" id="cover" class="hidden" accept="image/*">
                    </div>
                </form>
            </div>
        </div>
        
        <?php
            include '_includes/footer.php';
        ?>
        <script>
            function show_extra(el, counter)
            {
                if (el.value == 'new')
                {
                    document.getElementById(counter).className = "";
                    el.name = "";
                }
            }
            
            function toggle(obj)
            {
                $('.active').removeClass('active');
                $(obj).toggleClass('active');
                $(obj).children();
            }
            
            function show_add() {
                $('#wrapper_add').show();
                $('#wrapper_update').hide();
                $('#wrapper_list').hide();
            }
            
            function show_update() {
                $('#wrapper_update').show();
                $('#wrapper_add').hide();
                $('#wrapper_list').hide();
            }
            
            function show_list() {
                $('#wrapper_list').show();
                $('#wrapper_add').hide();
                $('#wrapper_update').hide();
            }
        </script>
    </body>
</html>