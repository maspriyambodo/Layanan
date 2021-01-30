function ajaxPost(url, data, fnOk, fnNok) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data, 
        //contentType: "application/json; charset=utf-8",
        success: function (data) {
            if (typeof fnOk == "function") fnOk(data);
        },
        error: function (error) {
            if (typeof fnNok == "function") {
                fnNok(error);
            }
            else {
                alert("There was an error posting the data to the server: " + error.responseText);
            }
        },
        statusCode: {
            404: function() {
                alert( "Page not found" );
            }
        },
    });
}

function ajaxGet(url, data, fnOk, fnNok) {
    $.ajax({
        url: url,
        type: 'GET',
        data: data, 
        //contentType: "application/json; charset=utf-8",
        success: function (data) {
            if (typeof fnOk == "function") fnOk(data);
        },
        error: function (error) {
            if (typeof fnNok == "function") {
                fnNok(error);
            }
            else {
                alert("There was an error posting the data to the server: " + error.responseText);
            }
        },
        statusCode: {
            404: function() {
                alert( "Page not found" );
            }
        },
    });
}

function ajaxPostPromise(url, data, fnOk, fnNok) {
    var def = $.Deferred();
    return $.ajax({
        url: url,
        type: 'POST',
        data: data, 
        //contentType: "application/json; charset=utf-8",
        success: function (data) {
            if (typeof fnOk == "function") fnOk(data);
            def.resolve();
        },
        error: function (error) {
            if (typeof fnNok == "function") {
                fnNok(error);
                def.resolve();
            }
            else {
                alert("There was an error posting the data to the server: " + error.responseText);
            }
        },
        statusCode: {
            404: function() {
                alert( "Page not found" );
            }
        },
    });
    return def.promise();
}

function ajaxPostPayload(url, data, fnOk, fnNok) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data, 
        contentType: "application/json; charset=utf-8",
        success: function (data) {
            if (typeof fnOk == "function") fnOk(data);
        },
        error: function (error) {
            if (typeof fnNok == "function") {
                fnNok(error);
            }
            else {
                alert("There was an error posting the data to the server: " + error.responseText);
            }
        },
        statusCode: {
            404: function() {
                alert( "Page not found" );
            }
        },
    });
}

function coalesce(nullcheckobj, defaultvalue) {
    return nullcheckobj == null || nullcheckobj == undefined ?
        defaultvalue : nullcheckobj;
}

function componentToHex(c) {
    var hex = c.toString(16);
    return hex.length == 1 ? "0" + hex : hex;
}

function rgbToHex(r, g, b) {
    return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
}

function toArray(objs) {
    return $.map(objs, function (obj, idx) { return obj; });
}

function numericOnly(e) {
    var uniCode = ""
    if (e != undefined) {
        if (e.which != null)
            uniCode = e.which;
        else if (e.charCode != null)
            uniCode = e.charCode;
        else
            uniCode = e.keyCode;
    }
    if (uniCode > 31 && (uniCode < 48 || uniCode > 57))
        return false;
    return true;
}

function decimalOnly(e) {
    var uniCode = ""
    if (e != undefined) {
        if (e.which != null)
            uniCode = e.which;
        else if (e.charCode != null)
            uniCode = e.charCode;
        else
            uniCode = e.keyCode;
    }
	
    if (uniCode > 31 && (uniCode < 48 || uniCode > 57) && uniCode != 46)
        return false;
    return true;
}

function setCurrency(elm) {
    elm.value = reformatNumber(elm.value);
}

function reformatNumber(num) {
    // num = Math.round(num);
    num = num.toString().replace(/\Rp.|\,/g, '').replace(/\,00|\,/g, '').replace(/\.|\,/g, '');
    // No error checking. Assumes only ever 1 DP per number
    var text = num;

    //added by masmeka
    var minPos = text.indexOf('-');
    var isMin = (minPos > -1);

    text = text.replace('-', '');

    // Strip off anything to the right of the DP
    var rightOfDp = '';
    var dpPos = text.indexOf(',');
    if (dpPos != -1) {
        rightOfDp = text.substr(dpPos);
        text = text.substr(0, dpPos);
    }

    var inttext = parseInt(text);
    if (inttext <= 0) {
        return "0";
    }

    var leftOfDp = '';
    var counter = 0;
    // Format the remainder into 3 char blocks, starting from the right
    for (var loop = text.length - 1; loop > -1; loop--) {
        var c = text.charAt(loop);

        // Ignore existing dot
        if (c == '.') continue;

        leftOfDp = c + leftOfDp;
        counter++;
        if (counter % 3 == 0) leftOfDp = '.' + leftOfDp;
    }

    // Strip leading space if present
    if (leftOfDp.charAt(0) == '.') leftOfDp = leftOfDp.substr(1);

    return (isMin ? '-' : '') + leftOfDp + rightOfDp;
}

function number_format(num, decimal_places, decimal_separator, thousand_separator) {    
 var result = num.toFixed(decimal_places);
 var snum = result.split(".");
 var fnum = "";
 for (i=0; i<snum[0].length; i++) {
 if ((snum[0].length-i)%3==0) {
 fnum += thousand_separator;
 }
 fnum += snum[0].charAt(i);
 }
 if (fnum.charAt(0) == '.') fnum = fnum.substr(1);
 var rnum = fnum + (decimal_places > 0 ? decimal_separator : '') + (snum[1]!=undefined?snum[1]:'');

 return rnum;
}

function numToLetter(n) {
    var s = "";
    while(n >= 0) {
        s = String.fromCharCode(n % 26 + 97) + s;
        n = Math.floor(n / 26) - 1;
    }
    return s;
}

