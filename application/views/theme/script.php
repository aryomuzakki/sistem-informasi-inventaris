<script type="text/javascript">
  let baseUrl = '<?= base_url() ?>';
  let route = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);

  $(function () {

    // select2bs4 theme
    // kategori
    $('.select-kategori').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Kategori',
    })
    
    // datatable
    $('.tabel-data').DataTable({
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
          'searchable': false,
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


    
  });
</script>

<?php $this->load->view('theme/toastr'); ?>

<?php $this->load->view('theme/chartjs'); ?>