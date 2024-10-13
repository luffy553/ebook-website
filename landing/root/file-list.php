<?php
$dir = "uploads/";
$files = array_diff(scandir($dir), array('..', '.'));

foreach ($files as $file) {
    echo "<li>
            $file
            <form action='delete.php' method='post' style='display:inline;'>
                <input type='hidden' name='filename' value='$file'>
                <button type='submit'>Delete</button>
            </form>
          </li>";
}
?>
