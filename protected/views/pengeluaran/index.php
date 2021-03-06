<?php
/* @var $this PengeluaranController */
/* @var $model Pengeluaran */

$this->breadcrumbs = array(
    'Pengeluaran' => array('index'),
    'Index',
);

$this->boxHeader['small'] = 'Pengeluaran';
$this->boxHeader['normal'] = 'Pengeluaran';

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/responsive-tables.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/responsive-tables.js', CClientScript::POS_HEAD);
?>
<div class="row">
    <div class="small-12 columns">
        <?php
        $this->widget('BGridView', array(
            'id' => 'pengeluaran-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'itemsCssClass' => 'tabel-index responsive',
            'columns' => array(
                array(
                    'class' => 'BDataColumn',
                    'name' => 'nomor',
                    'header' => '<span class="ak">N</span>omor',
                    'accesskey' => 'n',
                    'autoFocus' => true,
                    'type' => 'raw',
                    'value' => array($this, 'renderLinkView'),
                ),
                array(
                    'class' => 'BDataColumn',
                    'name' => 'tanggal',
                    'header' => 'Tangga<span class="ak">l</span>',
                    'accesskey' => 'l',
                    'type' => 'raw',
                    'value' => array($this, 'renderLinkUbah')
                ),
                array(
                    'name' => 'namaProfil',
                    'value' => '$data->profil->nama'
                ),
                'keterangan',
                array(
                    'name' => 'kas_bank_id',
                    'value' => '$data->kasBank->nama',
                    'filter' => $filterKasBank
                ),
                array(
                    'name' => 'jenis_transaksi_id',
                    'value' => '$data->jenisTransaksi->nama',
                    'filter' => $filterJenisTr
                ),
                array(
                    'name' => 'kategori_id',
                    'value' => '$data->kategori->nama',
                    'filter' => $filterKategori
                ),
                'referensi',
                'tanggal_referensi',
                array(
                    'name' => 'status',
                    'value' => '$data->namaStatus',
                    'filter' => $filterStatus
                ),
                array(
                    'header' => 'Total',
                    'value' => '$data->getTotal()',
                    'headerHtmlOptions' => array('class' => 'rata-kanan'),
                    'htmlOptions' => array('class' => 'rata-kanan')
                ),
                array(
                    'name' => 'namaUpdatedBy',
                    'value' => '$data->updatedBy->nama_lengkap',
                ),
                array(
                    'class' => 'BButtonColumn',
                    'buttons' => [
                        'delete' => [
                            'visible' => '$data->status == ' . Pengeluaran::STATUS_DRAFT,
                        ]
                    ]
                ),
            ),
        ));
        ?>
    </div>
</div>
<?php
$this->menu = array(
    array('itemOptions' => array('class' => 'divider'), 'label' => ''),
    array('itemOptions' => array('class' => 'has-form hide-for-small-only'), 'label' => '',
        'items' => array(
            array('label' => '<i class="fa fa-plus"></i> <span class="ak">T</span>ambah', 'url' => $this->createUrl('tambah'), 'linkOptions' => array(
                    'class' => 'button',
                    'accesskey' => 't'
                )),
        ),
        'submenuOptions' => array('class' => 'button-group')
    ),
    array('itemOptions' => array('class' => 'has-form show-for-small-only'), 'label' => '',
        'items' => array(
            array('label' => '<i class="fa fa-plus"></i>', 'url' => $this->createUrl('tambah'), 'linkOptions' => array(
                    'class' => 'button',
                )),
        ),
        'submenuOptions' => array('class' => 'button-group')
    )
);
