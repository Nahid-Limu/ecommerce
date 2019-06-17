<!DOCTYPE>

<?php include ("include/db.php"); ?>
<?php

class SelectCat {

    public static function cat() {

        include ("include/db.php");

        $get_cats = "select * from categories";

        $run_cats = mysqli_query($con, $get_cats);

        while ($row_cats = mysqli_fetch_array($run_cats)) {

            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];

            echo "<option value='$cat_id'>$cat_title</option>";
        }
    }

    public static function brand() {

        include ("include/db.php");

        $get_brands = "SELECT * FROM brands";

        $run_brands = mysqli_query($con, $get_brands);

        while ($row_brands = mysqli_fetch_array($run_brands)) {

            $brands_id = $row_brands['brand_id'];
            $brands_title = $row_brands['brand_title'];

            echo "<option value='$brands_id'>$brands_title</option>";
        }
    }

}
?>
<html>
    <head>
        <title>Inserting product</title>

        <style>
            table{
                background-image: url(../images/fbg.jpg);
            }
            td{
                color: white;
            }
        </style>

        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({selector: 'textarea'});
        </script>
    </head>


    <body bgcolor="skyblue">


        <form action="insert_product.php" method="post" enctype="multipart/form-data">



            <table align="center" width="700" border="2 " >



                <tr align="center">
                    <th colspan="7"><h2 ><span style="color: white">Insert New Post Here</span></h2></th>
                </tr>



                <tr>
                    <td align="right"><b>Product Title:</b></td>
                    <td><input type="text" name="product_title" size="60" required/></td>

                </tr>



                <tr>
                    <td align="right"><b>Product Category:</b></td>
                    <td>
                        <select name="product_cat" >
                            <option>Select a Category</option>

                            <?php
                            SelectCat::cat();
                            ?>

                        </select>
                    </td>

                </tr>



                <tr>
                    <td align="right"><b>Product Brand:</b></td>
                    <td>

                        <select name="product_brand">
                            <option>Select a Brand</option>

                            <?php
                            SelectCat::brand();
                            ?>

                        </select>

                    </td>

                </tr>



                <tr>
                    <td align="right"><b>Product Image:</b></td>
                    <td><input type="file" name="product_image"/></td>

                </tr>

                <tr>
                    <td align="right"><b>Product Price:</b></td>
                    <td><input type="number" name="product_price" required/></td>

                </tr>

                <tr>
                    <td align="right"><b>Product Description:</b></td>
                    <td>
                        <textarea name="product_desc" cols="20" rows="10" ></textarea>
                    </td> 

                </tr>

                <tr>
                    <td align="right"><b>Product Keywords:</b></td>
                    <td><input type="text" name="product_keywords" size="50" required/></td>

                </tr>

                <tr align="center">

                    <td colspan="2"><input type="submit" name="insert_post" value="Insert Now"/></td>

                </tr>
                
            </table>
        </form>


    </body>

</html>

<?php
if (isset($_POST['insert_post'])) {

    //getting the data from the fields
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keyowrds = $_POST['product_keywords'];

    //getting the image from the field
    $product_image = $_FILES['product_image'] ['name'];
    $product_image_tmp = $_FILES['product_image'] ['tmp_name'];
    
    move_uploaded_file($product_image_tmp, "product_images/$product_image");

    //Insert data quary
    $insert_product = "INSERT INTO products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) VALUES
('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keyowrds')";
    
    $insert_pro = mysqli_query($con, $insert_product);
    
    if (isset($insert_pro)){
        echo "<script>alert('Uplode Successfully...!!!')</script>";
        echo "<script>window.open('insert_product.php', '_self');</script>";
        
    }
}
?>