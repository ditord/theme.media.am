<div class="outlets-filter">
    <h2>Media Outlets</h2>
    <?php
    $menu = get_terms("media_outlet_style");
// dump(    $menu)
    ?>
    <div class="filter">
    <div>
            <label data-url="/media_block/">
                <input type="radio" name="radio-filter">
                -Any-
            </label>
        </div>
        <?php foreach ($menu as $item) : ?>
        <div>
            <label data-url="<?php echo $item->slug ?>">
                <input type="radio" name="radio-filter">
                <?php echo $item->name ?>
            </label>
        </div>
        <?php endforeach ?>
    </div>


    <?php $terms =  get_terms("regions"); ?>

    <div class="region-filter">
        <p>Region</p>
        <select>
            <option>-Any-</option>
            <?php foreach ($terms as $country) :
                echo '<option data-country="' . $country->name  . '">';
                echo $country->name;
                echo '</option>';
            endforeach ?>
        </select>
    </div>
    <div style="clear:both;"></div>
</div>