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
    </head>
    <body>
        <?php include '_includes/navigation.php'; ?>
        <div class="container">
            <ul class="nav nav-tabs">
                <li role="presentation" class="trigger active" onclick="toggle('this')">
                    <a href="#">Add</a>
                </li>
                <li role="presentation" class="trigger" onclick="toggle('this')">
                    <a href="#">List</a>
                </li>
                <li role="presentation" class="trigger" onclick="toggle('this')">
                    <a href="#">Update</a>
                </li>
            </ul>
                <!--<button class="btn btn-default" type="button" onclick="change('add')">Add</button>-->
                <!--<button class="btn btn-default" type="button" onclick="change('list')">List</button>-->
                <!--<button class="btn btn-default" type="button" onclick="change('update')">Update</button>-->
            <div id="add" >
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
            
            <div id="list">
                <table class="table table-striped" >
                    <tr>
                        <td>
                            Cover Image
                        </td>
                        <td>
                            Author
                        </td>
                        <td>
                            Publisher
                        </td>
                        <td>
                            Price
                        </td>
                        <td>
                            Year Published
                        </td>
                        <td>
                            Genre
                        </td>
                    </tr>
                    <?php populate(); ?>
                </table>
            </div>
        
        
        <div id="update">
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
        
        <script src="assets/js/jquery-2.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
                $(obj).toggleClass('active')
            }
        </script>
    </body>
</html>