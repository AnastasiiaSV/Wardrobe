<div class="page">

    <div id = "photo" class="search_criteria_box" >

        <div class="search_criteria_box_part">
            <a href="photo"><h2><?php print photo; ?></h2></a>
            <br>
            <p><?php print sort; ?></p>
        </div>
        <div class="search_criteria_box_part">
            <img src="images/icons/price_icon.png" alt=<?php print price; ?>>
            <img src="images/icons/arrow_up.png" alt=<?php print lower_first; ?>>
            <img src="images/icons/arrow_down.png" alt=<?php print biggest_first; ?>>
        </div>
        <div class="search_criteria_box_part">
            <img src="images/icons/calendar.png" alt=<?php print date; ?>>
            <img src="images/icons/arrow_up.png" alt=<?php print lower_first; ?>>
            <img src="images/icons/arrow_down.png" alt=<?php print biggest_first; ?>>
        </div>

    </div>

    <div class="top_box">
        <h2><?php print top; ?></h2>
    </div>


    <div class="item_container_primary">

        <?php if($itemsArr): ?>
            <?php foreach($itemsArr as $item): ?>
                <div class="item_container">

                    <form id = "open_item_<?= $item['id'];?>" action="item" method="post">
                        <input type="hidden" name="id" value="<?= $item['id'];?>">
                    </form>

                    <a href="item" onclick="document.getElementById('open_item_<?= $item['id'];?>').submit(); return false;">
                        <img src = <?=$item['path'];?> alt = <?=$item['name'];?>>

                        <div class="item_info">
                           <p> <img src="images/icons/price_icon.png" alt=<?php print price; ?>> <?=$item['price'];?> $ </p>
                           <p> <img src="images/icons/downloads_icon.png" alt=<?php print downloads_count; ?>> <?=$item['downloads_count'];?> </p>
                        </div>

                    </a>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h2><?php print no_items;?></h2>
        <?php endif; ?>

    </div>


    <div class="item_container_slider">

        <?php if($sliderItemsArr): ?>
            <?php foreach($sliderItemsArr as $item): ?>
                <div class="item_slider">
                    <form id = "open_item_<?= $item['id'];?>" action="item" method="post">
                        <input type="hidden" name="id" value="<?= $item['id'];?>">
                    </form>

                    <a href="item" onclick="document.getElementById('open_item_<?= $item['id'];?>').submit(); return false;">
                        <img src = <?=$item['path'];?> alt = <?=$item['name'];?>>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h2><?php print no_items;?></h2>
        <?php endif; ?>

    </div>


</div>