$(document).ready(function () {
    $("#accordian a").click(function () {
        var link = $(this);
        var closest_ul = link.closest("ul");
        var parallel_active_links = closest_ul.find(".active")
        var closest_li = link.closest("li");
        var link_status = closest_li.hasClass("active");
        var count = 0;

        closest_ul.find("ul").slideUp(function () {
            if (++count == closest_ul.find("ul").length) {
                parallel_active_links.removeClass("active");
                parallel_active_links.children("ul").removeClass("show-dropdown");
            }
        });

        if (!link_status) {
            closest_li.children("ul").slideDown().addClass("show-dropdown");
            closest_li.parent().parent("li.active").find('ul').find("li.active").removeClass("active");
            link.parent().addClass("active");
        }
    });

    $(".accordion__title").on("click", function(e) {
		e.preventDefault();
		var $this = $(this);

		if (!$this.hasClass("accordion-active")) {
            $this.addClass("accordion-active");
            $this.next().slideDown();
            e.currentTarget.children[0].innerText = '-'
            $('.accordion__arrow',this).addClass('accordion__rotate');
        } else {
			$(".accordion__content").slideUp(400);
			$(".accordion__title").removeClass("accordion-active");
			$('.accordion__arrow').removeClass('accordion__rotate');
			e.currentTarget.children[0].innerText = '+'
        }

	});

    const goodDayBar = document.getElementsByClassName('main-title__progress-bar')[0];
    const goodDay = document.getElementById('goodDay');

    if(goodDay) {
        goodDayBar.style.width = '0%';
        
        setTimeout(initGoodDay, 1000);
    
        function initGoodDay() {
            let width = 0;
            let goodDayIn = setInterval(animateGoodDay, 15);
            function animateGoodDay() {
                if(width > 100) {
                    clearInterval(goodDayIn);
                    goodDay.style.display = 'none';
                } else {
                    goodDayBar.style.width = width + '%';
                    width++;
                }
            }
        }
    }
});

// --------for-active-class-on-other-page-----------
jQuery(document).ready(function ($) {
    // Get current path and find target link
    var path = window.location.pathname.split("/").pop();

    // Account for home page with empty path
    if (path == '') {
        path = 'index.html';
    }

    var target = $('#accordian li a[href="' + path + '"]');
    // Add active class to target link
    target.parents("li").addClass('active');
    target.parents("ul").addClass("show-dropdown");
});

function Tabs() {
    let bindAll = function() {
      let menuElements = document.querySelectorAll('[data-tab]');
      for(let i = 0; i < menuElements.length ; i++) {
        menuElements[i].addEventListener('click', change, false);
      }
    }
  
    let clear = function() {
      let menuElements = document.querySelectorAll('[data-tab]');
      for(let i = 0; i < menuElements.length ; i++) {
        menuElements[i].classList.remove('active');
        let id = menuElements[i].getAttribute('data-tab');
        document.getElementById(id).classList.remove('active');
      }
    }
  
    let change = function(e) {
      clear();
      e.target.classList.add('active');
      let id = e.currentTarget.getAttribute('data-tab');
      document.getElementById(id).classList.add('active');
      e.preventDefault();
    }
  
    bindAll();
}
  
let connectTabs = new Tabs();

function hideDiv() {
    reportDiv = document.getElementById('reports-card-block');
    crtBtn = document.getElementById('crt-rep');
    if (reportDiv.classList.contains('d-none')) {
        reportDiv.classList.remove('d-none')
        crtBtn.classList.remove('arr-up')
    } else {
        crtBtn.classList.add('arr-up')
        reportDiv.classList.add('d-none')
    }
}

function hideboTable() {
    reportDiv = document.getElementById('booster-view');
    crtBtn = document.getElementById('booster-descriptions');
    if (reportDiv.classList.contains('clicked')) {
        reportDiv.classList.remove('clicked')
        crtBtn.classList.remove('d-none')
    } else {
        crtBtn.classList.add('d-none')
        reportDiv.classList.add('clicked')
    }
}

function callInput() {
    imageInput = document.getElementById('imageInput');
    if (imageInput) {
        imageInput.click();
    }
}

function callNewInput() {
    imageNewInput = document.getElementById('imageNewInput');
    if (imageNewInput) {
        imageNewInput.click();
    }
}


var map = L.map('map').setView([45.52875, -122.6632], 5);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  maxZoom: 16,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox/streets-v11',
  tileSize: 512,
  zoomOffset: -1
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
