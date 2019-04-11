window.onload = start;

function start() {
    const losen = document.querySelector("#password");
    const ulosen = document.querySelector("#rpassword");

    losen.addEventListener("change", valideraLosen);
    ulosen.addEventListener("keyup", valideraLosen);

    function valideraLosen() {
        if (losen.value != ulosen.value) {
            ulosen.setCustomValidity("Lösenorden stämmer inte överens!");
        } else {
            ulosen.setCustomValidity("");
        }
    }
}