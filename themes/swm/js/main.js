// $(document).ready(function () {
//     console.log('msg');
//     (function () {
//         console.log('msg');
//         // $('.front_page_link_container').load('/footer.php footer', '', function(response, status, xhr) {
//         //     console.log('msg');
//         //     if (status == 'error') {
//         //         var msg = "Sorry but there was an error: ";
//         //         // $("footer").html(msg + xhr.status + " " + xhr.statusText);
//         //         console.log(msg);
//         //     }
//         // });
//   })(jQuery);
//  });

// jQuery(document).ready(function ($) {
//     // (function () {
//         console.log('test');
//     // })(jQuery);

//     $('.front_page_link_container').load('/footer.php footer', '', function(response, status, xhr) {
//                     console.log('msg');
//                     if (status == 'error') {
//                         var msg = "Sorry but there was an error: ";
//                         // $("footer").html(msg + xhr.status + " " + xhr.statusText);
//                         console.log(msg);
//                     }
//                 });

// });

jQuery(document).ready(function($) {
  //Search functionality for navigation
  $('.fa-search').click(function() {
    $('.search-field').slideToggle('slow');
  });

  // document.addEventListener(
  //     'wpcf7mailsent',
  //     function(event) {
  //         location = 'http://localhost:3000/lessons/startsWithMe/thank-you/';
  //     },
  //     false
  // );
});
