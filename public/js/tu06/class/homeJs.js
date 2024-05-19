export class homeJs {
    do_change(){
        let max_index = 0;
        this.variable = false;


            this.interval = setInterval(() => {
                if(this.variable == false ){
                    this.element1 = document.querySelector('.index-'+String(max_index));
                    this.element2 = document.querySelector('.index-'+String(max_index+8));
                    this.element1.style.display = "none";
                    this.element2.style.display = "inline";
                    if(this.element2.className != "col-md-3 index-15") { 
                        max_index += 1;
                        this.timeout = setTimeout(() => {
                            this.do_left_animation(max_index);
                        }, 3000);
                    }else if(this.element2.className == "col-md-3 index-15") {
                        this.variable = true;
                        for (let index = 0; index < 16; index++) {
                            this.clear_id = document.querySelector('.index-'+String(index));
                            this.clear_id.setAttribute('id','');
                        }
                    }
                } else if(this.variable == true) {
                    this.element1 = document.querySelector('.index-'+String(max_index));
                    this.element1.style.display = "inline";
                    this.element2 = document.querySelector('.index-'+String(max_index+8));
                    this.element2.style.display = "none";
                    if(this.element2.className != "col-md-3 index-8") { 
                        max_index -= 1;
                        this.timeout = setTimeout(() => {
                            this.do_right_animation(max_index);
                        }, 3000);
                    }else if(this.element2.className == "col-md-3 index-8") {
                        this.variable = false;
                        for (let index = 0; index < 16; index++) {
                            this.clear_id = document.querySelector('.index-'+String(index));
                            this.clear_id.setAttribute('id','');
                        }
                    }
    
                }
            }, 3000);

        document.getElementById('js-zone').addEventListener('mouseout',() => {
            this.interval = setInterval(() => {
                if(this.variable == false ){
                    this.element1 = document.querySelector('.index-'+String(max_index));
                    this.element2 = document.querySelector('.index-'+String(max_index+8));
                    this.element1.style.display = "none";
                    this.element2.style.display = "inline";
                    if(this.element2.className != "col-md-3 index-15") { 
                        max_index += 1;
                        this.timeout = setTimeout(() => {
                            this.do_left_animation(max_index);
                        }, 3000);
                    }else if(this.element2.className == "col-md-3 index-15") {
                        this.variable = true;
                        for (let index = 0; index < 16; index++) {
                            this.clear_id = document.querySelector('.index-'+String(index));
                            this.clear_id.setAttribute('id','');
                        }
                    }
                } else if(this.variable == true) {
                    this.element1 = document.querySelector('.index-'+String(max_index));
                    this.element1.style.display = "inline";
                    this.element2 = document.querySelector('.index-'+String(max_index+8));
                    this.element2.style.display = "none";
                    if(this.element2.className != "col-md-3 index-8") { 
                        max_index -= 1;
                        this.timeout = setTimeout(() => {
                            this.do_right_animation(max_index);
                        }, 3000);
                    }else if(this.element2.className == "col-md-3 index-8") {
                        this.variable = false;
                        for (let index = 0; index < 16; index++) {
                            this.clear_id = document.querySelector('.index-'+String(index));
                            this.clear_id.setAttribute('id','');
                        }
                    }
    
                }
            }, 3000);
    });
        document.getElementById('js-zone').addEventListener('mouseover',() => {
            clearInterval(this.interval);
            clearTimeout(this.timeout);
        })
    }
    do_left_animation(max_index){
        this.el1 = document.querySelector('.index-'+String(max_index+1));
        this.el2 = document.querySelector('.index-'+String(max_index+8));
        this.el1.setAttribute('id','to-left');
        this.el2.setAttribute('id','to-left');
    }
    do_right_animation(max_index){
        this.el1 = document.querySelector('.index-'+String(max_index+1));
        this.el2 = document.querySelector('.index-'+String(max_index+7));
        this.el1.setAttribute('id','to-right');
        this.el2.setAttribute('id','to-right');
    }
}