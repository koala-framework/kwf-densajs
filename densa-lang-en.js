Ext4.onReady(function() {
    if (Densa.defaultButton && Densa.defaultButton.Add) {
        Densa.defaultButton.Add.prototype.defaultText = trlKwf('Add');
    }
    if (Densa.defaultButton && Densa.defaultButton.Delete) {
        Densa.defaultButton.Delete.prototype.defaultText = trlKwf('Delete');
    }
    if (Densa.defaultButton && Densa.defaultButton.ExportCsv) {
        Densa.defaultButton.ExportCsv.prototype.defaultText = trlKwf('Export CSV');
    }
    if (Densa.defaultButton && Densa.defaultButton.Save) {
        Densa.defaultButton.Save.prototype.defaultText = trlKwf('Save');
    }
    if (Densa.editWindow && Densa.editWindow.Window) {
        Densa.editWindow.Window.prototype.saveText = trlKwf('Save');
        Densa.editWindow.Window.prototype.deleteText = trlKwf('Delete');
        Densa.editWindow.Window.prototype.cancelText = trlKwf('Cancel');
        Densa.editWindow.Window.prototype.closeText = trlKwf('Close');
    }
    if (Densa.editWindow && Densa.editWindow.WindowController) {
        Densa.editWindow.WindowController.prototype.addTitle = trlKwf('Add');
        Densa.editWindow.WindowController.prototype.editTitle = trlKwf('Edit');
        Densa.editWindow.WindowController.prototype.saveChangesTitle = trlKwf('Save');
        Densa.editWindow.WindowController.prototype.saveChangesMsg = trlKwf('Do you want to save the changes?');
        Densa.editWindow.WindowController.prototype.deleteConfirmTitle = trlKwf('Delete');
        Densa.editWindow.WindowController.prototype.deleteConfirmText = trlKwf('Do you really wish to remove this entry?');
    }
    if (Densa.form && Densa.form.PanelController) {
        Densa.form.PanelController.prototype.deleteConfirmTitle = trlKwf('Delete');
        Densa.form.PanelController.prototype.deleteConfirmText = trlKwf('Do you really wish to remove this entry?');
        Densa.form.PanelController.prototype.saveValidateErrorTitle = trlKwf('Save');
        Densa.form.PanelController.prototype.saveValidateErrorMsg = trlKwf("Can't save, please fill all red underlined fields correctly.");
        Densa.form.PanelController.prototype.validatingMaskText = trlKwf("Validating...");
    }
    if (Densa.grid && Densa.grid.PanelController) {
        Densa.grid.PanelController.prototype.deleteConfirmTitle = trlKwf('Delete');
        Densa.grid.PanelController.prototype.deleteConfirmText = trlKwf('Do you really wish to remove this entry?');
        Densa.grid.PanelController.prototype.exportProgressTitle = trlKwf('Export');
        Densa.grid.PanelController.prototype.exportProgressMsg = trlKwf('Exporting rows...');

    }
    if (Densa.mvc && Densa.mvc.bindable && Densa.mvc.bindable.ViewController) {
        Densa.mvc.bindable.ViewController.prototype.deleteConfirmTitle = trlKwf('Delete');
        Densa.mvc.bindable.ViewController.prototype.deleteConfirmText = trlKwf('Do you really wish to remove this entry?');
    }
    if (Densa.grid && Densa.grid.controller && Densa.grid.controller.Bind) {
        Densa.grid.controller.Bind.prototype.saveChangesTitle = trlKwf('Save');
        Densa.grid.controller.Bind.prototype.saveChangesMsg = trlKwf('Do you want to save the changes?');
    }
    if (Densa.overrides && Densa.overrides.ComboBox) {
        Densa.overrides.ComboBox.prototype.defaultEmptyText = trlKwf('no selection');
    }




});
