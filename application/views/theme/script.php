<script type="text/javascript">

  $(function () {
    let baseUrl = '<?= base_url() ?>';
    let route = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);
    // datatable
    let myTable = '';

    // select2bs4 theme
    // kategori
    $('.select-kategori').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Kategori',
    })
    
    // datatable
    myTable = $('.tabel-data').DataTable({
      'responsive': {
        'details': {
          'type': 'column',
          'targets': 'tr'
        },
      },
      'autoWidth': false,
      'columnDefs': [
        {
          'orderable': false,
          'targets': -1
        },
        {
          'responsivePriority': 2,
          'targets': -1
        },
        {
          'className': 'control p-3',
          'orderable': false,
          // 'searchable': false,
          'targets':   0
        },
        {
          'className': 'align-middle',
          'targets': '_all'
        },
      ],
      'order': [1, 'asc'],
    });
    
    $('th.align-middle').removeClass('align-middle');

    // Sweet Alert
    $('a.delete-btn').click(function(){
      let row = $(this).closest('tr');
      let id = row.attr('id');

      swal(
        {
          title: "Perhatian!",
          text: "Anda akan menghapus data ini",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Hapus!",
          cancelButtonText: "Batal!",
          closeOnConfirm: true,
          closeOnCancel: true
        },

        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: baseUrl+route+'/delete/'+id,
              type: 'DELETE',
              error: function() {
                alert('Gagal!');
              },
              success: function(data) {
                location.replace(location.pathname);
              }
            });
          } 
        }
      );
    
    });

    let test = $('.test');
    // export tabel
    $('.export-btn').on('click', function(e) {
      e.preventDefault();
      let rowJson = {};
      let colJson = {};
      let colHeader = [];
      
      rowJson['page_title'] = "Laporan " + $('.content-header h1').text();

      rowJson['data'] = [];
      
      myTable.columns().header().each(function(val, i) { 
        colHeader.push($(val).text().toLowerCase());
      })

      let last = colHeader.length - 1;
      myTable.rows({page: 'all', search: 'applied'}).data().each(function (row) {
        
        colJson = {};
        
        for (let i = 1; i < last; i++) {
          colJson[colHeader[i]] = row[i];
        }

        rowJson['data'].push(colJson);

      })

      let rowJsonString = JSON.stringify(rowJson);

      $.ajax({
        url: baseUrl+route+'/export/',
        type: 'POST',
        data: {
          exportData: rowJsonString,
        },
        beforeSend: function () {
          $('#spinner').fadeIn();
        },
        complete: function (jqXhr, status) {
          $('#spinner').fadeOut();
          toastr.success("Data Berhasil di Export");
        },
        error: function(xhReq, errorText, thrownError) {
          alert(xhReq.status + "\n" + errorText);
          toastr.error("Gagal Export Data");
        },
        success: function(data) {
          test.find('iframe').attr('src', data);
          test.show();
        }
      });


      // let xhr = new XMLHttpRequest();
      // xhr.open("POST", baseUrl+route+"/export/", true);

      // // xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      // xhr.setRequestHeader("Content-Type", "application/json")
      
      // // xhr.send(rowJson);

      // xhr.send(JSON.stringify({ "email": "hello@user.com", "response": { "name": "Tester" } }));

      // xhr.onload = () => {

      //   pdfArea.html(xhr.response);
      // } 
      

    })
  });
</script>

<?php $this->load->view('theme/toastr'); ?>

<?php $this->load->view('theme/chartjs'); ?>
<!-- <table class="tabel-data table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Merek</th>
                  <th>Rincian</th>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php //$no=1; foreach ($data as $data) { ?>
                  <tr id="<?php // $data->id; ?>">
                    <td><?php // $no++; ?></td>
                    <td><?php // $data->nama; ?></td>
                    <td><?php // $data->merek; ?></td>
                    <td><?php // $data->rincian; ?></td>
                    <td><?php // $data->nama_kategori; ?></td>
                    <td><?php // $data->jumlah; ?></td>
                    <td><?php // $data->status; ?></td>
                    <td><?php // $data->keterangan; ?></td>
                  </tr>
                <?php //} ?>
              </tbody>
            </table> -->