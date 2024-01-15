<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;?>

<?php $form = ActiveForm::begin(['method' => 'get']);?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'startDate')->input('date', ['placeholder' => 'Выберите дату начала']); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'endDate')->input('date', ['placeholder' => 'Выберите дату окончания']); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Показать отчёт', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end();?>

<?php if (!empty($report)):?>
    <table class="main-table">
        <tr>
            <th>ПІБ</th>
            <th>Відключення</th>
            <th>Перевірка/здешевлення</th>
            <th>Тех. питання</th>
            <th>Інше</th>
            <th>Усього</th>
        </tr>
        <?php foreach ($report as $name => $bids): ?>
            <tr>
                <td> <?= $name ?> </td>
                <td> <?= $bids['Відключення'] ?> </td>
                <td><?= $bids['Перевірка/здешевлення'] ?></td>
                <td><?= $bids['Тех. питання'] ?></td>
                <td><?= $bids['Інше'] ?></td>
                <td><?= $bids['Усього'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif;?>


