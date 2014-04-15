<!DOCTYPE html>
  <?php
    //set default name
    $id = 'index';
    //specify disallow paths
    $disallow_paths = array('header', 'footer');
    if (!empty($_GET['id'])){
      $tmp_id = basename($_GET['id']);
    //if it's not a diallowed path, and if the file exists, make $id
      if (!in_array($tmp_id, $disallow_paths) && file_exists("templates/{$tmp_id}.htm"))
        $id = $tmp_id;
    }
    echo "<html>
      <head>
        <link type='text/css' rel='stylesheet' href='stylesheet.css' />
        <title>Title - " . $id . "</title>
      </head>
      <body>";
        include("templates/header.htm");
        include("templates/$id.htm");
        include("templates/footer.htm");
      echo "</body>
        </html>";