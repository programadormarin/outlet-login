<?php
class Pessoa {
	private $id = null;
	private $dataCadastro = null;
	private $situacao = null;

	/**
	 * Atribui um valor ao 'id' da pessoa
	 * @param int $newId Identificador da pessoa
	 */
	public function setId ($newId) {
		$this->id = $newId;
	}

	/**
	 * Atribui um valor ao tipo do acesso
	 * @param string $newDataCadastro Data de cadastro da pessoa
	 */
	public function setDataCadatro (DateTime $newDataCadastro) {
		$this->dataCadastro = $newDataCadastro;
	}

	/**
	 * Atribui a situacao atual da pessoa
	 * @param string $newSituacao E a situacao atual da pessoa ('ativa' ou 'inativa')
	 */
	public function setSituacao ($newSituacao) {
		$this->situacao = $newSituacao;
	}

	/**
	 * Retorna o 'id' do acesso
	 * @return int $id Identificador da pessoa
	 */
	public function getId () {
		return $this->id;
	}

	/**
	 * Retorna a data de cadatro da pessoa
	 * @return DateTime
	 */
	public function getDataCadastro () {
		return $this->dataCadastro;
	}

	/**
	 * Retorna a situacao da pessoa (ativa ou inativa)
	 * @return DateTime $dateHour Data e hora do acesso
	 */
	public function getSituacao () {
		return $this->situacao;
	}
}