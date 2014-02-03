<?php
//debug($planes);
$semestre = array();
for($i = 1; $i < 10; $i++)
{
	$semestre[$i] = $i;
}

echo $this->Form->input('searchPlan.Plan', array(
	'options'=>$planes,
	'empty'=>'Escoja plan',
	'label'=>'Plan a buscar',
	'div'=>false,
	'id'=>'inicia_buscaPlan'));
echo "</br></br>";
echo $this->Form->input('searchPlan.Semestre', array(
	'options'=>$semestre,
	'label'=>'Semestre',
	'div'=>false));


echo $this->Js->writeBuffer();

?>