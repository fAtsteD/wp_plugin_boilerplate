<?php

/**
 * Admin page for settings
 */

?>
<div class="wrap training_qatestlab_settings">

    <form action="post" id="settings_form" name="settings_form">
        <input type="hidden" name="action" value="<?= $this->getAction() ?>">
        <input type="hidden" name="<?= $this->getSettingsNameParam() ?>" value="<?= $this->getSettingsNameValue() ?>">

        <h1>Settings</h1>

        <table class="form-table">
            <tbody>
            </tbody>
        </table>

        <button id="save_settings">Save</button>

    </form>
</div>