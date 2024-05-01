export class homeJs {
    do_change(){
        let max_index = 0;
        this.variable = false;

        this.interval = setInterval(() => {
            if(this.variable == false ){
                this.element1 = document.querySelector('.index-'+String(max_index));
                this.element1.style.display = "none";
                this.element2 = document.querySelector('.index-'+String(max_index+8));
                this.element2.style.display = "inline";
                if(this.element2.className != "col-md-3 index-15") { max_index += 1; }
                this.variable = this.element2.className == "col-md-3 index-15" ? true : false;
            } else if(this.variable == true) {
                this.element1 = document.querySelector('.index-'+String(max_index));
                this.element1.style.display = "inline";
                this.element2 = document.querySelector('.index-'+String(max_index+8));
                this.element2.style.display = "none";
                if(this.element2.className != "col-md-3 index-8") { max_index -= 1; }
                this.variable = this.element2.className == "col-md-3 index-8" ? false : true;

            }
        }, 3000);

        document.getElementById('js-zone').addEventListener('mouseout',() => {
        this.interval = setInterval(() => {
            if(this.variable == false ){
                this.element1 = document.querySelector('.index-'+String(max_index));
                this.element1.style.display = "none";
                this.element2 = document.querySelector('.index-'+String(max_index+8));
                this.element2.style.display = "inline";
                if(this.element2.className != "col-md-3 index-15") { max_index += 1; }
                this.variable = this.element2.className == "col-md-3 index-15" ? true : false;
            } else if(this.variable == true) {
                this.element1 = document.querySelector('.index-'+String(max_index));
                this.element1.style.display = "inline";
                this.element2 = document.querySelector('.index-'+String(max_index+8));
                this.element2.style.display = "none";
                if(this.element2.className != "col-md-3 index-8") { max_index -= 1; }
                this.variable = this.element2.className == "col-md-3 index-8" ? false : true;

            }
        }, 3000);
    });
        document.getElementById('js-zone').addEventListener('mouseover',() => {
            clearInterval(this.interval);
        })
    }
}