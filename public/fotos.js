const file = document.getElementById('avatar');
const img = document.getElementById('foto-perfil');
const defaultimageSrc = "media/FotoVacia.svg";

file.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img.src = defaultimageSrc;
    }
});

defaultSrc = "media/NewImg.svg";


// Imagen 1
const file1 = document.getElementById('im1');
const img1 = document.getElementById('img1');

file1.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img1.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img1.src = defaultimageSrc;
    }
});
// Imagen 2
const file2 = document.getElementById('im2');
const img2 = document.getElementById('img2');

file2.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img2.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img2.src = defaultimageSrc;
    }
});
// Imagen 3
const file3 = document.getElementById('im3');
const img3 = document.getElementById('img3');


file3.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img3.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img3.src = defaultimageSrc;
    }
});
// Imagen 4
const file4 = document.getElementById('im4');
const img4 = document.getElementById('img4');

file4.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img4.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img4.src = defaultimageSrc;
    }
});
// Imagen 5
const file5 = document.getElementById('im5');
const img5 = document.getElementById('img5');

file5.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img5.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img5.src = defaultimageSrc;
    }
});
// Imagen 6
const file6 = document.getElementById('im6');
const img6 = document.getElementById('img6');

file6.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img6.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img6.src = defaultimageSrc;
    }
});
// Imagen 7
const file7 = document.getElementById('im7');
const img7 = document.getElementById('img7');

file7.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img7.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img7.src = defaultimageSrc;
    }
});
// Imagen 8
const file8 = document.getElementById('im8');
const img8 = document.getElementById('img8');

file8.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img8.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img8.src = defaultimageSrc;
    }
});
// Imagen 9
const file9 = document.getElementById('im9');
const img9 = document.getElementById('img9');

file9.addEventListener('change', e => {
    if( e.target.files[0] ){
        const reader = new FileReader();
        reader.onload = function(e){
            img9.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
    else {
        img9.src = defaultimageSrc;
    }
});