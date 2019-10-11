<?php
	/* O presente código tem como objetivo estudar os conceitos de classe abstrata e interfaces*/

	/*A classe funcionário ditará atributos que TODOS os funcionários do banco conterá,
	por tanto, será uma classe abstrata!*/

/*  Imaginando que necessitaríamos de um método para autenticar alguma entidade que não seja um funcionário (por exemplo, um cliente),
	temos como solução o usu de interfaces: 
	Funcionam como uma espécie de contrato em que se encontram as regras (métodos sem corpo[O QUE deverão fazer(1)]) que os assinantes (que 'implementarão o contrato') deverão fazer (métodos com o corpo[COMO irão fazer(3) com O QUE TEM (2)]), cabendo a estes definir como executarão
	as regras com o que têm. */ 	
	abstract class Funcionario{
		private $salario;
		private $nome;
		/*Declarando uma função abstrata, acabamos por tornar nossa classe obrigatoriamente abstrata,
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

	interface Autenticavel{
		function autenticar($senha);//O que deve fazer(1)
	}

	/*O "assinante" deverá "dizer que quer assinar" o 'contrato' usando o "implements" seguido do nome da interface:*/
	class Gerente extends Funcionario implements Autenticavel{
		private $senha; // o que tem [2]
		/*Chamada do método da interface*/
		public function autenticar($senha){
			if($this->senha != $senha){ //COMO FAZER[3]
				return false;
			}else{
				return true;
			}
		}
		/*método de reescrita (override) para adptar uma função da classe herdade a nossa classe*/
		public function getBonificacao(){
			return $this->salario*0.15;
		}
		/*Para poder instanciar uma classe que extenda outra abstrata, devemos declarar a função
		abstrata da última, mas não possuindo código.*/
		public function verificar(){}

	}

	/*O "assinante" deverá "dizer que quer assinar" o 'contrato' usando o "implements" seguido do nome da interface:*/
	class Escriturario extends Funcionario implements Autenticavel{
		private $senha; // o que tem [2]
		/*Chamada do método da interface*/
		public function autenticar($senha){
			if($this->senha != $senha){ //COMO FAZER[3]
				return false;
			}else{
				return true;
			}
		}
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

	/*Classe criada somente com o intuito de vermos a nossa interface sendo utilizada e com poliformia*/
	class SistemaInterno{
		public function login(Autenticavel $a){
			$senha = //pega a senha de algum lugar;
			$ok    = $a.autenticar($senha);
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