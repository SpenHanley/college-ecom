<?php
error_reporting(E_ALL);
include "_includes/utils.php";

if (!Auth::check())
{
    header('Location: index.php');
}

$books = populate(false);
if (empty($books))
{
    print('Well something messed up');
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
    <body onload="show_list()">
        <?php include '_includes/navigation.php'; ?>
        <div class="container">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active" onclick="toggle(this); show_list()">
                    <a href="#">List</a>
                </li>
                <li role="presentation" onclick="toggle(this); show_add()">
                    <a href="#">Add Book</a>
                </li>
                <li role="presentation" onclick="toggle(this); show_update(); populate_update()">
                    <a href="#">Update</a>
                </li>
            </ul>
                <!--<button class="btn btn-default" type="button" onclick="change('add')">Add</button>-->
                <!--<button class="btn btn-default" type="button" onclick="change('list')">List</button>-->
                <!--<button class="btn btn-default" type="button" onclick="change('update')">Update</button>-->
            <div id="wrapper_add" >
                <form action="update" method="post">
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
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Add</button>
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
                        <?php populate(true); ?>
                    </tbody>
                </table>
            </div>
        
            <div id="wrapper_update">
                <form action="update.php" method="post">
                    <div class="form-group">
                        <label for="isbn" >ISBN No.</label>
                        <input type="text" class="form-control" name="isbn" id="u_isbn">
                    </div>
                    
                    <div class="form-group">
                        <label for="title" >Title</label>
                        <select id="title" class="form-control" onchange="populate_info(this.value)" name="title">
                            <option>Select One...</option>
                            <?php
                                foreach ($books as $r)
                                {
                                    echo '<option id="'.$r['book_title'].'">'.$r['book_title'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="author" id="u_author">
                    </div>
                    
                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <input type="text" class="form-control" name="publisher" id="u_publisher">
                    </div>
                    
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" name="genre" id="u_genre">
                    </div>
                    
                    <div class="form-group">
                        <label for="year">Year Published</label>
                        <input type="text" class="form-control" name="year" id="u_year">
                    </div>
                    
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" step="0.01" name="price" id="u_price">
                    </div>
                    
                    <div class="form-group">
                        <label for="u_cover">Cover Image</span></label>
                        <input type="text" name="img" id="u_cover" class="form-control"/>
                        <!--<input type="file" name="img" id="cover" class="hidden" accept="image/*">-->
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
        
        <?php
            include '_includes/footer.php';
        ?>
        <script type="text/javascript">
            var books = "";
        
            function show_extra(el, counter)
            {
                if (el.value == 'new')
                {
                    document.getElementById(counter).className = "";
                    el.name = "";
                }
            }
            
            function populate_update()
            {
                books = <?php echo json_encode($books); ?>;
            }
            
            function populate_info(title)
            {
                var b;
                if (books != "")
                {
                    for (var book in books)
                    {
                        console.log(title);
                        if (books[book].book_title == title)
                        {
                            b = books[book];
                            console.log(b);
                            $('#u_isbn').val(b.isbn_no);
                            $('#u_author').val(b.author);
                            $('#u_publisher').val(b.publisher);
                            $('#u_genre').val(b.genre);
                            $('#u_year').val(b.year);
                            $('#u_price').val(b.price);
                            $('#u_cover').val(b.img_path);
                            break;
                        }
                        else
                        {
                            console.log('Book not found');
                        }
                    }
                }
                else
                {
                    console.log("There is an issue");
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