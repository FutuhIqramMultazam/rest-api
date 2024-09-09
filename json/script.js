// // JSON.stringify(); // mengubah data menjadi JSON
// // JSON.parse // mengubah data json menjadi array js

// let mahasiswa = {
//   nama: "Futuh Iqram multazam",
//   umur: 21,
//   email: "futuhiqram@gmail.com",
// };

// console.log(JSON.stringify(mahasiswa));

// #### mengambil data JSON ####

// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//   if (xhr.readyState == 4 && xhr.status == 200) {
//     let mahasiswa = JSON.parse(xhr.responseText);
//     console.log(mahasiswa);
//   }
// };

// xhr.open("GET", "coba.json", true);
// xhr.send();

// ### menggunakan JQuery ####

$.getJSON("coba.json", function (data) {
  console.log(data);
}); // ini secara automatis di ubah jadi JSON.parse
