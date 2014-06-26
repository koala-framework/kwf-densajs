#!/usr/bin/php
<?php
$replace = [
    'Kwf.Ext4.Controller.Action.Add'             => 'Densa.action.Add',
    'Kwf.Ext4.Controller.Action.Delete'          => 'Densa.action.Delete',
    'Kwf.Ext4.Controller.Action.ExportCsv'       => 'Densa.action.ExportCsv',
    'Kwf.Ext4.Controller.Action.Save'            => 'Densa.action.Save',
    'Kwf.Ext4.Data.StoreSyncQueue'               => 'Densa.data.StoreSyncQueue',
    'Kwf.Ext4.View.EditWindow'                   => 'Densa.editWindow.Window',
    'Kwf.Ext4.ViewController.EditWindow'         => 'Densa.editWindow.WindowController',
    'Kwf.Ext4.ViewController.Form'               => 'Densa.form.PanelController',
    'Kwf.Ext4.Controller.Binding.BindableToGrid' => 'Densa.grid.controller.Bind',
    'Kwf.Ext4.Controller.Grid.DragDropOrder'     => 'Densa.grid.controller.DragDropOrder',
    'Kwf.Ext4.Controller.Grid.EditWindow'        => 'Densa.grid.controller.EditWindow',
    'Kwf.Ext4.Controller.Grid.InlineEditing'     => 'Densa.grid.controller.InlineEditing',
    'Kwf.Ext4.ViewController.Grid'               => 'Densa.grid.PanelController',
    'Kwf.Ext4.Controller.Bindable.Abstract'      => 'Densa.mvc.bindable.Abstract',
    'Kwf.Ext4.Controller.Bindable.Form'          => 'Densa.mvc.bindable.Form',
    'Kwf.Ext4.Controller.Bindable.Grid'          => 'Densa.mvc.bindable.Grid',
    'Kwf.Ext4.Controller.Bindable.GridBinding'   => 'Densa.mvc.bindable.GridBinding',
    'Kwf.Ext4.Controller.Bindable.Interface'     => 'Densa.mvc.bindable.Interface',
    'Kwf.Ext4.Controller.Bindable.Multiple'      => 'Densa.mvc.bindable.Multiple',
    'Kwf.Ext4.ViewController.Bindable' => 'Densa.mvc.bindable.ViewController',
    'Kwf.Ext4.ViewController.Abstract' => 'Densa.mvc.ViewController',
    'Kwf.Ext4.Overrides.BoundList' => 'Densa.overrides.BoundList',
    'Kwf.Ext4.Overrides.ComboBox' => 'Densa.overrides.ComboBox',
    'Kwf.Ext4.Overrides.Element' => 'Densa.overrides.Element',
    'Kwf.Ext4.Overrides.MultiSelect' => 'Densa.overrides.MultiSelect',
    'Kwf.Ext4.Portal.Column' => 'Densa.portal.Column',
    'Kwf.Ext4.Portal.DropZone' => 'Densa.portal.DropZone',
    'Kwf.Ext4.Portal.Panel' => 'Densa.portal.Panel',
    'Kwf.Ext4.Portal.Portlet' => 'Densa.portal.Portlet',
    'Kwf.Ext4.Tip.Message' => 'Densa.tip.Message',
];
$it = new RecursiveDirectoryIterator(".");
$it = new RecursiveCallbackFilterIterator($it, function ($current, $key, $iterator) {
    return $current->getFileName() != 'vendor' && $current->getFileName() != 'docs';
});
$it = new RecursiveIteratorIterator($it);
$it = new CallbackFilterIterator($it, function ($current, $key, $iterator) {
    if (!$current->isFile()) return false;
    return $current->getExtension() == 'js';
});
foreach ($it as $file) {
    echo $file, "\n";
    $c = file_get_contents($file);
    foreach ($replace as $s=>$r) {
        if (strpos($c, $s)!==false) {
            echo "$s => $r\n";
            $c = str_replace($s, $r, $c);
        }
    }
    file_put_contents($file, $c);
    echo "\n";
}
