$(function() {

    $(".inpFile").on("click", function() {
        $("#inpFile").trigger('click');
    });


    const inpFile = document.getElementById("inpFile");
    const imageContainer = document.getElementById("imageContainer");
    const imagePreview = document.querySelector(".imagePreview");

    if(inpFile) {
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
});
    


