# VEHICLE RESERVATIONS

## REQUIREMENT

### high level
- terdapat dua user (admin dan pihak yang menyetujui) 
- admin dapat menginput pemesanan kendaraan dan menentukan driver serta pihak yang menyetujui pemesanan
- Persetujuan dilakukan berjenjang minimal 2 level (level jabatan?)
- pihak yang menyetujui dapat melakukan persetujuan melalui aplikasi
- terdapat dashboard yang menampilkan grafik pemakaian kendaraan
- terdapat laporan periodik pemesanan kendaraan yang dapat di export

### entity ✅
- admin (data admin)
- approver (data penyetuju)
- driver (data pengemudi)
- vehicle (data kendaraan)

weak
- vehicle_rented (data kendaraan yang disewa)
- vehicle_approval (data persetujuan pemesanan kendaraan)
- vehicle_usage (data penggunaan kendaraan)
- vehicle_service (data service kendaraan)