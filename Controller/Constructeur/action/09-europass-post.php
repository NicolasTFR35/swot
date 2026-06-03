<?php
if ($_SESSION['role']=="Référent") {
    $label="Europass Post Mobilité";
    if (!is_null($projet["referent_impression_europass_post"])) {
        $dt=new \DateTime($projet["referent_impression_europass_post"]);
        $label.="<br/>généré le ".$dt->format("d/m/Y à H:i");
    }

    ?>
    <div class="col-3">
        <a class="text-decoration-none" href="<?=$projet["europass_post_url"]?>" target="_blank">
            <button class="btn btn-block btn-primary btn-page-reload h-100 btn-validation-action"
                    data-id="<?=$projet['id_projet']?>"
                    data-champ="referent_impression_europass_post"
                    data-statut=""
            >
                <?=$label?>
            </button>
        </a>
    </div>
        <?php
}
else {
        if (is_null($projet["referent_impression_europass_post"])) {
            $hasFile=false;
            if (!is_null($projet["europass_post_url"])) $hasFile=true;
            ?>
            <div class="col-6 upload-col" data-base="projets_details" data-clef="europass_post_url" data-dossier="europass_post" data-id="<?=$projet['id_projet']?>" data-champ="coordo_europass_post">
                <span class="btn btn-primary btn-block upload-select" <?=($hasFile?'style="display:none;"':'')?> >
                    <b><span>Sélectionner l'Europass Post Mobilité à attacher au projet.</span></b>
                    <input type="file" name="files[]" class="upload-file">
                </span>
                <div class="upload-details mt-2">
                    <span class="upload-nom"></span>
                    <button class="btn btn-block btn-warning mt-2 upload-button">Envoyer</button>
                </div>
                <div class="upload-progression mt-2">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="upload-retour" <?=($hasFile?'style="display:block !important;"':'')?>>
                    <div class="btn-group btn-block">
                        <a class="btn btn-success col-10 upload-retour-voir" target="_blank" <?=($hasFile?'href="'.$projet["europass_post_url"].'"':'')?>>Voir l'europass post mobilité</a>
                        <button class="btn btn-block btn-danger btn-validation-action col-2"
                                data-id="<?=$projet['id_projet']?>"
                                data-champ="coordo_europass_post"
                                data-confirm="Supprimer l'europass post mobilité attaché au projet ?"
                                data-statut="0">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <?php
        }
        else {
            $label="Europass Post Mobilité";
            $dt=new \DateTime($projet["referent_impression_europass_post"]);
            $label.=" imprimé le ".$dt->format("d/m/Y");
            ?>
            <div class="col-3">
                <a class="btn btn-primary btn-block " target="_blank" href="<?=$projet["europass_post_url"]?>"><?=$label?></a>
            </div>
<?php
        }
}
?>
