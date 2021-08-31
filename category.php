<html>
<head>
<style type="text/css">
        .active{
        list-style-type: circle;
        font-weight: bolder;
    }
.price_value input {
    max-width: 60px !important;
}
    .custom_img{
        object-fit:cover;
        width: 200px;
        height: 200px;
    }

</style>
<?php 

include 'head_link.php'; 

include "connection.php";

if (isset($_GET['cat_id'])) 
    $pro = "SELECT *  from product_master  WHERE cat_id={$_GET['cat_id']} GROUP by product_id";

else

    $pro = "SELECT * from product_master GROUP by product_id limit 9";        

$res= mysqli_query($con,$pro);

?>
</head>

<body>
    <?php include 'header.php'; ?>
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                <li data-id='0' class="active cat" ><a class=""></a></li>
                                    <?php
                                    $res3= mysqli_query($con,"SELECT cat.*, COUNT(cat.cat_id) nop from category cat , product_master pm WHERE cat.cat_id=pm.cat_id GROUP by cat_id");
                                    while ($row2=mysqli_fetch_assoc($res3)) {
                                         echo "<li  class='cat' data-id='{$row2['cat_id']}'> <a >{$row2['cat_name']}</a> <span>({$row2['nop']})</span></li>"; } ?>
                                </ul>
                            </div>
                        </aside>


                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Color Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
<li data-id='0'  class='color active' style="line-height: 2.5;"></li>
                                    <?php
$res2= mysqli_query($con,"select * from product_color limit 5");
while ($ro = mysqli_fetch_assoc($res2))
echo "<li data-id='{$ro['color_id']}'  class='color'>    <a>{$ro['color_name']}</a>    </li>";
                                    ?>

                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Size Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
<li data-id='0'  class='size active' style="line-height: 2.5;"></li>
<?php
    $res2= mysqli_query($con,"select * from product_size limit 5");
    while ($ro = mysqli_fetch_assoc($res2))
        echo "<li data-id='{$ro['size_id']}'  class='size'><a class=''>{$ro['product_size']}</a></li>";
?>
                                </ul>
                            </div>
                        </aside>


                        <aside class="left_widgets p_filter_widgets price_rangs_aside">
                            <div class="l_w_title">
                                <h3>Price Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <input type="text" class="js-range-slider" value="" />
                                    <div class="d-flex">
                                        <div class="price_value d-flex justify-content-center">
                                            <input type="text" class="js-input-from min_am" id="amount" readonly />
                                            <span>-</span>
                                            <input type="text" class="js-input-to max_am" id="amount" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="l_w_title text-center">
                                <button id="filter" class="btn btn-info btn-sm">Filter</button>
                            </div>
                            
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p><span> <?php echo mysqli_num_rows($res); ?> </span> Product Found</p>
                                </div>
<!-- 
                                <div class="single_product_menu d-flex">
                                    <h5>short by : </h5>
                                    <select>
                                        <option data-display="Select">name</option>
                                        <option value="1">price</option>
                                        <option value="2">product</option>
                                    </select>
                                </div>
 -->
<!--
                                 <div class="single_product_menu d-flex">
                                    <h5>show :</h5>
                                    <div class="top_pageniation">
                                        <ul>
                                            <li>1</li>
                                            <li>2</li>
                                            <li>3</li>
                                        </ul>
                                    </div>
                                </div> 
-->


                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"><i
                                                    class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row align-items-center latest_product_inner">
                        
                        <?php
                            while ($row=mysqli_fetch_assoc($res)) {
                        ?>
                    
                        <div class="col-lg-4 col-sm-6 productList" <?php 
                        echo "data-price='{$row['selling_price']}' data-color='{$row['color_id']}' data-size='{$row['size_id']}'  data-cat='{$row['cat_id']}'"; 
                        ?> >
                            <div class="single_product_item">
                                <a href="single-product.php?product_id=<?php  echo $row['product_id']; ?>">
                                    <img style="" src="./admin/image/product/<?php echo $row['product_img']; ?>" alt="">
                                </a>
                                <div class="single_product_text">
                                    <h4><?php echo $row['product_name']; ?></h4>
                                    <h3>  <small><del><?php echo $row['selling_price']; ?></del></small> -<?php echo $row['offer_price']; ?> Rs.</h3>
                                    <a class="add_cart">Furniture You Desire<i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>

                        <?php } ?>                        
 
                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <i class="ti-angle-double-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <i class="ti-angle-double-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>                        
                     
                    </div>
                    <div class="row align-items-center justify-content-between">
                        <div class="col text-center">
                            <button class="btn btn-secondary btn-lg load_more">Load More </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <section class="product_list best_seller">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Selling <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
<?php
    include("connection.php");
$pro = mysqli_query($con," SELECT p.* , i.image_name from product_master p , product_image i WHERE p.product_id=i.product_id GROUP by i.product_id");
while ($p = mysqli_fetch_assoc($pro)) {    
?>
<a href="single-product.php?product_id=<?php  echo $p['product_id']; ?>" class="single_product_item">
    <img class="custom_img" src="./admin/image/product/<?php echo $p['image_name']; ?>" alt="">
    <div class="single_product_text">
        <h4><?php echo $p['product_name']; ?></h4>
        <h3>
<small><del><?php echo $p['offer_price']; ?></del></small> -<?php echo $p['selling_price']; ?> Rs.
        </h3>
    </div>
</a>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <?php include 'foot_link.php'; ?>
</body>


<script type="text/javascript">
    $(document).ready(function(){
        var min_price=0;
        var max_price=100000;
        var category = 0;
        var color = 0;
        var size = 0;

        function filter() {
            $(".productList").filter(function(){
                var widget = $(this);
                if (parseInt(widget.data('price')) >= parseInt(min_price) && parseInt(widget.data('price')) <= parseInt(max_price)  && ( parseInt(category)==0 || parseInt(category)==parseInt(widget.data("cat")) ) && ( parseInt(color)==0 || parseInt(color)==parseInt(widget.data("color")) ) && ( parseInt(size)==0 || parseInt(size)==parseInt(widget.data("size")) ) ) 
                    widget.show();
                else
                    widget.hide();
            });
        }

        $("#filter").click(function(){
            // var am = $("#amount").val();
            min_price=parseInt($(".min_am").val());
            max_price=parseInt($(".max_am").val());
            // min_price=parseInt(am.split("-")[0]);
            // max_price=parseInt(am.split("-")[1]);
            filter();
        });

        $(".cat").click(function () {
            category = $(this).data("id");
            $(".cat").removeClass("active");
            $(this).addClass("active");
            filter();
        });

        $(".color").click(function () {
            color = $(this).data("id");
            $(".color").removeClass("active");
            $(this).addClass("active");
            filter();
        });

        $(".size").click(function () {
            size = $(this).data("id");
            $(".size").removeClass("active");
            $(this).addClass("active");

            filter();
        });

    }); 
</script>


</html>