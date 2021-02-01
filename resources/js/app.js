require('./main');
require('./bootstrap');
require('./carousel');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
import 'jquery-ui/ui/widgets/tabs.js';

/* $('.datepicker').datepicker({
    duration: "slow",
}); 
 */

$("#service-tabs").tabs();

$('[data-toggle="popover"]').popover();

