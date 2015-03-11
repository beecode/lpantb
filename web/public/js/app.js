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


var myApp = angular.module('myapp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});