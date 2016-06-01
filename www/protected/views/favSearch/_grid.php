<?php
$this->widget(
    'yiibooster.widgets.TbJsonGridView',
    array(
        'dataProvider' => $model->search(),
        //'filter' => $model,
        'type' => 'striped bordered condensed',
        'summaryText' => false,
        'cacheTTL' => 10, // cache will be stored 10 seconds (see cacheTTLType)
        'cacheTTLType' => 's', // type can be of seconds, minutes or hours
        'columns' => array(
            'txt_search_1',
            'txt_search_2',
			'fecha',
            array(
                'name' => 'fecha',
                'type' => 'datetime'
            ),
            array(
                'header' => Yii::t('ses', 'Edit'),
                'class' => 'yiibooster.widgets.TbJsonButtonColumn',
                'template' => '{view} {delete}',
                'viewButtonUrl' => null,
                'updateButtonUrl' => null,
                'deleteButtonUrl' => null,
                'buttons' => array(
                    'delete' => array(
                        'click' => 'function(){ alert("borrar");return false;}'
                    )
                )
            ),
        ),
    )
);
?>