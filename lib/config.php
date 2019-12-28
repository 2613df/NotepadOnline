<?php ($visit) ? ("") : (header('location: /'));?>
<?php
/*这是NPO的配置文件
**------------------
**不建议更改*/

/*缓存文件夹
**定义时请确保该文件夹有权访问修改*/
$tmpFolder = "_tmp";

/*套用主题
**套用主题时请确保主题存在*/
$templateName = "default";
$templateFolder = "./content/templates/".$templateName."/";
?>