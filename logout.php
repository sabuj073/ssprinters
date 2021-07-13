<?php
session_start();
session_destroy();
setcookie("paper_admin_id",'');
setcookie("paper_admin_name",'');
setcookie("paper_admin_type",'');
 ?>
<script type="text/javascript">
	window.location.href="home";
</script>