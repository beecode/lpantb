<script src="<?php echo URL::to('lte/http/js/jquery.min.js'); ?>"  type="text/javascript"></script>
<script src="<?php echo URL::to('lte/js/plugins/lodash/lodash.js'); ?>"  type="text/javascript"></script>

<script src="<?php echo URL::to('lte/js/plugins/datatables/jquery.dataTables.js"'); ?>"  type="text/javascript"></script>
<script src="<?php echo URL::to('lte/js/plugins/datatables/fnFakeRowspan.js"'); ?>"  type="text/javascript"></script>
<script src="<?php echo URL::to('lte/js/plugins/datatables/dataTables.bootstrap.js"'); ?>"  type="text/javascript"></script>

<script src="<?php echo URL::to('lte/http/js/bootstrap.min.js'); ?>"  type="text/javascript"></script>
<script src="<?php echo URL::to('lte/http/js/raphael-min.js'); ?>"  type="text/javascript"></script>
<script src="<?php echo URL::to('lte/http/js/g.raphael-min.js'); ?>"  type="text/javascript"></script>
<script src="<?php echo URL::to('lte/http/js/g.pie-min.js'); ?>"  type="text/javascript"></script>
<script src="<?php echo URL::to('lte/http/js/morris.js'); ?>"  type="text/javascript"></script>
<script src="<?php echo URL::to('lte/js/plugins/jqueryKnob/jquery.knob.js'); ?>"  type="text/javascript"></script>


<script src="<?php echo URL::to('lte/js/AdminLTE/app.js'); ?>"  type="text/javascript"></script>


<!--js easy wizard-->
<script src="<?php echo URL::to('lte/js/plugins/easywizard/jquery.snippet.min.js'); ?>"></script>
<script src="<?php echo URL::to('lte/js/plugins/easywizard/jquery.easyWizard.js'); ?>"></script>
<script src="<?php echo URL::to('lte/js/plugins/easywizard/scripts.js'); ?>"></script>

<script src="<?php echo URL::to('com/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo URL::to('com/ckeditor/styles.js'); ?>"></script>

<!--Angular-->
<script src="<?php echo URL::to('com/angular-1.3.0/angular.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-route.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-resource.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-sanitize.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-touch.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-animate.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-scenario.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-loader.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-aria.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-cookies.js'); ?>"></script>
<script src="<?php echo URL::to('com/angular-1.3.0/angular-messages.js'); ?>"></script>

<script src="<?php echo URL::to('com/moment/moment.js'); ?>"></script>
<script src="<?php echo URL::to('com/moment/locale/id.js'); ?>"></script>
<script src="<?php echo URL::to('com/moment-timezone/moment-timezone.js'); ?>"></script>
<script src="<?php echo URL::to('com/moment-timezone-utils/moment-timezone-utils.js'); ?>"></script>

<script src="<?php echo URL::to('com/angular-moment/angular-moment.js'); ?>"></script>

<script src="<?php echo URL::to('com/autocomplete/autocomplete.js'); ?>"></script>
<script src="<?php echo URL::to('com/autocomplete/app.js'); ?>"></script>

<script src="<?php echo URL::to('com/angucomplete/angucomplete.js'); ?>"></script>
<script src="<?php echo URL::to('com/angucomplete/controllers/main-controller.js'); ?>"></script>
<!--<script src="<?php echo URL::to('com/angucomplete/app.js'); ?>"></script>-->

<!--typehead-->

<script src="<?php echo URL::to('com/typeahead.js/typeahead.bundle.min.js'); ?>"></script>
<script src="<?php echo URL::to('com/typeahead.js/typeahead.jquery.min.js'); ?>"></script>
<script src="<?php echo URL::to('com/typeahead.js/bloodhound.min.js'); ?>"></script>
<!--<script src="<?php echo URL::to('com/bootstrap-ajax-typeahead/js/bootstrap-typeahead.js'); ?>"></script>-->


<script src="<?php echo URL::to('js/app.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
var app = angular.module("app", ['ngTouch', 'angucomplete', 'angularMoment'], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

app.constant('angularMomentConfig', {
    // preprocess: 'unix', // optional
    timezone: 'Asia/Makassar' // optional
});
</script>
@include('layout.lteadmin.js.lkactrl')
