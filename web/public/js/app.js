function ajaxSelectLocation(sChange, aUrl, sInsertOpt) {
    $(sChange).on('change', function() {
        $.ajax({
            type: 'GET',
            url: aUrl + "/" + this.value,
            dataType: 'json',
            success: function(data) {
                var html = [];
                for (var i = 0, len = data.length; i < len; i++) {
                    html[html.length] = "<option value=";
                    html[html.length] = data[i].id;
                    html[html.length] = ">";
                    html[html.length] = data[i].nama;
                    html[html.length] = "</option>";
                }
                $(sInsertOpt).find("option").remove();
                $(sInsertOpt).append(html.join(''));
            }
        });
    });
}

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "2618",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

var myApp = angular.module('myapp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
