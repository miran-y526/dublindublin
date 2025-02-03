(function ($) {

  var pcWindow = true;
  var spWindow = false;
  if ($(window).width() < 768) {
    pcWindow = false;
    spWindow = true;
  }



  /*
   * スムーススクロール
   */
  $(function () {
    $('a[href*="#"]').on("click", function () {
      var href = "#" + $(this).attr("href").split("#")[1];
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top - 32;
      if (spWindow) position = target.offset().top - $("#header").height();
      $('body,html').animate({ scrollTop: position }, 400, 'easeOutCubic');
      return false;
    });
  });

  /*
   * アコーディオン
   */
  $(function () {
    $(".faq-qa-area dt").on("click", function () {
      $(this).next().slideToggle();
    });
  });

  /*
    * Easing Function
    */
  jQuery.extend(jQuery.easing, {
    easeOutCubic: function (x, t, b, c, d) {
      return c * ((t = t / d - 1) * t * t + 1) + b;
    },
  });


}(jQuery));

