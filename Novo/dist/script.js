var versions = document.querySelectorAll(".liVersion");
var i;

versions.forEach(version => {
    version.addEventListener("click", function() {
    version.classList.toggle("caret-down");
    version.children[0].classList.toggle("active");
    console.log(version.children[0]);
    })
});
