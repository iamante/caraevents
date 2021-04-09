$(function() {
    $('.selectpicker').selectpicker();
     $.fn.selectpicker.Constructor.BootstrapVersion = '4';

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

    var loc = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace('venue'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // identify: function(obj) { 
        //     console.log(obj)
        //     return obj.location; 
        // },
        // local: loc
        // prefetch: '../location.json',
        remote: {
            url: '../location.json?query=%QUERY',
            wildcard: '%QUERY',
            transform: function(response) {
                return $.map(response, function (profile) {
                    return {
                        location: profile.location,
                        venue: profile.venue,
                        image: profile.image
                    }
                });
            },
        }
    });

    loc.initialize();

    $('.typehead').on('click', function(){
        $('.tt-suggestion')
    });

    $('#default-suggestions .typeahead').typeahead({
        minLength: 0,
        highlight: true,
        hint: true,
        },
        {
        name: 'locations',
        display: function(data){
            return data.location + ' - ' + data.venue;
        },
        source: loc.ttAdapter(),

        templates: {
            header: '<p class="league-name mb-1 py-2">Caraevents Suggested Venue</p>',
            suggestion: Handlebars.compile('<div class="d-flex"><img src="/storage/{{image}}" width="70"><div class="pl-2"><p><strong>{{location}}</strong></p><p><i class="fas fa-map-marker-alt pr-1"></i>{{venue}}</p></div></div>')
        },
        limit: 'Infinity'
        }
        );
    
    
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

    $(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1200);
			return false;
		});
});
