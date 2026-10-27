\# Alur Request Laravel — KursusKu Erik Ajaya



```text

+----------------------+

|        Browser       |

| Membuka halaman "/"  |

+----------------------+

&#x20;          |

&#x20;          v

+----------------------+

|      Route (web.php) |

| Menentukan tujuan    |

| request halaman "/"  |

+----------------------+

&#x20;          |

&#x20;          v

+----------------------+

|    HomeController    |

|       index()        |

| Menyiapkan data      |

| kursus unggulan      |

+----------------------+

&#x20;          |

&#x20;          v

+----------------------+

|    Blade View        |

|     home.blade.php   |

| Menggabungkan data   |

| dengan template HTML |

+----------------------+

&#x20;          |

&#x20;          v

+----------------------+

|    HTML Response     |

| Halaman dikirim ke   |

| browser              |

+----------------------+

&#x20;          |

&#x20;          v

+----------------------+

|        Browser       |

| Menampilkan KursusKu |

+----------------------+

```



\## Penjelasan

Ketika pengguna membuka halaman utama KursusKu, browser mengirim request ke Laravel. Route pada `routes/web.php` meneruskan request ke `HomeController@index`. Controller menyiapkan nama website dan data tiga kursus unggulan, kemudian mengirimkannya ke view `home.blade.php`. Blade mengolah data menjadi HTML, lalu Laravel mengirimkan respons kepada browser untuk ditampilkan kepada pengguna.

