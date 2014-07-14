<section class="wraper_bg-bright" id="search">
	<div>
		<form action="<?php echo Yii::app()->request->baseUrl; ?>/site/search" method="POST">
			<div>
				<input type="text" name="searchterm" placeholder="Ciudad/pueblo donde quieres buscar la iglesia" style="width:400px;" />
			</div>
			<div>
				<a id="busqueda_avanzada" href="#">Búsqueda avanzada</a>
			</div>
			<div id="busqueda_avanzada_oculto" style="display:none;">
				<div>
					<input type="checkbox" name="" style="height:auto;" /> blablablabla
				</div>
			</div>


			<div style="margin-bottom:20px;">
				<input class="button" type="submit" name="search" value="Buscar" style="float:right;" />
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/HelpSearching" class="form2 button" style="width:200px;padding-top:3px;height:37px;float:right;margin-right:40px;">Ayuda para buscar una iglesia</a>
			</div>
		</form>
	</div>
</section>

<script>
$(document).ready(function(){
	$('a#busqueda_avanzada').click(function(event){
		event.preventDefault();
		$('#busqueda_avanzada_oculto').toggle();
	});

});


</script>