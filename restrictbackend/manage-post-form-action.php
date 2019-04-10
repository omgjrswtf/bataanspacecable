<?php 

require_once '../core/init.php';
    if (!$_SESSION) {
        header('Location: index.php');
    }
    $admin_id = $_SESSION['admin_id'];

    $admin = $admincon->adminData($admin_id);

    $municipality = $_POST['municipality'];
    $brgy = $_POST['barangay'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];


    echo "$municipality $brgy $lat $long";

    if (isset($_POST['id'])) {
    $post = $postcon->postId($_POST['id']);
    $msg = 2;
    }

    if (!$post) {
    $post = New Post;
    $msg = 1;
    }

    $post->parentmuni = $municipality;
    $post->parentbrgy = $brgy;
    $post->lat        = $lat;
    $post->long       = $long;
    $post->active     = 1;
    // print_r($post);
    $postcon->save($post);

    $header = "Location: manage-post-parent-brgy.php?municipality=$municipality&brgy=$brgy&msg=$msg";
    header($header);



 ?>