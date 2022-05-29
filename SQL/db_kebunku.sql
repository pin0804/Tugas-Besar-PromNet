-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 11:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kebunku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisproduk`
--

CREATE TABLE `tb_jenisproduk` (
  `id_jenisproduk` int(8) NOT NULL,
  `nama_jenis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenisproduk`
--

INSERT INTO `tb_jenisproduk` (`id_jenisproduk`, `nama_jenis`) VALUES
(1, 'Tanaman Hias'),
(2, 'Bibit'),
(3, 'Pupuk'),
(4, 'Pot dan Vas'),
(5, 'Alat Kebun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` int(8) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pertanyaan` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`id_pertanyaan`, `nama`, `email`, `pertanyaan`, `tgl_masuk`, `status`) VALUES
(1, 'John Doe', 'john99@gmail.com', 'Saya ingin bertanya apakah KebunKu bersedia bekerja sama dengan perusahaan kurir kami?', '2021-11-30', 'Pending'),
(2, 'Jennie', 'jennie@gmail.com', 'Lorem ipsum', '2021-11-30', 'Dijawab'),
(23, 'Irene', 'irenee@gmail.com', 'COba saya mau nnaya', '2021-11-30', 'Dijawab'),
(24, 'Sena', 'sena@gmail.com', 'For a tutorial about Tabs, read our Bootstrap Tabs/Pills Tutorial. ... each tab, and add a .tab-pane class with a unique ID for every tab and wrap them in a', '2021-12-01', 'Dijawab'),
(25, 'Agfina', 'pina@gmail.com', 'Halo saya bertanya', '2021-12-02', 'Pending'),
(26, 'Ferbrian', 'feb@gmail.com', 'Mencoba bertanya', '2021-12-04', 'Pending'),
(27, 'Feny', 'feny@gmail.com', 'Kak store offline buka dari jam berapa ya ?', '2021-12-09', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(8) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `username`, `password`, `foto`) VALUES
(1, 'Nadira Arevia', 'nadiravia', 'nanad123', 'dahyun.jpg'),
(2, 'Johannes Alexander', 'johannes', 'jojo', 'johannes.png'),
(3, 'Viona Rosen', 'viona99', 'vio123', 'nayeon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(8) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `harga` int(8) NOT NULL,
  `id_jenisproduk` int(8) NOT NULL,
  `stok` int(8) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama`, `foto`, `harga`, `id_jenisproduk`, `stok`, `keterangan`) VALUES
