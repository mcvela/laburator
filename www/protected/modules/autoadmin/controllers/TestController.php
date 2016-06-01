<?php
class TestController extends Controller
{
	public function actionContinents()
	{
		$this->pageTitle = 'Continents';

		$this->module->tableName('continents');
		$this->module->setPK('id');
		$this->module->fieldsConf(array(
				array('name_en', 'string', 'Continent', array('show')),
			));
		$this->module->setSubHref('countries');	//The link to sub-level interface.
		$this->module->sortDefault(array('name_en'));
		$this->module->process();
	}

	public function actionCountries()
	{
		$this->pageTitle = 'Countries';

		$this->module->tableName('countries');
		$this->module->setPK('id');
		$fieldsConf = array(
				array('flag_ico', 'image', 'Flag <small>(icon)</small>', array('show', 'directoryPath'=>'/i/flags')),
				array('flag', 'image', 'Flag', array('directoryPath'=>'/i/flags/120', 'description'=>'120x80 px')),
				array('name_en', 'string', 'Country name', array('show')),
				array('continent_id', 'foreign', 'Continent', array('bindBy'=>'id', 'foreign'=>array(
						'table'		=> 'continents',
						'pk'		=> 'id',
						'select'	=> array('name_en'),
						'order'		=> 'name_en',
				))),
		);
		if(!isset($_GET['bk']))	//indirect but reliable indicator of 'sub-interface' mode
		{
			/**
			 * If you want to access countries without binding by continent too,
			 * use framework's essence of the AutoAdmin: 
		     */
			$continentConf = AutoAdmin::fByNameOpts('continent_id', $fieldsConf);
			unset($continentConf['bindBy']);
		}
		else
		{
			/**
			 * Otherwise you may use the built-in mechanism for generating of 
			 *  breadcrumbs:
			 */
			$breadcrumbs = new AABreadcrumbs($this);
			$breadcrumbs->query->select('name_en')->from('continents');	//The parent table name and its title field
			$breadcrumbs->addLevel(0, null);
			$breadcrumbs->addLevel(-1, 'continents', 'Continents');
		}
		$this->module->fieldsConf($fieldsConf);
		$this->module->sortDefault(array('name_en'));
		$this->module->process();
	}
}