const vusubtn = document.getElementById('opbtn');
const vusuform = document.getElementById('vform');
if(opbtn){
    opbtn.addEventListener('click', () =>{
        vform.classList.toggle('open-form');
    })
}
