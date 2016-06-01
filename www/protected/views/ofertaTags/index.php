<?php
/* @var $this OfertaTagsController */

$this->breadcrumbs=array(
	'Oferta Tags',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
	<?php //echo $ofertaTags; ?>
</p>

<div class="row">
        <?php $this->widget('application.components.widgets.tag.TagWidget', array(
            'url'=> '/json/' 
        ));
		/**/
        ?>
</div>