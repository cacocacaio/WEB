<?php
  /**
  * classe TTableCell
  * responsável pela exibição dde uma célula de uma tabela
  */
  class TTableCell extends TElement
  {
    /**
    * método construtor
    * instancia uma nova célula
    * @param $value = conteúdo da célula
    */
    public function __construct($value)
    {
      parent::__construct('td');
      parent::add($value);
    }
  }
?>
