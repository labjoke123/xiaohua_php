<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>

<h3>Audio Info</h3>
<br>
<form method="post" action="<?php echo Url::toRoute(['audio/upload']);?>" enctype="multipart/form-data">
	Name:<input type="text" name="audio_name" value="test"><br>
	File:<input type="file" name="file_audio"><br>
	<input type="submit" name="submit"><br>
	User:<input type="text" name="user_id" value="1"><br>
	Text:<input type="text" name="text_id" value="1"><br>
	Type:<input type="text" name="audio_type" value="amr"><br>
	Duration:<input type="text" name="audio_duration" value="15"><br>
	Intro:<input type="text" name="audio_intro" value="This is a Joke"><br>
</form>