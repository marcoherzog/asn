var myScroll;
function loaded() {
  setTimeout(function () {
    myScroll = new iScroll('stage');
  }, 100);
}
window.addEventListener('load', loaded, false);
