<?php
$label="Europass Post Mobilité";
if (!is_null($projet["referent_impression_europass_post"])) {
    $dt=new \DateTime($projet["referent_impression_europass_post"]);
    $label.="<br/>généré le ".$dt->format("d/m/Y à H:i");
}

$document=$this->getDocument($projet["mobilite_type"], 226, $projet["sejour_versement_bourse"]);
if (!$dropdown) echo '<div class="col-3">';
?>
<a class="<?=($dropdown?"dropdown-item":"")?> text-decoration-none" href="Projet-Document-<?=$projet['id_projet']?>-<?=$document['id']?>" target="_blank">
    <button class="btn btn-block btn-primary <?=($dropdown?"":"btn-page-reload")?> h-100" ><?=$label?></button>
</a>
<?php
if (!$dropdown) echo '</div>';
?>
