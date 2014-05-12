$('#slider').crossSlide({
  fade: 1
}, [
  {
    src:  './images/slider1.jpg',
    alt:  'The Eighth Indian Conference on<br/>Vision Graphics and Image Processing',
    from: 'center right 1.2x',
    to:   'center left 1.2x',
    time: 9
  }, {
    src:  './images/slider2.jpg',
    alt:  '...now at <b>IIT Bombay</b>',
    from: '100% 80% 1x',
    to:   '80% 40% 1.5x',
    time: 9
  }, {
    src:  './images/slider3.jpg',
    alt:  'Rekhi Building',
    from: 'bottom left 1x',
    to:   'top left 1x',
    time: 9
  }, {
    src:  './images/slider4.jpg',
    alt:  'Victor Menezes Convention Centre',
    from: '100% 30% 1x',
    to:   '0% 80% 1.2x',
    time: 9
  }
], function(idx, img, idxOut, imgOut) {
  if (idxOut == undefined)
    $('div.caption').fadeIn().toggleClass('caption-right').toggleClass('caption-left').html(img.alt) //.animate({ opacity: 0.6 })
  else
    $('div.caption').fadeOut()
});