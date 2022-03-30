<html>
    <head>
        <title>GET Firebase</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </head>
    <body>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Status Pembayaran</th>
                    </tr>
                </thead>
                <!-- div konten menampilkan List Data-->
                <tbody id="tbody"></tbody>
                 <!-- div konten menampilkan form update-->
                <br>
                <div id="updateBody">
            </table>
    </body>
</html>


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>


<script>
    
    var config = {
        apiKey: "AIzaSyD7ZpFLVo2pCK0EmZJWsT7ofPr6D3a2crs",
        authDomain: "database-unbin.firebaseapp.com",
        databaseURL: "https://database-unbin-default-rtdb.firebaseio.com",
        projectId: "database-unbin",
        storageBucket: "database-unbin.appspot.com",
        messagingSenderId: "272625579360",
        appId: "1:272625579360:web:2e6e1a6b6b46db96ba9a05",
        measurementId: "G-WESZ4RVFQY"
    };

    firebase.initializeApp(config);
    firebase.analytics();

    var database = firebase.database();
    var lastIndex = 0;
    firebase.database().ref('pendaftaran/').on('value', function(snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function(index, value) {
            if (value) {
                htmls.push('<tr><td>' + index + '</td><td>' + value.nama_lengkap + '</td><td>' + value
                    .jenis_kelamin +
                    '</td><td>' + value.no_tlp + '</td><td>' + value.email + '</td><td>' + value
                    .asal_sekolah +
                    '</td><td>' + value.prodi + '</td><td>' + value.kelas + '</td><td>' + value
                    .status_bayar +
                    '</td><td><button class="btn btn-info"  onclick="updateUser(this)" data-id="' + index + '">Update</button><td><button class="btn btn-danger"  onclick="deleteData(this)" data-id="' +
                    index + '">Delete</button></td></tr>');
            }
            lastIndex = index;
        });

        $('#tbody').html(htmls);
    });


     // Menampilkan Form Update
     function updateUser(params) 
    {
        updateID = params.dataset.id;
        firebase.database().ref('pendaftaran/' + updateID).on('value', function (snapshot) {
        var values = snapshot.val();
        var updateData = 
        '<div class="form-group"><label for="first_name" class="col-md-12 col-form-label">Nama</label><div class="col-md-12"><input id="update_nama_lengkap" type="text" class="form-control" name="update_nama_lengkap" value="' + values.nama_lengkap + '" required autofocus></div></div>'+
        '<div class="form-group"><label for="last_name" class="col-md-12 col-form-label">Jenis Kelamin</label><div class="col-md-12"><input id="update_jenis_kelamin" type="text" class="form-control" name="update_jenis_kelamin" value="' + values.jenis_kelamin + '" required autofocus></div></div>'+
        '<div class="form-group"><label for="last_name" class="col-md-12 col-form-label">No Telp.</label><div class="col-md-12"><input id="update_no_tlp" type="text" class="form-control" name="update_no_tlp" value="' + values.no_tlp + '" required autofocus></div></div>'+
        '<div class="form-group"><label for="last_name" class="col-md-12 col-form-label">Email</label><div class="col-md-12"><input id="update_email" type="text" class="form-control" name="update_email" value="' + values.email + '" required autofocus></div></div>'+
        '<div class="form-group"><label for="last_name" class="col-md-12 col-form-label">Asal Sekolah.</label><div class="col-md-12"><input id="update_asal_sekolah" type="text" class="form-control" name="update_asal_sekolah" value="' + values.asal_sekolah + '" required autofocus></div></div>'+
        '<div class="form-group"><label for="last_name" class="col-md-12 col-form-label">Prodi</label><div class="col-md-12"><input id="update_prodi" type="text" class="form-control" name="update_prodi" value="' + values.prodi + '" required autofocus></div></div>'+
        '<div class="form-group"><label for="last_name" class="col-md-12 col-form-label">Kelas</label><div class="col-md-12"><input id="update_kelas" type="text" class="form-control" name="update_kelas" value="' + values.kelas + '" required autofocus></div></div>'+
        '<div class="form-group"><label for="last_name" class="col-md-12 col-form-label">Status Bayar</label><div class="col-md-12"><input id="update_status_bayar" type="text" class="form-control" name="update_status_bayar" value="' + values.status_bayar + '" required autofocus></div></div>'+        
        '<button id="updateSubmit" onclick="updatePost(this)" data-id="'+updateID+'" type="button" class="btn btn-primary mb-2">Submit</button>';
        $('#updateBody').html(updateData);
        });
    }
    // Code Udpate Data
    function updatePost(params) 
    {    
        updateID = params.dataset.id;
        var postData = 
        {
            nama_lengkap: $('#update_nama_lengkap').val(),
            jenis_kelamin: $('#update_jenis_kelamin').val(),
            no_tlp: $('#update_no_tlp').val(),
            email: $('#update_email').val(),
            asal_sekolah: $('#update_asal_sekolah').val(),
            prodi: $('#update_prodi').val(),
            kelas: $('#update_kelas').val(),
            status_bayar: $('#update_status_bayar').val(),
        };
        var updates = {};
        updates['/pendaftaran/' + updateID] = postData;
        firebase.database().ref().update(updates);
        $("#updateBody").html('');
    }


    function deleteData(params) {
        var id = params.dataset.id;
        firebase.database().ref('pendaftaran/' + id).remove();
    }
</script>