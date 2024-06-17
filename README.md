# VEHICLE RESERVATIONS

## REQUIREMENT

### high level
- terdapat dua user (admin dan pihak yang menyetujui) 
- admin dapat menginput pemesanan kendaraan dan menentukan driver serta pihak yang menyetujui pemesanan
- Persetujuan dilakukan berjenjang minimal 2 level (level jabatan?)
- pihak yang menyetujui dapat melakukan persetujuan melalui aplikasi
- terdapat dashboard yang menampilkan grafik pemakaian kendaraan
- terdapat laporan periodik pemesanan kendaraan yang dapat di export

# ROADMAP
- database design, migration, model, seeder  ✅
- autentikasi admin, employee ✅
- pemesanan kendaraan (employee) ✅
- pemrosesan pemesanan kendaraan (admin) ✅
- persetujuan pemesanan kendaraan (employee dengan jabatan dua tingkat diatas pemesan kendaraan) ✅
- laporan penggunaan oleh pemesan kendaraan
- statistik penggunaan kendaraan (admin)

## USER TESTING (seeder)

### admin

- username  :admin
- password  :admin

### employee

entry

- username  :alfarizi
- password  :rahasia

intermediate

- username  :ilham
- password  :rahasia

lower_management

- username  :fajar
- password  :rahasia