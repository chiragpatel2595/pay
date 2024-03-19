<?= Form::open(['id' => 'invoiceStatusForm']) ?>


    <div class="modal-header">
        <h4 class="modal-title"><?= __("Change Invoice Status") ?></h4>
        <button type="button" class="btn-close" data-dismiss="popup"></button>
    </div>

    <?php if (!$this->fatalError): ?>

        <?php foreach ($invoiceIds as $id): ?>
            <input type="hidden" name="checked[]" value="<?= e($id) ?>" />
        <?php endforeach ?>
        <?php if ($invoiceId): ?>
            <input type="hidden" name="invoice_id" value="<?= e($invoiceId) ?>" />
        <?php endif ?>

        <div class="modal-body">
            <?= $formWidget->render() ?>
        </div>
        <div class="modal-footer">
            <?= Ui::ajaxButton("Change Status", 'onChangeInvoiceStatus')
                ->loadingPopup()
                ->primary() ?>

            <?= Ui::button(__("Cancel"))->dismissPopup() ?>
        </div>

    <?php else: ?>

        <div class="modal-body">
            <p class="flash-message static error"><?= e(trans($this->fatalError)) ?></p>
        </div>
        <div class="modal-footer">
            <?= Ui::button(__("Close"))->dismissPopup() ?>
        </div>

    <?php endif ?>

    <script>
        setTimeout(
            function(){ $('#invoiceStatusForm input.form-control:first').focus() },
            310
        )
    </script>

<?= Form::close() ?>
