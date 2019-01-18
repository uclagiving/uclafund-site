$(document).ready(function () {

    var markers = [];

    var mapboxAccessToken = 'pk.eyJ1IjoiYnJ5Y2UtcHVzaGVyIiwiYSI6IjdiNGQzYjIxNzVhZGJiZmY5NWQzY2I2MWViYjk5ODg0In0.ku00TwEGDlaIwOYBNIDnIg';

    $("#cal-tab").on('click', function(){

    });

    var calSouthWest = L.latLng(32.258685, -123.640137),
    calNorthEast = L.latLng(42.048273, -110.170898),
    calBounds = L.latLngBounds(calSouthWest, calNorthEast);

    var usSouthWest = L.latLng(15.812074, -166.684570),
    usNorthEast = L.latLng(56.230375, -60.424805),
    usBounds = L.latLngBounds(usSouthWest, usNorthEast);

    
    

    
    

    var oosMap = {};
    var worldMap = {};

    $("#oos-tab").on('click', function(){

        if ($.isEmptyObject(oosMap)){

            //give some time for the visibility to change
            setTimeout(function(){ 


                //init Out of State Map 
                oosMap = L.map('oos-map', {maxBounds: usBounds, minZoom: '4'}).setView([38.40087286420115, -99.404296875], 4);
                oosMap.scrollWheelZoom.disable();
                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + mapboxAccessToken, {
                    id: 'bryce-pusher.e521ef0d',
                    attribution: ''
                }).addTo(oosMap);

                var geojsonStates = L.geoJson(statesData, {
                    style: statesStyle
                }).addTo(oosMap).on('dblclick', function(ev) {
                    oosMap._fireDOMEvent(oosMap, ev.originalEvent, 'dblclick');
                });

                us_markers.addTo(oosMap);



                // helper - dev only
                // oosMap.on('click', function(e) {
                //     alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
                // }); 

            }, 100);
        };      
    });

    $("#world-tab").on('click', function(){

        //give some time for the visibility to change
        setTimeout(function(){ 

            if ($.isEmptyObject(worldMap)){

                //init Out of State Map 
                worldMap = L.map('world-map').setView([35.991340960635405, -4.04296875], 2);
                worldMap.scrollWheelZoom.disable();
                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + mapboxAccessToken, {
                    id: 'bryce-pusher.e521ef0d',
                    attribution: ''
                }).addTo(worldMap);

                var geojsonWorld = L.geoJson(worldData, {
                    style: worldStyle
                }).addTo(worldMap).on('dblclick', function(ev) {
                    worldMap._fireDOMEvent(worldMap, ev.originalEvent, 'dblclick');
                });

                world_markers.addTo(worldMap);

            }  


        }, 100);

    });

    // init Cal Map
    var calMap = L.map('cal-map', {maxBounds: calBounds, minZoom: '5'}).setView([37.579412513438385, -118.740234375], 6);
    calMap.scrollWheelZoom.disable();
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + mapboxAccessToken, {
        id: 'bryce-pusher.e521ef0d',
        attribution: ''
    }).addTo(calMap);

    var geojsonCal = L.geoJson(statesData, {
        style: calStyle
    }).addTo(calMap).on('dblclick', function(ev) {
      calMap._fireDOMEvent(calMap, ev.originalEvent, 'dblclick');
    });

    //helper functions
    function calColor(n) {
        return n === 'California' ? '#3284bf' : '#eee';
    }
    function statesColor(n) {
        return n === 'California' ? '#eee' : '#3284bf';
    }
    function worldColor(n) {
        return n === 'California' ? '#eee' : '#3284bf';
    }
    function calStyle(feature) {
        return {
            fillColor: calColor(feature.properties.name),
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.9
        };
    }
    function statesStyle(feature) {
        return {
            fillColor: statesColor(feature.properties.name),
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.9
        };
    }

    function worldStyle(feature) {
        return {
            fillColor: worldColor(feature.properties.name),
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.9
        };
    }

    //custom icon
    var uclaIcon = L.icon({
        iconUrl: 'img/ucla-pin.png',

        iconSize:     [33, 52], // size of the icon
        iconAnchor:   [17, 52], // point of the icon which will correspond to marker's location
        popupAnchor:  [0, -30] // point from which the popup should open relative to the iconAnchor
    });

    var m_san_diego_co_content      = "<h4 class='popup-title'>San Diego County</h4><p class='popup-gifts'>Gifts: <span>1,536</span></p><p class='popup-total'>Total Raised: <span>$872,446</span></p>", 
        m_dt_la_content             = "<h4 class='popup-title'>Downtown Los Angeles</h4><p class='popup-gifts'>Gifts: <span>2,054</span></p><p class='popup-total'>Total Raised: <span>$1,267,286</span></p>",
        m_santa_barbara_content     = "<h4 class='popup-title'>Santa Barbara</h4><p class='popup-gifts'>Gifts: <span>260</span></p><p class='popup-total'>Total Raised: <span>$142,226</span></p>",
        m_n_sm_bay_content          = "<h4 class='popup-title'>North Santa Monica Bay</h4><p class='popup-gifts'>Gifts: <span>2,008</span></p><p class='popup-total'>Total Raised: <span>$1,618,233</span></p>",
        m_west_la_content           = "<h4 class='popup-title'>West Los Angeles</h4><p class='popup-gifts'>Gifts: <span>5,130</span></p><p class='popup-total'>Total Raised: <span>$4,013,707</span></p>",
        m_orange_co_content         = "<h4 class='popup-title'>Orange County</h4><p class='popup-gifts'>Gifts: <span>3,750</span></p><p class='popup-total'>Total Raised: <span>$1,070,636</span></p>",
        m_south_bay_content         = "<h4 class='popup-title'>South Bay</h4><p class='popup-gifts'>Gifts: <span>3,477</span></p><p class='popup-total'>Total Raised: <span>$1,155,137</span></p>",        
        m_san_gabriel_vally_content = "<h4 class='popup-title'>San Gabriel Valley</h4><p class='popup-gifts'>Gifts: <span>3,759</span></p><p class='popup-total'>Total Raised: <span>$896,611</span></p>",
        m_sfv_ventura_content       = "<h4 class='popup-title'>SFV/Ventura</h4><p class='popup-gifts'>Gifts: <span>4,780</span></p><p class='popup-total'>Total Raised: <span>$1,784,283</span></p>",
        m_nor_cal_content           = "<h4 class='popup-title'>Northern California</h4><p class='popup-gifts'>Gifts: <span>6,389</span></p><p class='popup-total'>Total Raised: <span>$2,171,546</span></p>", 
        
                
        m_region_1_content          = "<h4 class='popup-title'>Northeast</h4><p class='popup-gifts'>Gifts: <span>1,676</span></p><p class='popup-total'>Total Raised: <span>$1,756,981</span></p>",
        m_region_2_content          = "<h4 class='popup-title'>Midwest</h4><p class='popup-gifts'>Gifts: <span>1,012</span></p><p class='popup-total'>Total Raised: <span>$931,676</span></p>",
        m_region_3_content          = "<h4 class='popup-title'>South</h4><p class='popup-gifts'>Gifts: <span>2,139</span></p><p class='popup-total'>Total Raised: <span>$984,939</span></p>",
        m_region_4_content          = "<h4 class='popup-title'>West (excluding California)</h4><p class='popup-gifts'>Gifts: <span>2,238</span></p><p class='popup-total'>Total Raised: <span>$615,006</span></p>",
        
        m_asia_content              = "<h4 class='popup-title'>Asia</h4><p class='popup-gifts'>Gifts: <span>147</span></p><p class='popup-total'>Total Raised: <span>$123,725</span></p>",
        m_australia_content         = "<h4 class='popup-title'>Australia</h4><p class='popup-gifts'>Gifts: <span>11</span></p><p class='popup-total'>Total Raised: <span>$2,320</span></p>",
        m_brazil_content            = "<h4 class='popup-title'>Brazil</h4><p class='popup-gifts'>Gifts: <span>5</span></p><p class='popup-total'>Total Raised: <span>$960</span></p>",
        m_canada_content            = "<h4 class='popup-title'>Canada</h4><p class='popup-gifts'>Gifts: <span>10</span></p><p class='popup-total'>Total Raised: <span>$5,105</span></p>",
        m_chile_content             = "<h4 class='popup-title'>Chile</h4><p class='popup-gifts'>Gifts: <span>27</span></p><p class='popup-total'>Total Raised: <span>$3,265</span></p>",
        m_europe_content            = "<h4 class='popup-title'>Europe</h4><p class='popup-gifts'>Gifts: <span>111</span></p><p class='popup-total'>Total Raised: <span>$73,104</span></p>",
        m_guatemala_content         = "<h4 class='popup-title'>Guatemala</h4><p class='popup-gifts'>Gifts: <span>1</span></p><p class='popup-total'>Total Raised: <span>$50</span></p>",
        m_mexico_content            = "<h4 class='popup-title'>Mexico</h4><p class='popup-gifts'>Gifts: <span>10</span></p><p class='popup-total'>Total Raised: <span>$2,680</span></p>",
        m_new_zealand_content       = "<h4 class='popup-title'>New Zealand</h4><p class='popup-gifts'>Gifts: <span>2</span></p><p class='popup-total'>Total Raised: <span>$200</span></p>",
        m_nigeria_content           = "<h4 class='popup-title'>Nigeria</h4><p class='popup-gifts'>Gifts: <span>1</span></p><p class='popup-total'>Total Raised: <span>$50</span></p>"
        
    ;

    // markers
    var m_san_diego_co        = L.marker([32.71913249723243, -117.0977783203125], {icon: uclaIcon}).bindPopup(m_san_diego_co_content).on('mouseover popupopen', function (e) {
            $(".table-row.sdc").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.sdc").css("background-color", "transparent");
        }),
        m_dt_la               = L.marker([34.05322832125499, -118.23915481567381], {icon: uclaIcon}).bindPopup(m_dt_la_content).on('mouseover popupopen', function (e) {
            $(".table-row.dla").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.dla").css("background-color", "transparent");
        }),
        m_santa_barbara       = L.marker([34.4131410750013, -119.69123840332031], {icon: uclaIcon}).bindPopup(m_santa_barbara_content).on('mouseover popupopen', function (e) {
            $(".table-row.sb").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.sb").css("background-color", "transparent");
        }),
        m_n_sm_bay            = L.marker([34.03985816485562, -118.52874755859376], {icon: uclaIcon}).bindPopup(m_n_sm_bay_content).on('mouseover popupopen', function (e) {
            $(".table-row.nsmb").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.nsmb").css("background-color", "transparent");
        }),
        m_west_la             = L.marker([34.03445260967645, -118.43467712402345], {icon: uclaIcon}).bindPopup(m_west_la_content).on('mouseover popupopen', function (e) {
            $(".table-row.wla").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.wla").css("background-color", "transparent");
        }),
        m_orange_co           = L.marker([33.74147082163694, -117.83523559570312], {icon: uclaIcon}).bindPopup(m_orange_co_content).on('mouseover popupopen', function (e) {
            $(".table-row.oc").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.oc").css("background-color", "transparent");
        }),
        m_south_bay           = L.marker([33.894491, -118.389015], {icon: uclaIcon}).bindPopup(m_south_bay_content).on('mouseover popupopen', function (e) {
            $(".table-row.southbay").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.southbay").css("background-color", "transparent");
        }),
        m_san_gabriel_vally   = L.marker([34.098159345215535, -118.15109252929686], {icon: uclaIcon}).bindPopup(m_san_gabriel_vally_content).on('mouseover popupopen', function (e) {
            $(".table-row.sgv").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.sgv").css("background-color", "transparent");
        }),
        m_sfv_ventura         = L.marker([34.28331856338139, -118.80477905273436], {icon: uclaIcon}).bindPopup(m_sfv_ventura_content).on('mouseover popupopen', function (e) {
            $(".table-row.sfvv").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.sfvv").css("background-color", "transparent");
        }),
        m_nor_cal             = L.marker([38.788345355085625, -121.39892578125], {icon: uclaIcon}).bindPopup(m_nor_cal_content).on('mouseover popupopen', function (e) {
            $(".table-row.norcal").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.norcal").css("background-color", "transparent");
        }),
        
        
        m_region1           = L.marker([42.697577, -72.993164], {icon: uclaIcon}).bindPopup(m_region_1_content).on('mouseover popupopen', function (e) {
            $(".table-row.region1").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.region1").css("background-color", "transparent");
        }),
        
        m_region2           = L.marker([42.454874, -93.295898], {icon: uclaIcon}).bindPopup(m_region_2_content).on('mouseover popupopen', function (e) {
            $(".table-row.region2").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.region2").css("background-color", "transparent");
        }),
        
        m_region3           = L.marker([33.228349, -88.725586], {icon: uclaIcon}).bindPopup(m_region_3_content).on('mouseover popupopen', function (e) {
            $(".table-row.region3").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.region3").css("background-color", "transparent");
        }),
        
        m_region4           = L.marker([41.909942, -118.278809], {icon: uclaIcon}).bindPopup(m_region_4_content).on('mouseover popupopen', function (e) {
            $(".table-row.region4").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.region4").css("background-color", "transparent");
        }),
        


        m_asia                = L.marker([38.8225909761771, 85.95703125], {icon: uclaIcon}).bindPopup(m_asia_content).on('mouseover popupopen', function (e) {
            $(".table-row.asia").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.asia").css("background-color", "transparent");
        }),
        m_australia            = L.marker([-25.622954, 134.472656], {icon: uclaIcon}).bindPopup(m_australia_content).on('mouseover popupopen', function (e) {
            $(".table-row.au").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.au").css("background-color", "transparent");
        }),
        m_brazil               = L.marker([-9.234960, -52.031250], {icon: uclaIcon}).bindPopup(m_brazil_content).on('mouseover popupopen', function (e) {
            $(".table-row.bz").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.bz").css("background-color", "transparent");
        }),
        m_canada               = L.marker([56.967439, -104.414063], {icon: uclaIcon}).bindPopup(m_canada_content).on('mouseover popupopen', function (e) {
            $(".table-row.can").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.can").css("background-color", "transparent");
        }),
        m_chile                = L.marker([-33.340854, -70.927734], {icon: uclaIcon}).bindPopup(m_chile_content).on('mouseover popupopen', function (e) {
            $(".table-row.chile").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.chile").css("background-color", "transparent");
        }),
        m_guatemala            = L.marker([15.352728, -90.351563], {icon: uclaIcon}).bindPopup(m_guatemala_content).on('mouseover popupopen', function (e) {
            $(".table-row.gua").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.gua").css("background-color", "transparent");
        }),
        m_mexico               = L.marker([23.855070, -103.007813], {icon: uclaIcon}).bindPopup(m_mexico_content).on('mouseover popupopen', function (e) {
            $(".table-row.mex").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.mex").css("background-color", "transparent");
        }),
        m_new_zealand          = L.marker([-42.468298, 172.419434], {icon: uclaIcon}).bindPopup(m_new_zealand_content).on('mouseover popupopen', function (e) {
            $(".table-row.nz").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.nz").css("background-color", "transparent");
        }),
        m_nigeria                = L.marker([9.570790, 8.085938], {icon: uclaIcon}).bindPopup(m_nigeria_content).on('mouseover popupopen', function (e) {
            $(".table-row.nigeria").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.nigeria").css("background-color", "transparent");
        }),
        m_europe              = L.marker([47.87214396888731, 5.9765625], {icon: uclaIcon}).bindPopup(m_europe_content).on('mouseover popupopen', function (e) {
            $(".table-row.europe").css("background-color", "#ffff00");
        }).on('mouseout popupclose', function (e) {
            $(".table-row.europe").css("background-color", "transparent");
    });

    m_san_diego_co.customId       = "sdc";
    m_dt_la.customId              = "dtla";
    m_santa_barbara.customId      = "sb";
    m_n_sm_bay.customId           = "nsmb";
    m_west_la.customId            = "wla";
    m_orange_co.customId          = "oco";
    m_south_bay.customId          = "southbay";
    m_san_gabriel_vally.customId  = "sgv";
    m_sfv_ventura.customId        = "sfvv";
    m_nor_cal.customId            = "norcal";
    
    m_region1.customId            = "region1";
    m_region2.customId            = "region2";
    m_region3.customId            = "region3";
    m_region4.customId            = "region4";


    m_asia.customId               = "asia";
    m_australia.customId          = "au";
    m_brazil.customId             = "bz";
    m_canada.customId             = "can";
    m_chile.customId              = "chile";
    m_europe.customId             = "eu";
    m_guatemala.customId          = "gua";
    m_mexico.customId             = "mex";
    m_new_zealand.customId        = "nz";
    m_nigeria.customId            = "nigeria";

    markers.push(
        m_san_diego_co,
        m_dt_la,          
        m_santa_barbara,     
        m_n_sm_bay,        
        m_west_la,       
        m_orange_co,        
        m_south_bay,     
        m_san_gabriel_vally,
        m_sfv_ventura,      
        m_nor_cal,   
              
        m_region1,
        m_region2, 
        m_region3, 
        m_region4,        
                
        m_asia,             
        m_europe,
		    m_australia,
		    m_brazil,
		    m_canada,
		    m_chile,
		    m_guatemala,
		    m_mexico,
		    m_new_zealand,
		    m_nigeria
    );

    var cal_markers = L.layerGroup([m_san_diego_co, m_dt_la, m_santa_barbara, m_n_sm_bay, m_west_la, m_orange_co, m_south_bay, m_san_gabriel_vally, m_sfv_ventura, m_nor_cal]);
    var world_markers = L.layerGroup([m_asia, m_europe, m_australia, m_brazil, m_canada, m_chile, m_guatemala, m_mexico, m_new_zealand, m_nigeria]);
    var us_markers = L.layerGroup([m_region1, m_region2, m_region3, m_region4 ]);

    cal_markers.addTo(calMap);

    $(".table-row").click(function(){
        
        var rowId = $(this).attr('data-id');

        var popup = _.findWhere(markers, {customId: rowId});

        popup.openPopup();
        $.scrollTo('#tabs-content');


    });





}); //close doc ready





















