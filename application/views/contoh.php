<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>data</center>
</body>
</html>


SELECT a.id_dosen,a.rombel_id,b.kode_makul,b.nama_makul,b.sks,b.jenis_makul,c.nama_prodi,e.nama,f.*,g.* FROM app_dosen_ajar a INNER JOIN makul_matakuliah b ON a.kode_makul=b.kode_makul INNER JOIN tbl_prodi c ON b.prodi_id=c.kode_prodi INNER JOIN tbl_semester e ON b.semester_id=e.id INNER JOIN rombel_jenis f ON a.rombel_id=f.id_rombel INNER JOIN app_thn_akademik g ON a.thn_id=g.id_thnakad