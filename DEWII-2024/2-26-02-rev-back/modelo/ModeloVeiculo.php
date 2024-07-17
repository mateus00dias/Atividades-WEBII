<?php
class ModeloVeiculo
{
    private $codigo;
    private $fabricante;
    private $modelo;

    public function __construct($f, $m, $c = null) {
        $this->fabricante = $f;
        $this->modelo = $m;
        $this->codigo = $c;
    }

	/**
	 * @return mixed
	 */
	public function getCodigo() {
		return $this->codigo;
	}
	
	/**
	 * @param mixed $codigo 
	 * @return self
	 */
	public function setCodigo($codigo): self {
		$this->codigo = $codigo;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFabricante() {
		return $this->fabricante;
	}
	
	/**
	 * @param mixed $fabricante 
	 * @return self
	 */
	public function setFabricante($fabricante): self {
		$this->fabricante = $fabricante;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getModelo() {
		return $this->modelo;
	}
	
	/**
	 * @param mixed $modelo 
	 * @return self
	 */
	public function setModelo($modelo): self {
		$this->modelo = $modelo;
		return $this;
	}
}
