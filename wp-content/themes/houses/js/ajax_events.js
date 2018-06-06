// jQuery(document).ready(function($) {
//   var max_num_pages = +$('#max_num_pages').text();
//   var events_page = 1;
//   if ( events_page >= max_num_pages ) {
//     $('#loadmore-events').hide();
//     $('#ajax-content').css('padding-bottom','80px');
//   }
//   $('#loadmore-events').click(function() {
//     $.ajax({
//       type: "POST",
//       url: ajaxevents.ajaxurl,
//       data: {
//         'action': 'ajax_get_events',
//         'page': events_page
//       },
//       success:function(data) {
//         if (data) {
//           events_page +=1;
//           $('#ajax-content').append(data);
//           if ( events_page >= max_num_pages ) {
//             $('#loadmore-events').hide();
//             $('#ajax-content').css('padding-bottom','80px');
//           }
//         }
//       }
//     });
//     return false;
//   });
// });


jQuery(function ($) {
  $('#true_loadmore').click(function () {
    $(this).text('LOADING'); // изменяем текст кнопки, вы также можете добавить прелоадер
    var data = {
      'action': 'loadmore',
      'query': true_posts,
      'page': current_page
    };
    $.ajax({
      url: ajaxurl, // обработчик
      data: data, // данные
      type: 'POST', // тип запроса
      success: function (data) {
        if (data) {
          $('#true_loadmore').text('LOAD MORE').before(data); // вставляем новые посты
          current_page++; // увеличиваем номер страницы на единицу
          if (current_page == max_pages) $("#true_loadmore").remove(); // если последняя страница, удаляем кнопку
        } else {
          $('#true_loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
        }
      }
    });
  });
});