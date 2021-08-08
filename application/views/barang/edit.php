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
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Ubah Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?= base_url('barang/update/' . $barang->id); ?>">
            <div class="card-body">
              <?php
              if ($this->session->flashdata('message')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('message');
                echo "</div>";
              }
              ?>

              <div class="form-group">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" value="<?= $barang->nama ?>" maxlength="100">
              </div>
              
              <div class="form-group">
                <label for="merek">Merek</label>
                <input name="merek" type="text" class="form-control" id="merek" value="<?= $barang->merek ?>" maxlength="100" autofocus>
              </div>

              <div class="form-group">
                <label for="rincian">Rincian</label>
                <textarea name="rincian" id="rincian" class="form-control" rows="3" placeholder="rincian" maxlength="255"><?= $barang->rincian ?></textarea>
                <input name="rincian" type="text" class="form-control" id="rincian" value="<?= $barang->rincian ?>" maxlength="255">
              </div>

              <div class="form-group">
                <label>Nama Kategori</label>
                <select name="id_kategori" class="form-control select-kategori" style="width: 100%;">
                  <option></option>
                  <?php foreach ($kategori as $k_data) { ?>
                    <option value="<?= $k_data->id ?>" <?= ($k_data->id == $barang->id_kategori) ? 'selected="selected"' : ''; ?> ><?= $k_data->nama_kategori ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input name="jumlah" type="number" class="form-control" id="jumlah" value="<?= $barang->jumlah ?>">
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <input name="status" type="text" class="form-control" id="status" value="<?= $barang->status ?>" maxlength="10">
              </div>

              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="keterangan" maxlength="255"><?= $barang->keterangan ?></textarea>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->