(1, 'Aglaonema Red Anjamani', 'aglonema-red.png', 55000, 1, 44, 'Aglaonema bisa menetralkan udara kotor disekitar sebagaimana fungsi tanaman pada umumnya yang menyerap karbon dioksida (CO2) sebagai pembentukan zat hijau daunnya. Oleh karena itu tanaman hias ini sangat populer dan paling dicari oleh kalangan pecinta tanaman hias.'),
(2, 'Pupuk Urea N (Nitrogen)', 'urea.png', 40000, 3, 12, 'Pupuk Urea N (Nitrogen) : 46% 50kg Subsidi Pemerintah Pupuk Indonesia memiliki Spesifikasi:\r\n\r\nKadar air maksimal 0,50%\r\nKadar Biuret maksimal 1%\r\nKadar Nitrogen minimal 46%\r\nBentuk butiran prill\r\nWarna pink untuk Urea Bersubsidi\r\nDikemas dalam kantong bercap Pupuk Indonesia dengan isi 50 kg\r\nSifat Pupuk Urea:\r\nHigroskopis\r\nMudah larut dalam air\r\nManfaat unsur hara Nitrogen yang dikandung pupuk Urea:\r\n\r\nMembuat bagian tanaman lebih hijau dan segar\r\nMempercepat pertumbuhan\r\nMenambahkan nutrisi parotein untuk tanaman\r\nGejala kekurangan unsur hara Nitrogen pada tanaman:\r\n\r\nSeluruh tanaman berwarna pucat kekuningan\r\nPertumbuhan tanaman lambat dan kerdil\r\nDaun tua berwarna kekuningan. Pada tanaman padi dimulai dari ujung daun menjalar ke tulang daun\r\nPertumbuhan buah tidak sempurna sering kali masak sebelum waktunya'),
(3, 'Bibit Tanduk Rusa', 'bibit-tandukrusa.png', 30000, 2, 33, 'Manfaat utama dari tanaman hias ini sebagai pemasok oksigen yang banyak karena habitatnya, kemudia juga sebagai tanaman hias yang di letakkan di luar ruangan sehingga menambah keindahan dari taman disekitar rumah.'),
(5, 'Pot Gantung Putih', 'pot-gantung.png', 20000, 4, 23, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.'),
(8, 'Pot Kayu Estetik Coklat', 'potkayu.png', 40000, 4, 54, 'Sekian dari saya terimakasih'),
(9, 'Watercan Teko Penyiram Tanaman', 'Watercan.png', 150000, 5, 45, 'Watercan for Gardening! Teko Cantik Hijau Penyiram Tanaman terbuat dari Alumunium alat berkebun cocok juga untuk dekorasi ruangan. Tersedia dalam ukuran 35cm. Barang berkualitas dan dilapisi cat antikarat. Kapasitas tampungan air sekitar 1 liter. Handle ergonomis dan kokoh disertai bentuk yang cantik. Cocok untuk anda yang suka berkebun, merawat bunga dan tanaman lainnya.'),
(10, 'Pupuk NPK Kujang', 'npk-kujang.png', 500000, 3, 45, 'Pupuk NPK Kujang Non-Subsidi 50kg memiliki Spesifikasi:\r\n\r\nToleransi Kandungan Unsur Hara + 8%\r\nBentuk Granular dan Blending\r\nDikemas dalam kantong bercap NPK Kujang dengan isi 50 kg\r\nKeunggulan:\r\n\r\n-Aplikasi pemupukan lebih praktis karena tidak perlu mencampur beberapa jenis pupuk tunggal\r\n-Mampu meningkatkan efisiensi dan efektivitas penggunaan pupuk\r\n-Mampu meningkatkan jumlah dan mutu hasil pertanian\r\n-Formula, bentuk, dan jenis bahan baku menyesuaikan permintaan konsumen\r\n-Mengantisipasi dan mengatasi masalah apabila terjadi kelangkaan salah satu jenis pupuk tunggal\r\n-Memudahkan transportasi, penyimpanan, dan penanganan lainnya'),
(11, 'Bibit Monstera', 'bibit-monsterra.PNG', 45000, 2, 78, 'Peletakan tanaman hias ini sama seperti tanaman hias pada umumnya yaitu dengan intensitas cahaya yang cukup dan perawatannya cukup disiram setiap hari secara rutin agar dapat mempertahankan kelembapannya. Manfaat dari Monstera sendiri ialah menambah stok oksigen dalam ruangan dan menjadi nilai estetik ruangan tersebut.'),
(12, 'Sekop Emas Mini Berkebun', 'sekop-emas.png', 89000, 5, 45, 'Sekop mini cantik untuk berkebun. Sekop Emas yang unik dan cantik bisa membuat mood anda membaik saat berkebun. Bahan dari alumunium kuat dan berkualitas. Fungsi: Alat bantu memindahkan media tanam, menggemburkan metan, dan kebutuhan gardening lainnya.Handle dilapisi kayu yang sudah dibuat senyaman mungkin untuk keperluan berkebun anda!'),
(13, 'Suplir', 'suplir.png', 80000, 1, 54, 'Suplir tidak hanya membuat suasana menjadi asri dan sejuk, tetapi juga bagus untuk relaksasi dan kesehatan. Jika diletakkan di dalam ruangan, tanaman hijau ini akan membantu meningkatkan kualitas udara dan memberikan relaksasi visual'),
(14, 'Lidah Mertua', 'lidah-mertua.png', 79000, 1, 15, 'Manfaat utama dari tanaman hias ini ialah menjadi pemasok oksigen karena dipengaruhi oleh kemampuan fotosintesis yang baik serta membersihkan polusi atau udara kotor sehingga udara sekitar menjadi bersih dan segar kembali.'),
(15, 'Bibit Alocasia', 'bibit-alocasia.PNG', 56000, 2, 18, 'Jenis alocasia merupakan salah satu tanaman tropis yang masih berhubungan dengan anthurium, aglaonema, dan juga keladi. Jenis tanaman hias ini sangat populer karena mempunyai bentuk daun yang unik, yaitu seperti kuping gajah.'),
(16, 'Kalapot Stand', 'Kalapotstand.png', 190000, 4, 8, 'Tanaman tampil cantik dengan pot stand Kalapot'),
(17, 'Garden Fork Garpu Taman Mini', 'Diggingfork.png', 152000, 5, 56, 'Garpu taman mini untuk menggarap, menggaruk, menggali tanah tukan kebun.Terbuat dari aluminium yang dipoles padat, mengkilap, tahan karat dan sangat kokoh. 3 menghancurkan dan mengendurkan tanah dengan sempurna menjadi potongan-potongan yang lebih kecil agar udara dan air dapat menembus jauh ke dalam tanah dan mengalir dengan lebih efektif. Pegangan ergonomis, memungkinkan Anda untuk lebih dalam dan memberi Anda pegangan yang kuat untuk mengurangi kelelahan tangan dan pergelangan tangan. Pegangan lembut yang nyaman cocok untuk orang tua dan anak-anak, itu akan menjadi hadiah yang sempurna untuk seseorang yang suka berkebun'),
(18, 'Pupuk Urea Nitrea Kujang', 'nitrea.png', 70000, 3, 9, 'Pupuk Urea Nitrea Kujang Non-Subsidi 50kg memiliki Spesifikasi:\r\n\r\nKadar Biuret maksimal 1%\r\nKadar Nitrogen minimal 46%\r\nBentuk butiran prill uncoated\r\n100% larut dalam air\r\nWarna pink untuk urea bersubsidi\r\nDikemas dalam kantong bercap Nitrea dengan isi 50kg dan 25kg\r\nKandungan:\r\n\r\nNitrogen 46%\r\nManfaat:\r\n\r\nMembuat tanaman lebih hijau dan segar\r\nMempercepat proses pertumbuhan\r\nMenambahkan nutrisi protein untuk tanaman\r\nPeruntukan:\r\n\r\nTanaman pangan\r\nHortikultura\r\nTanaman keras\r\nPerkebunan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` int(8) NOT NULL,
  `id_produk` int(8) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `foto_user` varchar(200) NOT NULL,
  `testimoni` text NOT NULL,
  `rate` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id_testimoni`, `id_produk`, `nama_user`, `foto_user`, `testimoni`, `rate`) VALUES
(1, 1, 'John Doe', 'person1.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.', '5'),
(3, 3, 'Ian Jeff', 'person3.jpg', 'randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything', '4'),
(4, 1, 'Feny Andiana', 'nayeon.jpg', 'Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '4'),
(7, 2, 'Alex Jacobed', '001.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour ganti yak', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenisproduk`
--
ALTER TABLE `tb_jenisproduk`
  ADD PRIMARY KEY (`id_jenisproduk`);

--
-- Indexes for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_jenisproduk` (`id_jenisproduk`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenisproduk`
--
ALTER TABLE `tb_jenisproduk`
  MODIFY `id_jenisproduk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  MODIFY `id_pertanyaan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id_testimoni` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_jenisproduk`) REFERENCES `tb_jenisproduk` (`id_jenisproduk`);

--
-- Constraints for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD CONSTRAINT `tb_testimoni_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
