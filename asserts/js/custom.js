jQuery(window).load(function () {
    "use strict";
    jQuery("#status").fadeOut();
    jQuery("#preloader").delay(350).fadeOut("slow");
});

$(document).ready(function () {
    /* mail function */
    $('#em_sub').click(function () {
        var un = $('#uname').val();
        var em = $('#uemail').val();
        var meesg = $('#message').val();

        if ($("#hs_checkbox:checked").length == 1)
            var check = '1';
        else
            var check = '0';
        $.ajax({
            type: "POST",
            url: "ajaxmail.php",
            data: {
                'username': un,
                'useremail': em,
                'mesg': meesg,
                'check': check,
            },
            success: function (msg) {
                var full_msg = msg.split("#");
                if (full_msg[0] == '1')
                {
                    $('#uname').val("");
                    $('#uemail').val("");
                    $('#message').val("");
                    $('#err').html(full_msg[1]);
                } else
                {
                    $('#uname').val(un);
                    $('#uemail').val(em);
                    $('#message').val(meesg);
                    $('#err').html(full_msg[1]);
                }
            }
        });
    });

    /* mail function for appointment */
    $('#slider_book_apo').click(function () {
        var depart = $('#slider_select_dep').val();
        var book_apo_un = $('#slider_fname').val();
        var book_apo_ph = $('#slider_phone').val();
        var book_apo_em = $('#slider_email').val();
        var book_apo_date = $('#slider_date').val();

        $.ajax({
            type: "POST",
            url: "appointment.php",
            data: {
                'department': depart,
                'appointer_name': book_apo_un,
                'appointer_phone': book_apo_ph,
                'appointer_email': book_apo_em,
                'appointment_date': book_apo_date,
            },
            success: function (msg) {
                var full_msg = msg.split("#");
                if (full_msg[0] == '1')
                {
                    $('#slider_select_dep').val("");
                    $('#slider_fname').val("");
                    $('#slider_phone').val("");
                    $('#slider_email').val();
                    $('#slider_date').val();
                    $('#appointment_err').html(full_msg[1]);
                } else
                {
                    $('#slider_select_dep').val(depart);
                    $('#slider_fname').val(book_apo_un);
                    $('#slider_phone').val(book_apo_ph);
                    $('#slider_email').val(book_apo_em);
                    $('#slider_date').val(book_apo_date);
                    $('#appointment_err').html(full_msg[1]);
                }
            }
        });
    });

    // search box
    var searchPopup = $('.hs_search_box');
    searchPopup.isShowed = false;

    $('#hs_search').hover(function (event) {
        showSearchPopup();
    }, function (event) {
        hideSearchPopup();
    });

    function showSearchPopup()
    {
        searchPopup.stop(true, true);
        searchPopup.isShowed = true;
        searchPopup.slideDown('normal');
    }

    function hideSearchPopup()
    {
        var divHovered = '0';
        $('.hs_search_box').hover(function (event) {
            divHovered = '1';
            showSearchPopup();
        }, function (event) {
            searchPopup.stop(true, true);
            searchPopup.delay(200).slideUp('fast', function () {
                searchPopup.isShowed = false;
            });
        });

        if (divHovered == '0')
        {
            searchPopup.stop(true, true);
            searchPopup.delay(200).slideUp('fast', function () {
                searchPopup.isShowed = false;
            });
        }
    }


    //smooth scrolling
    $.smoothScroll();

    // single page
    $("#hc_single").single({
        speed: 1000
    });

    // fixed menu on scroll
    var hig = window.innerHeight - 130;
    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > hig) {
            $('.hc_fixed_header').addClass('fixed');
        } else {
            $('.hc_fixed_header').removeClass('fixed');
        }
    });


    var slider_h = window.innerHeight;
    $('.hc_onepage_slider .carousel-inner > .item img').css('height', slider_h);


    // main slider 
    $(function () {
        $('.carousel').carousel({
            interval: 3000,
            pause: "false"
        });
    });




    //accordion
    jQuery(function ($) {
        /* var $active = $('#accordion .panel-collapse.in').prev().addClass('active');
         $active.find('a').prepend('<i class="glyphicon glyphicon-minus"></i>');
         $('#accordion .panel-heading').not($active).find('a').prepend('<i class="glyphicon glyphicon-plus"></i>');
         $('#accordion').on('show.bs.collapse', function (e) {
         $('#accordion .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
         $(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
         }) */
        var selectIds = $('#panel1,#panel2,#panel3');
        $(function ($) {
            selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
            })
        });
    });


    //color change script
    $('.colorchange').click(function () {
        var color_name = $(this).attr('id');
        var new_style = 'css/color/' + color_name + '.css';
        $('#theme-color').attr('href', new_style);
    });

    $('.pattern_change').click(function () {
        var name = $(this).attr('id');
        var new_style = 'css/pattern/' + name + '.css';
        $('#theme-pattern').attr('href', new_style);
    });


    $("#style-switcher .bottom a.settings").click(function (e) {
        e.preventDefault();
        var div = $("#style-switcher");
        if (div.css("left") === "-160px") {
            $("#style-switcher").animate({
                left: "0px"
            });
        } else {
            $("#style-switcher").animate({
                left: "-160px"
            });
        }
    });

    // setting gear
    $('.settings').hover(
            function () {
                $(this).children('i').addClass("fa-spin");
            },
            function () {
                $(this).children('i').removeClass("fa-spin");
            }
    );



    //sub of sub menu right icon
    $('.hs_menu li > ul > li').hover(function () {
        $(this).children('ul').children('li:first-child').addClass('fa fa-chevron-right');
    });

    /* Portfolio */
    if ($.fn.mixitup) {
        $('#grid').mixitup({
            filterSelector: '.filter-item'
        });
        $(".filter-item").click(function (e) {
            e.preventDefault();
        })
    }


    // portfolio detail show hide
    $('.portfolio-item').hover(function () {
        $(this).children('.portfolio-details').slideToggle();
    });
    $('.portfolio-item').hover(function () {
        $(this).children('.portfolio-details2').slideToggle();
    });


    //sidebar categories
    $('.hs_sidebar_categories ul li').click(function () {
        $(this).children('ul').slideToggle(500);
    });


    //sidebar latest post	  
    $('.hs_post_tab > ul').each(function () {
        // For each set of tabs, we want to keep track of
        // which tab is active and it's associated content
        var $active, $content, $links = $(this).find('a');

        // If the location.hash matches one of the links, use that as the active tab.
        // If no match is found, use the first link as the initial active tab.
        $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
        $active.addClass('active');

        $content = $($active[0].hash);

        // Hide the remaining content
        $links.not($active).each(function () {
            $(this.hash).hide();
        });

        // Bind the click event handler
        $(this).on('click', 'a', function (e) {
            // Make the old tab inactive.
            $active.removeClass('active');
            $content.hide();

            // Update the variables with the new link and content
            $active = $(this);
            $content = $(this.hash);

            // Make the tab active.
            $active.addClass('active');
            $content.fadeIn(500);

            // Prevent the anchor's default click action
            e.preventDefault();
        });
    });





    //Up Coming Events slider  
    var owl = $("#up_coming_events_slider");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 1],
            [600, 2],
            [700, 3],
            [1000, 3],
            [1200, 3],
            [1400, 3],
            [1600, 3]
        ],
        navigation: false,
        autoPlay: true
    });
