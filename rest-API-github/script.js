function getDataGithub() {
  $("#detail").html("");
  let username = $("#cariNama").val();
  $.ajax({
    type: "get",
    url: `https://api.github.com/users/${username}`,
    dataType: "json",
    success: function (data) {
      if (data.login !== null) {
        $("#detail").append(` <div class="row justify-content-center">
            <div class="col-md-6 d-flex justify-content-center mb-5">
              <div class="card" style="width: 18rem">
                <img src="${data.avatar_url}" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h4 class="card-title">${data.login}</h4>
                  <h5 class="card-title">Email : ${data.email}</h5>
                  <p class="card-text">Location : ${data.location}.</p>
                  <figcaption class="blockquote-footer text-end">Akun ini di buat pada tanggal <cite title="Source Title">${data.created_at}</cite></figcaption>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Repository : ${data.public_repos}</li>
                  <li class="list-group-item">followers : ${data.followers}</li>
                  <li class="list-group-item">following : ${data.following}</li>
                </ul>
                <div class="card-body">
                  <a target="_blank" href="${data.html_url}" class="card-link btn btn-success">She's Github Acount</a> 
              </div>
            </div>
          </div>`);

        $("#cariNama").val("");
      } else {
        $("#detail").html(`<div class=" col-md-6 offset-md-3">
        <h1 class="text-center rounded-3 text-bg-danger">${data.message}</h1>
      </div>`);
      }
    },
  });
}

$("#btnCariNama").on("click", function () {
  getDataGithub();
});

$("#cariNama").on("keyup", function (e) {
  if (e.keyCode === 13) {
    getDataGithub();
  }
});
