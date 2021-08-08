<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $barang_rows ?></h3>
                        <p>Barang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <a href="<?= base_url('barang')?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $kategori_rows ?></h3>
                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <a href="<?= base_url('kategori')?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title my-3 my-sm-0">
                            <i class="fas fa-chart-line mr-1"></i>
                            Grafik Barang
                        </h3>
                        <div class="card-tools my-3 my-sm-0">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item mr-1">
                                <select class='form-control form-control-sm' id='kategori'
                                    onChange='doAjaxGrafikBarang()'>
                                    <option value=''>Semua Kategori</option>
                                    <?php 
                                        if(count($kategori_all) >= 1){ 
                                            foreach($kategori_all as $kategori){
                                                ?>
                                                    <option value='<?=$kategori->id?>'><?=$kategori->nama_kategori?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </li>
                            <li class="nav-item ml-1">
                                <select class='form-control form-control-sm' id='status'
                                    onChange='doAjaxGrafikBarang()'>
                                    <option value=''>Semua Status</option>
                                    <option value='baik'>Baik</option>
                                    <option value='rusak'>Rusak</option>
                                    <option value='hilang'>Hilang</option>
                                </select>
                            </li>
                        </ul>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <canvas class="chart" id="grafikBarang" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row (main row) -->
</section>
<!-- /.content -->