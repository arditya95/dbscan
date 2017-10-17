[Algoritma DBSCAN]
Kunci dari algoritma DBSCAN adalah bahwa untuk setiap titik dari sebuah cluster,neighborhood dari radius yang diberikan harus mengandung setidaknya jumlah minimum poin, yaitu kepadatan neighborhood harus melebihi beberapa threshold yang ditetapkan. Algoritma ini membutuhkan dua parameter masukan:
a.	Eps, radius yang menentukan batas daerah neighborhood dari titik (Eps- neighborhood);
b.	MinPts, jumlah minimum poin yang harus ada di Eps- neighborhood-.
Adapun urutan algoritma dari DBSCAN secara umum memiliki 6 langkah yaitu:
1.	Arbitrary select a point p (Pilih point p awal secara acak)
2.	Retrieve all points density-reachable from p wrt Eps and MinPts (Ambil semua point yang density reachable terhadap titik p)
3.	If p is a core point, a cluster is formed (Jika p adalah core point maka cluster terbentuk)
4.	If  p is a border point, no points are density-reachable from p and DBSCAN visits the next point of the database (Jika p adalah border point, tidak ada yang merupakan hubungan density-reachable dari p dan DBSCAN akan mengunjungi point selanjutnya dari database)
5.	Continue the process until all of the points have been processed (Lanjutkan proses sampai semua point telah diproses)
6.	Result is independent of the order of processing the points (Hasil yang didapatkan tidak tergantung dari urutan dari proses point yang diambil)
