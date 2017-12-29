<?php
namespace Rocharor\Site\Controllers;

use Rocharor\Sistema\Controller;
use Rocharor\Site\Models\HomeModel;

class Home extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new HomeModel;
    }

    public function indexAction()
    {
        $dados = $this->model->buscar('home');

        $texto[1] = "
            <h5>SHIRLEY DANTAS</h5>
            <p class='ins4'>
                Nossa estilista sempre antenada, sempre teve a vontade de criar pe&ccedil;as &uacute;nicas, conceito, com bom gosto e estilo, para os mais variados gostos.
				Despertou o interesse pela moda quando ainda adolescente, ao ver a m&atilde;e costurar, bordar e fazer artesanato, para sustento da fam&iacute;lia.
            </p>";

        $texto[2] = "
			A cada dia buscou se aperfei&ccedil;oar, sempre com uma vis&atilde;o diferenciada sobre tudo o que faz, buscando por originalidade sem seguir tend&ecirc;ncias, ao inv&eacute;s de m&aacute;quinas, computadores e diversas outras modernidades, optou por criar tudo a m&atilde;o, sempre com muita personalidade.
        		";

        $texto[3] = "
            <h6>
			Desenvolve cada pe&ccedil;a como se fosse &uacute;nica, um trabalho realizado com muita dedica&ccedil;&atilde;o, criatividade, amor e parceria com os colaboradores, visando o objetivo de satisfazer os clientes.
			Quem a conhece sabe que ela nunca para. Acordando muitas vezes no meio da noite para criar, quando acontece um &quot;insight&quot;.
            </h6>";

        $texto[4] = "<h6></h6>";
        $texto[5] = "<p></p>";
        $texto[6] = "
            <h6>
                Seu respeito pelo seu p&uacute;blico &eacute; refletido em suas pe&ccedil;as, acreditando que toda mulher nasceu para brilhar e o glamour tem que estar presente em nosso dia-a-dia, noite e praia, pois temos todas as horas para arrasar.
            </h6>";
        $texto[7] = "
            <p>
                Suas inspira&ccedil;&otilde;es s&atilde;o baseadas sempre na mulher. Sua imagina&ccedil;&atilde;o vai longe quando pensa que pode fazer cada uma se sentir linda e poderosa, suas cria&ccedil;&otilde;es n&atilde;o s&atilde;o apenas um vestu&aacute;rio, mas s&atilde;o molduras para real&ccedil;ar e valorizar a obra prima que &eacute; a mulher.
            </p>";

        $variaveis = [
            'ativo1'=>'active',
            'msgTopo'=>$dados[0]['texto'],
            'texto'=>$texto
        ];
        
        $this->view('index', $variaveis);
    }

    public function salvaEmailAction()
    {
        $email = $_POST['email'];

        if(empty($email)){
            return false;
        }else{
            $retorno = $this->model->inserir('emails',['email'=>$email]);
            if($retorno){
                $param = 1;
            }else{
                $param = 2;
            }
        }

        echo $param;
        die();
    }
}
