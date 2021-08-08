<script type="text/javascript">
  $(function () {
    // Toastr
    let msg = "<?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>";
    if (msg != '') {
      toastr.success(msg);
    }
  });
</script>
<?php
  $this->session->set_flashdata('message', ''); 
  $this->session->set_flashdata('errorMessage', '');
?>