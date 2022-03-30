<html>
    <head>
        <title>POST Firebase</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <input type="text" id="jeniskelamin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No Telp</label>
                    <input type="text" id="no_tlp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Asal Sekolah</label>
                    <input type="text" id="sekolah" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prodi</label>
                    <input type="text" id="prodi" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kelas</label>
                    <input type="text" id="kelas" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Status Pembayaran</label>
                    <input type="text" id="status_bayar" class="form-control">
                </div>
                <button type="submit" id="submitData" class="btn btn-primary">Submit</button>
            </div>
        </div>
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
    var nama_lengkap, jenis_kelamin, no_tlp, email, asal_sekolah, prodi, kelas, status_bayar;

    function table() {
        nama_lengkap = document.getElementById('nama').value;
        jenis_kelamin = document.getElementById('jeniskelamin').value;
        no_tlp = document.getElementById('no_tlp').value;
        email = document.getElementById('email').value;
        asal_sekolah = document.getElementById('sekolah').value;
        prodi = document.getElementById('prodi').value;
        kelas = document.getElementById('kelas').value;
        status_bayar = document.getElementById('status_bayar').value;
    }
    var database = firebase.database();
    var lastIndex = 0;

    
    $('#submitData').on('click', function() {
        table()
        var userID = lastIndex + 1;
        firebase.database().ref('pendaftaran/' + userID).set({
            nama_lengkap: nama_lengkap,
            jenis_kelamin: jenis_kelamin,
            no_tlp: no_tlp,
            email: email,
            asal_sekolah: asal_sekolah,
            prodi: prodi,
            kelas: kelas,
            status_bayar: status_bayar
        });
        // Reassign lastID value
        lastIndex = userID;
        $("#nama").val("");
        $("#jeniskelamin").val("");
        $("#no_tlp").val("");
        $("#email").val("");
        $("#sekolah").val("");
        $("#prodi").val("");
        $("#kelas").val("");
        $("#status_bayar").val("");
    });
</script>