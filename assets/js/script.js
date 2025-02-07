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

  /*
 * お問い合わせページ
 */
  if ($("#contact")[0]) {

    // プライバシーポリシーに同意する機能
    var $protectWrap = $(".protect-wrap");
    $("#agree").on("change", function () {
      $(this).prop("checked") ? $protectWrap.hide() : $protectWrap.show();
    });

    // 郵便番号を入力すると住所を自動で取得する
    if ($('#input-postal-code')[0]) {
      var $inputPostalCode = $('#input-postal-code');
      var $inputAddress = $('#input-address');
      var prevInputVal = "";

      $inputPostalCode.on('keypress', function (e) {
        var inputKey = e.key;
        if (!inputKey.match("[0-9]")) e.preventDefault();
      });

      $inputPostalCode.on("keyup", function () {
        var inputVal = $(this).val();
        if (inputVal.length == 7) {
          if (prevInputVal == inputVal) return false;
          prevInputVal = inputVal;
          $.ajax({
            type: "GET",
            url: "https://zip-cloud.appspot.com/api/search?zipcode=" + inputVal,
            dataType: "jsonp",
            success: function (data) {
              if (data.results) {
                var results = data.results[0];
                var address = results["address1"] + results["address2"] + results["address3"];
                $inputAddress.val(address);
              } else {
                $inputAddress.val("該当の郵便番号が存在しません");
              }
            }
          });
        }
      });
    }

    // 留学期間、留学開始日を入力すると終了日を自動設定する
    if ($('#input-term-begin')[0] && $('#select-study-weeks')[0] && $('#input-term-end')[0]) {
      var $inputTermBegin = $('#input-term-begin');
      var $inputTermEnd = $('#input-term-end');
      var $selectStudyWeeks = $('#select-study-weeks');

      $inputTermBegin.on('keypress change', function () {
        if ($(this).val()) {
          var valueStudyWeeks = $selectStudyWeeks.val();
          var date = new Date($(this).val());
          date.setDate(date.getDate() + valueStudyWeeks * 7);
          var year = date.getFullYear();
          var month = ("0" + (date.getMonth() + 1)).slice(-2);
          var day = ("0" + date.getDate()).slice(-2);
          $inputTermEnd.val(year + "-" + month + "-" + day);
        }
      });

      $selectStudyWeeks.on('keypress change', function () {
        if ($inputTermBegin.val()) {
          var valueStudyWeeks = $(this).val();
          var date = new Date($inputTermBegin.val());
          date.setDate(date.getDate() + valueStudyWeeks * 7);
          var year = date.getFullYear();
          var month = ("0" + (date.getMonth() + 1)).slice(-2);
          var day = ("0" + date.getDate()).slice(-2);
          $inputTermEnd.val(year + "-" + month + "-" + day);
        }
      });
    }

    // 学校名を選択すると所属するレッスン内容と宿泊タイプを取得する
    var $selectSchoolName = $('#select-school-name');
    var $selectLesson = $('#select-lesson');
    var $selectAccommodation = $('#select-accommodation');

    function getLessonsAndAccommodations(schoolId) {
      $.ajax({
        type: "POST",
        url: ajaxUrl,
        data: {
          'action': 'get_lessons_and_accommodations',
          'school_id': schoolId
        },
        dataType: "json",
        success: function (data) {
          $selectLesson.find('option').remove();
          data['lesson'].forEach(function (value) {
            $selectLesson.append('<option value="' + value + '">' + value + '</option>');
          });
          $selectAccommodation.find('option').remove();
          data['accommodation'].forEach(function (value) {
            $selectAccommodation.append('<option value="' + value + '">' + value + '</option>');
          });
        },
      })
    }

    if ($selectSchoolName && $selectLesson && $selectAccommodation) {
      $selectSchoolName.on('change', function () {
        var schoolId = $(this).val();
        getLessonsAndAccommodations(schoolId);
      });
    }
  }


}(jQuery));

