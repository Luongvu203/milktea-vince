//banner
document.addEventListener("DOMContentLoaded", function () {
  var carouselInner = document.querySelector(".carousel-inner");

  function shiftAndMove() {
    carouselInner.style.transition = "transform 1s ease-in-out";
    carouselInner.style.transform = "translateX(-100%)";

    setTimeout(function () {
      var firstItem = document.querySelector(".carousel-item:first-child");
      carouselInner.appendChild(firstItem);
      carouselInner.style.transition = "none";
      carouselInner.style.transform = "translateX(0)";
    }, 1000);
  }

  setInterval(shiftAndMove, 3000);
});

// =====================================================================================================================

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

var topButton = document.querySelector(".top-page-btn");

topButton.addEventListener("click", scrollToTop);

window.addEventListener("scroll", function () {
  if (window.scrollY > 10) {
    topButton.style.opacity = "1";
    topButton.style.pointerEvents = "auto";
    topButton.classList.add("visible");
  } else {
    topButton.style.opacity = "0";
    topButton.style.pointerEvents = "none";
    topButton.classList.remove("visible");
  }
});

// ==============================================================================================

function showCart(event) {
  event.preventDefault();
  var showCart = document.getElementById("show-cart");
  var iconCart = event.currentTarget;
  var cartLengthElement = document.getElementById("lenght-cart");

  if (showCart.classList.contains("show")) {
    showCart.classList.remove("show");
    iconCart.style.color = "#221F20";
    cartLengthElement.style.color = "#221F20";
  } else {
    showCart.classList.add("show");
    iconCart.style.color = "#fff";
    cartLengthElement.style.color = "#fff";
  }
}

// ===========================================================================================================
