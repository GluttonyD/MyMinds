<?php
/**
 * @var $this \yii\web\View
 * @var $field \common\models\Field
 * @var $card common\models\Card
 */
$this->title = 'Мои мысли';
?>

<section id="main">
    <div class="row">
        <div class="col-md-2">
            <div id="add-field" class="row">
                <button id="field-button" class="btn btn-primary"><b>+</b> Добавить поле</button>
            </div>
            <nav class="fields">
                <ul class="list-unstyled text-center">
                    <?php
                    foreach ($fields as $field) { ?>
                        <li id="<?= $field->id ?>" class="field-option">
                            <a id="<?= $field->id ?>" class="field-link" href="#" style="display:inline"><?= $field->name ?></a>
                            <input id="<?= $field->id ?>" class="field-name" type="text" placeholder="<?= $field->name ?>" style="display: none;">
                            <div id="<?= $field->id ?>" class="field-delete glyphicon glyphicon-remove"></div>
                            <div id="<?= $field->id ?>" class="field-rename glyphicon glyphicon-pencil"></div>
                            <button id="<?= $field->id ?>" class="btn btn-primary card-btn">+</button>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <div class="col-md-10 field">
            <?php if($fields){ ?>
                <?php foreach ($fields[0]->cards as $card) { ?>
                    <div id="<?= $card->id ?>" class="card ui-widget-content"
                         style=" top: <?= $card->yPos - 74 ?>px; left: <?= $card->xPos - 310 ?>px; ">
                        <div class="row">
                            <div id="<?= $card->id ?>" class="card-delete glyphicon glyphicon-remove"></div>
                        </div>
                        <div class="row">
                            <textarea id="<?= $card->id ?>" class="card-textarea"><?= $card->text ?></textarea>
                            <div id="<?= $card->id ?>" class="card-text"><?= $card->text ?></div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>