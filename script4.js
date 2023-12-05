const play = document.querySelector('.play');
const pause = document.querySelector('.pause');
const playBtn = document.querySelector('.circle_btn');
const wave1 = document.querySelector('.circle_back-1');
const wave2 = document.querySelector('.circle_back-2');

playBtn.addEventListener('click',(e)=> {
    e.preventDefault()
    pause.classList.toggle('visibility')
    play.classList.toggle('visibility');
    playBtn.classList.toggle('shadow');
    wave1.classList.toggle('paused');
    wave2.classList.toggle('paused');
})