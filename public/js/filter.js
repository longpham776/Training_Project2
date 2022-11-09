/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/filter.js ***!
  \********************************/
var flag = 0;
var page = 2;
var requestParams = $('#requestParams').data('init');
var motoCategory = $('#motoCategory').data('init');
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
    if (!$('input:checkbox:checked').length) {
      $('#errorModalCenter strong').text('検索対象の車種を選択してください。');
      $('#errorModalCenter').modal('show');
    }
    if ($('input:checkbox:checked').length > 10) {
      $('#errorModalCenter strong').text('一度に10車種まで選択できます。');
      $('#errorModalCenter').modal('show');
    }
    if ($('input:checkbox:checked').length > 0 && $('input:checkbox:checked').length < 10) {
      var url = {
        'mmc': '',
        'moc': ''
      };
      $.each($('input:checkbox:checked'), function (index, item) {
        var maker_model = $(item).data('init');
        url.mmc = url.mmc + maker_model.maker + '_';
        url.moc = url.moc + maker_model.model + '_';
      });
      url.mmc = url.mmc.replace(/^_+|_+$/g, '');
      url.moc = url.moc.replace(/^_+|_+$/g, '');
      $(this).parents('a').attr('href', 'area.html/?' + $.param(url));
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