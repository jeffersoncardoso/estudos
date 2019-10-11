<?php
	/* O presente código tem como objetivo estudar os conceitos de classe abstrata e interfaces*/

	/*A classe funcionário ditará atributos que TODOS os funcionários do banco conterá,
	por tanto, será uma classe abstrata!*/

	abstract class Funcionario{
		private $salario;
		private $nome;
		/*Declarando uma função abstrata, cabamos por tornar nossa classe obrigatoriamente abstrata,
		só sendo possível chamá-la colocando este método na classe que iremos herda-la.
		obs=> Gerente().*/
		abstract protected function verificar();
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
		/*Para poder instanciar uma classe que extenda outra abstrata, devemos declarar a função
		abstrata da última, mas não possuindo código.*/
		public function verificar(){}
	}
	class Escriturario extends Funcionario{
		public function getBonificacao(){
			return $this->salario*0.12;
		}
		/*Para poder instanciar uma classe que extenda outra abstrata, devemos declarar a função
		abstrata da última, mas não possuindo código.*/
		public function verificar(){}
	}
		/*---> POLIFORMISMO <---*/

		/*Poliformismo seria a habilidade de um objeto poder ser declarado de múltiplas formas, como
		por exemplo, ser declarado como/com o nome da classe herdade, o que pouparia-nos de escrever
		os mesmos métodos em classes com o mesmo parent:: e ainda mais: Limitar o acesso àquele método
		somente a herdeiros de classe específica!*/
	class ControleBon{
		private $totalBon = 0;
		/*Como parâmetro, só poderemos passar uma classe herdeira de Funcionario, atribuindo-a  na variável
		$Bon, como espécie de instanciamento.*/
		public function regBon(Funcionario $Bon){
			$this->totalBon +=$Bon->getBonificacao();
		}
		public function getBonTotal(){
			return $this->totalBon;
		}
	}
	$main = new Gerente();
	$main->nome = "Marcelo";
	$main->salario = 3000;
	//$main->setSalario(2000);
	//echo $main->getSalario();
	echo "Gerente: ".$main->nome." "."Bonificação: ".$main->getBonificacao()."<br>";

	$Escriturario = new Escriturario();
	$Escriturario->nome = "Maracely";
	$Escriturario->salario = 2000;
	echo "Escriturario: ".$Escriturario->nome." "."Bonificação: ".$Escriturario->getBonificacao()."<br>";

	$controle = new ControleBon();
	//Poliformisando o Gerente(),
	$controle->regBon($main);
	//Poliformisando o Escriturario().
	$controle->regBon($Escriturario);
	echo "Total de Bonificações das funções: ".$controle->getBonTotal()."<br>";

	
?>