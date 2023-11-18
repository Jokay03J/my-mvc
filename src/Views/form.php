<?= var_dump($post) ?>
<?= var_dump($files) ?>
<form action="/test" method="POST" enctype="multipart/form-data">
    <input type="text" name="my-test" id="my-test">
    <input type="file" name="my-file" id="my-file">
    <input type="submit" value="Envoyer" name="submit">
</form>