function flashHeader(obj) {
  classAlert = "flash_alert";
  setInterval(function () {
    obj.fadeOut(400).fadeIn(400);
  }, 800);
}

$(document).ready(function () {
  flashHeader($(".titre_test"));
});
