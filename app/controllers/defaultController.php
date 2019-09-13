<?php

/**
 * Dragonizado 2019
 */

class defaultController extends Controller{

	private $model = null;
	private $user_model = null;
	private $class_model = null;
	private $citas_model = null;
	private $student_model = null;

	function __construct(){
		$this->model = $this->cargarModelo("default");
		$this->user_model = $this->cargarModelo("users");
		$this->class_model = $this->cargarModelo("class");
		$this->citas_model = $this->cargarModelo("citas");
		$this->student_model = $this->cargarModelo("student");
	}

	public function index(){
		//Descomentar para validar el login del usuario.	
		$this->checklogin();
		
		$this->pageName="Pagina Principal";
		$model = $this->citas_model; 
		$clases = $model->getDatesOfDay();
		// var_dump($clases);
		// exit;
		$this->render("site/index",['clases'=>$clases]);

	}

	public function login(){
		$this->pageName = 'Iniciar sesión';
		$errors = '';
		if(isset($_POST['btn-login'])){
			$model = $this->user_model;
			$model->__set("name",$_POST['name']);
			$model->__set("password",$_POST['password']);
			if($model->login()){
				session_start();
				$_SESSION['user']['id'] = $model->__get('id');
				$_SESSION['user']['name'] = $model->__get('name');
				$_SESSION['user']['email'] = $model->__get('email');
				$this->redirect("default/index");
			}else{
				$this->message('danger','Los datos no concuerdan con nuestros registros.');
				$errors = 'is-invalid';
			}
		}
		$this->render("site/login",["errors"=>$errors],'login');
	}

	public function logout(){
		// session_start();
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}
		session_destroy();
		$this->redirect("default/index");
	}

	protected function checklogin(){
		if (!$this->isLogin()) {
				$this->login();
				exit;
			}	
	}
}
 ?>
