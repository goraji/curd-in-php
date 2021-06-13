<?php

session_start();
?>
<script>
    alert('logout');
</script>
<?php
session_destroy();
echo 'erased';

header('location:index.php')
?>