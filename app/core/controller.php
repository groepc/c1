<?php namespace core;
use core\view,
	core\language;

abstract class Controller {

	/**
	 * view variable to use the view class
	 * @var string
	 */
	public $view;
	public $language;

	/**
	 * on run make an instance of the config class and view class
	 */
	public function __construct(){

		//initialise the views object
		$this->view = new View();

		//initialise the language object
		$this->language = new Language();
	}

	//Display an error page if nothing exists
		protected function _error($error) {
		    require 'app/core/error.php';
		    $this->_controller = new Error($error);
		    $this->_controller->index();
		    die;
		}

	//function to load model on request
		public function loadModel($name){
			$modelpath = strtolower('app/models/'.$name.'.php');
			//try to load and instantiate model
			if(file_exists($modelpath)){

				require_once $modelpath;
				//break name into sections based on a /
				$parts = explode('/',$name);
				//use last part of array
				$modelName = ucwords(end($parts));
				//instantiate object
				//$model = new $modelName();
				$modelClass = '\models\\' . $modelName;
				$model = new $modelClass;
				//return object to controller
				return $model;
			} else {
				$this->_error("Model does not exist: ".$modelpath);
				return false;
			}
		}

}
