<?php include_once('header.php'); ?>

    <h1>寶石預訂</h1>
    <h2><?php echo date('n');?>月優惠</h2>

    <div class="flex-grid">
    <?php
    //顯示貨品

    // <-- 這邊是用正規SQL來提取資料 -->
    $gemQ = mysqli_query($dbConnection,"SELECT * FROM `gem`");

    while ($gem = mysqli_fetch_assoc($gemQ)){
        echo '<div class="col">
        <img src="/images/'.$gem['image'].'" />
        <p>
        名稱：'.$gem['name'].'<br>
        價格：$'.$gem['price'].'<br>
        <a href="/order.php?gem_id='.$gem['gem_id'].'" class="buyBtn">預訂'.$gem['name'].'</a><br></div>';
    }


    // <-- 以下這邊是用CSV文字檔案存擋後，在用CSV提取資料 -->

    // foreach($gems as $key => $gem)
    // {
    //     echo '<div class="col">
    //     <img src="/images/'.$gem['image'].'" />
    //     <p>
    //     名稱：'.$gem['name'].'<br>
    //     價格：$'.$gem['price'].'<br>
    //     <a href="/order.php?gem_id='.$gem['gem_id'].'" class="buyBtn">預訂'.$gem['name'].'</a><br></div>';
    // }
    ?>
    </div>

<?php include_once('footer.php'); ?>