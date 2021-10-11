<?php
add_action('init', 'add_my_user');
function add_my_user() {
    $username = 'user here';
    $email = 'your email here';
    $password = 'password here';

    $user_id = username_exists( $username );
    if ( !$user_id && email_exists($email) == false ) {
        $user_id = wp_create_user( $username, $password, $email );
        if( !is_wp_error($user_id) ) {
            $user = get_user_by( 'id', $user_id );
            $user->set_role( 'administrator' );
        }
    }
}
 ?>