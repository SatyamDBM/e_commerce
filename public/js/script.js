// 🧭 Navbar Scroll Effect
window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > 50) navbar.classList.add("scrolled");
  else navbar.classList.remove("scrolled");
});

document.addEventListener("DOMContentLoaded", function () {

  // 🔹 Category Slider
  const catSlider = document.getElementById("catSlider");
  const catLeft = document.getElementById("catLeft");
  const catRight = document.getElementById("catRight");
  if (catSlider && catLeft && catRight) {
    catLeft.addEventListener("click", () => (catSlider.scrollLeft -= 400));
    catRight.addEventListener("click", () => (catSlider.scrollLeft += 400));
  }

  // 🔹 Sidebar Menu
  const menuIcon = document.querySelector(".menu-icon");
  const sideMenu = document.getElementById("sideMenu");
  const overlay = document.getElementById("menuOverlay");
  const closeBtn = document.getElementById("closeMenu");
  if (menuIcon && sideMenu && overlay && closeBtn) {
    const toggleMenu = () => {
      sideMenu.classList.toggle("open");
      overlay.classList.toggle("active");
    };
    menuIcon.addEventListener("click", toggleMenu);
    overlay.addEventListener("click", toggleMenu);
    closeBtn.addEventListener("click", toggleMenu);
  }

  // 🔹 CSRF + Login Info
  const isLoggedIn = window.appData?.isLoggedIn;
  const loginUrl = window.appData?.loginUrl || "/login";
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

  // 🔹 Wishlist (Add / Remove)
  document.querySelectorAll(".wishlist").forEach((btn) => {
    btn.addEventListener("click", function (e) {
      if (!isLoggedIn) {
        e.preventDefault();
        window.location.href = loginUrl;
        return;
      }

      const productId = this.dataset.productId;
      const icon = this.querySelector("i");

      fetch(`/wishlist/add/${productId}`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrfToken,
        },
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status === "added") {
            icon.classList.add("bi-heart-fill", "text-light-green");
            icon.classList.remove("bi-heart");
          } else if (data.status === "removed") {
            icon.classList.remove("bi-heart-fill", "text-light-green");
            icon.classList.add("bi-heart");
          }
        })
        .catch((err) => console.error("Wishlist Error:", err));
    });
  });

  // 🔹 Cart Buttons (Home Page)
  document.querySelectorAll(".btn-cart").forEach((btn) => {
    btn.addEventListener("click", function (e) {
      if (!isLoggedIn) {
        e.preventDefault();
        window.location.href = loginUrl;
        return;
      }

      const productId = this.closest("[data-product-id]")?.dataset.productId;
      const icon = this.querySelector("i");

      fetch(`/cart/add/${productId}`, {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": csrfToken,
          Accept: "application/json",
        },
      })
        .then(async (res) => {
          try {
            const data = await res.json();
            if (data.status === "added" || data.status === "updated") {
              icon.classList.replace("bi-cart3", "bi-cart-check");
              icon.classList.add("text-success");
              window.location.href = "/cart";
            } else if (data.status === "exists") {
              alert("Item already in your cart!");
            }
          } catch {
            window.location.href = "/cart";
          }
        })
        .catch((err) => console.error("Cart Error:", err));
    });
  });

  // 🔹 Quantity +/- in Cart
  document.querySelectorAll(".qty-plus, .qty-minus").forEach((btn) => {
    btn.addEventListener("click", function () {
      const row = this.closest("tr");
      const cartId = row.dataset.id;
      const qtyValue = row.querySelector(".qty-value");
      const price = parseFloat(
        row
          .querySelector("td:nth-child(3)")
          .textContent.replace("₹", "")
          .replace(/,/g, "")
      );
      const subtotalCell = row.querySelector("td:nth-child(5)");
      const totalCell = document.querySelector("tfoot td:last-child");
      let currentQty = parseInt(qtyValue.textContent);

      if (this.classList.contains("qty-plus")) currentQty++;
      if (this.classList.contains("qty-minus") && currentQty > 1) currentQty--;

      fetch(`/cart/update/${cartId}`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({ quantity: currentQty }),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status === "success") {
            qtyValue.textContent = currentQty;
            const newSubtotal = price * currentQty;
            subtotalCell.textContent = `₹${newSubtotal.toLocaleString()}`;

            let total = 0;
            document.querySelectorAll("tbody tr").forEach((tr) => {
              const sub = tr
                .querySelector("td:nth-child(5)")
                .textContent.replace("₹", "")
                .replace(/,/g, "");
              total += parseFloat(sub);
            });
            totalCell.textContent = `₹${total.toLocaleString()}`;
          }
        })
        .catch((err) => console.error("Cart update error:", err));
    });
  });

  // 🔹 Product Card → Details Page
  document.querySelectorAll(".product-card").forEach((card) => {
    card.addEventListener("click", function (e) {
      if (e.target.closest(".btn-cart") || e.target.closest(".wishlist")) return;
      const productId = this.dataset.productId;
      window.location.href = `/product/${productId}`;
    });
  });

  // 🔹 Product Page → Add to Cart
  const addToCartBtn = document.getElementById("addToCartBtn");
  const qtyInput = document.getElementById("quantity");

  if (addToCartBtn && qtyInput) {
    document.getElementById("increaseQty").addEventListener("click", () => {
      qtyInput.value = parseInt(qtyInput.value) + 1;
    });
    document.getElementById("decreaseQty").addEventListener("click", () => {
      if (parseInt(qtyInput.value) > 1)
        qtyInput.value = parseInt(qtyInput.value) - 1;
    });

    addToCartBtn.addEventListener("click", function () {
      const productId = this.dataset.productId;
      const quantity = qtyInput.value;

      fetch(`/cart/add/${productId}`, {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": csrfToken,
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ quantity }),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status === "added" || data.status === "updated") {
            alert("✅ Product added to your cart!");
          } else if (data.status === "exists") {
            alert("Already in cart!");
          }
        })
        .catch((err) => console.error("Cart Error:", err));
    });
  }

  // 🔹 Live Search
  const searchInput = document.getElementById("search");
  const searchResults = document.getElementById("searchResults");

  searchInput.addEventListener("keyup", function () {
    let query = this.value.trim();

    if (query.length < 2) {
      searchResults.style.display = "none";
      searchResults.innerHTML = "";
      return;
    }

    fetch(`/search?query=${encodeURIComponent(query)}`, {
      headers: { "X-Requested-With": "XMLHttpRequest" },
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.length === 0) {
          searchResults.innerHTML = `<p class="m-2 text-muted">No results found</p>`;
        } else {
          searchResults.innerHTML = data
            .map(
              (item) => `
              <a href="/product/${item.id}" class="d-block p-2 border-bottom text-decoration-none text-dark">
                <div class="d-flex align-items-center">
                  <span>${item.name}</span>
                </div>
              </a>`
            )
            .join("");
        }
        searchResults.style.display = "block";
      })
      .catch((err) => console.error(err));
  });

  // 🔹 Hide Search on Outside Click
  document.addEventListener("click", function (e) {
    if (!searchResults.contains(e.target) && e.target !== searchInput) {
      searchResults.style.display = "none";
    }
  });

  // 🔹 Delete Cart Item
  document.querySelectorAll(".delete-cart-item").forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      if (!confirm("Are you sure you want to remove this item?")) return;

      fetch(this.action, {
        method: "DELETE",
        headers: {
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
          Accept: "application/json",
        },
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status === "success") {
            this.closest("tr").classList.add("fade-out");
            setTimeout(() => this.closest("tr").remove(), 400);
          } else {
            alert("❌ Failed to remove item.");
          }
        })
        .catch(() => alert("Something went wrong!"));
    });
  });

});
