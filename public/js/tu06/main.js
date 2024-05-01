import { fixedNavbar } from "./class/fixedNavbar.js";
import { homeJs } from "./class/homeJs.js";

const nav = new fixedNavbar();
nav.fixed_search_navbar();

const home_js = new homeJs();
home_js.do_change();