function isWeekday(year, month, day) {
	var day = new Date(year, month, day).getDay();
	return day !=0 && day !=6;
}

function getWeekdaysInMonth(month, year, tipe) {
	var days = daysInMonth(month, year);
	var weekdays = 0;
	var week = 0;
	for(var i=0; i< days; i++) {
		if (isWeekday(year, month, i+1)) weekdays++;
		else week++;
	}
	if(tipe=='D')
		return weekdays;
	else 
		return Math.round(week);
}

function getWorkdaysInMonth(month, year) {
	return getWeekdaysInMonth(month, year, 'D');
}

function getWeekInMonth(month, year) {
	return getWeekdaysInMonth(month, year, 'W');
}

function readImg(input, elmtarget, width, height) {
    var iWidth = 200;
    var iHeight = 200;
    if (width !== undefined) {
        iWidth = width;
    }
    if (height !== undefined) {
        iHeight = height;
    }

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(elmtarget)
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

String.prototype.replaceAll = function( token, newToken, ignoreCase ) {
    var _token;
    var str = this + "";
    var i = -1;

    if ( typeof token === "string" ) {

        if ( ignoreCase ) {

            _token = token.toLowerCase();

            while( (
                i = str.toLowerCase().indexOf(
                    _token, i >= 0 ? i + newToken.length : 0
                ) ) !== -1
            ) {
                str = str.substring( 0, i ) +
                    newToken +
                    str.substring( i + token.length );
            }

        } else {
            return this.split( token ).join( newToken );
        }

    }
    return str;
};

function replaceAllChar(text, token, newToken, ignoreCase) {
    var _token;
    var str = text;
    var i = -1;

    if ( typeof token === "string" ) {

        if ( ignoreCase ) {

            _token = token;

            while( (
                i = str.indexOf(
                    _token, i >= 0 ? i + newToken.length : 0
                ) ) !== -1
            ) {
                str = str.substring( 0, i ) +
                    newToken +
                    str.substring( i + token.length );
            }

        } else {
            return this.split( token ).join( newToken );
        }

    }
    return str;
}

function inputToNumber() {
    $('.input-number').on('keypress', function(e){
        return numericOnly(e);
    });
    $('.input-number').on('keyup', function(e){
        var value = $(this).val();
        var newvalue = reformatNumber(value);

        $(this).val(newvalue);
    });
}

function reEnableSelect2() {
    var el = $('[data-toggle="select2"]');
    if(!el.length) return;
    el.each( function() {
      var $this = $(this),
          options = $this.data('plugin-options');

      if( this.unifato === undefined )
        this.unifato = {};

      $this.select2(options);
      this.unifato.select2 = $this.data('select2');
    });
}

// 0: Diterima; 1: Mulai Service; 2: Service Selesai; 3: QC; 4: Bisa Diambil; 98: Dibatalkan; 99: Selesai;
var Service = {};
Service.Diterima = 0;
Service.Proses = 1;
Service.Selesai = 2;
Service.QC = 3;
Service.BisaDiambil = 4;
Service.Batal = 98;
Service.SudahDiambil = 99;
function getStatusService(status) {
    var statustext = '<span class="badge badge-default">Open</span>';
    switch(status) {
        case Service.Proses:
            statustext = '<span class="badge badge-warning">Proses Service</span>';
            break;
        case Service.Selesai:
            statustext = '<span class="badge badge-info">Service Selesai</span>';
            break;
        case Service.QC:
            statustext = '<span class="badge badge-primary">QC in Progress</span>';
            break;
        case Service.BisaDiambil:
            statustext = '<span class="badge badge-success">Bisa Diambil</span>';
            break;
        case Service.SudahDiambil:
            statustext = '<span class="badge badge-green">Barang Sudah Diambil</span>';
            break;
        case Service.Batal:
            statustext = '<span class="badge badge-danger">Batal Service</span>';
            break;
    }

    return statustext;
}

function gridFilterToggle() {
    $('#gfShowHide').on('click', function() {
        var $this = $(this);
        $('.grid-filter-body').toggle('slow', function(){
            if($this.find('i').attr('class').indexOf('fa-caret-down') > -1) {
                $this.find('i').removeClass('fa-caret-down').addClass('fa-caret-up');
                $this.find('span').html('Hide Filter');
            } else {
                $this.find('i').removeClass('fa-caret-up').addClass('fa-caret-down');
                $this.find('span').html('Show Filter');
            }
        });
    });
}

function hideGridFilter() {
    $('#gfShowHide').trigger('click');
}

$(document).ready(function(){
    inputToNumber();

    gridFilterToggle();
    hideGridFilter();
    
    window.setTimeout(function(){
        try {
            $('[data-toggle="tooltip"]').tooltip();
        } catch(e) {
            console.log('Warning: unsupported using tooltip!');
        }
    }, 2000);
});

(function ( $ ) {
    $.fn.cek = function(){
        let $this = $(this);
        return {
            dong: function() {
                $($this.find('[data-vindicate]')).parent().append('<small class="form-control-feedback"></small>');
                $this.vindicate("init");
            },
            monggo: function() {
                $this.vindicate("validate");
                var checks = $this.find('[data-vindicate]');
                var isValid = true;
                if(checks.length > 0) {
                    $.each(checks, function(i, c) {
                        var e = $(c)[0];
                        if(!$('#'+e.id).hasClass('form-control-success')) {
                            isValid = false;
                        }
                    });
                }

                return isValid;
            },
        }   
    };
}( jQuery ));