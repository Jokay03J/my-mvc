<?php
if (isset($message)) {
    echo "You can pass data too<br/>";
    echo $message;
    echo "<br/>";
}
?>
<form action="/form" method="POST" enctype="multipart/form-data">
    <input type="text" name="my-test" id="my-test">
    <input type="file" name="my-file" id="my-file">
    <input type="submit" value="Envoyer" name="submit">
</form>