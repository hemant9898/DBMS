<?php

  include('config.php');



        //create the sql statement
        $sql_all="SELECT worker_id FROM worker
              ORDER BY worker_id DESC";
        $result_all = mysqli_query($mysqli,$sql_all);


        //PRINT OUT ALL THE PRODUCT
        while ($row_all = mysqli_fetch_assoc($result_all))
                {
                    echo '<form method="POST">';
                        echo '<u>'.$row_all["worker_id"].'</u>';

                        echo '<br>';

                        echo '<button name="add_to_cart" type="submit">Add to Cart</button>';

                        echo '<hr>';
                    echo '</form>';
                }

                if(isset($_POST["add_to_cart"]))
                {

                    //CREATE A VARIABLE THAT HOLDS THE SELECTED PRODUCTED TO BE ADDED TO CART
                        $selectedProduct = $row_all["worker_id"];
                    echo 'Selected Product  = '.$selectedProduct;
                }



    mysqli_close($mysqli);
?>
