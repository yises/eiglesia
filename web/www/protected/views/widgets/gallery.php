<h1><span>Galería</span> de iglesias</h1>
<div class="polosochka2"></div>
<h3>Aquí te presentamos una muestra de iglesias que han utilizado eiglesia para <br> tener presencia en la web.</h3>

<?php 
	$types = array();
	$boxes = '';
	foreach($galleries as $gallery){
		if(!isset($types[$gallery['type']])){
			$types[$gallery['type']] = $gallery['type'];
		}
		
		$boxes .= '<div class="o-box" data-opie-filter="'.$gallery['type'].'" > 
					<img class="o-big-image" data-opie-src="'.Yii::app()->request->baseUrl.'/img/our/gallery/'.$gallery['image_big'].'"  src="'.Yii::app()->request->baseUrl.'/img/transparent.png" alt="img"> 
					<div class="o-cover"> 
						<img data-opie-src="'.Yii::app()->request->baseUrl.'/img/our/gallery/'.$gallery['image'].'" class="o-thumb-image" src="'.Yii::app()->request->baseUrl.'/img/transparent.png" alt="img"> 
						<h2>'.$gallery['name'].'</h2> 
						<p> 
							<span class="caps">'.$gallery['description'].'</span>
						</p> 
					</div> 
				</div>';

	}

	$htmlType = '';
	foreach($types as $type){
		$htmlType .= '<li><a href="#gallery-'.$type.'" data-opie-filter="'.$type.'">'.$type.'</a></li> ';
	}

?>
<ul class="galleryNav" id="portfolioNav"> 
	<li><a class="active" href="#gallery-all">Todas</a></li>
	<?php echo $htmlType; ?>
</ul>

<div class="gallery_cont">
	<div class="opie-portfolio"> 
		<div class="o-inner-wrapper"> 
			<?php echo $boxes; ?>
		</div> 
	</div>
    <div class="polosochka"></div>
</div> 