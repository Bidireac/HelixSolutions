const showcase = document.querySelector('.showcase');
const slider = document.querySelector('.slider');
const logo = document.querySelector('#logo');
const headline = document.querySelector('.headline');
const nav = document.querySelector('.icon-btn');

const tl = new TimelineMax();

tl.fromTo(showcase, 1, {height: "0%"}, {height: "80%", ease: Power2.easeInOut })
.fromTo(showcase, 1.2, {width: "100%"}, {width: "80%", ease: Power2.easeInOut})
.fromTo(slider, 1.2, {x: "-100%"}, {x: "0%", ease: Power2.easeInOut}, "-=1.2")
.fromTo(logo, 0.5, {opacity: 0, x: 30}, {opacity: 1, x: 0}, "-=0.5")
.fromTo(headline, 0.5, {opacity: 0, x: 30}, {opacity: 1, x: 0}, "-=0.5")
.fromTo(nav, 0.5, {opacity: 0, x: 30}, {opacity: 1, x: 0}, "-=0.5");

// Flip card animation
function myFunction(){
  const x = document.querySelector(".thecard");
  if(x.style.color == "") {
      x.style.transform = "rotateY(0deg)";
      x.style.color = "purple";
      console.log(x);
  } else {
      x.style.transform = "rotateY(180deg)";
      x.style.color = "";
      console.log(x);
  }
} 

// Smooth Scrolling
$('a').on('click', function(event) {
  if (this.hash !== '') {
    event.preventDefault();

    const hash = this.hash;

    $('html, body').animate(
      {
        scrollTop: $(hash).offset().top - 0
      },
      800
    );
  }
});