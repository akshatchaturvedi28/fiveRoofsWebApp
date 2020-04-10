
// TESTIMONIALS SCRIPT 

   jQuery(document).ready(function($) {
            "use strict";
            //  TESTIMONIALS CAROUSEL HOOK
              $('#customers-testimonials').owlCarousel({
                  loop: true,
                  center: true,
                  items: 6,
                  margin: 0,
                  autoplay: true,
                  dots:true,
                  autoplayTimeout: 1200,
                  smartSpeed: 1200,
                  responsive: {
                    0: {
                      items: 1
                    },
                    480:{
                          items: 1
                        },
                    768: {
                      items: 1
                    },
                    1170: {
                      items: 3
                    }
                  }
              });
         });