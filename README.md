#### Janji
Saya Julia Rahmawati dengan NIM 2400742 mengerjakan tugas praktikum 9 dalam mata kuliah Desain dan pemrograman Berorientasi Objek untuk keberkahannya maka saya tidak melakukan kecurangan seperti yang telah di spesifikasikan. Aamiin.

#### Desain Program 
Program ini dibuat menggunakan arsitektur Model-View-Presenter untuk mengelola data pembalap dan sirkuit. Bahasa pemrograman yang di pakai adalah PHP. MVP adalah arsitektur yang memisahkan aplikasi menjadi tiga komponen yaitu, 
##### 1. Model 
Model adalah bagian yang menangani seluruh logika bisnis dan mengelola data. Tugasnya itu berinteraksi langsung dengan Database (CRUD), menyediakan data yang dibutuhkan presenter. Tugas model dalam program ini adalah, mengambil data dari database (getAll, getById), menambahkan, mengubah, dan mengahapus data, dan menangani operasi database melalui kelas kelas seperti: DB.php, KontrakPembalap.php, KontrakSirkuit.php, Pembalap.php, Sirkuit.php, TabelPembalap.php, TabelSirkuit.php. 
##### 2.View
View adalah bagian yang menangani tampilan dan interaksi langsung dengan pengguna. View hanya bertugas menampilkan data dan menerima input dari user tanpa memproses logika bisnis. Tugas View adalah : 
- menampilkan UI (tabel, form, dan tombol),
- Mengambil aksi pengguna seperi tambah, edit dan hapus,
- menerima data dari presenter dan menampilkan ke pengguna.
##### 3. Presenter
Presenter adalah penghubung antara View dan Model. Tugas Presenter yaitu:
- Menerima aksi dari view, seperti tambah pembalap.
- memvalidasi inputan misalnya, nama tidak kosong
- setelah validasi presenter memanggil model yang sesuai
- setelah selesai, presenter mengambil hasil sukes/ gagal dan memberikan perintah view untuk memperbarui data.

#### Database
##### 1. Tabel : pembalap
![gambar](dokumentasi/tabelpembalap.png)
##### 2. Tabel : sirkuit
![gambar](dokumentasi/tabelsirkuit.png)

#### Alur Program
1. program di mulai dari index.php
   - menampilkan menu ke user
   - meneruskan user ke halaman pembalap dan sirkuit
2. user memilih menur ( pembalap / sirkuit)
   - jika memilih pembalap , view yang terlibat (ViewPembalap.php), presenter (PresenterPembalap.php), model(TabelPembalap.php dan Pembalap.php)
   - jika memilih sirkuit , view yang terlibat (ViewSirkuit.php), presenter (PresenterSirkuit.php), model(TabelSirkuit.php dan Sirkuit.php)
3. View meminta data ke presenter
   - presenter mengambil data dari model (TabelPembalap->getAll)
   - presenter mengirim kembali data ke view
   - view menampilkan tabel pembalap
   - begitu juga dengan sirkuit
4. User menambahkan data
   - user klik Tambah Pembalap
   - View menampilkan form dari template/form.html
   - ketika user mengklik submit, form mengirim data ke View
   - presenter memvalidasi input
   - model menyimpan ke databse melalui DB.php
   - prose pada sirkuti sama hanya memakail formSirkuti.html
5. user mengedit data
   - user mengklik aksi edit
   - view meminta presenter mengambil detai data (getPembalapById(id))
   - presenter memanggil model mengambil data dari DB
   - presenter mengirim data ke View (form diisi data lama)
   - user melakukan perubahan, klik Update
   - presenter memanggil model
   - proses pada sirkuit sama
6. User menghapus data
   - klik delete
   - view ke presenter untuk proses hapus
   - presenter memanggil model untuk menghapus data
   - model menghapus data di DB
   - Begitu juga dengan sirkuit

#### Dokumentasi 
##### Pemabalap
[video](dokumentasi/pembalap.mp4)

##### Sirkuit
[video](dokumentasi/sirkuit.mp4)
