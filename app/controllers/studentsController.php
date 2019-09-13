<?php 
/**
 * Dragonizado 2019
 */
class studentsController extends Controller
{
	protected $students_model = null;
	function __construct()
	{
		if (!$this->isLogin()) {
			$this->message('danger','No autorizado.');
			$this->redirect('default/login');
			
		}	
		$this->students_model = $this->cargarModelo('student');
	}

	public function index(){

	} 

	public function register(){
		if(isset($_POST['form_btn_register'])){
			$model = $this->students_model;
			$model->__SET('name',$_POST['name']);
			$model->__SET('cc',$_POST['cc']);
			$model->__SET('phone',$_POST['phone']);
			// validar si el estudiante ya se encuentra registrado en el sistema
			if($model->validateDbExits()){
				$this->message('danger', 'El estudiante ya se encuentra registrado.');
				$this->redirect('students/register');
				exit();
			}

			if ($model->save()) {
				$this->message('success', 'El estudiante se ha registrado con exito.');
			} else {
				$this->message('danger', 'Error al registrar el estudiante.');
			}
			$this->redirect('students/register');
		}
		return $this->render('students/register');
	} 
}
 ?>