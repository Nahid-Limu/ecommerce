<?php include ("function/functions.php"); ?>
<?php $functions = new functions();?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Online market</title>
            
     
        
        <link rel="stylesheet" href="styles/style.css" media="all"/>
    </head>
    <body>
        <!-- start main -->
        <div class="main_wrapper">
            
            <!-- start heder -->
            <div class="header_wrapper">
                <img  id="logo" src="images/logo b.gif" />
                <img  id="banner" src="images/bnr.jpg" /> 
                
            </div>
            <!-- end heder -->
            
            <!-- start manubar -->
            <div class="manubar">
                <ul id="manu">
                    <li><a href="#">Home</li>
                    <li><a href="#">All Product</li>
                    <li><a href="#">My Account</li>
                    <li><a href="#">Sing Up</li>
                    <li><a href="#">Shopping Cart</li>
                    <li><a href="#">Contact Us</li>
                    
                </ul>
                <div id="form">
                    <form method="get" action="result.php" enctype="multipart/form-data" >
                        <input type="text" name="user_query" placeholder="Search a Prouduct" />
                        <input type="submit" name="search" value="search" />
                        
                    </form>
                </div>
            </div>
            <!-- end manubar -->
            
            <!-- start content -->
            <div class="content_wrapper">
                
                <div id="sidebar">
                    
                    <div id="sidebar_title">Categories</div>
                    
                    <ul id="cats">
                        
                       <?php $functions->getCats(); ?>
                        
                       
                    </ul>
                    
                    <div id="sidebar_title">Brand</div>
                    
                    <ul id="cats">
                        
                        <?php $functions->getBrands(); ?>
                        
                       
                    </ul>
                
                </div>
                
                <div id="content_area">
                
                    <div id="shopping_cart">
                        <span style="float: right; font-size: 20px; padding: 5px; line-height: 40px;">
                            WellCome Guest!<b style="color: yellow"> shopping Cart</b> Total Items: Total Price:  <a href="cart.php" style="color:yellow">Go To Cart</a>
                                
                        </span>
                    </div>
                    
                    <div id="products_box">
                        
                        <?php $functions->getpro(); ?>
                        
                    </div>
                    
                </div>
                
                
            
            </div>
            <!-- end content -->
            
            
            <!-- start footer -->
            <div id="footer">
            
                <h2 style="text-align: center; padding-top: 30px;">&copy;2016 by Nahid Hasan</h2>
                <img id="f_tem" src="images/f_tem.gif"/>
                
                
            </div>
            <!-- end footer -->
        </div>
        <!-- end main -->
    </body>
</html>
