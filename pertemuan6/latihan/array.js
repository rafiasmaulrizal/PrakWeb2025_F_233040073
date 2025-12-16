function tambahPenumpang(namaPenumpang, penumpang) {

  if (penumpang.length == 0) {
    penumpang.push(namaPenumpang);
    return penumpang;

  } 

    for (let i = 0; i < penumpang.length; i++) {

      if (penumpang[i] == undefined) {
        penumpang[i] = namaPenumpang;
        return penumpang;
      } 
      
      if (penumpang[i] == namaPenumpang) {
        console.log(namaPenumpang + " sudah ada di dalam angkot.");
        return penumpang;
      }
    }
     
      penumpang.push(namaPenumpang);
      return penumpang;
    }

    let penumpang = [];
    penumpang = tambahPenumpang("Aji", penumpang);
    penumpang = tambahPenumpang("Budi", penumpang);
    penumpang = tambahPenumpang("Ajo", penumpang);
    penumpang = tambahPenumpang("Citra", penumpang);
    console.log(penumpang);
