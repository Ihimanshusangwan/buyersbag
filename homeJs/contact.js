document.querySelectorAll(".contact-btn").forEach((e) => {
    e.addEventListener("click", () => {
        document.getElementById("contact-form-body").style.display = "flex";
    });
});
document.getElementById("cancel-span").addEventListener("click", () => {
    document.getElementById("contact-form-body").style.display = "none";
});