$(document).ready(function () {
  $('.partners-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          slidesToShow: 3
        }
      },
      {
        breakpoint: 512,
        settings: {
          arrows: false,
          slidesToShow: 2
        }
      },
      {
        breakpoint: 375,
        settings: {
          arrows: false,
          slidesToShow: 1
        }
      }
    ]
  });

  $('.popular-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 10000,
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          arrows: false,
          slidesToShow: 2
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          slidesToShow: 1
        }
      }
    ]
  });

  $('.latest-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          arrows: false,
          slidesToShow: 2
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          slidesToShow: 1
        }
      }
    ]
  });

  (function() {

    function addSeparator(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    function rangeInputChangeEventHandler(e){
        var rangeGroup = $(this).attr('name'),
            minBtn = $(this).parent().children('.min'),
            maxBtn = $(this).parent().children('.max'),
            range_min = $(this).parent().children('.range_min'),
            range_max = $(this).parent().children('.range_max'),
            minVal = parseInt($(minBtn).val()),
            maxVal = parseInt($(maxBtn).val()),
            origin = $(this).context.className;

        if(origin === 'min' && minVal > maxVal-5){
            $(minBtn).val(maxVal-5);
        }
        var minVal = parseInt($(minBtn).val());
        $(range_min).html(addSeparator(minVal*1000000));


        if(origin === 'max' && maxVal-5 < minVal){
            $(maxBtn).val(5+ minVal);
        }
        var maxVal = parseInt($(maxBtn).val());
        $(range_max).html(addSeparator(maxVal*1000000));
    }

    $('input[type="range"]').on( 'input', rangeInputChangeEventHandler);
  })();

  $('.lang-toggle').click(function () {
    $('.lang-items').toggleClass('in');
  });

  $('.menu_toggle').click(function (e) {
    e.preventDefault();
    $(this).find('.bar').toggleClass('open');
    const el = document.getElementById('navLinkBtn');
    if (el.classList.contains("btn")) {
      el.classList.remove("btn");
    } else {
      setTimeout(() => {
        el.classList.add("btn");
      }, 300);
    }
    $('#menu').slideToggle();
  });

  var map = L.map('map').setView([45.52875, -122.6632], 5);

  L.tileLayer('http://{s}.tile.cloudmade.com/API-key/997/256/{z}/{x}/{y}.png', {
    maxZoom: 16,
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>'
  }).addTo(map);

  var marker = L.marker([45.52875, -122.6632]).addTo(map);

  var polygon = L.polygon([
    [46.01, -130.01],
    [40.81, -128.76],
    [44.15, -133.23]
  ]).addTo(map);

  var popup = L.popup().setLatLng([45.52875, -122.6632]).setContent("I am a standalone popup.").openOn(map);

  function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
  }

  map.on('click', onMapClick);

  var popup = L.popup();

  function onMapClick(e) {
    popup.setLatLng(e.latlng).setContent("You clicked the map at " + e.latlng.toString()).openOn(map);
  }

  map.on('click', onMapClick);

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    data: [{
      type: "doughnut",
      startAngle: 60,
      innerRadius: 100,
      dataPoints: [
        { y: 50},
        { y: 25},
        { y: 25}
      ]
    }]
  });
  chart.render();
});

function showCharDetail(e, i) {
  const charDet = document.getElementById(e);
  const detButton = document.getElementById(i);
  if (charDet) {
    if (!charDet.classList.contains('d-none')) {
      charDet.classList.add('d-none')
      detButton.classList.remove('icon-down')
      detButton.classList.add('icon-up')
    } else {
      charDet.classList.remove('d-none')
      detButton.classList.add('icon-down')
      detButton.classList.remove('icon-up')
    }
    console.log(charDet);
  }
}