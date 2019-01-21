<?php
$visit=true;
include_once "./lib/config.php";
$path = $FOLDER."/".substr($name,6);
$file_head = file_get_contents($path,FALSE,NULL,0,47);
$readOnly=true;
include "./content/templates/default/header.php";
?>
<div class="txa">
<?php	if (substr($file_head,0,15) == $pw_tag ){
			echo '<pre class="form-control content">'.htmlspecialchars(file_get_contents($path,FALSE,NULL,47))."</pre>";
		}else{
			echo '<pre class="form-control content">'.htmlspecialchars(file_get_contents($path))."</pre>";
		}
?>
</div>



<?php ($readOnly) ? (include "./content/templates/default/footer_nobtn.php"):(include "./content/templates/default/footer.php");?>