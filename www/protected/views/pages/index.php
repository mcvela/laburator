<?php
/* @var $this PagesController */
 /*
// It is a list of AppStructureComponent
$applicationStructure = Yii::app()->sitemap->getApplicationStructure();

// Now lets watch what we got - it is always better to see it once:
function displayStructure($structure)
{
   foreach ($structure as $structureNode)
   {
      echo '<ul>';
         echo "<li>Name: {$structureNode->getName()}</li>";
         echo "<li>Description: {$structureNode->getDescription()}</li>";
         echo "<li>Route: {$structureNode->getRoute()}</li>";
         echo '<li>Class: '.get_class($structureNode->getInstance()).'</li>';
         echo '<li>Children: ';
         displayStructure($structureNode->getChildren());
         echo '</li>';
      echo '</ul>';
   }
}
displayStructure($applicationStructure);
 */ 
$structure = Yii::app()->sitemap->getApplicationStructure();
foreach ($structure as $structureNode)
   {
      echo '<ul>';
         echo "<li>Name: {$structureNode->getName()}</li>";
         echo "<li>Description: {$structureNode->getDescription()}</li>";
         echo "<li>Route: {$structureNode->getRoute()}</li>";
         echo '<li>Class: '.get_class($structureNode->getInstance()).'</li>';
         if ($structureNode->getInstance() instanceof PagesController)
         {
            echo '<li>Pages: ';
            $this->widget('zii.widgets.grid.CGridView', array('dataProvider'=>$structureNode->getInstance()->getPagesForSitemap()));
            echo '</li>';
         } else {
            echo '<li>Children: ';
            displayStructure($structureNode->getChildren());
            echo '</li>';
         }
      echo '</ul>';
   }
 
   ?>