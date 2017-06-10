## About
Implementasi komputerisasi akuntansi berbasis web application, panduan berdasarkan [UNIKA](http://intranet.unika.ac.id/jurnal).

## What you need
| Technology | Description |
| --- | --- |
| `Materialize CSS` | front end web framework [Material Design] |
| `Jquery AJAX` | use to perform some task and url |
| `PHP 7 MySQLi` | im using this PHP version, and use MySQLi not PDO |

## Basic URL Routing
```php
$router->register([
  "" => "controller/index.php",
  "about" => "controller/about.php",
  "report" => "controller/report.php",
  "404" => "controller/404.php",
  "posting" => "controller/posting.php"
])
```
**URL Routing** contoh kasus nya seperti biasanya kita mengakses sebuah URL `http://localhost/about.php`, dengan URL route dapat
dihasilkan menjadi `http://localhost/about`. Jika mengakses url yang tidak ada dalam daftar routing maka akan muncul halaman `404`.<br>
Contoh diatas saya ambil dari tutorial PHP Practitioner milik Laracast. 

## QueryBuilder
Pada dasarnya ketika kita membuat SQL query kita menuliskan dengan mentah biasa seperti ini
```sql
SELECT jurnalunum.nobukti FROM jurnalumum WHERE jurnalumum.del = '0'
```
Dengan **QueryBuilder** kita dapat membuat syntax tersebut lebih elegan.<br>
Create new object 
```php 
$qb = new QueryBuilder();
```

```php
$qb->select(
  'jurnalumum.nobukti',
  'jurnalumum.tgltransaksi',
  'jurnalumum.nojurnal',
  'kodeunit.nama',
  'jurnalumum.jenis'
  )
  ->from('jurnalumum')
  ->join('kodeunit on kodeunit.unit = jurnalumum.unit')
  ->where("jurnalumum.del = '0'")
  ->whereAnd("jurnalumum.posting ='0'");
```
contoh sederhana tersebut menghasilkan STRING sqlquery biasa, memang tidak ada bedanya dengan mentahan, ini bisa dikembangkan lagi
untuk perform lebih kompleks.<br>
Class ini saya ambil dari Stackoverflow dengan menambahkan beberapa perform.

## Todo
- [x] Input ke jurnaldetil
- [x] Input ke jurnalumum
- [ ] More Object Oriented
- [ ] **Security** prevent from SQL Injection
- [ ] posting
  - [x] Menampilkan posting
  - [ ] tombol posting belum ada action jika [Agree] or [Disagree]
- [ ] closing


## Issue
Jika menemukan sebuah BUG atau kesalahan bisa membuat issue baru. <br>
[Create New Issue](https://github.com/lintangtimur/akuntansi/issues)


## Contributing
Jika anda berminat mengembangkan ini, anda bebas untuk berkontribusi.<br>
Aturan standard agar orang lain dapat membaca dengan mudah yaitu menggunakan aturan `PSR-1`, `PSR-0`.<br>
Buatlah alur kode yang elegan, dan tidak hardcode. <br>
**BEBAS UNTUK PULL REQUEST**
> Dont Repeat Yourself [DRY]

## Jurnal
![gambar](https://image.ibb.co/d1v4DF/jurnal.gif)

## Posting
![postingImage](https://image.ibb.co/ktsn0v/posting.gif)

## LICENSE
[MIT License](https://github.com/lintangtimur/akuntansi/blob/master/LICENSE)
