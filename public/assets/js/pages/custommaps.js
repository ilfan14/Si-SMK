$(function () {
    $(".gmap").css("height", "320px"),new GMaps({
        div: "#gmap-terrain",
        lat: 0,
        lng: 0,
        zoom: 1,
        scrollwheel: !1
    }).setMapTypeId(google.maps.MapTypeId.TERRAIN), new GMaps({
        div: "#gmap-satellite",
        lat: -37.8136,
        lng:  144.9631,
        zoom: 12,
        scrollwheel: !1
    }).setMapTypeId(google.maps.MapTypeId.SATELLITE), new GMaps({
        div: "#gmap-markers",
        lat: -12.043333,
        lng: -77.028333,
        zoom: 10,
        scrollwheel: !1
    }).addMarkers([{
        lat: -12.043333,
        lng: -77.028333,
        title: "Marker #1",
        animation: google.maps.Animation.DROP,
        infoWindow: {
            content: "<strong>Marker #1: HTML Content</strong>"
        }
    }, {
        lat: -12.000000,
        lng: -77.000000,
        title: "Marker #2",
        animation: google.maps.Animation.DROP,
        infoWindow: {
            content: "<strong>Marker #2: HTML Content</strong>"
        }
    }, {
        lat: -20,
        lng: 85,
        title: "Marker #3",
        animation: google.maps.Animation.DROP,
        infoWindow: {
            content: "<strong>Marker #3: HTML Content</strong>"
        }
    }, {
        lat: -20,
        lng: -110,
        title: "Marker #4",
        animation: google.maps.Animation.DROP,
        infoWindow: {
            content: "<strong>Marker #4: HTML Content</strong>"
        }
    }]), $(".gmap").css("height", "320px"), new GMaps.createPanorama({
        el: "#gmap-street",
        lat: 50.059139,
        lng: -122.958407,
        pov: {
            heading: 300,
            pitch: 5
        },
        scrollwheel: !1
    });
    $(".gmap").css("height", "320px"), new GMaps({
        div: "#gmap-top",
        lat: -33.865,
        lng: 151.2,
        zoom: 15,
        disableDefaultUI: !0,
        scrollwheel: !1
    });
    var map = new GMaps({
        div: "#gmap-styled",
        lat: 41.895465,
        lng: 12.482324,
        zoom: 5,
        zoomControl : true,
        zoomControlOpt: {
            style : "SMALL",
            position: "TOP_LEFT"
        },
        panControl : true,
        streetViewControl : false,
        mapTypeControl: false,
        overviewMapControl: false
    });
    var styles = [
        {
            stylers: [
                { hue: "#00ffe6" },
                { saturation: -20 }
            ]
        }, {
            featureType: "road",
            elementType: "geometry",
            stylers: [
                { lightness: 100 },
                { visibility: "simplified" }
            ]
        }, {
            featureType: "road",
            elementType: "labels",
            stylers: [
                { visibility: "off" }
            ]
        }
    ];
    map.addStyle({
        styles: styles,
        mapTypeId: "maps_style"
    });

    map.setStyle("maps_style");

    map = new GMaps({
        el: '#gmap-types',
        lat: -12.043333,
        lng: -77.028333,
        maxZoom: 12,
        mapTypeControlOptions: {
            mapTypeIds : ["hybrid", "roadmap", "satellite", "terrain", "osm", "cloudmade"]
        }
    });
    map.addMapType("osm", {
        getTileUrl: function(coord, zoom) {
            return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
        },
        tileSize: new google.maps.Size(256, 256),
        name: "OpenStreetMap",
        maxZoom: 18
    });
    map.addMapType("cloudmade", {
        getTileUrl: function(coord, zoom) {
            return "http://b.tile.cloudmade.com/8ee2a50541944fb9bcedded5165f09d9/1/256/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
        },
        tileSize: new google.maps.Size(256, 256),
        name: "CloudMade",
        maxZoom: 18
    });
    map.setMapTypeId("osm");
});