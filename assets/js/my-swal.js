$('.btn-hapus').on('click', function(e){
    e.preventDefault();
    var href = $(this).attr('href');
    Swal({
      title: 'Apakah anda yakin?',
      text: "Data ini akan di hapus secara permanen!",
      type: 'warning',
      showCancelButton: true,
      cancelButtonText : 'Batal',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
});