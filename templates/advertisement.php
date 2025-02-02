<div>
    <h2>Advertisement</h2>
    <form method="post" action="options.php">
        <table>
            <tr valign="top">
                <td><textarea placeholder="HTML" type="text" id="myplugin_option_name" rows="4" cols="100" name="myplugin_option_name" value="<?php echo get_option('myplugin_option_name'); ?>"></textarea></td>
            </tr>
            <tr valign="top">
                <td><textarea placeholder="JS" type="text" id="myplugin_option_name" rows="4" cols="100" name="myplugin_option_name" value="<?php echo get_option('myplugin_option_name'); ?>"></textarea></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>