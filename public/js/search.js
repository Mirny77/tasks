window.onload = () => {
    let input = document.querySelector('#input');
    console.log(input)



    input.oninput=function () {
        let value = this.value.trim();
        let list = document.querySelectorAll('.input-search ');
        if(value){
            list.forEach(elem => {
                if (elem.innerText.search(value) === -1) {
                    elem.classList.add('hide');

                }
                else {
                    elem.classList.remove('hide');
                    // let str =elem.innerHTML;
                    // elem.innerHTML = insertSearh(str, elem.innerHTML.search(value), value.length)
                }
            });

        } else {
            	list.forEach(elem => {
            		elem.classList.remove('hide');



            	});
            }


    };
};
// function insertSearh(string,pos,len) {
//
//     return string.slice(0,pos)+'<mark>'+string.slice(pos,pos+len)+'</mark>'+string.slice(pos+len);
//
// }
