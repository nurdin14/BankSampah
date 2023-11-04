<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- SweatAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script>
        @if (Session:: has('success'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Sukses!',
            text: `{{ Session::get('success') }}`
        })
        @endif
    </script>

    <script>
        $('.hapus').click(function () {
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            var jenis = $(this).attr('data-jenis');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'anda akan menghapus data yang bernama ' + nama,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Data!'
            }).then((result) => {
                if (result.isConfirmed) {

                    if (jenis == 'admin') {
                        window.location.href = "/deleteTransaksi/" + id;
                    } else if (jenis == 'user') {
                        window.location.href = "/hapusPegawai/" + id;
                    }

                    Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success',
                    )
                }
            })
        })
    </script>

    <script>
         $(document).ready(function () {
                $('#select2').select2({
                    placeholder: 'Pilih Jenis',
                    allowClear: true
                });
            });
    </script>

    <script>
        new DataTable('#example');
    </script>

    <script>
        
        const hargaKgInput = document.getElementById("harga_kg");
        const jumlahInput = document.getElementById("jumlah");
        const totalInput = document.getElementById("total");

        
        jumlahInput.addEventListener("input", function () {
            const jumlah = parseFloat(jumlahInput.value);
            const hargaKg = parseFloat(hargaKgInput.value);

            
            const total = isNaN(jumlah) || isNaN(hargaKg) ? 0 : jumlah * hargaKg;

            
            totalInput.value = total;
        });
    </script>

<script>
    $(document).ready(function () {
    // Ketika pemilihan jenis sampah berubah
    $('#select2').change(function () {
        var selectedJenisSampah = $(this).val();
        
        // Cari data trash yang sesuai berdasarkan jenis_sampah yang dipilih
        var selectedTrash = @json($data['sampah']);
        for (var i = 0; i < selectedTrash.length; i++) {
            if (selectedTrash[i].jenis_sampah === selectedJenisSampah) {
                // Isi input kategori dan harga_kg dengan nilai yang sesuai
                $('#harga_kg').val(selectedTrash[i].harga_kg);
                break;
            }
        }
    });
});
</script>
    
</body>

</html>