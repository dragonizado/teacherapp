<?php

class citasController extends Controller
{
    protected $students_model = null;

    function __construct(){
        $this->students_model = $this->cargarModelo('student');
    }

    public function register(){
        if(isset($_POST['form_btn_regiter'])){
            
        }
        $students = $this->students_model->findAll();
        return $this->render('citas/register',['students'=> $students]);
    }
}

?>