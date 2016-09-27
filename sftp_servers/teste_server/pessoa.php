<?php

class Pessoa {
	private $idade;
	private $altura;
	
	public function getAltura(){
		return $this->altura;
	}
	public function crescer($metros){
		$this->altura += $metros;		
	}
	public function getIdade(){
		return $this->idade;
	}
	public function envelhecer($anos){
		$this->idade += $anos;
	}
	
}


?>