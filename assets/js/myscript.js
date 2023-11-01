//tombol hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
  title: 'Apakah anda yakin?',
  text: "Data terpilih akan terhapus!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Hapus data!'
}).then((result) => {
  if (result.isConfirmed) {
    document.location.href = href;
    
  }
});
});

//tombol Download
$('.tombol-download').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
  title: 'Download',
  text: "File siap didownload",
  icon: 'success',
  showCancelButton: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Download Now'
}).then((result) => {
  if (result.isConfirmed) {
    document.location.href = href;
    
  }
});
});

//tombol Keluar
$('.tombol_keluar').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
  title: 'Keluar',
  text: "Yakin anda ingin keluar ?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Keluar'
}).then((result) => {
  if (result.isConfirmed) {
    document.location.href = href;
    
  }
});
});