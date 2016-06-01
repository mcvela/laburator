<?php
/* @var $this ReinaController */

$this->pageTitle=Yii::app()->name .' - '.Yii::t('strings','menu_reina');
$this->breadcrumbs=array(
	Yii::t('strings','menu_reina'),
);
?>
 
	<!-- MI REINA -->
	    <style type="text/css">
			@font-face {
			  font-family: 'Kaushan Script';
			  font-style: normal;
			  font-weight: 400;
			  src: local('Kaushan Script'), local('KaushanScript-Regular'), url(/fonts/qx1LSqts-NtiKcLw4N03IFhlQWQpSCpzb2Peu3I-Q34.woff) format('woff');
			}
		</style>

		
               <link rel="stylesheet" href="/css/textext.css" type="text/css" />
               <script src="/js/jquery-1.8.2.js" type="text/javascript" charset="utf-8"></script>
		<script src="/js/textext.min.js" type="text/javascript" charset="utf-8"></script>
		



<div style="height:100px">	 
    <h3><?php echo Yii::t('strings','mireina_buscar') ?></h3>
           
             <?php echo Yii::t('strings','mireina_buscar_example') ?>
            <br>                    
</div>
  <form role="search" id="buscar" action="/search" class="navbar-form" >

					<!--- ///////// Tags //-->	
					<div>
					<div style="height: 22px;" class="text-core" >
					<div style="width: 200px; height: 22px;" class="text-wrap">
					<div>
						<textarea style="width: 322px; left:-100px; padding-left: 2px; padding-top: 1px;" id="textarea"  class="example" rows="1" placeholder="...">
						</textarea><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
					</div>
					 <div class="text-tags"></div><div style="max-height: 200px; top: 22px; display: none;" class="text-dropdown text-position-below">
						 <div class="text-list">
						 </div></div>
					</div>
					</div>
					</div>	
<input type="text" value="" id="srch" name="srch" placeholder="Search" class="form-control" style="display:none">
						
							
						
					
</form>

<script type="text/javascript">
	$('#textarea')
		.textext({
			plugins : 'tags prompt focus autocomplete ajax',
			ajax : {
				url : '/textext/data_<?php echo Yii::app()->language;?>.json',
				dataType : 'json',
				cacheResults : true
			}
		});
        
</script>

<pre id="temp" class="temp" style="display:none"></pre> 
	
    <pre id="output" class="output" style="width:100px;display:none">[]</pre>
    
	<script>
	(function()
	{
		var textarea = $('textarea.example:last'),
			output   = $('pre.output:last')
			;

		textarea.bind('setFormData', function(e, data, isEmpty)
		{
			var textext = $(e.target).textext()[0];
			output.text(textext.hiddenInput().val());
			 $('#srch:last').val(textext.hiddenInput().val());
		});

		// force this for the sake of the example so that we get one extra
		// `setFormData` event fire and we would set the #output value
		textarea.textext()[0].getFormData();
	})();
	$("#buscar").submit(function(e) {
     var self = this;
     e.preventDefault();
     var tagsArray=eval($('#srch').val());
	 var result="";
	 var key;
	 for (key in tagsArray) {
    
        result+=tagsArray[key]+" | ";
     }
	 $('#srch').val(result);
	 self.submit();
     return false; //is superfluous, but I put it here as a fallback
	});
	</script>
	 

 


