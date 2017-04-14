<?php
	$dir = './';
	$files = scandir($dir);
?>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="icon" type="image/png" href=".dir_images/sublime.png">
<div id="list">
	<ul>
<?php
	usort($files, function($a, $b) {
		return filemtime($a) < filemtime($b);
	});


	function getColor() {
		$colors_500 = ['F44336', 'e91e63', '9c27b0', '673ab7', '3f51b5', '2196f3', '03a9f4', '00bcd4', '009688', '4caf50', '8bc34a', 'ffeb3b', 'ffc107', 'ff9800', 'ff5722', '607d8b', '9e9e9e'];
		return $colors_500[rand(0, count($colors_500) - 1)];
	}

	foreach ($files as $file) { 
		if (substr($file, 0, 1) == '.') continue;
		if ($file == 'index.php') continue;
?>
		<div class="item">
			<a href="<?=$file?>" target="_blank">
				<li>
					<div class="img" style="font-weight:bold;color:#<?=getColor()?>;background-image:url('.dir_images/<?=$file?>.png')">
					<?= (!file_exists('.dir_images/'.$file.'.png')) ? ucfirst(substr($file, 0, 1)) : '' ?>
					</div>
					<div class="file_name">
						<?=ucfirst($file)?>
						<div class="modified">
							<?=date ("F d Y", filemtime($file))?>
						</div>
					</div>
				</li>
			</a>
		</div>
<?php } ?>
	</ul>
</div>

<style>
	* {font-family: 'Roboto', sans-serif;}
	.img { border-radius:100%; background-repeat: no-repeat; background-size:cover; height:35px; width:35px; background-color:white; display:inline-block;border:solid 1px #dedede; font-size:1.3em;text-align: center;line-height:37.5px;}
	body { background-color:#fefefe; }
	ul { list-style: none; }
	.item { width:25%; height:auto; padding:1.5% 1%; border-bottom:1px solid #dedede; }
	.item:hover { background-color:#efefef; }
	.file_name { color: #333;display:inline-block; vertical-align: top;margin-left:4%;}
	.modified { font-size:.7em; color :#bcbcbc; padding-top:3px; }
	a { text-decoration: none; }
</style>