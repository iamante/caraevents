require("./bootstrap");

import $ from "jquery";
window.$ = window.jQuery = $;
global.$ = global.jQuery = require("jquery");

import "jquery-ui/ui/widgets/datepicker.js";
import "jquery-ui/ui/widgets/tabs.js";

/* $('.datepicker').datepicker({
    duration: "slow",
}); 
 */
$("#service-tabs").tabs();

$('[data-toggle="popover"]').popover();
$("#my-calendar").datepicker();

$("#far-eye").on("click", function() {
    const type =
        $("#password").attr("type") === "password" ? "text" : "password";
    $("#password").attr("type", type);
    this.classList.toggle("fa-eye-slash");
});

$(".inpFile").on("click", function() {
    $("#inpFile").trigger("click");
});

const inpFile = document.getElementById("inpFile");
const imageContainer = document.getElementById("imageContainer");
const imagePreview = document.querySelector(".imagePreview");

if (inpFile) {
    inpFile.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function() {
                imagePreview.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        }
    });
}

$(window).on("scroll", function() {
    if ($(this).scrollTop() > 100) {
        $("#scroll").fadeIn();
    } else {
        $("#scroll").fadeOut();
    }
});
$("#scroll").on("click", function() {
    $("html, body").animate({ scrollTop: 0 }, 1200);
    return false;
});
