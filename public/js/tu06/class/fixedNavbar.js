
export class fixedNavbar {
    fixed_search_navbar(){
        document.addEventListener('scroll', () => {
            let display_search_box = document.getElementById('display-search-box');
            if(document.documentElement.scrollTop >= 620 && window.innerWidth > 770){
                display_search_box.style.display = "inline";
            } else {
                display_search_box.style.display = "none";
            }
        });
    }
}