document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.querySelector(".menu-toggle");
    const navLinks = document.querySelector(".nav-links");

    menuToggle.addEventListener("click", () => {
        navLinks.classList.toggle("active");
    });

    // Fade-in Animation on Scroll
    const categoryCards = document.querySelectorAll(".category-card");
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("fade-in");
                }
            });
        }, { threshold: 0.2 }
    );

    categoryCards.forEach((card) => observer.observe(card));

    // Form Submission Alert
    document.getElementById("knowledgeForm").addEventListener("submit", function(event) {
        event.preventDefault();
        alert("Your wisdom has been submitted successfully!");
    });
});