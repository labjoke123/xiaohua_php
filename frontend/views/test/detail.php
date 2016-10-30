<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>

<h3>Audio Info</h3>
<br>
<form method="post" action="<?php echo Url::toRoute(['text/detail']);?>" >
	id:<input type="text" name="id" value="1"><br>
	<input type="submit" name="submit"><br>
</form>