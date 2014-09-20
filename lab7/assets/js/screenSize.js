var x;
var y;
if (self.innerHeight){
// all except Explorer
  x = self.innerWidth;
  y = self.innerHeight;
}
else if (document.documentElement && document.documentElement.clientHeight){
// Explorer 6 Strict Mode
  x = document.documentElement.clientWidth;
  y = document.documentElement.clientHeight;
}
else if (document.body){
// other Explorers
  x = document.body.clientWidth;
  y = document.body.clientHeight;
}