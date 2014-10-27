<?php
/*************
* Main Sidebar
**************/
?>
<div id="carzine_main_sidebar">
    <?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
    <div class="pre-widget">
    <h3><?php _e('Widgetized Sidebar', 'carzine'); ?></h3>
    <p><?php _e('This panel is active and ready for you to add some widgets via the WP Admin', 'carzine'); ?></p>
    </div>
    <?php endif; ?>
</div>