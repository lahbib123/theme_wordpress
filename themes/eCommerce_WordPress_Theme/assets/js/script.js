//  Promo anne
const messages = [
  "New customers 10% off with WELCOME",
  "Free shipping on orders over $50",
  "Join our loyalty program for rewards!",
];

let index = 0;
function updatePromoText() {
  document.getElementById("promo-text").textContent = messages[index];
}


// Function to go to the next slide
function nextSlide() {
  index = (index + 1) % messages.length; 
  updatePromoText();
}
// Function to go to the previous slide
function prevSlide() {
  index = (index - 1 + messages.length) % messages.length; 
  updatePromoText();
}

setInterval(nextSlide, 3000);
updatePromoText();

document.addEventListener('DOMContentLoaded', function() {
  const menuLinks = document.querySelectorAll('.dropdown a');

  menuLinks.forEach(link => {
      link.addEventListener('mouseenter', function() {
          const menuName = link.getAttribute('data-name');
          const mega_menus = document.querySelectorAll(`.mega-menu`);
          mega_menus.forEach(element => {
            element.classList.add('hidden')
            if(element.dataset.name == menuName ) {
              element.classList.remove('hidden')
              element.addEventListener('mouseleave', function() {
                this.classList.add('hidden')
              })
            }
          });
          
      });
  });
});

// Header Mobile 
let hamburger = document.querySelector(".header__hamburger");
let hamburger_close_btn = document.querySelector(".mobile-menu .close-btn");
let links_mobile_menu = document.querySelectorAll("header .mobile-menu > ul > li");
let mobile_menu = document.querySelector(".mobile-menu");
let show_mobile_menu = () => {
    mobile_menu.classList.add("show");
    document.body.classList.add('no-scroll')
}
let hide_mobile_menu = () => {
    mobile_menu.classList.remove("show");
    document.body.classList.remove('no-scroll')
}
hamburger.addEventListener("click", function () {
    show_mobile_menu()
});
hamburger_close_btn.addEventListener("click", function () {
    hide_mobile_menu()

});

links_mobile_menu.forEach((link) => {
    let dropdown_menu = link.querySelector("ul");
    if (dropdown_menu) {
        link.addEventListener("click", function () {
            link.querySelector("a").classList.toggle("active");
        });
    }
});



let header = document.querySelector(".home header.header");
if(header) {
    header.addEventListener("mouseenter", () => {
        header.classList.remove("transparent");
        header.addEventListener("mouseleave", () => {
            if (!isElementSticky(header)) {
                header.classList.add("transparent");
            }
        });
    });
}

document.addEventListener("scroll", () => {
    if (isElementSticky(header)) {
        header.classList.remove("transparent");
    } else {
        header.classList.add("transparent");
    }
});

function isElementSticky(element) {
    const rect = element.getBoundingClientRect();
    return rect.top <= 0 && rect.bottom >= 0; // If top of the element is at or above 0, it's stuck
}

let touchStartX = 0;
let toucheEndX = 0;

function handleToucheStart(event) {
    touchStartX = event.changedTouches[0].screenX;
}
function handleToucheEnd(event) {
    toucheEndX = event.changedTouches[0].screenX;

    if (touchStartX - toucheEndX > 50) {
        hide_mobile_menu()
    }
    
    if (toucheEndX - touchStartX > 100) {
        // show_mobile_menu()
    }
}
document.addEventListener("touchstart", handleToucheStart);
document.addEventListener("touchend", handleToucheEnd);



// JavaScript for Sliding Functionality - Proudact
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".category-btn");
    const products = document.querySelectorAll(".product-item");
    const slider = document.querySelector(".product-slider");
    const leftBtn = document.querySelector(".left-btn");
    const rightBtn = document.querySelector(".right-btn");

    let scrollAmount = 0;

    // Category Filtering
    buttons.forEach(button => {
        button.addEventListener("click", function() {
            const filter = this.getAttribute("data-category");

            buttons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            products.forEach(product => {
                if (product.classList.contains(filter)) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });
        });
    });

    // Product Slider Functionality
    leftBtn.addEventListener("click", function() {
        scrollAmount -= 300;
        if (scrollAmount < 0) scrollAmount = 0;
        slider.style.transform = `translateX(-${scrollAmount}px)`;
    });

    rightBtn.addEventListener("click", function() {
        scrollAmount += 300;
        if (scrollAmount > slider.scrollWidth - slider.clientWidth) {
            scrollAmount = slider.scrollWidth - slider.clientWidth;
        }
        slider.style.transform = `translateX(-${scrollAmount}px)`;
    });
});


document.addEventListener("DOMContentLoaded", function () {
    let firstCategoryButton = document.querySelector(".category-btn");
    if (firstCategoryButton) {
        firstCategoryButton.click(); // Automatically click the first category button
    }
});

// Set the default category 'DRESSES'
document.addEventListener("DOMContentLoaded", function() {
    let defaultCategory = "dresses"; // Set the default category slug
    let defaultButton = document.querySelector(`.category-btn[data-category="${defaultCategory}"]`);
    
    if (defaultButton) {
        defaultButton.classList.add("active");
        defaultButton.click(); // Simulate a click to load products of the default category
    }
})


// Click and Hover Effect Our Collections
document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".collection-item");

    function activateItem(item) {
        items.forEach(i => i.classList.remove("active"));
        item.classList.add("active");
    }

    function resetHoverEffect() {
        if (!document.querySelector(".collection-item.active")) {
            items.forEach(i => i.classList.remove("active"));
        }
    }

    items.forEach(item => {
        item.addEventListener("mouseenter", function () {
            activateItem(this);
        });

        item.addEventListener("mouseleave", function () {
            resetHoverEffect();
        });

        item.addEventListener("click", function () {
            activateItem(this);
        });
    });
});



// Footer scroll-to-top 
document.addEventListener("DOMContentLoaded", function () {
    let scrollToTopButton = document.getElementById("scrollToTop");

    if (!scrollToTopButton) return; // Stop if button is missing

    window.addEventListener("scroll", function () {
        if (window.scrollY > 200) {
            scrollToTopButton.style.display = "block"; // Show button
        } else {
            scrollToTopButton.style.display = "none"; // Hide button
        }
    });

    scrollToTopButton.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});