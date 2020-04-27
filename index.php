<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <div class="container">
        <h1>FIRST AJAX</h1>
        <div align="center">
            <input type="text" placeholder="Cari nama siswa ..." id="nama_siswa" class="form-control">
            <ul class="list-group" id="resultlist">
            </ul>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                cache: false
            })
            $('#nama_siswa').keyup(function() {
                $('#resultlist').html('')
                $('#state').val('')
                let nama_siswa = $('#nama_siswa').val()

                $.ajax({
                    type: 'POST',
                    url: 'get_data.php',
                    data: {
                        nama_siswa: nama_siswa
                    },
                    success: function(data) {
                        $.each(JSON.parse(data), function(key, value) {
                            $('#resultlist').append('<li class="list-group-item link-class"><img src="image/'+value.avatar+'" height="40" weight="40" class="img-thumbnail"><span class="nama">'+value.nama_siswa+'</span><span class="text-muted" style="float: right">'+value.alamat+'</span></li>')
                        })
                    }
                })
            })

            $('#resultlist').on('click', 'li', function(){
                let nama_siswa = $(this).children('.nama').text()
                $('#nama_siswa').val(nama_siswa)
                $('#resultlist').html('')
            })
        })
    </script>
</body>

</html>