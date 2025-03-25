// <!-- filter -->

document.addEventListener("DOMContentLoaded", function () {
  var categoryItems = document.querySelectorAll("#container-bar li");

  categoryItems.forEach(function (item) {
    item.addEventListener("click", function () {
      var categoryId = this.getAttribute("data-category-id");
      var phpFile = this.getAttribute("data-php-file");

      if (categoryId === "all") {
        loadContentAndDisplay("interface/all-item.php");
      } else if (categoryId === "CT003") {
        // Ví dụ: Sinh Tố
        loadContentAndDisplay("interface/filter-page/sinhto.php");
      } else if (categoryId === "CT004") {
        // Ví dụ: Bánh Kem
        loadContentAndDisplay("interface/filter-page/banhkem.php");
      } else if (categoryId === "CT002") {
        // Ví dụ: Soda
        loadContentAndDisplay("interface/filter-page/soda.php");
      } else {
        loadContentAndDisplay("interface/filter-page/trasua.php"); // Xử lý mặc định cho trường hợp khác
      }
    });
  });

  function loadContentAndDisplay(phpFile) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseText;

        document.getElementById("content-list-product").innerHTML = response;
      }
    };

    xhr.open("GET", phpFile, true);

    xhr.send();
  }
});

// <!-- show-hide slibar -->

document.addEventListener("DOMContentLoaded", function () {
  const barContainer = document.getElementById("bar-container");
  const contentListProduct = document.getElementById("content-list-product");
  const showHideBarButton = document.getElementById("show-hide-bar-btn");

  showHideBarButton.addEventListener("click", function () {
    const isOpen = barContainer.style.width === "20%";

    if (isOpen) {
      barContainer.style.width = "0";
      contentListProduct.style.width = "100%";
    } else {
      barContainer.style.width = "20%";
      contentListProduct.style.width = "80%";
    }

    showHideBarButton.classList.toggle("close", isOpen);
  });
});
