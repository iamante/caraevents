require("./bootstrap");
require("./main");

import $ from "jquery";
window.$ = window.jQuery = $;
global.$ = global.jQuery = require("jquery");

import "jquery-ui/ui/widgets/datepicker.js";
import "jquery-ui/ui/widgets/tabs.js";
