function searchMovie() {
  $("#movie-list").html("");
  $.ajax({
    url: "http://www.omdbapi.com",
    type: "get",
    dataType: "json",
    data: {
      apikey: "c91e9192",
      s: $("#search-input").val(),
    },
    success: function (result) {
      if (result.Response == "True") {
        let movies = result.Search;
        $.each(movies, function (i, data) {
          $("#movie-list").append(`<div class="col-md-4">
          <div class="card mb-3" >
          <img src="${data.Poster}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">${data.Title}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">${data.Year}</h6>
            <a href="#" class="card-link text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">See Detail</a>
          </div>
        </div>
        </div>`);
        });

        $("#search-input").val("");
      } else {
        $("#movie-list").html(`<div class=" col-md-6 offset-md-3">
        <h1 class="text-center rounded-3 text-bg-danger">${result.Error}</h1>
      </div>`);
      }
    },
  });
}

$("#search-button").on("click", function () {
  searchMovie();
});

$("#search-input").on("keyup", function (e) {
  if (e.keyCode === 13) {
    searchMovie();
  }
});
