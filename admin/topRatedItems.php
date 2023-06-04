<?php
$top_rated_items_query = "SELECT * FROM pinfo ORDER BY ratings DESC;";
$top_rated_items_query_result = mysqli_query($conn, $top_rated_items_query);
if (mysqli_num_rows($top_rated_items_query_result) > 0) {
    $i = 1;
    while ($data = mysqli_fetch_assoc($top_rated_items_query_result)) {
        if ($i <= 10) {
            $displaySp = (int) $data['sellingprice'];
            $p_mrp = $data['mrp'];
            $off = (($p_mrp - $displaySp) / $p_mrp) * 100;
            $discount = (int) $off;
            echo <<<box
                    <div class="item-box">
                        <div class="discount" >
                            <span>{$discount}% Off </span>
                        </div>
                        <div class="item-imgs">
                                <img src="{$data['img1']}" alt="no image available" >
                                
                        </div>
                        <div class="item-basic-details">
                            <div> <span class="brand-name">{$data['brand']}</span> <span class="p-ratings">{$data['ratings']}<span class="fa fa-star checked"></span></span></div>
                            <span class=" product-name">{$data['productname']}</span>
                            <span class="volume">{$data['volume']}</span>
                            <span class="prices" >Rs.<span class="sp"> {$displaySp}   </span ><s class="mrp" >{$data['mrp']}</s></span>
                        </div>
                        <div class="item-control-btns">
                            <form action="deletionpage.php" method="POST"  >
                            <input type="hidden" value="{$data['id']}" name = "idfordeletion" >
                            <button type="submit" value="delete" name="delete" class="del-btn">Delete</button>
                            </form>
                            <form action="updatePage.php" method="POST"  >
                            <input type="hidden" value="{$data['id']}" name = "idtoedit" >
                            <button type="submit" value="edit" name="edit" class="edit-btn">Edit</button>
                            </form>
                        </div>
                    </div>
box;
            $i++;
        } else {
            break;
        }

    }
}
?>