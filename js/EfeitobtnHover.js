const btns = document.querySelectorAll('div[class="btn-ripple clickDiv"]');

btns.forEach((btn) => {
  btn.addEventListener("click", function (divElement) {

    // e = Mouse click event.
    var rect = divElement.target.getBoundingClientRect();
    var x = divElement.clientX - rect.left; //x position within the element.
    var y = divElement.clientY - rect.top;  //y position within the element.

    const span = document.createElement("span");
    span.classList.add("ripple");
    span.style.top = `${y}px`;
    span.style.left = `${x}px`;


    this.appendChild(span);

    setTimeout(() => this.removeChild(span), 500);
  });
});
