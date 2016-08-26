<?php
  /**
  * classe TTable
  * responsável pela exibição de tabelas
  */
  class TTable extends TElement
  {
    /**
    * método construtor
    * instancia uma nova tabela
    */
    public function __construct()
    {
      parent::__construct('table');
    }
    /**
    * método addRow
    * compõe um novo objeto linha (TTableRow) na tabela
    */
    public function addRow()
    {
      //instancia objeto linha
      $row = new TTableRow;
      // armazena o objeto no conteúdo do elemento table
      parent::add($row);
      return $row;
    }
  }
?>
