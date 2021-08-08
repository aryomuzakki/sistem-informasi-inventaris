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
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">DataTable with default features</h3> -->
            <a class="btn btn-success" href="<?php echo base_url('barang/create') ?>">
              <i class="fas fa-plus mr-1"></i>
              Tambah Data Baru
            </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tabel-barang" class="tabel-data table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Merek</th>
                  <th>Rincian</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $data) { ?>
                  <tr id="<?= $data->id; ?>">
                    <td></td>
                    <td><?= $no++; ?></td>
                    <td><?= $data->nama; ?></td>
                    <td><?= $data->merek; ?></td>
                    <td><?= $data->rincian; ?></td>
                    <td><?= ($data->nama_kategori == NULL) ? '<span class="text-muted font-italic">Kategori belum dipilih!</span>': $data->nama_kategori; ?></td>
                    <td><?= $data->jumlah; ?></td>
                    <td><?= $data->status; ?></td>
                    <td><?= $data->keterangan; ?></td>
                    <td>
                      <!-- <form class="form-delete""> -->
                      <div class="d-flex">
                        <a class="btn btn-primary m-1" href="<?php echo base_url('barang/edit/' . $data->id) ?>">
                          <i class="fas fa-pen"></i>
                        </a>
                        <a class="btn btn-danger m-1 delete-btn " href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                        <!-- <input name='id' type="text" value="<?= $data->id ?>" hidden>
                        <button type="submit" class="btn btn-danger m-1 delete-btn">
                          <i class="fas fa-trash"></i>
                        </button> -->
                      </div>
                      <!-- </form> -->
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->