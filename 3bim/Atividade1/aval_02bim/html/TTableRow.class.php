<?php
  /**
  * classe TTableRow
  * responsável pela exibição de uma linha de uma tabela
  */
  class TTableRow extends TElement
  {
    /**
    * método construtor
    * instancia uma nova linha
    */
    public function __construct()
    {
      parent::__construct('tr');
    }
    /**
    * método addCell
    * compõe um novo objeto célula (TTableCell) à linha
    * @param $value = conteúdo da célula
    */
    public function addCell($value)
    {
      //instancia objeto célula
      $cell = new TTableCell($value);
      //adiciona o objeto no conteúdo da linha
      parent::add($cell);
      //retorna o objeto instanciado
      return $cell;
    }
  }
?>
