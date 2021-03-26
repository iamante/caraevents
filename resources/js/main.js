$(function() {
    $('.fancybox').attr('rel', 'gallery').fancybox({
        helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(0, 0, 0, 0.9)'
                }
            }
        },
        padding: 0,
        margin: 0,
        openEffect	: 'none',
    	closeEffect	: 'none',
        nextClick: true,
        scrollOutside: false,
        autoResize: true,
        scrolling: 'no',
        arrows: true,
    });

    $(".slick-testimonial").slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
                },
            ]
        });

    // function onSubmit(token) {
    //     document.getElementById("demo-form").submit();
    // }

    var cars = ['Castillo Royale Ortigas Events Venue - Ortigas Ave Ext, Taytay, Rizal', 'Marias Events Place - 14 Neptune, Taytay, 1920 Rizal', 'Casa Bella Events Place - 14 Neptune, Taytay, 1920 Rizal', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen'];

    var cars = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: cars
    });

    function carsDefault(q, sync) {
        if (q === '') {
            sync(cars.get('Castillo Royale Ortigas Events Venue - Ortigas Ave Ext, Taytay, Rizal', 'Marias Events Place - 14 Neptune, Taytay, 1920 Rizal', 'Casa Bella Events Place - 14 Neptune, Taytay, 1920 Rizal', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen'));
        }

        else {
            cars.search(q, sync);
        }
    }

    $('.typehead').on('click', function(){
        $('.tt-suggestion')
    });

    // Default Select
    $('#default-suggestions .typeahead').typeahead({
        minLength: 0,
        highlight: true,
        hint: true,
        },
        {
        name: 'cars',
        source: carsDefault,
        templates: {
            header: '<p class="league-name mb-1 py-2">Caraevents Suggested Venue</p>',
                suggestion: function(data){
                    return '<div>' + data + '</div>';
                }
        },
        limit: 'Infinity'
        });
    
    
    const currentLocation = location.href;
    const menuItem = $(".nav-link");
    const menuLength = menuItem.length;

    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].id = "current";
        }
    }

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
});
