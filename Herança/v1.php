<?php
	/* O presente código tem como objetivo estudar os conceitos de classe abstrata e interfaces*/

	/*A classe funcionário ditará atributos que TODOS os funcionários do banco conterá,
	por tanto, será uma classe abstrata!*/

	class Funcionario{
		private $salario;
		private $nome;

		public function getBonificacao(){
			return $this->getSalario()*0.10;
		}
		public function setSalario($salario){
			$this->salario = $salario;
		}
		public function getSalario(){
			return $this->salario;
		}
	}
	class Gerente extends Funcionario{
		/*método de reescrita (override) para adptar uma função da classe herdade a nossa classe*/
		public function getBonificacao(){
			return $this->salario*0.15;
		}
	}
	$main = new Gerente();
	$main->nome = "Marcelo";
	$main->salario = 2000;
	//$main->setSalario(2000);
	//echo $main->getSalario();
	echo $main->nome." "."Bonificação: ".$main->getBonificacao();
	
?>