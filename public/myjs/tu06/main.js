import { fixedNavbar } from "./classes/fixedNavbar.js";
import { homeJs } from "./classes/homeJs.js";

const nav = new fixedNavbar();
nav.fixed_search_navbar();

const home_js = new homeJs();
home_js.do_change();