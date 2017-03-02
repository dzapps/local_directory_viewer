<?php
	$dir = './';
	$files = scandir($dir);
?>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<div id="list">
	<ul>
<?php
	usort($files, function($a, $b) {
		return filemtime($a) < filemtime($b);
	});
	foreach ($files as $file) { 
		if (substr($file, 0, 1) == '.') continue;
		if ($file == 'index.php') continue;
?>
		<div class="item">
			<a href="<?=$file?>">
				<li>
					<div class="img" style="background-image:url('.dir_images/<?=$file?>.png')">
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
	.img { border-radius:100%; background-repeat: no-repeat; background-size:cover; height:35px; width:35px; background-color:white; display:inline-block;border:solid 1px #dedede;}
	body { background-color:#fefefe; }
	ul { list-style: none; }
	.item { width:25%; height:auto; padding:1.5% 1%; border-bottom:1px solid #dedede; }
	.item:hover { background-color:#efefef; }
	.file_name { color: #333;display:inline-block; vertical-align: top;margin-left:4%;}
	.modified { font-size:.7em; color :#bcbcbc; padding-top:3px; }
	a { text-decoration: none; }
</style>