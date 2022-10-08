<?php 
	//koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "phpdasar");

	function query ($query) {
		global $conn;
		$rows = [];
		$result = mysqli_query($conn, $query );
		while ($row = mysqli_fetch_assoc($result)) {
			$rows [] = $row;
		}
		return $rows;
	}
	

	function tambah ($data){
		global $conn;
		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		
		//upload gambar
		$gambar = upload();
		if (!$gambar) {
			return false;
		}


		//query insert data
		$query = "INSERT INTO mahasiswa VALUES 
		('', '$nama', '$nim', '$email', '$jurusan', '$gambar' 
		)";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}


	function upload(){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpFile = $_FILES['gambar']['tmp_name'];

		//cek apakah sudah diupload atau belum
		if ($error === 4) {
			echo "<script>
					alert ('Pilih gambar terlebih dahulu');
				</script>";

			return false;
		}

		//cek apakah file yang diupload gambar atau tidak
		$ektensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ektensiGambar = explode('.', $namaFile);
		$ektensiGambar = strtolower(end($ektensiGambar));

		if (!in_array($ektensiGambar, $ektensiGambarValid)) {
			echo "<script>
					alert ('File yang anda upload bukan gambar');
				</script>";

			return false;
		}

		//ukuran gambar terlalu besar
		if ($ukuranFile > 2000000) {
			echo "<script>
					alert ('Ukuran gambar yang anda upload terlalu besar');
				</script>";

			return false;
		}

		//generate nama baru untuk file yang diupload
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ektensiGambar;

		//lolos pengecekan, lanjut uplod ke database
		move_uploaded_file($tmpFile, 'img/' . $namaFileBaru);

		return $namaFileBaru;
	}


	function hapus($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
		return mysqli_affected_rows($conn);
	}


	function ubah ($data){
		global $conn;
		$id = $data["id"];
		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$gambarLama = htmlspecialchars($data["gambarLama"]);

		//cek apakah user mengupload gambar baru atau tidak
		if ($_FILES['gambar']['error'] === 4) {
			$gambar = $gambarLama;
		}else{
			$gambar = upload();
		}

		//query insert data
		$query = "UPDATE mahasiswa SET
					nama = '$nama',
					nim = '$nim',
					email = '$email',
					jurusan = '$jurusan',
					gambar = '$gambar' WHERE id = $id
				";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}


	function cari($keyword){
		$query = "SELECT * FROM mahasiswa WHERE 
		nama LIKE '%$keyword%' OR 
		nim LIKE '%$keyword%' OR
		email LIKE '%$keyword%' OR
		jurusan LIKE '%$keyword%'
		";

		return query($query);
	}


	function registrasi($data){
		global $conn;

		$username= strtolower(stripcslashes($data["username"]));
		$password= mysqli_real_escape_string($conn, $data["password"]);
		$password2= mysqli_real_escape_string($conn, $data["password2"]);

		//cek username sudah ada atau belum
		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

		if (mysqli_fetch_assoc($result) ) {
			echo "<script>
				alert('Username sudah terdaftar, mohon gunakan username lain');
			</script>";

			return false;
		}

		//konfirmasi password
		if ($password !== $password2) {
			echo "<script>
				alert('Konfirmasi password salah');
			</script>";

			return false;
		}

		//enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		//insert ke database
		mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

		return mysqli_affected_rows($conn);
	}

?>