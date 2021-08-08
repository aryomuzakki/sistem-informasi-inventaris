<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Barang</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
      <a class="btn btn-danger" href="<?php echo base_url('barang'); ?>">
          <i class="fas fa-times mr-1"></i>
          Batal
        </a>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?= base_url('barang/create/action'); ?>">
            <div class="card-body">
              <?php 
                if (!empty(validation_errors())) {
              ?>
              <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
              </div>
              <?php 
                }
              ?>

              <div class="form-group">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" maxlength="100" value="<?= set_value('nama') ?>">
              </div>
              
              <div class="form-group">
                <label for="merek">Merek</label>
                <input name="merek" type="text" class="form-control" id="merek" placeholder="Merek" maxlength="100" value="<?= set_value('merek') ?>" autofocus>
              </div>
              
              <div class="form-group">
                <label for="rincian">Rincian</label>
                <textarea name="rincian" id="rincian" class="form-control" rows="3" placeholder="rincian" maxlength="255"><?= set_value('rincian') ?></textarea>
              </div>
              
              <div class="form-group">
                <label>Nama Kategori</label>
                <select name="id_kategori" class="form-control select-kategori" style="width: 100%;">
                  <option></option>
                  <?php foreach ($kategori as $k_data) { ?>
                    <option value="<?= $k_data->id ?>" <?= ($k_data->id == set_value('id_kategori')) ? 'selected="selected"' : ''; ?> ><?= $k_data->nama_kategori ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input name="jumlah" type="number" class="form-control" id="jumlah" placeholder="Jumlah" value="<?= set_value('jumlah') ?>">
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <input name="status" type="text" class="form-control" id="status" placeholder="Status" maxlength="10" value="<?= set_value('status') ?>">
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="keterangan" maxlength="255"><?= set_value('keterangan') ?></textarea>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->