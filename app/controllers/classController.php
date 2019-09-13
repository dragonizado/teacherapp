<?php 
	/**
	 * Dragonizado 2019
	 */
	class classController extends Controller
	{
		protected $students_model = null;
		protected $class_model = null;
		function __construct()
		{
			if (!$this->isLogin()) {
				$this->redirect('default/login');
				exit;
			}	
			$this->students_model = $this->cargarModelo('student');
			$this->class_model = $this->cargarModelo('class');
		}

		public function index(){

		}

		public function register(){
			if(isset($_POST['form_btn_register'])){
				$model = $this->class_model;
				$model->__SET('description',$_POST['description']);
				$model->__SET('student_id',$_POST['student']);
				$model->__SET('user_id',$_SESSION['user']['id']);
				if($model->save()){
					$this->message('success', 'La clase se ha registrado con exito.');
				}else{
					$this->message('danger', 'Error al registrar la clase.');
				}
				$this->redirect('class/register');
			}
			$students = $this->students_model->findAll();
			return $this->render('clases/register',['students'=>$students]);
		}
	}
 ?>