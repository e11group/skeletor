<?php
$app->get('/logout', function () use ($app) {


s::destroy();

?>

<script>
window.location = '<?php echo WWW . 'login'; ?>'
</script>

<?php

});

?>
