<?php


add_action('wp_ajax_vayu_blocks_option_panel', 'vayu_blocks_option_panel_callback');

function vayu_blocks_option_panel_callback() {

    if (current_user_can('manage_options') ) {
    check_ajax_referer('vayu_blocks_nonce', 'security');
    $inputData = isset($_POST['inputData']) ? json_decode(stripslashes($_POST['inputData']), true) : array();


    $stauts = (new VAYU_BLOCKS_OPTION_PANEL())->update_option($inputData);
    // Return success response
    wp_send_json_success(array(
        'success' => true,
        'message' => $inputData['type'],
        'inputData' => $inputData,
    ));
}

    wp_die();
}