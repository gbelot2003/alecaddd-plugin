<div class="wrap">
    <h1>Alecaddd plugins</h1>
    <?php settings_errors(); ?>

    <form method="POST" action="options.php">
        <?php 
            settings_fields( 'alecaddd_option_group' );
            do_settings_sections( 'alecaddd_plugin' );
            submit_button();
        
        ?>
    </form>
</div>