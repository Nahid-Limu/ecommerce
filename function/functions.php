<?php

$con = mysqli_connect("localhost", "root", "", "ecommerce");
global $con;

class functions {

    //getting the categories
    function getCats() {

        global $con;

        $get_cats = "select * from categories";

        $run_cats = mysqli_query($con, $get_cats);

        while ($row_cats = mysqli_fetch_array($run_cats)) {

            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];

            echo "<li><a href='#'>$cat_title</a></li>";
        }
    }

//getting the Brands
    function getBrands() {

        global $con;

        $get_brands = "SELECT * FROM brands";

        $run_brands = mysqli_query($con, $get_brands);

        while ($row_brands = mysqli_fetch_array($run_brands)) {

            $brands_id = $row_brands['brand_id'];
            $brands_title = $row_brands['brand_title'];

            echo "<li><a href='#'>$brands_title</a></li>";
        }
    }
    
    

    //getting Product

    function getpro() {
        global $con;

        $get_pro = "SELECT * FROM products ORDER by product_id DESC LIMIT 0,6";
        $run_pro = mysqli_query($con, $get_pro);

        while ($row = mysqli_fetch_assoc($run_pro)) {

            $pro_id = $row['product_id'];
            $pro_cat = $row['product_cat'];
            $pro_brand = $row['product_brand'];
            $pro_title = $row['product_title'];
            $pro_price = $row['product_price'];
            $pro_image = $row['product_image'];

            echo "<div id='single_product'> <h3>$pro_title</h3> ".""
                    . "<img id='pro_img'  src='admin_area/product_images/$pro_image' /> "
                    . "<p><b>$ $pro_price</b></p> "
                    . "<a href='details.php?pro_id=$pro_id' style='float: left;'>Details</a>" 
                    ."<a href='index.php?pro_id=$pro_id'><button style='float: right'>Add To Cart</button></a>"
                    . "</div>";
        }
    }

}

?>
