<?php
/**
 * @var $this \yii\web\View
 * @var $field \common\models\Field
 */
$this->title='Мои мысли';
?>

<section id="main">
    <div class="row">
        <div class="col-md-2">
            <div id="add-field" class="row"><button id="field-button" class="btn btn-primary"><b>+</b> Добавить поле</button></div>
            <nav>
                <ul class="list-unstyled text-center">
                    <?php
                    foreach ($fields as $field){ ?>
                        <li id="<?= $field->id ?>" class="field-option"><a href="#"><?= $field->name ?></a><button  id="<?= $field->id ?>" class="btn btn-primary card-btn">+</button></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <div class="col-md-10 field">
        </div>
    </div>
</section>