<section class="wraper_bg-bright" id="search">
	<div>
		<form id="searchForm" action="<?php echo Yii::app()->request->baseUrl; ?>/site/search" method="POST">
			<div>
				<input type="text" name="searchterm" placeholder="Ciudad/pueblo donde quieres buscar la iglesia" style="width:400px;" />
			</div>
			<div>
				<a id="busqueda_avanzada" href="#">Búsqueda avanzada</a>
			</div>
			<div id="busqueda_avanzada_oculto">
				<!-- div>
					<input type="checkbox" name="" style="height:auto;" /> blablablabla
				</div -->
				<div>
					<label>Código postal</label>
					<input type="text" name="zipcode" placeholder="Código postal" style="width:400px;" />
				</div>
			</div>


			<div style="margin-bottom:20px;">
				<input id="idProvince" type="hidden" name="idProvince" value="" />
				<input class="button" type="submit" name="search" value="Buscar" style="float:right;" />
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/HelpSearching" class="form2 button" style="width:200px;padding-top:3px;height:37px;float:right;margin-right:40px;">Ayuda para buscar una iglesia</a>
			</div>
		</form>
	</div>

	<div id="map"></div>
</section>


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/map/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/map/spain-map.js"></script>

<script>
$(document).ready(function(){
	$('a#busqueda_avanzada').click(function(event){
		event.preventDefault();
		$('#busqueda_avanzada_oculto').toggle();
	});

});

new SpainMap({
  id: 'map',
  width: 700,
  height: 500,
  fillColor: "#eeeeee",
  strokeColor: "#cccccc",
  strokeWidth: 0.7,
  selectedColor: "#66bbdd",
  animationDuration: 200,
  onClick: function(province, event) {
  	// We send the province id
  	$('#idProvince').attr('value',province.number);
  	$('#searchForm').submit();

    /*alert("Has seleccionado " + province.name);*/
  }
  //onMouseOver: function(province, event) {
  //  console.log('Navigating through ' + province.name);
  //},
  //onMouseOut: function(province, event) {
  //  console.log('Leaving ' + province.name);
  //}
});
</script>