/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/filter.js ***!
  \********************************/
var flag = 0;
var page = 2;
$(document).ready(function () {
  $(document).on('scroll', function () {
    var maxHeightPage = $(document).height() - $(window).height();
    var scrollPage = $(document).scrollTop();
    var totalPage = $('input[name="totalPage"]').val();
    var totalCurrenPage = $('.currentPage').length;
    if (totalPage == totalCurrenPage) {
      $(document).off('scroll');
    }
    if (scrollPage >= maxHeightPage * 2 / 3 && !flag) {
      flag = 1;
      getData(page);
      page++;
    }
  });
  $(document).on('click', '.btnFindByModel', function () {
    console.log($('input:checkbox:checked').length);
    if (!$('input:checkbox:checked').length) {
      $('#errorModalCenter strong').text('検索対象の車種を選択してください。');
      $('#errorModalCenter').modal('show');
    }
    if ($('input:checkbox:checked').length > 10) {
      $('#errorModalCenter strong').text('一度に10車種まで選択できます。');
      $('#errorModalCenter').modal('show');
    }
  });
  var requestParams = $('#requestParams').data('init');
  if (requestParams) {
    if (requestParams.type == 1) {
      $("#mt_kana_".concat(requestParams.no, "_").concat(requestParams.type)).addClass('active');
    }
    if (requestParams.type == 2) {
      $("#mt_name_".concat(requestParams.no, "_").concat(requestParams.type)).addClass('active');
    }
    if (requestParams.key) {
      $("#mt_display_".concat(requestParams.key)).addClass('active');
    }
  }
  $.each($('.makerSearch'), function (index, item) {
    var maker = $(item).data('init');
    if (maker.model_count == 0) {
      $(item).removeClass('enabled');
      $(item).addClass('disabled');
    }
  });
});
function getData(page) {
  // body...
  var url = '?page=' + page;
  if (location.search) {
    url = url + '&' + location.search.replace('?', '');
  }
  $.ajax({
    url: url,
    type: 'get',
    datatype: 'html'
  }).done(function (data) {
    $('.motorBikesList').append(data);
    flag = 0;
  }).fail(function (jqXHR, ajaxOptions, thrownError) {
    alert('No response from server');
  });
}
/******/ })()
;