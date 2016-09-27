<?php
include (pessoa.php)
 class PessoaTest extends PHPUnit_Framework_TestCase{
	 public function testType(){
		 $pessoa = new Pessoa();
		 $this->assertInternalType('int', $pessoa->getIdade());
		 $this->assertInternalType('float', $pessoa->getAltura());
	 }
	 
	 /**
     * @depends testType
     */
	 
	 public function testEnvelhecer(){
		 $pessoa = new Pessoa();
		 $pessoa -> envelhecer(20);
		 $pessoa -> envelhecer(3);
		 $this->assertEquals(23, $pessoa->getIdade());
	 }
	 
	 /**
     * @depends testType
     */
	 
	 public function testCrescer(){
		 $pessoa = new Pessoa();
		 $pessoa -> crescer(1);
		 $pessoa -> crescer(0.68);
		 $this->assertEquals(1.68, $pessoa->getAltura());
	 }
 }
 ?>