// Custom Navigation Events
    $(".up_coming_events > .customNavigation > .next").click(function () {
        owl.trigger('owl.next');
    })
    $(".up_coming_events > .customNavigation > .prev").click(function () {
        owl.trigger('owl.prev');
    })


    //Happy Patients testimonial
    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager',
        mode: 'vertical',
        slideMargin: 3,
        auto: true,
        autoDirection: 'back',
        controls: false,
    });

    //Happy Patients testimonial
    $('.testimonial_slider').bxSlider({
        pagerCustom: '#bx-pager',
        mode: 'vertical',
        slideMargin: 0,
        auto: true,
        autoDirection: 'back',
        controls: false,
    });




});



$(document).ready(function () {
    //Our Doctor Team slider
    var owl = $("#our_doctor_team_slider");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 1],
            [600, 2],
            [700, 3],
            [1000, 3],
            [1200, 3],
            [1400, 3],
            [1600, 3]
        ],
        navigation: false,
        autoPlay: true
    });
// Custom Navigation Events
    $(".our_doctor_team > .customNavigation > .next").click(function () {
        owl.trigger('owl.next');
    })
    $(".our_doctor_team > .customNavigation > .prev").click(function () {
        owl.trigger('owl.prev');
    })
});

$(document).ready(function () {
    //Meet Our Partners slider
    var owl = $("#our_partners_slider");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 2],
            [600, 3],
            [700, 4],
            [1000, 4],
            [1200, 4],
            [1400, 4],
            [1600, 4]
        ],
        navigation: false,
        autoPlay: true
    });
// Custom Navigation Events
    $(".our_partners > .customNavigation > .next").click(function () {
        owl.trigger('owl.next');
    })
    $(".our_partners > .customNavigation > .prev").click(function () {
        owl.trigger('owl.prev');
    })
});


$(document).ready(function () {
    //Health Care Team slider
    var owl = $("#health_care_team_slider");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 2],
            [600, 2],
            [700, 3],
            [1000, 4],
            [1200, 4],
            [1400, 4],
            [1600, 4]
        ],
        navigation: false,
        autoPlay: true
    });
// Custom Navigation Events
    $(".our_doctor_team > .customNavigation > .next").click(function () {
        owl.trigger('owl.next');
    })
    $(".our_doctor_team > .customNavigation > .prev").click(function () {
        owl.trigger('owl.prev');
    })
});


$(document).ready(function () {
    //Releted Post slider
    var owl = $("#releted_post_slider");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 1],
            [600, 2],
            [700, 3],
            [1000, 3],
            [1200, 3],
            [1400, 3],
            [1600, 3]
        ],
        navigation: false,
        autoPlay: true
    });
// Custom Navigation Events
    $(".releted_post > .customNavigation > .next").click(function () {
        owl.trigger('owl.next');
    })
    $(".releted_post > .customNavigation > .prev").click(function () {
        owl.trigger('owl.prev');
    })
});



$(document).ready(function () {
    //Post by slider
    var owl = $("#post_by_slider");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 1],
            [600, 2],
            [700, 3],
            [1000, 4],
            [1200, 4],
            [1400, 4],
            [1600, 4]
        ],
        navigation: false,
        autoPlay: true
    });
// Custom Navigation Events
    $(".post_by > .customNavigation > .next").click(function () {
        owl.trigger('owl.next');
    })
    $(".post_by > .customNavigation > .prev").click(function () {
        owl.trigger('owl.prev');
    })
});


$(document).ready(function () {
    //Patients Testimonials slider
    var owl = $("#patients_testimonials_slider");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 2],
            [1000, 2],
            [1200, 2],
            [1400, 2],
            [1600, 2]
        ],
        navigation: false,
        autoPlay: true
    });
// Custom Navigation Events
    $(".patients_testimonials > .customNavigation > .next").click(function () {
        owl.trigger('owl.next');
    })
    $(".patients_testimonials > .customNavigation > .prev").click(function () {
        owl.trigger('owl.prev');
    })
});