<?php
return array(
  'connection' => array(
    'dsn' => 'mysql:host=myserver.com;dbname=login',
    'username' => 'root',
    'password' => '',
    'dialect' => 'mysql'
  ),
  'classes' => array(
    'Pessoa' => array(
      'table' => 'pessoa',
      'props' => array(
        'id' => array('id', 'int', array('pk'=>true, 'autoIncrement'=>true)),
        'dataCadastro' => array('datacadastro', 'datetime'),
        'situacao' => array('situacao', 'varchar')
      ),
      'associations' => array(
        array('one-to-many', 'Usuario', array('key'=>'pessoaId')),
        array('one-to-many', 'PessoaFisica', array('key'=>'pessoaId')),
        array('many-to-many', 'Contato', array('table'=>'pessoa_contato','tableKeyLocal'=>'pessoa_id','tableKeyForeign'=>'contato_id')),
        array('many-to-many', 'Endereco', array('table'=>'pessoa_endereco','tableKeyLocal'=>'pessoa_id','tableKeyForeign'=>'endereco_id'))
      )
    ),
    'Usuario' => array(
      'table' => 'usuario',
      'props' => array(
        'id' => array('id', 'int', array('pk'=>true, 'autoIncrement'=>true)),
        'login' => array('login', 'varchar'),
        'senha' => array('senha', 'varchar'),
        'tipo' => array('tipo', 'varchar'),
    		'pessoaId' => array('pessoa_id', 'int')
      ),
      'associations' => array(
      	array('one-to-many', 'Acesso', array('key'=>'usuarioId')),
        array('many-to-one', 'Pessoa', array('key'=>'pessoaId'))
      )
    ),
    'Acesso' => array(
      'table' => 'acesso',
      'props' => array(
        'id' => array('id', 'int', array('pk'=>true, 'autoIncrement'=>true)),
        'tipo' => array('tipo', 'varchar'),
        'momento' => array('momento', 'varchar'),
    		'usuarioId' => array('usuario_id', 'int')
      ),
      'associations' => array(
      	array('many-to-one', 'Usuario', array('key'=>'usuarioId'))
      )
    ),
    'PessoaFisica' => array(
      'table' => 'pessoafisica',
      'props' => array(
        'id' => array('id', 'int', array('pk'=>true, 'autoIncrement'=>true)),
        'nome' => array('nome', 'varchar'),
        'cpf' => array('cpf', 'char'),
        'sexo' => array('sena', 'varchar'),
    		'pessoaId' => array('pessoa_id', 'int')
      ),
      'associations' => array(
      	array('many-to-one', 'Pessoa', array('key'=>'pessoaId'))
      )
    ),
    'Contato' => array(
      'table' => 'contato',
      'props' => array(
        'id' => array('id', 'int', array('pk'=>true, 'autoIncrement'=>true)),
        'tipo' => array('tipo', 'varchar'),
        'descricao' => array('descricao', 'varchar'),
    		'pessoaId' => array('pessoa_id', 'int')
      ),
      'associations' => array(
      	array('many-to-many', 'Pessoa', array('table'=>'pessoa_contato','tableKeyLocal'=>'contato_id','tableKeyForeign'=>'pessoa_id'))
      )
    ),
    'Endereco' => array(
      'table' => 'endereco',
      'props' => array(
        'id' => array('id', 'int', array('pk'=>true, 'autoIncrement'=>true)),
        'logradouro' => array('tipo', 'varchar'),
        'numero' => array('descricao', 'varchar'),
    		'complemento' => array('complemento', 'int'),
    		'referencia' => array('referencia', 'varchar'),
    		'tipo' => array('tipo', 'varchar'),
    		'municipioId' => array('municipio_id', 'int')
      ),
      'associations' => array(
      	array('many-to-many', 'Pessoa', array('table'=>'pessoa_endereco','tableKeyLocal'=>'endereco_id','tableKeyForeign'=>'pessoa_id')),
      	array('many-to-one', 'Municipio', array('key'=>'municipioId'))
      )
    ),
    'Municipio' => array(
      'table' => 'municipio',
      'props' => array(
        'id' => array('id', 'int', array('pk'=>true, 'autoIncrement'=>true)),
        'nome' => array('nome', 'varchar'),
        'ufId' => array('uf_id', 'int')
      ),
      'associations' => array(
      	array('one-to-many', 'Endereco', array('key'=>'municipioId')),
        array('many-to-one', 'Uf', array('key'=>'ufId'))
      )
    ),
    'Uf' => array(
      'table' => 'uf',
      'props' => array(
        'id' => array('id', 'int', array('pk'=>true, 'autoIncrement'=>true)),
        'sigla' => array('login', 'char'),
        'nome' => array('senha', 'varchar'),
    		'paisId' => array('pais_id', 'int')
      ),
      'associations' => array(
      	array('one-to-many', 'Municipio', array('key'=>'ufId')),
        array('many-to-one', 'Pais', array('key'=>'paisId'))
      )
    )
  ),
    'Pais' => array(
      'table' => 'pais',
      'props' => array(
        'id' => array('id', 'int', array('pk'=>true, 'autoIncrement'=>true)),
        'iso' => array('iso', 'char'),
        'iso3' => array('iso3', 'char'),
        'nome' => array('nome', 'varchar'),
      ),
      'associations' => array(
      	array('one-to-many', 'Uf', array('key'=>'paisId')),
      )
    )
);