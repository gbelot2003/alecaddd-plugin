<?php
/**
 * @package AlecadddPlugin
 */

 namespace Inc\Api\Callbacks;

 use Inc\Base\BaseController;
 use Inc\Api\SettingsApi;

 class AdminCallbacks extends BaseController {

    /**
     * Callback for a Page
     *
     * @return void
     */
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    /**
     * Callback for a Group Input
     *
     * @param [type] $input
     * @return void
     */
    public function alecadOptionsGroup($input)
    {
        return $input;
    }

    /**
     * Callback for a Section
     *
     * @return void
     */
    public function alecadAdminSection()
    {
        echo 'Check this section';
    }

    /**
     * Callback for a Field
     *
     * @return void
     */
    public function alecadTextExample()
    {
        $value = esc_attr( get_option('text_example') );
        echo '<input type="text" class="" name="text_example" value=" ' . $value . ' " placeholder="Text example"/>';
    }

 }