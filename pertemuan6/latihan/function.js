function volumeDuaKubus(a, b) {
  var volumeA = a * a * a;
  var volumeB = b * b * b;
  return volumeA + volumeB;
}

console.log(volumeDuaKubus(8, 3));
console.log(volumeDuaKubus(10, 15)); 
console.log(volumeDuaKubus(7, 9));
console.log(volumeDuaKubus(15, 17));