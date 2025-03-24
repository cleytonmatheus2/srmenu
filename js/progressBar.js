function progress() {

    var windowScrollLeft = document.querySelector('.scrollMenu').scrollLeft;
    
    let docWidth = document.querySelector('.scrollMenu').scrollWidth;
    
    let windowWidth = document.querySelector('.scrollMenu').offsetWidth;
    
    //var windowWidth = window.screen.width;


    
    var progress = (windowScrollLeft / (docWidth - windowWidth)) * 100;
   
    document.getElementById('bar').style.width = progress + '%';

    let color = progress >= 99 ? '#1e8f76' : '#EB4747';

    document.getElementById('bar').style.width = progress + '%';

    document.getElementById('bar').style.background = color;

  
  
    
  }
  
  progress();
  
  document.querySelector('.scrollMenu').addEventListener('scroll', progress);